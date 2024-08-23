<?php 

class Page_reorganizacionempresarialController extends Page_mainController
{
  public $botonactivo  = 4;
  public function indexAction()
  {
    $this->_view->banner = $this->template->banner(4);

    $this->_view->contenido = $this->template->getContentseccion(4);

    $reorganizacionModel = new Administracion_Model_DbTable_Reorganizacion();
    $reorganizacion = $reorganizacionModel->getList("","orden ASC");
    
    $archivosModel = new Administracion_Model_DbTable_Archivos();
    
    foreach ($reorganizacion as $key => $value ){
        $id = $value->reor_id; 
        $value->archivos = $archivosModel->getList("pertenecea = '$id'",""); 
    }
    
    $this->_view->reorganizacion = $reorganizacion; 
  }
}