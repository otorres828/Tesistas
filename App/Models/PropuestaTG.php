<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class PropuestaTG extends ModeloGenerico{
    public $sql;
    
    public function __construct($propiedades = null) {
        parent::__construct("propuestatg", PropuestaTG::class, $propiedades);
    }

    public function mispropuestas($cedula){
        $this->sql = "SELECT num_c,titulo,modalidad,observaciones FROM propuestatg WHERE Num_C = ANY(SELECT Num_C FROM Presentan WHERE Cedula =$cedula)";             
        return $this->sentenciaAll($this->sql);
    }

}