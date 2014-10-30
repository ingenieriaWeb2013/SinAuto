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
        $this->_marca= $this->loadModel('marca'); 
    }
    
    public function index()
    {
        
        //$this->_marca->getMarcas();
        $this->_view->objMarcas = $this->_marca->getMarcas();
        $this->_view->renderingMain('index',true);
    }
}

?>