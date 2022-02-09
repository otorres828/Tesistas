<?php

namespace App\Models;

use Exception;
use ModeloGenerico;
use PDO;

require_once '../Core/ModeloGenerico.php';
class Criterios extends ModeloGenerico
{

    public function __construct($propiedades = null)
    {
        parent::__construct("Criterios", CRi::class, $propiedades);
    }

    public function criteriosRevExp()
    {
        $sql = "SELECT * FROM criterios_rev_exp";
        $criteriosRevExp = $this->sentenciaObj($sql);
        return [
            'criteriosRevExp' => $criteriosRevExp
        ];
    }

    public function criteriosTutExp()
    {
        $sql = "SELECT * FROM criterios_tutor_exp";
        $criteriosTutExp = $this->sentenciaObj($sql);
        return [
            'criteriosTutExp' => $criteriosTutExp
        ];
    }
    public function criteriosJurExp()
    {

        $sql = "SELECT * FROM criterios_experimental_jurado";
        $criteriosJurExp = $this->sentenciaObj($sql);
        return [
            'criteriosJurExp' => $criteriosJurExp
        ];
    }
    public function criteriosRevIns()
    {
        $sql = "SELECT * FROM criterios_rev_ins";
        $criteriosRevIns = $this->sentenciaObj($sql);
        return [
            'criteriosRevIns' => $criteriosRevIns
        ];
    }

    public function criteriosTutIns()
    {
        $sql = "SELECT * FROM criterios_tutor_ins";
        $criteriosTutIns = $this->sentenciaObj($sql);
        return [
            'criteriosTutIns' => $criteriosTutIns
        ];
    }
    public function criteriosJurIns()
    {

        $sql = "SELECT * FROM criterios_instrumental_jurado";
        $criteriosJurIns = $this->sentenciaObj($sql);
        return [
            'criteriosJurIns' => $criteriosJurIns
        ];
    }
    public function modificarestatus($estatus, $id)
    {

        return $this->sentenciaObj("UPDATE criterios_rev_exp SET estatus=" . "'" . $estatus . "'" . " WHERE id_criterio=" . $id);
    }
}
