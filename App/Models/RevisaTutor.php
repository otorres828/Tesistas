<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class RevisaTutor extends ModeloGenerico
{
    public function __construct($propiedades = null)
    {
        parent::__construct("revisa_instrumental", RevisaTutor::class, $propiedades);
    }
    //VALIDAR EXISTENCIA PARA EL REVISOR
    public function validadExistenciaInstrumental($num_c)
    {
        $cantidad = $this->sentenciaObj("SELECT COUNT (num_c) AS cantidad
                                        FROM revisa_instrumental
                                        WHERE num_c=$num_c");
        $cantidad = $cantidad['cantidad'];
        return $cantidad;
    }

    public function validadExistenciaExperimental($num_c)
    {
        $cantidad = $this->sentenciaObj("SELECT COUNT (num_c) AS cantidad
                                        FROM revisa_experimental
                                        WHERE num_c=$num_c");
        $cantidad = $cantidad['cantidad'];
        return $cantidad;
    }

    //VALIDAR EXISTENCIA DE PTG PARA EL TUTOR
    public function validadExistenciaPTG_Ins($num_c)
    {
        $cantidad = $this->sentenciaObj("SELECT COUNT (num_c) AS cantidad
                                        FROM evalua_instrumental
                                        WHERE num_c=$num_c");
        $cantidad = $cantidad['cantidad'];
        return $cantidad;
    }

    public function validadExistenciaPTG_Exp($num_c)
    {
        $cantidad = $this->sentenciaObj("SELECT COUNT (num_c) AS cantidad
                                        FROM evalua_experimental
                                        WHERE num_c=$num_c");
        $cantidad = $cantidad['cantidad'];
        return $cantidad;
    }
}
