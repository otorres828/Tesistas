<?php

namespace App\Controllers\escuela;

use App\Models\AreasComiteConsejo;
use App\Models\Auth;
use \Core\View;
use App\Models\Evaluacion;
use App\Models\Profesores;
use App\Models\Comites;
use App\Models\Consejos;
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

    //===============================================================CONSEJO
    public function evaluacionConsejo()
    {
        $this->autenticar();
        $internos = (new Profesores())->obtenerInternos();
        $consejos = (new Consejos())->get();
        $propuestastg = (new PropuestaTG())->evaluacionConsejo();
        View::render('escuela/asignaciones/evaluacion-consejo.php', ['internos' => $internos, 'consejos' => $consejos, 'propuestastg' => $propuestastg]);
    }

    public function evaluarConsejo()
    {
        $this->autenticar();

        if (isset($_POST['evaluarConsejo'])) {
            $estatus = $_POST['estatus'];
            $cedulatutor = $_POST['cedulatutor'];
            $num_c = $_POST['num_c'];
            $modalidad = (new PropuestaTG())->getModalidad($num_c);
            $modalidad = $modalidad['modalidad'];
            $nro_consejo = $_POST['nro_consejo'];
            $cedulajurado1 = $_POST['cedulajurado1'];
            $cedulajurado2 = $_POST['cedulajurado2'];
            // echo "====Datos recibidos del formulario====<br>";
            // echo "Estatus:" . $estatus . "<br>";
            // echo "Cedula:" . $cedulatutor . "<br>";
            // echo "Modalidad:" . $modalidad . "<br>";
            // echo "Numero de propuesta:" . $num_c . "<br>";
            // echo "Nro de consejo:" . $nro_consejo . "<br>";
            // echo "Cedula jurado 1:" . $cedulajurado1 . "<br>";
            // echo "Cedula jurado 2:" . $cedulajurado2 . "<br>";
            echo "<hr>======================================Insert en evaluacion consejo";
            $Evaluacion = (new Evaluacion())->insertarEvaluacionConsejo($num_c, $nro_consejo, $estatus);
            echo "<hr>";

            echo "<hr>======================================InsertJurado";
            $Evaluacion = (new Evaluacion())->insertarJuradoPTG($num_c, $cedulajurado1, $cedulajurado2, $modalidad);
            echo "<hr>";
            if ($estatus == 'APROBADO') {
                $_SESSION['mensaje'] = "Se evaluo correctamente la propuesta <b>($num_c)</b>";
                $_SESSION['colorcito'] = "success";
                echo "<hr>======================================evaluar consejo";

                $resultado = (new Evaluacion())->evaluarConsejo($num_c, $nro_consejo, $cedulatutor);
                echo "<hr>";
                $internos = (new Profesores())->obtenerInternos();
                $consejos = (new Consejos())->get();
                echo "<hr>======================================evaluar consejo";
                $propuestastg = (new PropuestaTG())->evaluacionConsejo();
                echo "<hr>";
                // header('location:escuela-evaluacion-consejo');
                // View::render('escuela/asignaciones/evaluacion-consejo.php', ['internos' => $internos, 'consejos' => $consejos, 'propuestastg' => $propuestastg]);
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
