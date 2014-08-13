<?php
 
class VehiculoDAO extends Model
{
    private static $_instance = null;


    private function __construct() {
        parent::__construct();
    }
    
    public static function getInstance(){// patron singleton
        if ($_instance == null) {
            $_instance = new VehiculoDAO();
        }
        return $_instance;
    }
    
    
    public function getVehiculoPorId($id)
    {   
        $autos= $this->_db->consulta('SELECT * FROM vehiculo WHERE id_auto = "'.$id.'"');
        
        if($this->_db->numRows($autos)>0)
        {
            $auto =  $this->_db->fetchAll($autos);
            foreach ($vehiculo as $auto) {
                $vehiculo = new Vehiculo();
                $vehiculo.setIdVehiculo($id);
                $vehiculo.setUsuario();
                //shuuuuuuuuuuuuuu
            }
            
            
        }
        else
        {
            return 0;
        }
    }
    
   
}
?>

?>
