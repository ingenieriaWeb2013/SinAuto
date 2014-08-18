<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class
 *
 * @author Felipe
 */
class Carroceria {
    private $idCarro;
    private $carroceria;
    
    function Carroceria() {
        
    }
    
    public function getIdCarro() {
        return $this->idCarro;
    }

    public function setIdCarro($idCarro) {
        $this->idCarro = $idCarro;
    }

    public function getCarroceria() {
        return $this->carroceria;
    }

    public function setCarroceria($carroceria) {
        $this->carroceria = $carroceria;
    }


}
?>
