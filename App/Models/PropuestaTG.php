<?php

namespace App\Models;

use Exception;
use ModeloGenerico;
use PDO;

require '../Core/ModeloGenerico.php';
class PropuestaTG extends ModeloGenerico{
  
    public function __construct($propiedades = null) {
        parent::__construct("PropuestaTG", PropuestaTG::class, $propiedades);
    }

    public function comprobarnombre($nombre){
        $resultado=$this->where('nombre','=',$nombre)->getOb();
        if($resultado>0){
            return 1;
        }
        return 0;
    }

    public function insertar($nombre,$tipo,$descripcion){
        
    }

    public function mispropuestas(){
        return $this->where('cedula','=','cedulaautenticado')->get();
    }

    public function comosemepegue(){
    }
}