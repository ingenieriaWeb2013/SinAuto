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
        $this->_marca   = $this->loadModel('Marca');
        $this->_tipo    = $this->loadModel('Tipo');
        $this->_carro    = $this->loadModel('Carroceria');
       
        $this->_view->objMarcas         = $this->_marca->getMarcas();
        $this->_view->objTipos          = $this->_tipo->getTipos();
        $this->_view->objCarrocerias    = $this->_carro->getCarrocerias();
        $this->_view->renderingMain('index',true);
    }
    
    
    public function subirImagen(){
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            
            $dir =  ROOT."public".DS."foto".DS;
            
            if(!file_exists($dir)){
                mkdir ($dir,0755);
            } 

            $file = $_FILES['imagen']['name'];
            
            $ruta = $dir."1.jpg";

            if ($file && move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta)){
                sleep(3);
                echo BASE_URL."public/foto/1.jpg";
            }
        }else{
            echo "false";   
        }
        
    }
}

?>