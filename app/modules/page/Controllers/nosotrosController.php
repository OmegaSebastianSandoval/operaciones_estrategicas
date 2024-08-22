<?php 

class Page_nosotrosController extends Page_mainController
{

  public $botonactivo  = 2;
  public function indexAction()
  {
    $this->_view->contenido = $this->template->getContentseccion(2);

  
  }
}