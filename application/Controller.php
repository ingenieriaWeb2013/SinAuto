<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

abstract class Controller
{
    protected $_view;
    protected $_request;
    
    public function __construct() {
        $this->_request = new Request();
        $this->_view= new view($this->_request);
    }
    
    //abstract public function index();
    
    protected function loadModel($class)
    {
        $dao= $class . 'DAO';
        $dto= $class . 'DTO';
        $rutaDAO= ROOT . 'models' . DS . 'dao'. DS .$dao . '.php';
        $rutaDTO= ROOT . 'models' . DS . 'dto'. DS .$dto . '.php';
        
        if(is_readable($rutaDAO))
        {
            if(is_readable($rutaDTO))
            {
                require_once $rutaDAO;
                require_once $rutaDTO;
                
                //$dao= $dao::getInstance();
                $dao= new $dao;
                return $dao; //retorna la instancia del modelo
            }
            else
            {
                throw new Exception('Error al cargar el DTO: ' . $rutaDTO);
            }
        }
        else
        {
            throw new Exception('Error al cargar el DAO: ' . $rutaDAO);
        }
    }
    
    
    protected function getServer($clave) {
        if (!empty($_SERVER[$clave])) {
            return $_SERVER[$clave];
        }
    }

    protected function getInt($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return trim($_POST[$clave]);
        }

        return 0;
    }
    
    
    protected function bloquearAtaque() {
        if ($this->getServer('HTTP_REFERER')) {
            if (!preg_match('/sinauto/', strtolower($this->getServer('HTTP_REFERER')))) {
                $this->redireccionar(); 
            }
        } else {
            $this->redireccionar();
        }
    }

    protected function getTexto($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return trim($_POST[$clave]);
        }
    }

    protected function redireccionar($ruta = false) {
        if ($ruta) {
            header('location:' . BASE_URL . $ruta);
            exit;
        } else {
            header('location:' . BASE_URL);
            exit;
        }
    }
    
    
    protected function _criptPass($pass)
    {
        $password= strrev(sha1($pass));
        $arrayCrypt=array('$5', 'A#');
        $cryptPass=false;
        for($i=0; $i<2; $i++)
        {
             $cryptPass.= crypt(substr($password, ($i*8), 8), $arrayCrypt[$i]);
        }
        return $cryptPass;
    }

    
    
    protected function _alert($tipo=false, $msg=false)
    {
        Session::set('sess_alerts', $tipo); //Tipo alerta
        Session::set('sess_alerts_msg', $msg);
    }
    
    protected function _alertDestroy()
    {
        Session::destroy('sess_alerts');
        Session::destroy('sess_alerts_msg');
    }
}