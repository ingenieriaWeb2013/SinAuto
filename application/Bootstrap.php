<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class Bootstrap
{
    
    public static function run(Request $peticion)
    {
        $modulo = $peticion->getModulo();
        $controller= $peticion->getControlador() . 'Controller';
        $metodo= $peticion->getMetodo();
        $args= $peticion->getArgs();
        
        
        if($modulo) {
            $rutaModulo= ROOT . 'controllers' . DS . $modulo . 'Controller.php';
            
            if(is_readable($rutaModulo)) {
                require_once $rutaModulo;
                $rutaControlador= ROOT . 'modules' . DS . $modulo . DS . 'controllers' . DS . $controller . '.php';
            } else {
                throw new Exception('Error al cargar el modulo: ' . $rutaModulo);
            }
        } else {
            $rutaControlador= ROOT . 'controllers' . DS . $controller . '.php';
        }
        
        
        //echo $rutaControlador; exit;
        
        if(is_readable($rutaControlador)) //verifica si el archivo existe y tambien es valido
        {
            require_once $rutaControlador;
            $controller= new $controller; //instanciando clase del indexController
            
            if(is_callable(array($controller, $metodo)))
            {
                $metodo= $peticion->getMetodo();
            }
            else
            {
                $metodo='index';
            }
            
            if($args!=null)
            {
                call_user_func_array(array($controller, $metodo), $args); //en un arreglo enviamos nombre de clase y metodo que queremos llamar y parametros que queremos pasar
            }
            else
            {
                call_user_func(array($controller, $metodo));
            }
        }
        else
        {
            throw new Exception('Controller no encontrado: ' . $rutaControlador);
        }
        
    }
    
}