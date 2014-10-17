<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConsecionariaDAO
 *
 * @author Felipe
 */
class ConsecionariaDAO extends Model {
    private static $instance=null;

    private function ConsecionariaDAO(){    
    }
    
    public static function getInstance(){//Singleton pattern
        if ($instance==null) {
            $instance = new ConsecionariaDAO();
        }
        return $instance;
    }
    
    
    public function getConsecionariaPorId($id)
    {   
        $vdb= $this->_db->consulta('SELECT * FROM consecionaria WHERE id_con="'.$id.'"');
        
        if($this->_db->numRows($vdb)>0)
        {
            $con_array = $this->_db->fetchAll($vdb);
            $con_obj = new Consecionaria();
            foreach ($con_array as $con) {
                $con_obj.setIdCon($id);
                $con_obj.setEmail($con['email']);
                $con_obj.setWeb($con['web']);
                $con_obj.setFacebook($con['fb']);
                $con_obj.setTwitter($con['tw']);
                $con_obj.setDireccion($con['direccion']);
                $con_obj.setComuna(ComunaDAO::getInstance().getComunaPorId($con['id_com']));
                $con_obj.setFoto1($con['foto1']);
                $con_obj.setFoto2($con['foto2']);
                $con_obj.setFoto3($con['foto3']);
            }
            
            return $con_obj;
        }
        else
        {
            return null;
        }
    }
}

?>
