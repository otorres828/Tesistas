<?php

namespace App\Models;

use Exception;
use ModeloGenerico;
use PDO;

require '../Core/ModeloGenerico.php';
class Presenta extends ModeloGenerico{
  
    public function __construct($propiedades = null) {
        parent::__construct("Presenta", Auth::class, $propiedades);
    }


}