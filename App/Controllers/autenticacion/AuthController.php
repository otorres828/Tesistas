<?php

namespace App\Controllers\autenticacion;

use App\Models\Auth;
use \Core\View;

class AuthController extends \Core\Controller{

    public function index() {
        $estudiantes = (new Auth())->where('status','=',2)->where('user_id','=',20)->get();


        View::render('autenticacion/login.php',['estudiantes'=>$estudiantes]);
    }

    public function comprobarLogin() {
        session_start();
        
        $autenticar = new Auth();
        if (!empty($_POST['correo']) && !empty($_POST['clave'])) {
            $resultado=$autenticar->correo($_POST['correo']);
            if($resultado>0){
                if($autenticar->clave($_POST['correo'], $_POST['clave'])){
                    $_SESSION['mensaje'] = "SESION INICIADA";
                    $_SESSION['colorcito'] = "success";
                    header("Location: login");                    
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
        if (isset($_GET['username'])) {
            $_SESSION['mensaje'] = "SESION CERRADA  ";
            $_SESSION['colorcito'] = "danger";
            header("Location: login");
        }
    }
}
