<?php

/* 
 * Proyecto : SinAuto
 * Autor    : IngenieriaWeb Ltda.
 * Fecha    : Jueves, 07 de agosto de 2014
 */

class Model
{
    protected $_db;
    public function Model() {
        $this->_db= Database::getInstance();
    }
}