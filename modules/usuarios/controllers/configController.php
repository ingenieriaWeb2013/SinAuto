<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class configController extends usuariosController
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        /*if (!Session::get('sess_autenticado')) {
            $this->redireccionar();
        }*/

        $this->_view->renderingMain('index', true);
        //$this->_alertDestroy();
    }
            
}