<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class publicarController extends Controller
{
    public function publicarController() {
        parent::Controller();
        $this->_marca= $this->loadModel('marca'); 
    }
    
    public function index()
    {
        $this->_view->renderizaPrincipal('index',true);
        $this->_view->objMarcas = $this->_marca->getMarcas();
    }
}

?>