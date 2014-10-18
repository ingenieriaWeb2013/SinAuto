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
class UsuarioDAO extends Model{
    
    private static $instance=null;

    private function UsuarioDAO(){    
    }
    
    public static function getInstance(){//Singleton pattern
        if (UsuarioDAO::$instance==null) {
            UsuarioDAO::$instance = new UsuarioDAO();
        }
        return UsuarioDAO::$instance;
    }
    
    
    
    public function getUsuarioPorId($id){
        
        $vdb= $this->_db->consulta('SELECT * FROM usuario WHERE id ="'.$id.'"');
        
        if($this->_db->numRows($vdb)>0)
        {
            $user_array = $this->_db->fetchAll($vdb);
            $user_obj = new Usuario();
            foreach ($user_array as $usdb) {
                $user_obj.setId_usuario($usdb['id_user']);
                $user_obj.setNombre($usdb['nombre']);
                $user_obj.setEmail($usdb['email']);
                $user_obj.setFacebook($usdb['fb']);
                $user_obj.setTwitter($usdb['tw']);
                $user_obj.setRut($usdb['rut']);
                $user_obj.setPass($usdb['pass']);
                $user_obj.setComuna(ComunaDAO::getInstance().getComunaPorId($usdb['id_com']));             
                
            }
            
            return $user_obj;
        }
        else
        {
            return 0;
        }
        
    }
}
