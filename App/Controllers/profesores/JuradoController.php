<?php

namespace App\Controllers\profesores;

use App\Models\Auth;
use App\Models\Criterios;
use App\Models\Profesores;
use App\Models\PropuestaTG;
use App\Models\RolesUsuarios;
use App\Models\Tesistas;
use \Core\View;

class JuradoController extends \Core\Controller
{

    public function jurado()
    {
        $this->autenticar();
        $profesor = (new Profesores())->where('cedula', '=', $_SESSION['cedula'])->getOb();
        $propuestasExp = (new Profesores())->propuestasJuradoExp($_SESSION['cedula']);
        $propuestasIns = (new Profesores())->propuestasJuradoIns($_SESSION['cedula']);
        $roles = (new RolesUsuarios())->where('cedula', '=', $_SESSION['cedula'])->get();
        View::render('profesores\jurado\index.php', [
            'profesor' => $profesor,
            'propuestasExp' => $propuestasExp,
            'propuestasIns' => $propuestasIns,
            'roles' => $roles
        ]);
    }

    public function evaluarTutor()
    {
        if (isset($_POST['evaluar'])) {
            session_start();
            $num_c = $_POST['evaluar'];
            $tesitas = (new Tesistas())->tesistasdeunapropuesta($num_c);
            $profesor = (new Profesores())->where('cedula', '=', $_SESSION['cedula'])->getOb();
            $propuesta = (new PropuestaTG())->where('num_c', '=', $num_c)->getOb();
            $roles = (new RolesUsuarios())->where('cedula', '=', $_SESSION['cedula'])->get();
            $modalidad = $_POST['modalidad'];
            if ($modalidad == 'E') {
                $criterios = (new Criterios())->criteriosTutExp();
            } else {
                $criterios = (new Criterios())->criteriosTutIns();
            }
            View::render('profesores\tutor\evaluar.php', [
                'tesitas' => $tesitas,
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

    public function formularioTutor()
    {
        if (isset($_POST['num_c'])) {
            $num_c = $_POST['num_c'];
            $modalidad = (new PropuestaTG())->where('num_c', '=', $num_c)->getOb();
            $tesitas = (new Tesistas())->tesistasdeunapropuesta($num_c);
            if ($modalidad['modalidad'] == 'I') {
                $criterios = (new Criterios())->criteriosTutIns();
            } else {
                $criterios = (new Criterios())->criteriosTutExp();
            }

            foreach ($tesitas as $tesitas) {
                foreach ($criterios as $criterio) {
                    $i = $criterio['id_criterio'];
                    $nota = $_POST[$tesitas['cedula'] . $i];
                    if ($modalidad['modalidad'] == 'I') {
                        (new Criterios())->insertarObj("INSERT INTO evalua_instrumental 
                                                     VALUES($num_c,'$i','$nota')");
                    } else {
                        (new Criterios())->insertarObj("INSERT INTO evalua_experimental 
                                                    VALUES($num_c,'$i','$nota')");
                    }
                }
            }

            session_start();
            $_SESSION['mensaje'] = "Se evaluo correctamente";
            $_SESSION['colorcito'] = "success";
            header('location:profesor-tutor');
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
