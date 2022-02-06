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
}
