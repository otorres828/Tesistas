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
        parent::__construct("Profesores", Auth::class, $propiedades);
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
}
