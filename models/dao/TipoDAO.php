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
class TipoDAO extends Model{
    
    private static $instance=null;

    public function TipoDAO(){ 
        parent::Model();
    }
    
    public static function getInstance(){//Singleton pattern
        if (self::$instance==null) {
            self::$instance = new TipoDAO();
        }
        return self::$instance;
    }
    
    
    
    public function getTipos(){
        $vdb= $this->_db->consulta('SELECT * FROM tipo');
        if($this->_db->numRows($vdb)>0)
        {
            $tipo_array = $this->_db->fetchAll($vdb);    
            $rtn = array();
            foreach ($tipo_array as $mcdb) {
                $tipo_obj = new Tipo();
                $tipo_obj->setIdTipo($mcdb['id_tipo']);
                $tipo_obj->setNombre($mcdb['nombre']);            
                array_push($rtn, $tipo_obj);
            }
            
            return $rtn;
        }
        else
        {
            return 0;
        }
        
    }
}
