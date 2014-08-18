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
class Comuna {
//put your code here
    private $idComuna;
    private $region;
    private $nombre;
    
    public function getIdComuna() {
        return $this->id_comuna;
    }

    public function setIdComuna($idComuna) {
        $this->idComuna = $idComuna;
    }

    public function getRegion() {
        return $this->region;
    }

    public function setRegion($region) {
        $this->region = $region;
    }

    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }



}
?>
