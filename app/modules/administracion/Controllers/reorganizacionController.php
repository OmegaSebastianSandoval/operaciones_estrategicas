<?php
/**
* Controlador de Reorganizacion que permite la  creacion, edicion  y eliminacion de los reorganizacion del Sistema
*/
class Administracion_reorganizacionController extends Administracion_mainController
{

	public $botonpanel = 5;

	/**
	 * $mainModel  instancia del modelo de  base de datos reorganizacion
	 * @var modeloContenidos
	 */
	public $mainModel;

	/**
	 * $route  url del controlador base
	 * @var string
	 */
	protected $route;

	/**
	 * $pages cantidad de registros a mostrar por pagina]
	 * @var integer
	 */
	protected $pages ;

	/**
	 * $namefilter nombre de la variable a la fual se le van a guardar los filtros
	 * @var string
	 */
	protected $namefilter;

	/**
	 * $_csrf_section  nombre de la variable general csrf  que se va a almacenar en la session
	 * @var string
	 */
	protected $_csrf_section = "administracion_reorganizacion";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador reorganizacion .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Reorganizacion();
		$this->namefilter = "parametersfilterreorganizacion";
		$this->route = "/administracion/reorganizacion";
		$this->namepages ="pages_reorganizacion";
		$this->namepageactual ="page_actual_reorganizacion";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  reorganizacion con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Aministración de reorganizacion";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters =(object)Session::getInstance()->get($this->namefilter);
        $this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "orden ASC";
		$list = $this->mainModel->getList($filters,$order);
		$amount = $this->pages;
		$page = $this->_getSanitizedParam("page");
		if (!$page && Session::getInstance()->get($this->namepageactual)) {
		   	$page = Session::getInstance()->get($this->namepageactual);
		   	$start = ($page - 1) * $amount;
		} else if(!$page){
			$start = 0;
		   	$page=1;
			Session::getInstance()->set($this->namepageactual,$page);
		} else {
			Session::getInstance()->set($this->namepageactual,$page);
		   	$start = ($page - 1) * $amount;
		}
		$this->_view->register_number = count($list);
		$this->_view->pages = $this->pages;
		$this->_view->totalpages = ceil(count($list)/$amount);
		$this->_view->page = $page;
		$this->_view->lists = $this->mainModel->getListPages($filters,$order,$start,$amount);
		$this->_view->csrf_section = $this->_csrf_section;
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  reorganizacion  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_reorganizacion_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->reor_id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar reorganizacion";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear reorganizacion";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear reorganizacion";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un reorganizacion  y redirecciona al listado de reorganizacion.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$uploadImage =  new Core_Model_Upload_Image();
			if($_FILES['reor_imagen']['name'] != ''){
				$data['reor_imagen'] = $uploadImage->upload("reor_imagen");
			}
			$uploadDocument =  new Core_Model_Upload_Document();
			if($_FILES['reor_arch']['name'] != ''){
				$data['reor_arch'] = $uploadDocument->upload("reor_arch");
			}
			$id = $this->mainModel->insert($data);
			$this->mainModel->changeOrder($id,$id);
			$data['reor_id']= $id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'CREAR REORGANIZACION';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un reorganizacion  y redirecciona al listado de reorganizacion.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->reor_id) {
				$data = $this->getData();
				$uploadImage =  new Core_Model_Upload_Image();
				if($_FILES['reor_imagen']['name'] != ''){
					if($content->reor_imagen){
						$uploadImage->delete($content->reor_imagen);
					}
					$data['reor_imagen'] = $uploadImage->upload("reor_imagen");
				} else {
					$data['reor_imagen'] = $content->reor_imagen;
				}
				$uploadDocument =  new Core_Model_Upload_Document();
				if($_FILES['reor_arch']['name'] != ''){
					if($content->reor_arch){
						$uploadDocument->delete($content->reor_arch);
					}
					$data['reor_arch'] = $uploadDocument->upload("reor_arch");
				} else {
					$data['reor_arch'] = $content->reor_arch;
				}
				$this->mainModel->update($data,$id);
			}
			$data['reor_id']=$id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'EDITAR REORGANIZACION';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y elimina un reorganizacion  y redirecciona al listado de reorganizacion.
     *
     * @return void.
     */
	public function deleteAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_csrf_section] == $csrf ) {
			$id =  $this->_getSanitizedParam("id");
			if (isset($id) && $id > 0) {
				$content = $this->mainModel->getById($id);
				if (isset($content)) {
					$uploadImage =  new Core_Model_Upload_Image();
					if (isset($content->reor_imagen) && $content->reor_imagen != '') {
						$uploadImage->delete($content->reor_imagen);
					}
					$uploadDocument =  new Core_Model_Upload_Document();
					if (isset($content->reor_arch) && $content->reor_arch != '') {
						$uploadDocument->delete($content->reor_arch);
					}
					$this->mainModel->deleteRegister($id);$data = (array)$content;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = 'BORRAR REORGANIZACION';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data); }
			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Reorganizacion.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		if($this->_getSanitizedParam("estado") == '' ) {
			$data['estado'] = '0';
		} else {
			$data['estado'] = $this->_getSanitizedParam("estado");
		}
		$data['reor_titulo'] = $this->_getSanitizedParam("reor_titulo");
		$data['reor_imagen'] = "";
		$data['reor_enlace'] = $this->_getSanitizedParam("reor_enlace");
		$data['reor_color_fondo'] = $this->_getSanitizedParam("reor_color_fondo");
		$data['reor_vermas'] = $this->_getSanitizedParam("reor_vermas");
		$data['fecha'] = $this->_getSanitizedParam("fecha");
		$data['reor_arch'] = "";
		$data['reor_arch_nom'] = '' ;
		$data['reor_desc'] = $this->_getSanitizedParamHtml("reor_desc");
		return $data;
	}
	/**
     * Genera la consulta con los filtros de este controlador.
     *
     * @return array cadena con los filtros que se van a asignar a la base de datos
     */
    protected function getFilter()
    {
    	$filtros = " 1 = 1 ";
        if (Session::getInstance()->get($this->namefilter)!="") {
            $filters =(object)Session::getInstance()->get($this->namefilter);
            if ($filters->estado != '') {
                $filtros = $filtros." AND estado LIKE '%".$filters->estado."%'";
            }
            if ($filters->reor_titulo != '') {
                $filtros = $filtros." AND reor_titulo LIKE '%".$filters->reor_titulo."%'";
            }
            if ($filters->reor_imagen != '') {
                $filtros = $filtros." AND reor_imagen LIKE '%".$filters->reor_imagen."%'";
            }
		}
        return $filtros;
    }

    /**
     * Recibe y asigna los filtros de este controlador
     *
     * @return void
     */
    protected function filters()
    {
        if ($this->getRequest()->isPost()== true) {
        	Session::getInstance()->set($this->namepageactual,1);
            $parramsfilter = array();
					$parramsfilter['estado'] =  $this->_getSanitizedParam("estado");
					$parramsfilter['reor_titulo'] =  $this->_getSanitizedParam("reor_titulo");
					$parramsfilter['reor_imagen'] =  $this->_getSanitizedParam("reor_imagen");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}