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
class Marca {
//put your code here
    private $idMarca;
    private $nombre;
    
    public function Marca(){}
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
  
    public function getIdMarca() {
        return $this->idMarca;
    }

    public function setIdMarca($idMarca) {
        $this->idMarca = $idMarca;
    }
}
?>
