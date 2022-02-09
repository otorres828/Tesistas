<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class Consejos extends ModeloGenerico
{
    public $sql;

    public function __construct($propiedades = null)
    {
        parent::__construct("consejoescuela", Consejos::class, $propiedades);
    }
}
