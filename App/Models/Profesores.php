<?php

namespace App\Models;

use Exception;
use ModeloGenerico;
use PDO;

require_once '../Core/ModeloGenerico.php';
class Profesores extends ModeloGenerico
{

    public function __construct($propiedades = null)
    {
        parent::__construct("Profesores", Profesores::class, $propiedades);
    }

    // Traer todos los profesores revisores
    public function revisores()
    {
        return $this->sentenciaAll("SELECT * FROM usuarios AS us INNER JOIN roles_usuarios as ru ON ru.id_rol=2 AND ru.id_usuario = us.id_usuario
        ");
    }
    // Traer todos los profesores tutores
    public function tutores()
    {
        return $this->sentenciaAll("SELECT * FROM usuarios AS us INNER JOIN roles_usuarios as ru ON ru.id_rol=3 AND ru.id_usuario = us.id_usuario
        ");
    }
    // Traer todos los profesores jurados
    public function jurados()
    {
        return $this->sentenciaAll("SELECT * FROM usuarios AS us INNER JOIN roles_usuarios as ru ON ru.id_rol=4 AND ru.id_usuario = us.id_usuario
        ");
    }
    //CREAR PROFESOR

    public function validarcedula($cedula){
        $resultado=$this->sentenciaObj("SELECT cedula FROM profesores WHERE cedula=$cedula");
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    public function validarcorreoparticular($correoparticular){
        $resultado=$this->sentenciaObj("SELECT correoparticular FROM profesores WHERE correoparticular='$correoparticular'");
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    public function validartelefono($telefono){
        $resultado=$this->sentenciaObj("SELECT telefono FROM profesores WHERE telefono='$telefono'");
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }


    public function insertarprofesor($cedula,$nombre,$direccion,$correoparticular,$telefono,$tipo){
        $query = "INSERT INTO  profesores (cedula,nombre,direccion,correoparticular,telefono,tipo) VALUES($cedula,'$nombre','$direccion','$correoparticular','$telefono','$tipo')";
		$this->insertarObj($query);
    }
}
