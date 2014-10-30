<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author CarlosTapia
 */
class MarcaDAO extends Model{
    
    /*private static $instance=null;

    private function MarcaDAO(){ 
        parent::Model();
    }
    
    public static function getInstance(){//Singleton pattern
        if (self::$instance==null) {
            self::$instance = new MarcaDAO();
        }
        return self::$instance;
    }
    */
    
    
    public function getMarcas(){
        $vdb= $this->_db->consulta('SELECT * FROM marca');
        if($this->_db->numRows($vdb)>0)
        {
            $marca_array = $this->_db->fetchAll($vdb);    
            $rtn = array();
            foreach ($marca_array as $mcdb) {
                $marca_obj = new Marca();
                $marca_obj->setIdMarca($mcdb['id_marca']);
                $marca_obj->setNombre($mcdb['nombre']);            
                array_push($rtn, $marca_obj);
            }
            
            return $rtn;
        }
        else
        {
            return false;
        }
        
    }
}
