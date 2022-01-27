<?php

class Conexion {

    public $modelo;
    public $cedula;

    public function setModelo($modelo){
        $this->modelo=$modelo;
    }
    public function setCedula($cedula){
        $this->cedula=$cedula;
    }   
    public function getModelo(){
        return $this->modelo;
    }
    public function getCedula(){
        return $this->cedula;
    }   
}
