<?php

namespace App\Controllers\escuela;

use App\Models\AreasComiteConsejo;
use App\Models\Auth;
use \Core\View;
use App\Models\Evaluacion;




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
        View::render('escuela/asignaciones/evaluacion-comite.php');
    }
    public function evaluarComite()
    {
        if (isset($_POST['evaluarComite'])) {
            $estatus = $_POST['estatus'];
            $cedularevisor = $_POST['cedularevisor'];
            $numeroPropuestaTG = $_POST['numeroPropuestaTG'];
            $numeroComite = $_POST['numeroComite'];
            $id_comite = $_POST['id_comite'];
            echo "====Datos recibidos del formulario====<br>";
            echo "Estatus:" . $estatus . "<br>";
            echo "Cedula:" . $cedularevisor . "<br>";
            echo "Numero de propuesta:" . $numeroPropuestaTG . "<br>";
            echo "Numero de comite:" . $numeroComite . "<br>";
            echo "Id de comite:" . $id_comite . "<br>";
            echo "======================================<br>";
            if ($estatus == 'APROBADO') {
                # code...
            } else {
                (new Evaluacion())->insertarEvaluacionComite($numeroComite, $id_comite, $estatus);
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
