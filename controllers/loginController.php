<?php
use Facebook\FacebookSession; 
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginController
 *
 * @author Carlos Tapia
 */
class loginController extends Controller{
    
    private $_login;
    
    public function __construct() {
        parent::__construct();
        //$this->_login= $this->loadModel('usuario'); // para cargar el modelo para todo el controller
    }
    
    
    public function ingresar()
    {
        $this->bloquearAtaque();
        
        if(Session::get('sess_autenticado'))
        {
            $this->redireccionar();
        }
        
        $LC_email= $this->getTexto('txtEmail');
        $LC_pass= $this->getTexto('txtPass');
        
        if(!empty($LC_email) && !empty($LC_pass))
        {   
            if(Funciones::validarEmail($LC_email))
            {
                $usuario = $this->loadModel('Usuario');
                $objUsuarios= $usuario->getUsuarioLogin($LC_email);
                
                if($objUsuarios)
                {
                    if($objUsuarios->getEmail()==$LC_email && $objUsuarios->getPass()==$this->_criptPass($LC_pass))
                    {
                        if($objUsuarios->getEstado()==1)
                        {
                            Session::set('sess_autenticado', true);
                            Session::set('sess_tiempo', time());

                            Session::set('sess_idUser', $objUsuarios->getId_usuario());
                            Session::set('sess_nombreUser', $objUsuarios->getNombre());
                            Session::set('sess_emailUser', $objUsuarios->getEmail());
                            //Session::set('sess_fonoUser', $row[0]['fono']);
                            Session::set('sess_idComunaUser', $objUsuarios->getComuna());
                            //Session::set('sess_fotoPerfilUser', $row[0]['rc_foto']);

                            
                            
                            $this->redireccionar('usuarios/config');
                        }
                        else
                        {
                            $this->_alert(2, 'Su cuenta ha sido bloqueada. Lo sentimos');
                            $this->redireccionar('registrar');
                        }
                    }
                    else
                    {
                        $this->_alert(2, 'Email o Password son incorrectos, por favor vuelva a intentarlo.');
                        $this->redireccionar('registrar');
                    }
                }
                else
                {
                    $this->_alert(2, 'Email ingresado no existe, &iexcl;<a href="' . BASE_URL . '\'registro\'">&uacute;nete ahora</a>!');
                    $this->redireccionar('registrar');
                }
            }
            else
            {
                $this->_alert(2, 'Email ingresado no es v&aacute;lido.');
                $this->redireccionar('registrar');
            }
        }
        else
        {
            $this->_alert(2, 'Para entrar a su cuenta, debe ingresar un Email y Password.');
            $this->redireccionar('registrar');
        }
    }

    public function ingresarFacebook(){
        FacebookSession::setDefaultApplication('717731938295412', '0165bfb89d46d90dd2085f5a53d076f4');
        $helper = new FacebookRedirectLoginHelper(BASE_URL."login/logearFacebook");
        $loginUrl = $helper->getLoginUrl(array('scope' => 'email'));   
        header('Location:'.$loginUrl);
    }

    public function logearFacebook(){
        
        FacebookSession::setDefaultApplication('717731938295412', '0165bfb89d46d90dd2085f5a53d076f4');
        $helper = new FacebookRedirectLoginHelper(BASE_URL."login/logearFacebook");
        
        try {
            $session = $helper->getSessionFromRedirect();
            if ($session) {
                $user_profile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());
                echo $user_profile->getEmail();
            }
            exit;
        } catch(FacebookRequestException $ex) {
          echo $ex;
          exit;
        } catch(\Exception $ex) {
          echo $ex;
          exit;
        }
       
        
    }
}
