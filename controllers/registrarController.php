<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class registrarController extends Controller
{
    //private $_marca;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        if (Session::get('sess_autenticado')) {
            $this->redireccionar();
        }

        $this->_view->renderingMain('index', true);
        $this->_alertDestroy();
    }

    public function registrarme() {
        //$this->bloquearAtaque();
         
        $rNombre= $this->getTexto('txtNombre');
        $rEmail= $this->getTexto('txtEmail');
        $rPass= $this->getTexto('txtPass');
        $rPassAgain= $this->getTexto('txtPassAgain');
        $rTerms= $this->getTexto('chkTerms');
        
        
        if(!$rNombre) {
            $this->_alert(2, 'Debe ingresar su nombre.');
            $this->redireccionar('registrar');
        } else {
            Session::set('sess_rNombre', $rNombre);
        }
        
        if (!Funciones::validarEmail($rEmail)) {
            $this->_alert(2, 'El email ingresado no es v&aacute;lido.');
            $this->redireccionar('registrar');
        } else {
            Session::set('sess_rEmail', $rEmail);
        }

        if ($rPass != $rPassAgain) {
            $this->_alert(2, 'Las contrase&ntilde;as no coinciden.');
            $this->redireccionar('registrar');
        }

        if ($rTerms != 'on') {
            $this->_alert(2, 'Debe aceptar los terminos y condiciones.');
            $this->redireccionar('registrar');
        }

        $usuario = $this->loadModel('Usuario');
        if ($usuario->verificarEmail($rEmail)) {
            $this->_alert(2, 'Ya existe una cuenta asociada a este email.');
            $this->redireccionar('registrar');
        }

        $rPass= $this->_criptPass($rPass);
        if(!$usuario->registrarUsuario($rNombre, $rEmail, $rPass)) {
            $this->_alert(2, 'Error al registrarse, intente mas tarde1.');
            $this->redireccionar('registrar');
        }
        
        if ($usuario->verificarEmail($rEmail)) {
            $this->redireccionar('perfil');
        } else {
            $this->_alert(2, 'Error al registrarse, intente mas tarde.');
            $this->redireccionar('registrar');
        }
    }
    
}

?>