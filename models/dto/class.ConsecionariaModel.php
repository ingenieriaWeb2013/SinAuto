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
class Consecionaria {
//put your code here
    private $id_con;
    private $email;
    private $web;
    private $facebook;
    private $twitter;
    private $direccion;
    private $comuna;
    private $foto1;
    private $foto2;
    private $foto3;
    
    public function getId_con() {
        return $this->id_con;
    }

    public function setId_con($id_con) {
        $this->id_con = $id_con;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getWeb() {
        return $this->web;
    }

    public function setWeb($web) {
        $this->web = $web;
    }

    public function getFacebook() {
        return $this->facebook;
    }

    public function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    public function getTwitter() {
        return $this->twitter;
    }

    public function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function setComuna($comuna) {
        $this->comuna = $comuna;
    }

    public function getFoto1() {
        return $this->foto1;
    }

    public function setFoto1($foto1) {
        $this->foto1 = $foto1;
    }

    public function getFoto2() {
        return $this->foto2;
    }

    public function setFoto2($foto2) {
        $this->foto2 = $foto2;
    }

    public function getFoto3() {
        return $this->foto3;
    }

    public function setFoto3($foto3) {
        $this->foto3 = $foto3;
    }


}
?>
