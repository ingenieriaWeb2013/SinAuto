<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarroceriaDTO
 *
 * @author CarlosTapia
 */
class Carroceria {
    //put your code here
    private $idCarroceria;
    private $nombre;
    
    function Carroceria() {}

    
    function getIdCarroceria() {
        return $this->idCarroceria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdCarroceria($idCarroceria) {
        $this->idCarroceria = $idCarroceria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


    
}
