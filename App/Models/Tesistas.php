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

    public function query(){
        $cedula = (new Auth())->autenticado();
        return $this->sentenciaObj('SELECT u.nombre_usuario,u.correo,u.codigo,t.correoucab,t.telefono,t.comentario 
                                    from usuarios as u, tesistas as t 
                                    where t.cedula=u.cedula 
                                    AND u.cedula='.$cedula['cedula']);
    }

    public function modificartelefono($telefono){
        session_start();
        $cedula = (new Auth())->autenticado();
        return $this->sentenciaObj("UPDATE tesistas SET telefono=".$telefono."WHERE cedula=".$cedula['cedula']);
    }

    public function modificarcodigo($codigo){
        session_start();
        $cedula = (new Auth())->autenticado();
         $sql = "UPDATE usuarios SET codigo="."'".$codigo."'"." WHERE cedula=".$cedula['cedula'];
        $query = $this->conexion->prepare($sql);
        $query->execute();
       
    }
}