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
    //===============================================================CONSEJO
    public function insertarEvaluacionConsejo($num_c, $nro_consejo, $estatus)
    {
        $num_c = (int) $num_c;
        $nro_consejo = (int) $nro_consejo;
        // echo "====Datos recibidos del formulario====<br>";
        // echo "Estatus:" . $estatus . "<br>";
        // echo "Numero de propuesta:" . $num_c . "<br>";
        // echo "Numero de consejo:" . $nro_consejo . "<br>";
        $a = $this->sentenciaObj("SELECT EXISTS (SELECT * FROM evaluacionconsejo WHERE num_c=$num_c)");
        $propuestaEstaEvaluadaPorElConsejo = $a['exists'];
        if ($propuestaEstaEvaluadaPorElConsejo) { //si ya esta en evaluacionconsejo
            // Ya existe ese registro osea no lo inserto en la tabla
        } else {
            $sql = "INSERT INTO evaluacionconsejo(nro_consejo,num_c,estatus) VALUES($nro_consejo,$num_c,'$estatus')";
            $this->sentenciaObj($sql);
        }
    }
    public function insertarJuradoPTG($num_c, $cedula_jurado1, $cedula_jurado2, $modalidad)
    {
        $num_c = (int) $num_c;
        $cedula_jurado1 = (int) $cedula_jurado1;
        $cedula_jurado2 = (int) $cedula_jurado2;

        switch ($modalidad) {
            case 'I':
                $tabla = "es_jurado_instrumental";
                $tabla2 = "instrumentales";

                // Ingreso en instrumentales
                $a = $this->sentenciaObj("SELECT EXISTS (SELECT * FROM $tabla2 WHERE num_c=$num_c)");
                $ingresadaEnInstrumentales = $a['exists'];
                if ($ingresadaEnInstrumentales) { //ya esta en instrumentales

                } else {
                    $sql = "INSERT INTO $tabla2(num_c,cedula_profesor) VALUES($num_c,$cedula_jurado1)";
                    $this->sentenciaObj($sql);
                    $sql = "INSERT INTO $tabla2(num_c,cedula_profesor) VALUES($num_c,$cedula_jurado2)";
                    $this->sentenciaObj($sql);
                    echo "INSERT DE INSTRUMENTALES<br><br><br>";
                }

                break;
            case 'E':
                $tabla = "es_jurado_experimental";
                $tabla2 = "experimentales";
                // Ingreso en experimentales
                $a = $this->sentenciaObj("SELECT EXISTS (SELECT * FROM $tabla2 WHERE num_c=$num_c)");
                $ingresadaEnInstrumentales = $a['exists'];

                if ($ingresadaEnInstrumentales) { //ya esta en instrumentales

                } else {
                    $sql = "INSERT INTO $tabla2(num_c,id_tutore) VALUES($num_c,$cedula_jurado1)";
                    $this->sentenciaObj($sql);
                    $sql = "INSERT INTO $tabla2(num_c,id_tutore) VALUES($num_c,$cedula_jurado2)";
                    $this->sentenciaObj($sql);
                    echo "INSERT DE EXPERIMEENTALES<br><br><br>";
                }

                break;
        }

        $sql = "SELECT count(*) as numeroJurados FROM $tabla WHERE num_c=$num_c";
        $numeroJuradosDepropuesta = $this->sentenciaObj($sql);
        if ($numeroJuradosDepropuesta['numeroJurados'] >= 2) {
        } else {

            // Ingreso en es_jurado_'modalidad'
            $sql = "INSERT INTO $tabla(num_c,cedula) VALUES($num_c,$cedula_jurado1)";
            $this->sentenciaObj($sql);
            echo "<hr> insert 1 es jurado ";
            $sql = "INSERT INTO $tabla(num_c,cedula) VALUES($num_c,$cedula_jurado2)";
            $this->sentenciaObj($sql);
            echo "<hr> insert 2 es jurado ";
        }
    }
    public function evaluarConsejo($num_c, $nro_consejo, $cedula_tutor)
    {
        $nro_consejo = (int) $nro_consejo;
        $cedula_tutor = (int) $cedula_tutor;
        $sql = "UPDATE propuestatg SET nro_consejo=$nro_consejo,cedula_tutor=$cedula_tutor WHERE num_c=$num_c";
        $this->sentenciaObj($sql);
    }
}
