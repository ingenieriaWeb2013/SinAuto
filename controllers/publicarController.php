<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class publicarController extends Controller
{
    //private $_marca;
    
    public function publicarController() {
        parent::Controller();
    }
    
    public function index()
    {
        $this->_marca   = $this->loadModel('Marca');
        $this->_tipo    = $this->loadModel('Tipo');
        $this->_carro    = $this->loadModel('Carroceria');
       
        $this->_view->objMarcas         = $this->_marca->getMarcas();
        $this->_view->objTipos          = $this->_tipo->getTipos();
        $this->_view->objCarrocerias    = $this->_carro->getCarrocerias();
        $this->_view->renderingMain('index',true);
    }
}

?>