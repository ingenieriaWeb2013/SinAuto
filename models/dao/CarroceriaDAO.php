<?php

class CarroceriaDAO extends Model{
    private static $instance=null;

    public function CarroceriaDAO(){  
        parent::Model();
    }
    
    public static function getInstance(){//Singleton pattern
        if ($instance==null) {
            $instance = new CarroceriaDAO();
        }
        return $instance;
    }
    
    
  
    
    public function getCarrocerias(){
        $vdb= $this->_db->consulta('SELECT * FROM carroceria');
        if($this->_db->numRows($vdb)>0)
        {
            $carroceria_array = $this->_db->fetchAll($vdb);    
            $rtn = array();
            foreach ($carroceria_array as $mcdb) {
                $carroceria_obj = new Carroceria();
                $carroceria_obj->setIdCarroceria($mcdb['id_carro']);
                $carroceria_obj->setNombre($mcdb['carroceria']);            
                array_push($rtn, $carroceria_obj);
            }
            
            return $rtn;
        }
        else
        {
            return 0;
        }
        
    }
}

?>
