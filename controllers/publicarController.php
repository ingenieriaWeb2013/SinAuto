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
        $this->_marca= $this->loadModel('marca');
        $this->_tipo= $this->loadModel('tipo');
        
<<<<<<< HEAD
   
        $this->_view->objMarcas = $this->_marca->getMarcas();
        $this->_view->objTipos  = $this->_tipo->getTipos();
        $this->_view->renderizaPrincipal('index',true);
=======
        //$this->_marca->getMarcas();
        $this->_view->objMarcas = $this->_marca->getMarcas();
        $this->_view->renderingMain('index',true);
>>>>>>> 9fd03d5874c700cbe0ded13d1af78fe877eda957
    }
}

?>