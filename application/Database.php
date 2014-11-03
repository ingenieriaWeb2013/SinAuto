<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class Database
{
    protected $_conexion;
    private static $instance=null;
    
    
    
    public static function getInstance(){//Singleton pattern
        if (self::$instance==null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    
    private function Database() {
          $this->_conexion= new mysqli (DB_HOST, DB_USER, DB_PASS); 
          
        if(!$this->_conexion->connect_errno)
        {
            $this->_conexion->select_db(DB_NAME);
            if($this->_conexion->connect_errno)
            {
                throw new Exception('Base de datos no encontrada');
            }
            else
            {
                return TRUE;
            }
        }
        else
        {
            throw new Exception('No se pudo conectar a la Base de datos');
        }
    }
    
    public function consulta($query)
    {
        $rs =  $this->_conexion->query($query);
        if(empty($rs))
        {
           return FALSE; 
        }
        else
        {
            return $rs;
        }
    }
    
    public function fetchAll($consulta)
    {
        return $consulta->fetch_all(MYSQLI_ASSOC); 
    }
    
    
    public function numRows($consulta)
    {
        return $consulta->num_rows;
    }


    public function closeConex()
    {
        return $this->_conexion->close();
    }
}