<?php

namespace App\Models;

use Exception;
use ModeloGenerico;
use PDO;

require_once '../Core/ModeloGenerico.php';
class Tesistas extends ModeloGenerico{
  
    public function __construct($propiedades = null) {
        parent::__construct("tesistas", Tesistas::class, $propiedades);
    }

    public function perfil(){
        $cedula = (new Auth())->autenticado();
        return $this->sentenciaObj('SELECT u.nombre_usuario,u.correo,u.codigo,t.correoucab,t.telefono,t.comentario 
                                    FROM usuarios AS u, tesistas AS t 
                                    WHERE t.cedula=u.cedula 
                                    AND u.cedula='.$cedula['cedula']);
    }

    public function modificarCorreo($correo){
        session_start();
        $cedula = (new Auth())->autenticado();
        $this->sentenciaObj("UPDATE tesistas SET correoparticular="."'".$correo."'"." WHERE cedula=".$cedula['cedula']);
        $this->sentenciaObj("UPDATE usuarios SET correo="."'".$correo."'"." WHERE cedula=".$cedula['cedula']);
    }

    public function modificartelefono($telefono){
        session_start();
        $cedula = (new Auth())->autenticado();
        return $this->sentenciaObj("UPDATE tesistas SET telefono=".$telefono."WHERE cedula=".$cedula['cedula']);
    }

    public function modificarcodigo($codigo){
        session_start();
        $cedula = (new Auth())->autenticado();
        return $this->sentenciaObj("UPDATE usuarios SET codigo="."'".$codigo."'"." WHERE cedula=".$cedula['cedula']);
    }

    public function comprobar_nombre_propuesta($nombre_propuesta){
        return $this->sentenciaObj("SELECT titulo FROM propuestatg WHERE titulo="."'".$nombre_propuesta."'");

    }

    public function comprobar_codigo($cedula,$codigo){
        return $this->sentenciaObj("SELECT cedula,codigo FROM usuarios WHERE cedula="."'".$cedula."'" . "AND codigo="."'".$codigo."'");
    }

    public function guardar_propuesta($nombrepropuesta,$modalidad,$cedula){

    }
    public function guardarpropuesta($nombrepropuesta,$modalidad){

    }
}