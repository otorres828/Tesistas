<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class RevisaJurado extends ModeloGenerico
{
    public function __construct($propiedades = null)
    {
        parent::__construct("revisa_instrumental", RevisaJurado::class, $propiedades);
    }

    //VALIDAR EXISTENCIA DE PTG PARA EL TUTOR
    public function validadExistenciaPTG_Ins($num_c)
    {
        $cantidad = $this->sentenciaObj("SELECT COUNT (num_c) AS cantidad
                                        FROM es_evaluado_por_jurado
                                        WHERE num_c=$num_c");
        $cantidad = $cantidad['cantidad'];
        return $cantidad;
    }

    public function validadExistenciaPTG_Exp($num_c)
    {
        $cantidad = $this->sentenciaObj("SELECT COUNT (num_c) AS cantidad
                                        FROM es_evaluado_por_jurado
                                        WHERE num_c=$num_c");
        $cantidad = $cantidad['cantidad'];
        return $cantidad;
    }
}
