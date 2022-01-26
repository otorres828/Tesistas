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
        $sql = "SELECT PropuestaTG.Num_C,PropuestaTG.Titulo,observaciones,modalidad,Nro_Comite,Nro_Consejo,Cedula_Revisor,Cedula_Tutor 
                from PropuestaTG
                RIGH JOIN Presenta 
                ON PropuestaTG.cedula=Presenta.cedula where Presenta.cedula=".$this->cedula();
    }


    public static function cedula(){
        $cedula = $_SESSION['cedula'];
        return $cedula;
    }
}