<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class View 
{
    private $_controlador;
    
    public function View(Request $peticion) { //$peticion es un objeto de Request
        $this->_controlador= $peticion->getControlador();
    }
    
    
    public function renderizaPrincipal($vista)
    {       
        $_layoutParams= array(
            'ruta_css' => BASE_URL . 'public/css/', 
            'ruta_img' => BASE_URL . 'public/img/', 
            'ruta_js' => BASE_URL . 'public/js/', 
            'js' => $js
        );
        
        $rutaView= ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';      
        if(is_readable($rutaView))
        {   
            include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            include_once $rutaView;
            include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        }
        else
        {
            throw new Exception('Error de vista: '.$rutaView);
        }
    }


    
}