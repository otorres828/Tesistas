<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class Comites extends ModeloGenerico
{
    public $sql;

    public function __construct($propiedades = null)
    {
        parent::__construct("comites", Comites::class, $propiedades);
    }

    // Id de los comites que no esten en evaluacion comite 
    public function comitesNoEvaluados()
    {
        $sql = "SELECT * FROM comites WHERE id_comite NOT IN (SELECT id_comite FROM evaluacioncomite)";
        return $this->sentenciaAll($sql);
    }
}
