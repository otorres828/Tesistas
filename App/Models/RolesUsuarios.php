<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class RolesUsuarios extends ModeloGenerico
{
    public function __construct($propiedades = null)
    {
        parent::__construct("roles_usuarios", RolesUsuarios::class, $propiedades);
    }

    //INSERTAR CEDULA DE REVISOR EN ROLES_USUARIOS
    public function rol_revisor($cedula)
    {
        $this->insertarObj("INSERT INTO roles_usuarios values($cedula,1)");
    }

    //INSERTAR CEDULA DE TUTOR EN ROLES_USUARIOS
    public function rol_tutor($cedula)
    {
        $this->insertarObj("INSERT INTO roles_usuarios values($cedula,2)");
    }

    //INSERTAR CEDULA DE TUTOR EN ROLES_USUARIOS
    public function rol_jurado($cedula1,$cedula2)
    {
        $this->insertarObj("INSERT INTO roles_usuarios values($cedula1,3)");
        $this->insertarObj("INSERT INTO roles_usuarios values($cedula2,3)");
    }
}
