<?php

namespace App\Controllers\escuela;

use App\Models\Areas;
use App\Models\Auth;
use App\Models\Profesores;
use \Core\View;

class AreasController extends \Core\Controller
{
    public function todasAreas()
    {
        $this->autenticar();
        $areas = (new Areas())->get();        // Listar todos las areas 
        View::render('escuela/areas/areas-todos.php', ['areas' => $areas]);
    }

    public function crearArea()
    {
        if (isset($_POST['nuevaarea'])) {
            if (isset($_POST['nombrearea'])) {
                session_start();
                $slug = $this->slug($_POST['nombrearea']);
                $resultado = (new Areas())->where('slug', '=', $slug)->getOb();
                if ($resultado > 0) {
                    $_SESSION['mensaje'] = "El Area ya existe";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    (new Areas())->crearArea($_POST['nombrearea'], $slug);
                    $_SESSION['mensaje'] = "Se creo el area con exito";
                    $_SESSION['colorcito'] = "success";
                }

                header('location:escuela-areas');
            } else {
                header('location:error');
            }
        } else {
            header('location:error');
        }
    }

    public function modificarArea()
    {
        if (isset($_POST['modificararea'])) {
            if (isset($_POST['nuevonombre'])) {
                session_start();
                $slug = $this->slug($_POST['nuevonombre']);
                $resultado = (new Areas())->where('slug', '=', $slug)->getOb();
                if ($resultado > 0) {
                    $_SESSION['mensaje'] = "El Area ya existe";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    (new Areas())->modificarArea($_POST['nuevonombre'], $slug, $_POST['idarea']);
                    $_SESSION['mensaje'] = "Se modifico el area con exito";
                    $_SESSION['colorcito'] = "success";
                }
                header('location:escuela-areas');
            } else {
                header('location:error');
            }
        } else {
            header('location:error');
        }
    }

    public function eliminarArea()
    {
        if (isset($_POST['eliminararea'])) {
            session_start();
            (new Areas())->eliminarArea($_POST['eliminararea']);
            $_SESSION['mensaje'] = "Se elimino el area con exito";
            $_SESSION['colorcito'] = "warning";
            header('location:escuela-areas');
        } else {
            header('location:error');
        }
    }

    public function cargarArea()
    {

        $this->autenticar();
        View::render('escuela/areas/cargar-areas.php');
    }
    //ESPECIALIZACIONES

    public function especializacion()
    {
        if (isset($_POST['eliminarEspecializacion'])) {
            session_start();
            (new Areas())->eliminar_Especializacion_Profesor($_POST['ced'], $_POST['areaaeliminar']);
            $_SESSION['mensaje'] = "Se elimino la especializacion con exito";
            $_SESSION['colorcito'] = "success";
           
        }
        if (isset($_POST['nuevaarea'])) {
            session_start();
            if (isset($_POST['profesor'])) {
                $resultado = (new Areas())->validarEspecializacionProfesor($_POST['profesor'], $_POST['area']);
                if ($resultado > 0) {
                    $_SESSION['mensaje'] = "El profesor ya tiene la especializacion agregada";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    (new Areas())->AsignarEspecializacion($_POST['profesor'], $_POST['area']);
                    $_SESSION['mensaje'] = "Se agrego la especializacion con exito";
                    $_SESSION['colorcito'] = "success";
                }
            }
        }

        $profesores = (new Areas())->especializacion_profesores();
        $profes = (new Profesores())->sentenciaAll("SELECT cedula,nombre FROM profesores");
        $areas = (new Areas())->get();
         View::render('escuela/areas/areas-profesores.php', [
            'profesores' => $profesores,
            'areas' => $areas,
            'profes' => $profes
        ]);
    }

    public function Cargarespecializacion()
    {
        $this->autenticar();
        View::render('escuela/areas/cargar-areas-profesores.php');
    }


    public function slug($area)
    {
        return $area = str_replace(' ', '-', strtolower(preg_replace('([^A-Za-z0-9 ])', '', trim($area))));
    }

    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}


    // public function AsignarEspecializacion()
    // {

    //     if (isset($_POST['nuevaarea'])) {
    //         session_start();
    //         $resultado = (new Areas())->validarEspecializacionProfesor($_POST['profesor'], $_POST['area']);
    //         if ($resultado > 0) {
    //             $_SESSION['mensaje'] = "El profesor ya tiene la especializacion agregada";
    //             $_SESSION['colorcito'] = "danger";
    //         } else {
    //             (new Areas())->AsignarEspecializacion($_POST['profesor'], $_POST['area']);
    //             $_SESSION['mensaje'] = "Se agrego la especializacion con exito";
    //             $_SESSION['colorcito'] = "success";
    //         }
    //     } else {
    //         header('location:error');
    //     }
    // }

    // public function eliminarespecializacion()
    // {
    //     if (isset($_POST['eliminarEspecializacion'])) {
    //         (new Areas())->eliminar_Especializacion_Profesor($_POST['ced'], $_POST['areaaeliminar']);
    //         $_SESSION['mensaje'] = "Se elimino la especializacion con exito";
    //         $_SESSION['colorcito'] = "success";
    //         header('location:escuela-areas-profesores');
    //     } else {
    //         header('location:error');
    //     }
    // }