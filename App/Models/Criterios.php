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
        parent::__construct("Criterios", Criterios::class, $propiedades);
    }



    public function modificarCriterio($id_criterio, $nuevo_estatus, $tabla)
    {
        return $this->sentenciaObj("UPDATE $tabla set estatus='$nuevo_estatus' WHERE id_criterio=$id_criterio");
    }

    public function insertarCriterio($notamax, $descripcion, $tipo, $modalidad)
    {

        switch ($modalidad) {
            case "Experimental":
                switch ($tipo) {
                    case "Revisor":
                        $tabla = "criterios_rev_exp";
                        $sql = "INSERT INTO $tabla(notamax,descripcion,estatus) VALUES($notamax,'$descripcion','INACTIVO')";
                        echo "<br><br>$sql<br><br>";
                        $this->sentenciaObj($sql);
                        break;
                    case "Tutor":
                        $tabla = "criterios_tutor_exp";
                        $sql = "INSERT INTO $tabla(notamax,descripcion,estatus) VALUES($notamax,'$descripcion','INACTIVO')";
                        $this->sentenciaObj($sql);

                        break;
                    case "Jurado":
                        $tabla = "criterios_experimental_jurado";
                        $sql = "INSERT INTO $tabla(notamax,descripcion,estatus) VALUES($notamax,'$descripcion','INACTIVO')";
                        $this->sentenciaObj($sql);

                        break;
                }
                break;
            case "Instrumental":
                switch ($tipo) {
                    case "Revisor":
                        $tabla = "criterios_rev_ins";
                        $sql = "INSERT INTO $tabla(notamax,descripcion,estatus) VALUES($notamax,'$descripcion','INACTIVO')";
                        $this->sentenciaObj($sql);

                        break;
                    case "Tutor":
                        $tabla = "criterios_tutor_ins";
                        $sql = "INSERT INTO $tabla(notamax,descripcion,estatus) VALUES($notamax,'$descripcion','INACTIVO')";
                        $this->sentenciaObj($sql);

                        break;
                    case "Jurado":
                        $tabla = "criterios_instrumental_jurado";
                        $sql = "INSERT INTO $tabla(notamax,descripcion,estatus) VALUES($notamax,'$descripcion','INACTIVO')";
                        $this->sentenciaObj($sql);
                        break;
                }
                break;
        }
    }

    //========================================== CRITERIOS EXPERIMENTALES
    public function criteriosRevExp()
    {
        $sql = "SELECT * FROM criterios_rev_exp";
        return $this->sentenciaAll($sql);
    }

    public function criteriosTutExp()
    {
        $sql = "SELECT * FROM criterios_tutor_exp";
        return $this->sentenciaAll($sql);
    }
    public function criteriosJurExp()
    {

        $sql = "SELECT * FROM criterios_experimental_jurado";
        return $this->sentenciaAll($sql);
    }
}
