<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegionDAO
 *
 * @author CarlosTapia
 */
class RegionDAO {
    private static $instance=null;

    private function RegionDAO(){    
    }
    
    public static function getInstance(){//Singleton pattern
        if ($instance==null) {
            $instance = new RegionDAO();
        }
        return $instance;
    }
    
    
    
    public function getRegionPorId($id){
        
        $vdb= $this->_db->consulta('SELECT * FROM region WHERE id_reg ="'.$id.'"');
        
        if($this->_db->numRows($vdb)>0)
        {
            $reg_array = $this->_db->fetchAll($vdb);
            $reg_obj = new Region();
            foreach ($reg_array as $regdb) {
                $reg_obj.setIdReg($regdb['id_reg']);
                $reg_obj.setNombre($regdb['nombre']);                
            }
            
            return $reg_obj;
        }
        else
        {
            return 0;
        }
        
    }
}
