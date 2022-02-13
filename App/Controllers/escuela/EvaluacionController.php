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
    // Ver todos los tesistas en escuela-tesistas
    // public function comitesTodos()
    // {
    //     $this->autenticar();
    //     $comites = (new Comites())->get();        // Listar todos los comites 
    //     View::render('escuela/comites/comites-todos.php', ['comites' => $comites]);
    // }
    // // Cargar comites 
    // public function comitesCargar()
    // {
    //     $this->autenticar();
    //     View::render('escuela/comites/cargar-comites.php');
    // }
    public function evaluacionComite()
    {
        $internos = (new Profesores())->obtenerInternos();
        $comites = (new Comites())->get();
        $propuestastg = (new PropuestaTG())->evaluacionComite();
        View::render('escuela/asignaciones/evaluacion-comite.php', ['internos' => $internos, 'comites' => $comites, 'propuestastg' => $propuestastg]);
    }
    // TODO: Aun nohace una berga
    public function evaluacionConsejo()
    {

        View::render('escuela/asignaciones/evaluacion-consejo.php');
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
            if ($estatus == 'APROBADO') {
                $resultado = (new Evaluacion())->evaluarComite($num_c, $cedularevisor);
                $_SESSION['mensaje'] = "Se evaluo correctamente la propuesta <b>($num_c)</b>";
                $_SESSION['colorcito'] = "success";
                $internos = (new Profesores())->obtenerInternos();
                $comites = (new Comites())->get();
                $propuestastg = (new PropuestaTG())->get();
                View::render('escuela/asignaciones/evaluacion-comite.php', ['internos' => $internos, 'comites' => $comites, 'propuestastg' => $propuestastg]);
            } else {
                $_SESSION['mensaje'] = "Ras pao es raspao comprade";
                $_SESSION['colorcito'] = "danger";
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
