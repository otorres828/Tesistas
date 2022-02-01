<?php

namespace App\Controllers\tesistas;

use App\Models\Auth;
use App\Models\PropuestaTG;
use App\Models\Tesistas;
use \Core\View;

class TesistasController extends \Core\Controller{

    public function index() {
        $this->autenticar();
        
        $tesista=(new Auth())->where('cedula','=',$_SESSION['cedula'])->getOb();
        $mispropuestas=(new PropuestaTG())->mispropuestas($_SESSION['cedula']);
        View::render('tesistas/index.php',['tesista'=>$tesista,
                                            'mispropuestas'=>$mispropuestas
                                            ]); 
    }

    public function perfil(){
        $this->autenticar();
        $tesista=(new Tesistas())->query();
        View::render('tesistas/perfil.php',['tesista'=>$tesista]); 
    }

    public function propuestasaprobadas(){
        $autenticacion= new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Tesistas'); 

        $tesista=(new Auth())->where('cedula','=',$_SESSION['cedula'])->getOb();
        $propuestasaprobadas="";
        View::render('tesistas/propuestasaprobadas.php',['tesista'=>$tesista,
                                                         'propuestasaprobadas'=>$propuestasaprobadas]);
    }

    public function modificarClave(){
        $this->autenticar();
        if(isset($_POST['modificarclave'])){
            if(isset($_POST['claveactual']) && isset($_POST['nuevaclave'])){
                echo "existen las claves;";
            }
        }
    }
    public function modificarCorreo(){
        
        if(isset($_POST['modificarcorreo'])){
            if(isset($_POST['correo'])){
                (new Tesistas())->modificarCorreo($_POST['correo']);
                header('location:tesista-perfil');
            }
        }
    }

    public function modificarTelefono(){
        session_start();
        $this->autenticar();
        if(isset($_POST['modificartelefono'])){
            if(isset($_POST['telefono'])){
                (new Tesistas())->modificarTelefono($_POST['telefono']);
                header('location:tesista-perfil');
            }
        }
    }

    public function modificarCodigo(){
        if(isset($_POST['modificarcodigo'])){
                $key = "";
                $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
                $max = strlen($pattern)-1;
                for($i = 0; $i < 26; $i++){
                    $key .= substr($pattern, mt_rand(0,$max), 1);
                }
                (new Tesistas())->modificarcodigo($key);
                header('location:tesista-perfil');
        }
    }
  
    
    private function autenticar(){
        $autenticacion= new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Tesistas');
    }
}
