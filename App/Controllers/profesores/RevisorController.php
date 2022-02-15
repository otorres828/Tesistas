<?php

namespace App\Controllers\profesores;

use App\Models\Auth;
use App\Models\Criterios;
use App\Models\Profesores;
use App\Models\PropuestaTG;
use App\Models\Tesistas;
use \Core\View;

class RevisorController extends \Core\Controller
{

    public function revisor()
    {
        $this->autenticar();
        $profesor = (new Profesores())->where('cedula', '=', $_SESSION['cedula'])->getOb();
        $propuestas = (new Profesores())->propuestasRevisor($_SESSION['cedula']);
        View::render('profesores\revisor\index.php', [
            'profesor' => $profesor,
            'propuestas' => $propuestas
        ]);
    }

    public function evaluarRevisor()
    {
        if (isset($_POST['evaluar'])) {
            session_start();
            $num_c = $_POST['evaluar'];
            $tesitas = (new Tesistas())->tesistasdeunapropuesta($num_c);
            $profesor = (new Profesores())->where('cedula', '=', $_SESSION['cedula'])->getOb();
            $propuesta=(new PropuestaTG())->where('num_c','=',$num_c)->getOb();
            if($_POST['modalidad']=='E'){
                $criterios =(new Criterios())->criteriosRevExp();
            }else{
                $criterios =(new Criterios())->criteriosRevIns();
            }
            View::render('profesores\revisor\evaluar.php', [
                'tesitas' => $tesitas,
                'criterios' => $criterios,
                'profesor'=>$profesor,
                'propuesta'=>$propuesta
            ]);

        } else {
            header('location:error');
        }
    }

    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Profesores');
    }
}
