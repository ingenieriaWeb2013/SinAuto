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
        $LC_user= strtolower($this->getTexto('txtUser'));
        $LC_pass= strtolower($this->getTexto('txtPass'));        
        
        if(!empty($LC_user) && !empty($LC_pass))
        {   
            $objUsuarios= $this->_login->getUsuarios($LC_user);
            
            if($objUsuarios!=false)
            {
                if(strtolower($objUsuarios[0]->getClave())==$LC_user && $objUsuarios[0]->getPassword()==$LC_pass)
                {
                    
                    ############################################################################
                    //EJECUTANDO STORED PROCEDURE
                    $sp_perfilClave= $this->_login->sp_perfilClave($LC_user, 'FILEWEB');
                    if($sp_perfilClave!=false)
                    {
                        if(trim($sp_perfilClave[0]['acceso']) != 'S')
                        {
                            $this->_alert(2, 'Error al verificar usuario <b>ACCESO</b>.');
                            $this->redireccionar(); //nopermited1
                        }
                    }
                    else
                    {
                        $this->_alert(2, 'Error al verificar usuario <b>FILEWEB</b>.');
                        $this->redireccionar(); //nopermited2
                    }
                    ############################################################################
                    
                    
                    
                    if($objUsuarios[0]->getCambioPass()=='1')
                    {
                        Session::set('sess_User', $LC_user);
                        Session::set('sess_nombreUser', $objUsuarios[0]->getNombre());
                        
                        
                        $this->redireccionar('login/cambioPass/' . session_id());
                    }
                    
                    //echo '..::fin::..'; exit;
                    

                    Session::set('Autenticado', true);
                    Session::set('sess_key_', md5(uniqid()));
                    Session::set('sess_ip', $_SERVER["REMOTE_ADDR"]);
                    Session::set('sess_fechaLogin', date("d/m/Y H:i:s"));
                    Session::set('sess_fechaDefault', Functions::fechaActual(1));
                    
                    
                    Session::set('sess_clave_usuario', $objUsuarios[0]->getClave());
                    Session::set('sess_nombre', $objUsuarios[0]->getNombre());
                    Session::set('sess_cod_ven', $objUsuarios[0]->getCodigo());
                    
                    Session::set('sess_dctod', $objUsuarios[0]->getDoctoD());
                    Session::set('sess_dctoh', $objUsuarios[0]->getDoctoH());

                    Session::set('sess_agencia', $objUsuarios[0]->getAgencia());
                    Session::set('sess_id_agen', $objUsuarios[0]->getIdAgen());
                    
                    Session::set('sess_markup', $objUsuarios[0]->getMarkup());
                    Session::set('sess_fecpass', $objUsuarios[0]->getFechaPass());
                    
                    Session::set('sess_depto', $objUsuarios[0]->getDepto());
                    Session::set('sess_atipoa', $objUsuarios[0]->getAtipoa());
                    
                    Session::set('sess_firma', $objUsuarios[0]->getFirma());
                    Session::set('sess_email', $objUsuarios[0]->getEmail());
                    Session::set('sess_email_opera', $objUsuarios[0]->getEmailOpera());
                    
                    

                    Session::set('level', 'Admin');//Validar tipo de usuario
                    Session::set('tiempo', time());
                        
                    
                    
                    ############################################################################
                    //EJECUTANDO STORED PROCEDURE
                    $sp_perfilClave= $this->_login->sp_perfilClave($LC_user, 'ADMWEB');
                    if($sp_perfilClave!=false)
                    {
                        Session::set('sess_sp_acceso', trim($sp_perfilClave[0]['acceso']));
                    }
                    else
                    {
                        Session::set('sess_sp_acceso', 0);
                    }
                    ############################################################################
                    
                    $this->redireccionar('system');
                }
                else
                {
                    $this->_alert(2, '<b>Usuario</b> o <b>Contrase&ntilde;a</b> Incorrectos.');
                    $this->redireccionar(); //Error Usuario o Pass
                }
            }
            else
            {
                $this->_alert(2, 'El usuario <b>no &eacute;xiste</b> o No tiene <b>agencia asignada</b>.');
                $this->redireccionar(); //No existe
            }
        }
        else
        {
            $this->_alert(2, 'Debe ingresar su <b>Usuario</b> y <b>Contrase&ntilde;a</b>.');
            
            $this->redireccionar(); //Ingrese un usuario o Pass
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
