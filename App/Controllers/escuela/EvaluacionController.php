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
        $comites = (new Comites())->get();
        $propuestastg = (new PropuestaTG())->propuestasNoEvaluadasPorElComite();
        // var_dump($propuestastg);
        // var_dump($comites);
        // var_dump($internos);
        View::render('escuela/asignaciones/evaluacion-comite.php', ['internos' => $internos, 'comites' => $comites, 'propuestastg' => $propuestastg]);
    }

    public function evaluarComite()
    {
        if (isset($_POST['evaluarComite'])) {

            $estatus = $_POST['estatus'];
            $cedularevisor = $_POST['cedularevisor'];
            $num_c = $_POST['num_c'];
            $id_comite = $_POST['id_comite'];

            $resultadoInsert = (new Evaluacion())->insertarEvaluacionComite($num_c, $id_comite, $estatus);

            $internos = (new Profesores())->obtenerInternos();
            $comites = (new Comites())->comitesNoEvaluados();
            $propuestastg = (new PropuestaTG())->propuestasNoEvaluadasPorElComite();

            if ($estatus == 'APROBADO') {
                $resultado = (new Evaluacion())->actualizar_IdComite_CedulaRevisor($num_c, $id_comite, $cedularevisor);
            } else {
                $resultado = (new Evaluacion())->actualizar_IdComite($num_c, $id_comite);
            }
            $_SESSION['mensaje'] = "Se evaluo correctamente la propuesta <b>($num_c)</b>";
            $_SESSION['colorcito'] = "success";
            View::render('escuela/asignaciones/evaluacion-comite.php', ['internos' => $internos, 'comites' => $comites, 'propuestastg' => $propuestastg]);
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
    }
    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
