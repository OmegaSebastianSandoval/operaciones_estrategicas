<?php
/**
* Controlador de Archivos que permite la  creacion, edicion  y eliminacion de los archivo del Sistema
*/
class Administracion_archivosController extends Administracion_mainController
{
	public $botonpanel = 5;

	/**
	 * $mainModel  instancia del modelo de  base de datos archivo
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
	protected $_csrf_section = "administracion_archivos";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador archivos .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Archivos();
		$this->namefilter = "parametersfilterarchivos";
		$this->route = "/administracion/archivos";
		$this->namepages ="pages_archivos";
		$this->namepageactual ="page_actual_archivos";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  archivo con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Aministración de archivo";
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
		$this->_view->pertenecea = $this->_getSanitizedParam("pertenecea");
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  archivo  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_archivos_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->pertenecea = $this->_getSanitizedParam("pertenecea");
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar archivo";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear archivo";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear archivo";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un archivo  y redirecciona al listado de archivo.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$uploadDocument =  new Core_Model_Upload_Document();
			if($_FILES['archivo']['name'] != ''){
				$data['archivo'] = $uploadDocument->upload("archivo");
			}
			$id = $this->mainModel->insert($data);
			$this->mainModel->changeOrder($id,$id);
			$data['id']= $id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'CREAR ARCHIVO';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		$pertenecea = $this->_getSanitizedParam("pertenecea");
		header('Location: '.$this->route.'?pertenecea='.$pertenecea.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un archivo  y redirecciona al listado de archivo.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->id) {
				$data = $this->getData();
					$uploadDocument =  new Core_Model_Upload_Document();
				if($_FILES['archivo']['name'] != ''){
					if($content->archivo){
						$uploadDocument->delete($content->archivo);
					}
					$data['archivo'] = $uploadDocument->upload("archivo");
				} else {
					$data['archivo'] = $content->archivo;
				}
				$this->mainModel->update($data,$id);
			}
			$data['id']=$id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'EDITAR ARCHIVO';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);}
		$pertenecea = $this->_getSanitizedParam("pertenecea");
		header('Location: '.$this->route.'?pertenecea='.$pertenecea.'');
	}

	/**
     * Recibe un identificador  y elimina un archivo  y redirecciona al listado de archivo.
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
					$uploadDocument =  new Core_Model_Upload_Document();
					if (isset($content->archivo) && $content->archivo != '') {
						$uploadDocument->delete($content->archivo);
					}
					$this->mainModel->deleteRegister($id);$data = (array)$content;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = 'BORRAR ARCHIVO';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data); }
			}
		}
		$pertenecea = $this->_getSanitizedParam("pertenecea");
		header('Location: '.$this->route.'?pertenecea='.$pertenecea.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Archivos.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		$data['titulo'] = $this->_getSanitizedParam("titulo");
		$data['archivo'] = "";
		$data['pertenecea'] = $this->_getSanitizedParamHtml("pertenecea");
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
            if ($filters->titulo != '') {
                $filtros = $filtros." AND titulo LIKE '%".$filters->titulo."%'";
            }
            if ($filters->archivo != '') {
                $filtros = $filtros." AND archivo LIKE '%".$filters->archivo."%'";
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
					$parramsfilter['titulo'] =  $this->_getSanitizedParam("titulo");
					$parramsfilter['archivo'] =  $this->_getSanitizedParam("archivo");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}