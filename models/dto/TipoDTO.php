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
class Tipo {
//put your code here
    private $idTipo;
    private $nombre;
    
    function Tipo() {
        
    }

    function getIdTipo() {
        return $this->idTipo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

 
 
}
?>
