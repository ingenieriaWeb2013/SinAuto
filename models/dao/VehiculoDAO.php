<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class VehiculoDAO extends Model{
    
    private static $instance=null;

    public  function VehiculoDAO(){  
        parent::Model();
    }
    
    public static function getInstance(){//Singleton pattern
        if ($instance==null) {
            $instance = new VehiculoDAO();
        }
        return $instance;
    }
    
    
    public function getUltimosPublicados($cantidad)
    {   
        $vdb= $this->_db->consulta('SELECT * FROM vehiculo ORDER BY fecha_publica DESC LIMIT 0,'.$cantidad.' ');
        
        if($this->_db->numRows($vdb)>0)
        {
            $vehiculos_array = $this->_db->fetchAll($vdb);
            foreach ($vehiculos_array as $vehi) {
                $vehi_obj = new Vehiculo();
                $vehi_obj.setIdVehiculo($vehi['id_auto']);
                $vehi_obj.setUsuario(UsuarioDAO::getInstance().getUsuarioPorId($vehi['id_user']));
                $vehi_obj.setConsecionaria(ConsecionariaDAO::getInstance().getConsecionariaPorId($vehi['id_con']));
                $vehi_obj.setFechaPublica($vehi['fecha_publica']);
                $vehi_obj.setPatente($vehi['patente']);
                //$vehi_obj.setTipo();
                $vehi_obj.setCarroceria(CarroceriaDAO::getInstance().getCarroceriaPorId($vehi['id_carro']));
                
            }
        }
        else
        {
            return 0;
        }
    }
    
    public function getUltimoVehiculoPublicadoPorUsuario(){
        
        $vdb= $this->_db->consulta('SELECT * FROM vehiculo WHERE id_user="1" ');
        
        if($this->_db->numRows($vdb)>0)
        {
            $vehiculos_array = $this->_db->fetchAll($vdb);
            $vehi_obj = new Vehiculo();
            foreach ($vehiculos_array as $vehi) {
                
                $vehi_obj->setIdVehiculo($vehi['id_auto']);           
            }
            return $vehi_obj;
        }
        else
        {
            return 0;
        }
    }
    
        public function getNuevoVehiculoUsuario(){
        
        
            $this->_db->consulta('INSERT INTO vehiculo(id_user,estado) values("1","0")');

            $vdb = $this->_db->consulta('SELECT id_vehi FROM vehiculo WHERE id_user ="1" AND estado="0" ');

            if($this->_db->numRows($vdb)>0)
            {
                $vehiculos_array = $this->_db->fetchAll($vdb);
                $vehi_obj = new Vehiculo();
                foreach ($vehiculos_array as $vehi) {
                    $vehi_obj = new Vehiculo();
                    $vehi_obj->setIdVehiculo($vehi['id_auto']);
                }
                return $vehi_obj;
            }
            else
            {
               return 0;
            }
            
        }
    }



?>
