<?php

namespace App\Controllers\escuela;

use App\Models\Areas;
use App\Models\Auth;
use \Core\View;

class AreasController extends \Core\Controller
{
    public function todasAreas()
    {
        $this->autenticar();
        $areas = (new Areas())->get();        // Listar todos las areas 
        View::render('escuela/areas/areas-todos.php', ['areas' => $areas]);
    }

    public function crearArea(){
        if(isset($_POST['nuevaarea'])){
            if(isset($_POST['nombrearea'])){
                session_start();
                $slug=$this->slug($_POST['nombrearea']);
                $resultado = (new Areas())->where('slug', '=', $slug)->getOb();
                if ($resultado > 0) {
                    $_SESSION['mensaje'] = "El Area ya existe";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    (new Areas())->crearArea($_POST['nombrearea'],$slug);
                    $_SESSION['mensaje'] = "Se creo el area con exito";
                    $_SESSION['colorcito'] = "success";
                    
                }

                header('location:escuela-areas');
            }else{
                header('location:error');
            }
        }else{
            header('location:error');
        }
    }

    public function modificarArea()
    {
        if(isset($_POST['modificararea'])){
            if(isset($_POST['nuevonombre'])){
                session_start();
                $slug=$this->slug($_POST['nuevonombre']);
                $resultado = (new Areas())->where('slug', '=', $slug)->getOb();
                if ($resultado > 0) {
                    $_SESSION['mensaje'] = "El Area ya existe";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    (new Areas())->modificarArea($_POST['nuevonombre'],$slug,$_POST['idarea']);
                    $_SESSION['mensaje'] = "Se modifico el area con exito";
                    $_SESSION['colorcito'] = "success";
                    
                }
                header('location:escuela-areas');
            }else{
                header('location:error');
            }
        }else{
            header('location:error');
        }
    }

    public function eliminarArea(){
        if(isset($_POST['eliminararea'])){
            session_start();
            (new Areas())->eliminarArea($_POST['eliminararea']);
            $_SESSION['mensaje'] = "Se elimino el area con exito";
            $_SESSION['colorcito'] = "warning";
            header('location:escuela-areas');
        }else{
            header('location:error');
        }
    }

    public function cargarArea(){
        
        $this->autenticar();
        View::render('escuela/areas/cargar-areas.php');
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
