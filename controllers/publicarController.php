<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class publicarController extends Controller
{
    //private $_marca;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->_marca   = $this->loadModel('Marca');
        $this->_tipo    = $this->loadModel('Tipo');
        $this->_carro    = $this->loadModel('Carroceria');
       
        $this->_view->objMarcas         = $this->_marca->getMarcas();
        $this->_view->objTipos          = $this->_tipo->getTipos();
        $this->_view->objCarrocerias    = $this->_carro->getCarrocerias();
        $this->_view->renderingMain('index', true);
    }
    
    
    public function subirImagen(){
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            
            $dir =  ROOT . "public" . DS . "foto" . DS;
            
            if(!file_exists($dir)){
                mkdir ($dir,0755);
            } 

            $file = $_FILES['imagen']['name'];
            
            $nombre = uniqid();

            $ruta = $dir . $nombre . ".jpg";

            if ($file && move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta)){
                sleep(0);
                echo BASE_URL . "public/foto/" . $nombre . ".jpg";
            }
        }else{
            echo "false";   
        }
        
    }
}

?>