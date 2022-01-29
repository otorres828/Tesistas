<?php

namespace App\Controllers\tesistas;

use App\Models\Auth;
use App\Models\PropuestaTG;
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
        $tesista=(new Auth())->autenticado();
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
        if(isset($_POST['modificarclave'])){
            if(isset($_POST['claveactual']) && isset($_POST['nuevaclave'])){
                echo "existen las claves;";
            }
        }
    }

    private function autenticar(){
        $autenticacion= new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Tesistas');
    }
}
