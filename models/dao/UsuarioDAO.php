<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class UsuarioDAO extends Model
{
    
    private static $instance=null;

    public function UsuarioDAO(){ 
        parent::Model();
    }
    
    public static function getInstance(){//Singleton pattern
        if (UsuarioDAO::$instance==null) {
            UsuarioDAO::$instance = new UsuarioDAO();
        }
        return UsuarioDAO::$instance;
    }
    
    
    
    public function getUsuarioPorId($id){
        
        $vdb= $this->_db->consulta('SELECT * FROM usuarios WHERE id ="'.$id.'"');
        
        if($this->_db->numRows($vdb)>0)
        {
            $user_array = $this->_db->fetchAll($vdb);
            $user_obj = new Usuario();
            foreach ($user_array as $usdb) {
                $user_obj.setIdUsuario($usdb['id_user']);
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
    
    
    public function getUsuarioLogin($email){
        
        $sql = 'SELECT * FROM usuarios WHERE email = "' . $email . '" ';
        
        $vdb= $this->_db->consulta($sql);
        
        if($this->_db->numRows($vdb)>0)
        {
            $user_array = $this->_db->fetchAll($vdb);
            $user_obj = new Usuario();
            foreach ($user_array as $usdb) {
                $user_obj->setId_usuario($usdb['id_user']);
                $user_obj->setNombre($usdb['nombre']);
                $user_obj->setEmail($usdb['email']);
                $user_obj->setFacebook($usdb['fb']);
                $user_obj->setTwitter($usdb['tw']);
                $user_obj->setRut($usdb['rut']);
                $user_obj->setPass($usdb['pass']);
                //$user_obj->setComuna(ComunaDAO::getInstance()->getComunaPorId($usdb['id_com']));             
                $user_obj->setEstado($usdb['estado']);
            }
            
            return $user_obj;
        }
        else
        {
            return 0;
        }
        
    }
    
    
    public function verificarEmail($email) {
        $sql = 'SELECT * FROM usuarios WHERE email = "' . $email . '" ';
        //echo $sql;
        $datos = $this->_db->consulta($sql);
        if ($this->_db->numRows($datos) > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function registrarUsuario($nombre, $email, $pass) {
        $sql = 'INSERT INTO usuarios (nombre, email, pass, estado) VALUES '
            . '("' . $nombre . '", "' . $email . '", "' . $pass . '", 1) ';
        
        $datos = $this->_db->consulta($sql);
        
        return $datos;
    }

}
