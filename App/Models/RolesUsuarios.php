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

}