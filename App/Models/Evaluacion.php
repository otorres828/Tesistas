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
    // ===============================================================COMITE

    public function insertarEvaluacionComite($num_c, $id_comite, $estatus)
    {
        $estaDuplicado = "SELECT COUNT(num_c)   FROM evaluacioncomite WHERE num_c=$num_c AND id_comite=$id_comite";
        $a = $this->sentenciaObj($estaDuplicado);
        $b = $a['count'];

        if ($b == 0) {
            $sql = "INSERT INTO evaluacioncomite(num_c,id_comite,estatus) VALUES($num_c,$id_comite,'$estatus')";
            $this->sentenciaObj($sql);
        } else {
            // echo "ya existe";
        }
    }

    public function actualizar_IdComite_CedulaRevisor($num_c, $id_comite, $cedularevisor)
    {
        $sql = "UPDATE propuestatg SET id_comite=$id_comite,cedula_revisor='$cedularevisor' WHERE num_c=$num_c";
        $this->sentenciaObj($sql);
    }
    public function actualizar_IdComite($num_c, $id_comite)
    {
        $sql = "UPDATE propuestatg SET id_comite=$id_comite WHERE num_c=$num_c";
        $this->sentenciaObj($sql);
    }
    //===============================================================CONSEJO
    public function insertarEvaluacionConsejo($num_c, $nro_consejo, $estatus)
    {
        // $estaDuplicado = "SELECT * FROM evaluacionconsejo WHERE num_c=$num_c AND nro_consejo=$nro_consejo";
        $estaDuplicado = "SELECT COUNT(num_c)        FROM evaluacionconsejo        WHERE num_c=$num_c AND nro_consejo=$nro_consejo";
        $a = $this->sentenciaObj($estaDuplicado);
        $b = $a['count'];

        if ($b == 0) {
            $sql = "INSERT INTO evaluacionconsejo(num_c,nro_consejo,estatus) VALUES($num_c,$nro_consejo,'$estatus')";
            echo $sql;
            $this->sentenciaObj($sql);
        } else {
            // echo "ya existe";
        }
    }
    // Actualiza en propuestatg el nro del consejo
    public function actualizar_NroConsejo($num_c, $nro_consejo)
    {
        $sql = "UPDATE propuestatg SET nro_consejo=$nro_consejo WHERE num_c=$num_c";
        $this->sentenciaObj($sql);
    }
    // Actualiza en propuestatg, el nro consejo y la cedula tutor
    public function actualizar_NroConsejo_CedulaTutor($num_c, $nro_consejo, $cedula_tutor)
    {
        $sql = "UPDATE propuestatg SET nro_consejo=$nro_consejo,cedula_tutor=$cedula_tutor WHERE num_c=$num_c";
        $this->sentenciaObj($sql);
    }
}
