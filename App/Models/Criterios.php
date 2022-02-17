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

                        $count = $this->sentenciaObj("SELECT MAX (id_criterio) as id_criterio FROM $tabla");
                        $count = $count['id_criterio'];
                        if ($count) {
                            $count = $count + 1;
                            $sql = "INSERT INTO $tabla(id_criterio,descripcion,estatus) VALUES($count,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        } else {
                            $sql = "INSERT INTO $tabla(id_criterio,descripcion,estatus) VALUES(1,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        }



                        // $this->sentenciaObj($sql);
                        break;
                    case "Tutor":
                        $tabla = "criterios_tutor_exp";

                        $count = $this->sentenciaObj("SELECT MAX (id_criterio) as id_criterio FROM $tabla");
                        $count = $count['id_criterio'];
                        if ($count) {
                            $count = $count + 1;
                            $sql = "INSERT INTO $tabla(id_criterio,notamax,descripcion,estatus) 
                            VALUES ($count,$notamax,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        } else {
                            $sql = "INSERT INTO $tabla(id_criterio,notamax,descripcion,estatus) 
                            VALUES(1,$notamax,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        }


                        // $sql = "INSERT INTO $tabla(notamax,descripcion,estatus) VALUES($notamax,'$descripcion','INACTIVO')";
                        // $this->sentenciaObj($sql);

                        break;
                    case "Jurado":
                        $tabla = "criterios_experimental_jurado";
                        $count = $this->sentenciaObj("SELECT MAX (id_criterio) as id_criterio FROM $tabla");
                        $count = $count['id_criterio'];
                        if ($count) {
                            $count = $count + 1;
                            $sql = "INSERT INTO $tabla(id_criterio,notamax,descripcion,estatus) 
                            VALUES($count,$notamax,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        } else {
                            $sql = "INSERT INTO $tabla(id_criterio,notamax,descripcion,estatus) 
                            VALUES(1,$notamax,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        }


                        // $sql = "INSERT INTO $tabla(notamax,descripcion,estatus) VALUES($notamax,'$descripcion','INACTIVO')";
                        // $this->sentenciaObj($sql);

                        break;
                }
                break;
            case "Instrumental":
                switch ($tipo) {
                    case "Revisor":
                        $tabla = "criterios_rev_ins";

                        $count = $this->sentenciaObj("SELECT MAX (id_criterio) as id_criterio FROM $tabla");
                        $count = $count['id_criterio'];
                        if ($count) {
                            $count = $count + 1;
                            $sql = "INSERT INTO $tabla(id_criterio,descripcion,estatus) 
                                        VALUES($count,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        } else {
                            $sql = "INSERT INTO $tabla(id_criterio,descripcion,estatus) 
                            VALUES(1,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        }

                        // $sql = "INSERT INTO $tabla(descripcion,estatus) VALUES('$descripcion','INACTIVO')";
                        // $this->sentenciaObj($sql);

                        break;
                    case "Tutor":
                        $tabla = "criterios_tutor_ins";

                        $count = $this->sentenciaObj("SELECT MAX (id_criterio) as id_criterio FROM $tabla");
                        $count = $count['id_criterio'];
                        if ($count) {
                            $count = $count + 1;
                            $sql = "INSERT INTO $tabla(id_criterio,notamax,descripcion,estatus) 
                            VALUES($count,$notamax,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        } else {
                            $sql = "INSERT INTO $tabla(id_criterio,notamax,descripcion,estatus) 
                            VALUES(1,$notamax,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        }

                        // $sql = "INSERT INTO $tabla(notamax,descripcion,estatus) VALUES($notamax,'$descripcion','INACTIVO')";
                        // $this->sentenciaObj($sql);

                        break;
                    case "Jurado":
                        $tabla = "criterios_instrumental_jurado";
                        $count = $this->sentenciaObj("SELECT MAX (id_criterio) as id_criterio FROM $tabla");
                        $count = $count['id_criterio'];
                        if ($count) {
                            $count = $count + 1;
                            $sql = "INSERT INTO $tabla(id_criterio,notamax,descripcion,estatus) 
                            VALUES($count,$notamax,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        } else {
                            $sql = "INSERT INTO $tabla(id_criterio,notamax,descripcion,estatus) 
                            VALUES(1,$notamax,'$descripcion','INACTIVO')";
                            $this->sentenciaObj($sql);
                        }

                        // $sql = "INSERT INTO $tabla(notamax,descripcion,estatus) VALUES($notamax,'$descripcion','INACTIVO')";
                        // $this->sentenciaObj($sql);
                        break;
                }
                break;
        }
        echo "<br><br>$sql<br><br>";
    }
    public function eliminarCriterio($id_criterio, $modalidad, $tipo)
    {
        switch ($modalidad) {
            case "Experimental":
                switch ($tipo) {
                    case "Revisor":
                        $tabla = "criterios_rev_exp";
                        $sql = "DELETE FROM $tabla WHERE id_criterio=$id_criterio";
                        $this->sentenciaObj($sql);                        // echo "<br><br>$sql<br><br>";
                        break;
                    case "Tutor":
                        $tabla = "criterios_tutor_exp";
                        $sql = "DELETE FROM $tabla WHERE id_criterio=$id_criterio";
                        $this->sentenciaObj($sql);                        // echo "<br><br>$sql<br><br>";
                        break;
                    case "Jurado":
                        $tabla = "criterios_experimental_jurado";
                        $sql = "DELETE FROM $tabla WHERE id_criterio=$id_criterio";
                        $this->sentenciaObj($sql);                        // echo "<br><br>$sql<br><br>";
                        break;
                }
                break;
            case "Instrumental":
                switch ($tipo) {
                    case "Revisor":
                        $tabla = "criterios_rev_ins";
                        $sql = "DELETE FROM $tabla WHERE id_criterio=$id_criterio";
                        $this->sentenciaObj($sql);                        // echo "<br><br>$sql<br><br>";

                        break;
                    case "Tutor":
                        $tabla = "criterios_tutor_ins";
                        $sql = "DELETE FROM $tabla WHERE id_criterio=$id_criterio";
                        $this->sentenciaObj($sql);                        // echo "<br><br>$sql<br><br>";

                        break;
                    case "Jurado":
                        $tabla = "criterios_instrumental_jurado";
                        $sql = "DELETE FROM $tabla WHERE id_criterio=$id_criterio";
                        $this->sentenciaObj($sql);                        // echo "<br><br>$sql<br><br>";
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
    //========================================== CRITERIOS Instrumentales
    public function criteriosRevIns()
    {
        $sql = "SELECT * FROM criterios_rev_ins";
        return $this->sentenciaAll($sql);
    }

    public function criteriosTutIns()
    {
        $sql = "SELECT * FROM criterios_tutor_ins";
        return $this->sentenciaAll($sql);
    }
    public function criteriosJurIns()
    {

        $sql = "SELECT * FROM criterios_instrumental_jurado";
        return $this->sentenciaAll($sql);
    }

    //CONTAR LAS CANTIDADES DE CRITERIOS
    public function cantidad_criterios_rev_in()
    {
        return $this->sentenciaObj("SELECT COUNT (id_criterio) AS cantidad FROM CRITERIOS_REV_INS");
    }
}
