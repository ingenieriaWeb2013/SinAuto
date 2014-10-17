<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarroceriaDAO
 *
 * @author Felipe
 */
class CarroceriaDAO {
    private static $instance=null;

    private function CarroceriaDAO(){    
    }
    
    public static function getInstance(){//Singleton pattern
        if ($instance==null) {
            $instance = new CarroceriaDAO();
        }
        return $instance;
    }
    
    
    public function getCarroceriaPorId($id)
    {   
        $vdb= $this->_db->consulta('SELECT * FROM carroceria WHERE id_carro="'.$id.'"');
        
        if($this->_db->numRows($vdb)>0)
        {
            $carro_array = $this->_db->fetchAll($vdb);
            $carro_obj = new Carroceria();
            foreach ($carro_array as $carro) {
                $carro_obj.setIdCarro($carro['id_carro']);
                $carro_obj.setCarroceria($carro['carroceria']);
            }
            return $carro_obj;
        }
        else
        {
            return null;
        }
    }
}

?>
