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
class Foto {
//put your code here
    private $id_foto;
    private $id_auto;
    private $ruta;
    
    public function Foto(){}
    
    public function getId_foto() {
        return $this->id_foto;
    }

    public function setId_foto($id_foto) {
        $this->id_foto = $id_foto;
    }

    public function getId_auto() {
        return $this->id_auto;
    }

    public function setId_auto($id_auto) {
        $this->id_auto = $id_auto;
    }

    public function getRuta() {
        return $this->ruta;
    }

    public function setRuta($ruta) {
        $this->ruta = $ruta;
    }

}
?>
