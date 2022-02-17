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
    public function validadExistenciaPTG_Ins($num_c,$cedula)
    {
        $cantidad = $this->sentenciaObj("SELECT COUNT (ptg.num_c) AS cantidad 
                                        FROM es_jurado_instrumental as eji,es_evaluado_por_jurado AS eej,propuestatg AS ptg
                                        WHERE ptg.num_c=$num_c
                                        AND ptg.num_c=eji.num_c
                                        AND eej.cedula=$cedula
                                        AND eji.cedula=eej.cedula_jurado");
        $cantidad = $cantidad['cantidad'];
        return $cantidad;
    }

    public function validadExistenciaPTG_Exp($num_c)
    {
        $cantidad = $this->sentenciaObj("SELECT COUNT (ptg.num_c) AS cantidad 
                                        FROM es_jurado_experimental as eje,es_evaluado_por_jurado AS eej,propuestatg AS ptg
                                        WHERE ptg.num_c=$num_c
                                        AND ptg.num_c=eje.num_c
                                        AND eje.cedula=eej.cedula_jurado");
        $cantidad = $cantidad['cantidad'];
        return $cantidad;
    }
}
