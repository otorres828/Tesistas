<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\Criterios;




class CriteriosController extends \Core\Controller
{

    public function criteriosModificarEstatus()
    {
        if (isset($_POST['modificarEstatus'])) {
            session_start();
            $id_criterio = $_POST['id_criterio'];
            $estatus = $_POST['estatus'];
            $proximoEstatus = "";
            if ($estatus == 'ACTIVO') {
                $proximoEstatus = 'INACTIVO';
            } else {
                $proximoEstatus = 'ACTIVO';
            }
            $tipoProfesor = $_POST['tipoProfesor'];
            $modalidad = $_POST['modalidad'];
            $sql = "";
            switch ($modalidad) {
                case "Experimental":
                    switch ($tipoProfesor) {
                        case "Revisor":
                            $sql = "UPDATE criterios_rev_exp SET estatus = '$proximoEstatus' WHERE id_criterio = '$id_criterio'";
                            $tabla = "criterios_rev_exp";
                            break;
                        case "Tutor":
                            $sql = "UPDATE criterios_tutor_exp SET estatus = '$proximoEstatus' WHERE id_criterio = '$id_criterio'";
                            $tabla = "criterios_tutor_exp";
                            break;
                        case "Jurado":
                            $sql = "UPDATE criterios_experimental_jurado SET estatus = '$proximoEstatus' WHERE id_criterio = '$id_criterio'";
                            $tabla = "criterios_experimental_jurado";
                            break;
                    }
                    break;
                case "Instrumental":
                    switch ($tipoProfesor) {
                        case "Revisor":
                            $sql = "UPDATE criterios_rev_ins SET estatus = '$proximoEstatus' WHERE id_criterio = '$id_criterio'";
                            $tabla = "criterios_rev_ins";
                            break;
                        case "Tutor":
                            $sql = "UPDATE criterios_tutor_ins SET estatus = '$proximoEstatus' WHERE id_criterio = '$id_criterio'";
                            $tabla = "criterios_tutor_ins";
                            break;
                        case "Jurado":
                            $sql = "UPDATE criterios_instrumental_jurado SET estatus = '$proximoEstatus' WHERE id_criterio = '$id_criterio'";
                            $tabla = "criterios_instrumental_jurado";
                            break;
                    }
                    break;
            }
            echo "====Datos recibidos del formulario====<br>";
            echo "idCriterio:" . $id_criterio . "<br>";
            echo "EstatusActual:" . $estatus . "<br>";
            echo "proximoEstatus:" . $proximoEstatus . "<br>";
            echo "TipoProfesor:" . $tipoProfesor . "<br>";
            echo "Modalidad:" . $modalidad . "<br>";
            echo "tabla:" . $tabla . "<br>";
            echo "SQL:" . $sql . "<br>";
            echo "=====================================";
            (new Criterios())->modificarCriterio($id_criterio, $proximoEstatus, $tabla, $sql);
            $_SESSION['mensaje'] = "Estado de Criterio se actualizado correctamente";
            $_SESSION['colorcito'] = "success";
            header('location:escuela-criterios-experimentales-todos');
        } else {
            // No esta enviando datos desde el formulario
            header('location:escuela-criterios-experimentales-todos');
        }
    }

    public function crearCriterio()
    {
        if (isset($_POST['nuevoCriterio'])) {
            session_start();
            var_dump($_POST);
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];
            $modalidad = $_POST['modalidad'];
            $notamax = $_POST['notamax'];
            echo "====Datos recibidos del formulario====<br>";
            echo "TipoProfesor:" . $tipo . "<br>";
            echo "Modalidad:" . $modalidad . "<br>";
            echo "tabla:" . $descripcion . "<br>";
            echo "Notamax:" . $notamax . "<br>";
            echo "======================================<br>";

            (new Criterios())->insertarCriterio($notamax, $descripcion, $tipo, $modalidad);

            $_SESSION['mensaje'] = "Se creo el criterio con exito";
            $_SESSION['colorcito'] = "success";
            if ($modalidad == "Experimental") {
                header('location:escuela-criterios-experimentales-todos');
            } else {
                header('location:escuela-criterios-instrumentales-todos');
            }
        } else {
            header('location:error');
        }
    }

    public function eliminarCriterio()
    {
        if (isset($_POST['eliminarcriterio'])) {
            session_start();

            $id_criterio = $_POST['id_criterio'];
            $modalidad = $_POST['modalidad'];
            $tipo = $_POST['tipoprofe'];

            echo "====Datos recibidos del formulario====<br>";
            echo "Modalidad:" . $modalidad . "<br>";
            echo "TipoProfesor:" . $tipo . "<br>";
            echo "IdCriterio:" . $id_criterio . "<br>";
            echo "======================================<br>";

            (new Criterios())->eliminarCriterio($id_criterio, $modalidad, $tipo);
            $_SESSION['mensaje'] = "Se elimino el $id_criterio con exito";
            $_SESSION['colorcito'] = "warning";
            if ($modalidad == "Experimental") {
                header('location:escuela-criterios-experimentales-todos');
            } else {
                header('location:escuela-criterios-instrumentales-todos');
            }
        } else {
            header('location:error');
        }
    }

    // ================================================Experimentales
    public function criteriosExperimentalesTodos()
    {
        $this->autenticar();
        $criteriosRevisores = (new Criterios())->criteriosRevExp();
        $criteriosTutores = (new Criterios())->criteriosTutExp();
        $criteriosJurados = (new Criterios())->criteriosJurExp();
        
        View::render('escuela/criterios/criterios-experimentales-todos.php', [
            'criteriosRevisores' => $criteriosRevisores,
            'criteriosTutores' => $criteriosTutores,
            'criteriosJurados' => $criteriosJurados,

        ]);
    }
    // ================================================Instrumentales
    public function criteriosInstrumentalesTodos()
    {
        $this->autenticar();
        $criteriosRevisores = (new Criterios())->criteriosRevIns();
        $criteriosTutores = (new Criterios())->criteriosTutIns();
        $criteriosJurados = (new Criterios())->criteriosJurIns();
        View::render('escuela/criterios/criterios-instrumentales-todos.php', [
            'criteriosRevisores' => $criteriosRevisores,
            'criteriosTutores' => $criteriosTutores,
            'criteriosJurados' => $criteriosJurados,

        ]);
    }

    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
