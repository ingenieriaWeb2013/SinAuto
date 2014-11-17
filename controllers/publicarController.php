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
        $this->_carro   = $this->loadModel('Carroceria');
        $this->_vehi    = $this->loadModel('Vehiculo');
        $this->_usuario = $this->loadModel('Usuario');
       
        $this->_view->objMarcas         = $this->_marca->getMarcas();
        $this->_view->objTipos          = $this->_tipo->getTipos();
        $this->_view->objCarrocerias    = $this->_carro->getCarrocerias();
        $this->_view->objInfoVehiculo   = $this->_vehi->getUltimoVehiculoPublicadoPorUsuario();
        
        if($this->_view->objInfoVehiculo == 0 ){// tiene una publicacion a medias
            $this->_view->objInfoVehiculo = $this->_vehi->getNuevoVehiculoUsuario();
            echo var_dump($this->_view->objInfoVehiculo);
        }
        
        $this->_view->renderingMain('index',true);
     
    }
    
    
    public function subirImagen(){
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            
            $dir =  ROOT."public".DS."foto".DS;
            
            if($_FILES['imagen']['type']!='image/jpeg'){
                echo json_encode(array(
                    'estado' => 'error',
                    'error'  => 'el archivo subido no corresponde a una imagen'
                ));
                exit();
            }
            
            
            if(!file_exists($dir)){
                mkdir ($dir,0755);
            } 

            $file = $_FILES['imagen']['name'];
            
            $nombre = uniqid();

            $ruta = $dir.$nombre .".jpg";

            if ($file && move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta)){
                sleep(0);
                echo json_encode(array(
                'estado' => 'exito',
                'url' => BASE_URL."public/foto/".$nombre .".jpg"   
                ));
                exit();
            }
        }else{
            echo json_encode(array(
                'estado' => 'error',
                'error'  => 'descripcion'
            ));
            exit();
            
        }
        
    }
    
    
    
    public function publicar(){
        
    }
}

?>