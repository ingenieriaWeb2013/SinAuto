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
    private $id_comuna;
    private $region;
    private $nombre;
    
    public function getId_comuna() {
        return $this->id_comuna;
    }

    public function setId_comuna($id_comuna) {
        $this->id_comuna = $id_comuna;
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
