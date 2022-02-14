<?php

namespace App\Controllers\escuela;

use App\Models\AreasComiteConsejo;
use App\Models\Auth;
use \Core\View;
use App\Models\Evaluacion;
use App\Models\Profesores;
use App\Models\Comites;
use App\Models\PropuestaTG;




class EvaluacionController extends \Core\Controller
{

    // ===============================================================COMITE

    public function evaluacionComite()
    {
        $internos = (new Profesores())->obtenerInternos();
        $comites = (new Comites())->comitesNoEvaluados();
        $propuestastg = (new PropuestaTG())->evaluacionComite();
        View::render('escuela/asignaciones/evaluacion-comite.php', ['internos' => $internos, 'comites' => $comites, 'propuestastg' => $propuestastg]);
    }

    public function evaluarComite()
    {
        if (isset($_POST['evaluarComite'])) {
            $estatus = $_POST['estatus'];
            $cedularevisor = $_POST['cedularevisor'];
            $num_c = $_POST['num_c'];
            $id_comite = $_POST['id_comite'];
            // echo "====Datos recibidos del formulario====<br>";
            // echo "Estatus:" . $estatus . "<br>";
            // echo "Cedula:" . $cedularevisor . "<br>";
            // echo "Numero de propuesta:" . $num_c . "<br>";
            // echo "Id de comite:" . $id_comite . "<br>";
            // echo "======================================<br>";
            $resultadoInsert = (new Evaluacion())->insertarEvaluacionComite($num_c, $id_comite, $estatus);
            if ($estatus == 'APROBADO') {
                $_SESSION['mensaje'] = "Se evaluo correctamente la propuesta <b>($num_c)</b>";
                $_SESSION['colorcito'] = "success";
                $resultado = (new Evaluacion())->evaluarComite($num_c, $id_comite, $cedularevisor);
                $internos = (new Profesores())->obtenerInternos();
                $comites = (new Comites())->comitesNoEvaluados();
                $propuestastg = (new PropuestaTG())->evaluacionComite();
                View::render('escuela/asignaciones/evaluacion-comite.php', ['internos' => $internos, 'comites' => $comites, 'propuestastg' => $propuestastg]);
            } else {
                // $_SESSION['mensaje'] = "Ras pao es raspao comprade";
                // $_SESSION['colorcito'] = "danger";
            }
        } else {
            header('location:error');
        }
    }

    // FIXME: ===============================================================CONSEJO
    public function evaluacionConsejo()
    {
        $internos = (new Profesores())->obtenerInternos();
        $comites = (new Comites())->comitesNoEvaluados();
        $propuestastg = (new PropuestaTG())->evaluacionComite();
        View::render('escuela/asignaciones/evaluacion-consejo.php', ['internos' => $internos, 'comites' => $comites, 'propuestastg' => $propuestastg]);
    }
    // FIXME:
    public function evaluarConsejo()
    {
        if (isset($_POST['evaluarConsejo'])) {
            $estatus = $_POST['estatus'];
            $cedulatutor = $_POST['cedulatutor'];
            $num_c = $_POST['num_c'];
            $id_comite = $_POST['id_comite'];
            // echo "====Datos recibidos del formulario====<br>";
            // echo "Estatus:" . $estatus . "<br>";
            // echo "Cedula:" . $cedularevisor . "<br>";
            // echo "Numero de propuesta:" . $num_c . "<br>";
            // echo "Id de comite:" . $id_comite . "<br>";
            // echo "======================================<br>";
            if ($estatus == 'APROBADO') {
                $resultado = (new Evaluacion())->evaluarConsejo($num_c, $cedulatutor, $estatus);
                $_SESSION['mensaje'] = "Se evaluo correctamente la propuesta <b>($num_c)</b>";
                $_SESSION['colorcito'] = "success";
                $internos = (new Profesores())->obtenerInternos();
                $comites = (new Comites())->comitesNoEvaluados();
                $propuestastg = (new PropuestaTG())->evaluacionConsejo();
                View::render('escuela/asignaciones/evaluacion-consejo.php', ['internos' => $internos, 'comites' => $comites, 'propuestastg' => $propuestastg]);
            } else {
                // $_SESSION['mensaje'] = "Ras pao es raspao comprade";
                // $_SESSION['colorcito'] = "danger";
            }
        } else {
            header('location:error');
        }
    }

    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
