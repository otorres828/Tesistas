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
        $num_c = (int) $num_c;
        $id_comite = (int) $id_comite;
        // echo "====Datos recibidos del formulario====<br>";
        // echo "Estatus:" . $estatus . "<br>";
        // echo "Numero de propuesta:" . $num_c . "<br>";
        // echo "Id de comite:" . $id_comite . "<br>";
        // echo "======================================<br>";
        $sql = "INSERT INTO evaluacioncomite(num_c,id_comite,estatus) VALUES($num_c,$id_comite,'$estatus')";
        $this->sentenciaObj($sql);
    }
    public function evaluarComite($num_c, $id_comite, $cedularevisor)
    {
        $sql = "UPDATE propuestatg SET id_comite=$id_comite,cedula_revisor='$cedularevisor' WHERE num_c=$num_c";
        $this->sentenciaObj($sql);
    }
    // FIXME: ===============================================================CONSEJO

    public function evaluarConsejo($num_c, $cedulatutor, $estatus)
    {

        $sql = "UPDATE propuestatg SET cedula_tutor='$cedulatutor' WHERE num_c=$num_c";
        $this->sentenciaObj($sql);
    }
}
