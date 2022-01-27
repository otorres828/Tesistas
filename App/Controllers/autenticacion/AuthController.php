<?php

namespace App\Controllers\autenticacion;

use App\Models\Auth;
use \Core\View;

class AuthController extends \Core\Controller{

    public function index() {
        View::render('autenticacion/login.php');
    }

    public function comprobarLogin() {
        session_start();
    
        $autenticar = new Auth();
        if (!empty($_POST['correo']) && !empty($_POST['clave'])) {
            $resultado=$autenticar->correo($_POST['correo']);
            if($resultado>0){
                if($autenticar->clave($_POST['correo'], $_POST['clave'])){ 
                    $resultado=(new Auth())->where('correo','=',$_POST['correo'])->getOb();
                    $_SESSION['modelo'] = $resultado['modelo'];
                    $_SESSION['cedula'] = $resultado['cedula'];
                    
                    $modelo = $_SESSION['modelo'];
                    if($modelo=='Tesistas'){
                        header("Location: tesistas");                    
                    }else if($modelo=='Profesores'){
                        header("Location: profesores");                    
                    }else{
                        header("Location: Escuela");                    
                    }
                }else{
                    $_SESSION['mensaje'] = "CLAVE ERRONEA";
                    $_SESSION['colorcito'] = "danger";
                    header("Location: login");                       
                }
            }else{
                $_SESSION['mensaje'] = "USUARIO NO REGISTRADO";
                $_SESSION['colorcito'] = "danger";
                header("Location: login");                    

            }
        }else{
            $_SESSION['mensaje'] = "COMPLETE TODOS LOS CAMPOS";
            $_SESSION['colorcito'] = "danger";
            header("Location: login");            
        }
    }

    public function cerrarSesion(){
        session_start();
        if (isset($_SESSION['cedula'])) {
            session_unset();
            $_SESSION['mensaje'] = "SESION CERRADA  ";
            $_SESSION['colorcito'] = "danger";
            header("Location: login");
        }
    }

    public function error(){
        View::render('errores\404.php');
    }
}
