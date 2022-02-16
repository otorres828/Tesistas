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

    public function evaluarJurado()
    {
        if (isset($_POST['evaluar'])) {
            session_start();
            $num_c = $_POST['evaluar'];
            $tesistas = (new Tesistas())->tesistasdeunapropuesta($num_c);
            $profesor = (new Profesores())->where('cedula', '=', $_SESSION['cedula'])->getOb();
            $propuesta = (new PropuestaTG())->where('num_c', '=', $num_c)->getOb();
            $roles = (new RolesUsuarios())->where('cedula', '=', $_SESSION['cedula'])->get();
            $modalidad = $_POST['modalidad'];
            if ($modalidad == 'E') {
                $criterios = (new Criterios())->criteriosJurExp();
            } else {
                $criterios = (new Criterios())->criteriosJurIns();
            }
            View::render('profesores\jurado\evaluar.php', [
                'tesistas' => $tesistas,
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

    public function formularioJurado()
    {   
        if (isset($_POST['num_c'])) {
            session_start();
            $num_c = $_POST['num_c'];
            $modalidad = (new PropuestaTG())->where('num_c', '=', $num_c)->getOb();
            $tesitas = (new Tesistas())->tesistasdeunapropuesta($num_c);
            if ($modalidad['modalidad'] == 'I') {
                $criterios = (new Criterios())->criteriosJurIns();
            } else {
                $criterios = (new Criterios())->criteriosJurExp();
            }
            $cedulajurado=$_SESSION['cedula'];
            foreach ($tesitas as $tesita) {
                $cedulatesista=$tesita['cedula'];
                foreach ($criterios as $criterio) {
                    $idcriterio=$criterio['id_criterio'];
                    $notas = $tesita['cedula'].$idcriterio;
                    $nota= $_POST[$notas];
                    if ($modalidad['modalidad'] == 'I') {
                        (new Criterios())->insertarObj("INSERT INTO es_evaluado_por_jurado 
                                                     VALUES($cedulatesista,$idcriterio,$cedulajurado,'$nota','I')");
                    } else {
                        (new Criterios())->insertarObj("INSERT INTO es_evaluado_por_jurado 
                                                        VALUES($cedulatesista,$idcriterio,$cedulajurado,'$nota','E')");
                    }
                }
            }

            $_SESSION['mensaje'] = "Se evaluo correctamente";
            $_SESSION['colorcito'] = "success";
            header('location:profesor-jurado');
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
