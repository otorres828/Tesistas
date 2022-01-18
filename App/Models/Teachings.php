<?php

namespace App\Models;

use ModeloGenerico;

require '../Core/ModeloGenerico.php';
class Teachings extends ModeloGenerico{
  
    public function __construct($propiedades = null) {
        parent::__construct("teachings", Teachings::class, $propiedades);
    }

}