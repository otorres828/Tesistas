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
        $contraseña = password_hash($cedula, PASSWORD_BCRYPT);
        $sql = "INSERT INTO  usuarios (cedula,nombre_usuario,correo,contraseña,modelo,codigo) VALUES($cedula,'$nombre','$correoparticular','$contraseña','Profesores','$contraseña')";
        $this->insertarObj($query);
        $this->insertarObj($sql);
    }

    public function validarEliminarRevisor($cedula){
        $query = "SELECT COUNT (cedula_revisor) AS CEDULA 
                    FROM propuestatg 
                    WHERE cedula_revisor=$cedula
                    GROUP BY(cedula_revisor)";
        $resultado= $this->sentenciaObj($query);
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    public function validarEliminarTutorA($cedula){
        $query = "SELECT COUNT (cedula_tutor) AS CEDULA 
                    FROM propuestatg 
                    WHERE cedula_tutor=$cedula
                    GROUP BY(cedula_tutor)";
        $resultado= $this->sentenciaObj($query);
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    public function validarEliminarJuradoE($cedula){
        $query = "SELECT COUNT (cedula) AS CEDULA 
                    FROM es_jurado_experimental 
                    WHERE cedula=$cedula
                    GROUP BY(cedula)";
        $resultado= $this->sentenciaObj($query);
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    public function validarEliminarJuradoI($cedula){
        $query = "SELECT COUNT (cedula) AS CEDULA 
                    FROM es_jurado_instrumental
                    WHERE cedula=$cedula
                    GROUP BY(cedula)";
        $resultado= $this->sentenciaObj($query);
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }


    public function eliminarProfesor($cedula){
        $this->sentenciaObj("DELETE FROM profesores WHERE cedula=$cedula");
        $this->sentenciaObj("DELETE FROM usuarios WHERE cedula=$cedula");
    }
}
