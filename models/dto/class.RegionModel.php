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
class Region {

     private $idReg;
     private $nombre;
     
     
     function Region() {
         
     }
     public function getIdReg() {
         return $this->idReg;
     }

     public function getNombre() {
         return $this->nombre;
     }

     public function setIdReg($idReg) {
         $this->idReg = $idReg;
     }

     public function setNombre($nombre) {
         $this->nombre = $nombre;
     }


     
     
} 
?>
