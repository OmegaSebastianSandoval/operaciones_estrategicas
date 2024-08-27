<?php

class Page_serviciosController extends Page_mainController
{
  public $botonactivo  = 3;
  public function indexAction()
  {
    $this->_view->banner = $this->template->banner(3);

    $this->_view->contenido = $this->template->getContentseccion(3);
    $contenidoModel = new Page_Model_DbTable_Contenido();

    $services = $contenidoModel->getList("contenido_padre= '38' AND contenido_estado = '1'", "orden ASC");
    // print_r($services);  
    $this->_view->services = $services;
  }
}
