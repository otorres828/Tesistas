<?php

namespace App\Controllers\profesores;

use App\Models\Auth;
use App\Models\Criterios;
use App\Models\Profesores;
use App\Models\PropuestaTG;
use App\Models\RolesUsuarios;
use App\Models\Tesistas;
use \Core\View;

class RevisorController extends \Core\Controller
{

    public function revisor()
    {
        $this->autenticar();
        $profesor = (new Profesores())->where('cedula', '=', $_SESSION['cedula'])->getOb();
        $propuestas = (new Profesores())->propuestasRevisor($_SESSION['cedula']);
        $roles = (new RolesUsuarios())->where('cedula', '=', $_SESSION['cedula'])->get();
        View::render('profesores\revisor\index.php', [
            'profesor' => $profesor,
            'propuestas' => $propuestas,
            'roles' => $roles
        ]);
    }

    public function evaluarRevisor()
    {
        if (isset($_POST['evaluar'])) {
            session_start();
            $num_c = $_POST['evaluar'];
            $profesor = (new Profesores())->where('cedula', '=', $_SESSION['cedula'])->getOb();
            $propuesta = (new PropuestaTG())->where('num_c', '=', $num_c)->getOb();
            $modalidad=$propuesta['modalidad'];
            $roles = (new RolesUsuarios())->where('cedula', '=', $_SESSION['cedula'])->get();
            if ($_POST['modalidad'] == 'E') {
                $criterios = (new Criterios())->criteriosRevExp();
            } else {
                $criterios = (new Criterios())->criteriosRevIns();
            }
            View::render('profesores\revisor\evaluar.php', [
                'criterios' => $criterios,
                'profesor' => $profesor,
                'propuesta' => $propuesta,
                'roles' => $roles,
                'modalidad' => $modalidad
            ]);
        } else {
            header('location:error');
        }
    }

    public function formularioRevisor()
    {
        if (isset($_POST['num_c'])) {
            $num_c = $_POST['num_c'];
            $modalidad = (new PropuestaTG())->where('num_c', '=', $num_c)->getOb();
            if($modalidad['modalidad']=='I'){
                $criterios = (new Criterios())->criteriosRevIns();
            }else{
                $criterios = (new Criterios())->criteriosRevExp();
            }
            session_start();
            foreach ($criterios as $criterio) {
                $i = $criterio['id_criterio'];
                $nota = $_POST[$i];
                if ($modalidad['modalidad'] == 'I') {
                    (new Criterios())->insertarObj("INSERT INTO revisa_instrumental 
                                                 VALUES($num_c,'$i','$nota')");
                } else {
                    (new Criterios())->insertarObj("INSERT INTO revisa_experimental 
                                                VALUES($num_c,'$i','$nota')");
                }
            }
            $_SESSION['mensaje'] = "Se evaluo correctamente";
            $_SESSION['colorcito'] = "success";
            header('location:profesor-revisor');
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
