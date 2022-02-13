<?php

namespace App\Controllers\escuela;

use App\Models\Empresas;
use \Core\View;

class EmpresaController extends \Core\Controller
{
    public function index()
    {
        $empresas = (new Empresas())->get();        // Listar todos las areas 
        View::render('escuela/empresas/index.php', ['empresas' => $empresas]);
    }

    public function crear()
    {
        if (isset($_POST['nuevaempresa'])) {
            if (isset($_POST['nombreempresa'])) {
                $nombre=$_POST['nombreempresa'];
                session_start();
                $resultado = (new Empresas())->where('nombre', '=',$nombre)->getOb();
                if ($resultado > 0) {
                    $_SESSION['mensaje'] = "La empresa ya existe";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    (new Empresas())->crear($nombre);
                    $_SESSION['mensaje'] = "Se registro la empresa con exito";
                    $_SESSION['colorcito'] = "success";
                }
                header('location:escuela-empresas');
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
                $resultado = (new Empresas())->where('slug', '=', $slug)->getOb();
                if ($resultado > 0) {
                    $_SESSION['mensaje'] = "El Area ya existe";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    (new Empresas())->modificarArea($_POST['nuevonombre'], $slug, $_POST['idarea']);
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
            (new Empresas())->eliminarArea($_POST['eliminararea']);
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
}