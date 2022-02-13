<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
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
                $slug = $this->slug($_POST['nombreempresa']);
                $resultado = (new Empresas())->where('slug', '=', $slug)->getOb();;
                if ($resultado > 0) {
                    $_SESSION['mensaje'] = "La empresa ya existe";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    (new Empresas())->crear($nombre,$slug);
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

    public function modificar()
    {
        if (isset($_POST['modificarempresa'])) {
            if (isset($_POST['nuevonombre'])) {
                session_start();
                $slug = $this->slug($_POST['nuevonombre']);
                $resultado = (new Empresas())->where('slug', '=', $slug)->getOb();
                if ($resultado > 0) {
                    $_SESSION['mensaje'] = "La empresa ya esta registrada";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    (new Empresas())->modificar($_POST['nuevonombre'], $slug, $_POST['sluganterior']);
                    $_SESSION['mensaje'] = "Se modifico el area con exito";
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

    public function eliminar()
    {
        if (isset($_POST['eliminarempresa'])) {
            session_start();
            (new Empresas())->eliminar($_POST['eliminarempresa']);
            $_SESSION['mensaje'] = "Se elimino la empresa con exito";
            $_SESSION['colorcito'] = "success";
            header('location:escuela-empresas');
        } else {
            header('location:error');
        }
    }

    public function cargar()
    {
        View::render('escuela/empresas/cargar.php');
    }

    public function slug($empresa)
    {
        return $empresa = str_replace(' ', '-', strtolower(preg_replace('([^A-Za-z0-9 ])', '', trim($empresa))));
    }

}