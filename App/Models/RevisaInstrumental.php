<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class RevisaInstrumental extends ModeloGenerico
{
    public function __construct($propiedades = null)
    {
        parent::__construct("revisa_instrumental", RevisaInstrumental::class, $propiedades);
    }
    
    public function validadExistencia($num_c){
        $cantidad = $this->sentenciaObj("SELECT COUNT (num_c) AS cantidad
                                        FROM revisa_instrumental
                                        WHERE num_c=$num_c");
        $cantidad=$cantidad['cantidad'];
        return $cantidad;
    }




}