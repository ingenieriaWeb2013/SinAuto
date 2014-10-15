<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class View 
{
    private $_controlador;
    private $_js;
    
    public function __construct(Request $peticion) { //$peticion es un objeto de Request
        $this->_controlador= $peticion->getControlador();
        $this->_js=array();
    }
    
    
    public function renderizaPrincipal($vista, $header=false)
    {
        
        $rutaView= ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
        
        if(is_readable($rutaView))
        {   
            
            echo View::remplazarEnVista($rutaView,$header);
            exit;
        }
        else
        {
            throw new Exception('Error de vista: '.$rutaView);
        }
    }
    
    
    
    public function remplazarEnVista($rutaView,$incluirHeader = false,$array=array()){
        
        $vista = file_get_contents($rutaView);
        
        $arrayPublic = array(
                    '{CSS}'=>CSS,
                    '{IMG}'=>IMG,
                    '{JS}'=>JS
        );
        
        $new_array = array_merge($arrayPublic , $array);
        
        if($incluirHeader){
            $header = file_get_contents(ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php');
            $footer = file_get_contents(ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php');
            $vista  = $header.$vista.$footer;
        }      
        
        foreach($new_array as $clave => $valor){
            $vista = str_replace($clave, $valor, $vista);
        }
        


        return $vista;
    }

    
}