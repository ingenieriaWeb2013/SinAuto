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
class Modelo {
    private $idModelo;
    private $marca;
    private $modelo;
    
    function Modelo(){}

    
    public function getIdModelo() {
        return $this->idModelo;
    }

    public function setIdModelo($idModelo) {
        $this->idModelo = $idModelo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }


    
}
?>
