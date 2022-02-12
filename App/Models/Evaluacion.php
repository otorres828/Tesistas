<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class Evaluacion extends ModeloGenerico
{
    public $sql;

    public function __construct($propiedades = null)
    {
        parent::__construct("Evaluacion", Evaluacion::class, $propiedades);
    }
    public function insertarEvaluacionComite($num_c, $id_comite, $estatus)
    {
        $sql = "INSERT INTO evaluacioncomite(num_c,id_comite,estatus) VALUES($num_c,$id_comite,'$estatus')";
        $this->sentenciaObj($sql);
    }
}
