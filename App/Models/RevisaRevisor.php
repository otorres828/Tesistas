<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class RevisaRevisor extends ModeloGenerico
{
    public function __construct($propiedades = null)
    {
        parent::__construct("revisa_instrumental", RevisaRevisor::class, $propiedades);
    }

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
}
