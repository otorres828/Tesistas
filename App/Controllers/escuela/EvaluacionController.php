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
            $_SESSION['mensaje'] = "Se evaluo correctamente la propuesta <b>($num_c)  por el comite</b>";
            $_SESSION['colorcito'] = "success";
            View::render('escuela/asignaciones/evaluacion-comite.php', ['internos' => $internos, 'comites' => $comites, 'propuestastg' => $propuestastg]);
        } else {
            header('location:error');
        }
    }

    //FIXME:===============================================================CONSEJO
    public function evaluacionConsejo()
    {
        $this->autenticar();
        $internos = (new Profesores())->obtenerInternos();
        $jurados = (new Profesores())->get();
        $consejos = (new Consejos())->get();
        $propuestastg = (new PropuestaTG())->propuestasAprobadasPorComite();
        View::render(
            'escuela/asignaciones/evaluacion-consejo.php',
            [
                'internos' => $internos,
                'consejos' => $consejos,
                'jurados' => $jurados,
                'propuestastg' => $propuestastg
            ]
        );
    }

    public function evaluarConsejo()
    {

        if (isset($_POST['evaluarConsejo'])) {
            // session_start();
            $estatus = $_POST['estatus'];
            $num_c = $_POST['num_c'];
            $nro_consejo = $_POST['nro_consejo'];
            $cedula_tutor = $_POST['cedula_tutor'];

            // $resultadoInsert = (new Evaluacion())->insertarEvaluacionConsejo($num_c, $nro_consejo, $estatus);
            if ($estatus == 'APROBADO') {
                $resultado = (new Evaluacion())->actualizar_NroConsejo_CedulaTutor($num_c, $nro_consejo, $cedula_tutor);
            } else { //Esta REPROBADO
                $resultado = (new Evaluacion())->actualizar_NroConsejo($num_c, $nro_consejo);
            }
            $_SESSION['mensaje'] = "Se evaluo correctamente la propuesta <b>($num_c) por el consejo</b>";
            $_SESSION['colorcito'] = "success";

            header('location:escuela-evaluacion-consejo');
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
