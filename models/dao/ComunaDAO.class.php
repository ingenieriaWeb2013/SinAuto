<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComunaDAO
 *
 * @author CarlosTapia
 */
class ComunaDAO {
   
    private static $instance=null;

    private function ComunaDAO(){    
    }
    
    public static function getInstance(){//Singleton pattern
        if ($instance==null) {
            $instance = new ComunaDAO();
        }
        return $instance;
    }
    
    
    
    public function getComunaPorId($id){
        
        $vdb= $this->_db->consulta('SELECT * FROM comuna WHERE id_com ="'.$id.'"');
        
        if($this->_db->numRows($vdb)>0)
        {
            $com_array = $this->_db->fetchAll($vdb);
            $com_obj = new Comuna();
            foreach ($com_array as $comdb) {
                $com_obj.setId_Comuna($comdb['id_com']);
                $com_obj.setNombre($comdb['nombre']);
                $com_obj.setRegion(RegionDAO::getInstance().getRegionPorId($comdb['id_reg']));          
            }
            
            return $com_obj;
        }
        else
        {
            return null;
        }
        
    }
}
