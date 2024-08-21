<?php

/**
 *
 */

class Page_indexController extends Page_mainController
{

  protected $_csrf_section = "omega_index";
  public $botonactivo  = 1;

  public function indexAction()
  {
    $this->_view->banner = $this->template->bannerPrincipal(1);
    $this->_view->contenido = $this->template->getContentseccion(1);
    $this->_view->formulario = $this->template->getFormulario();

  }
}
