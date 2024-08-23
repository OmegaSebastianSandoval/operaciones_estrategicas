<?php 

class Page_contactoController extends Page_mainController
{
  protected $_csrf_section = "omega_index";
  public $botonactivo  = 6;
  public function indexAction()
  {
    $this->_view->banner = $this->template->banner(6);


    $this->_csrf_section = "omega_index" . date("YmdHis");
    $this->_csrf->generateCode($this->_csrf_section);
    $csrf_section = $this->_csrf_section;
    $csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
    
    $this->_view->formulario = $this->template->getFormulario($csrf_section, $csrf);
  }
}