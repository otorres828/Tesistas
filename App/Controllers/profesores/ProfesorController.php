<?php

namespace App\Controllers\profesores;

use App\Models\Auth;
use App\Models\Profesores;
use App\Models\Tesistas;
use \Core\View;

class ProfesorController extends \Core\Controller{

    public function index() {
        $this->autenticar();
        $profesor=(new Profesores())->where('cedula','=',$_SESSION['cedula'])->getOb();   
        View::render('profesores\index.php',['profesor'=>$profesor]);
    }
    
    public function perfil(){
        $this->autenticar();
        $profesor=(new Profesores())->where('cedula','=',$_SESSION['cedula'])->getOb();   
        View::render('profesores\perfil.php',['profesor'=>$profesor]);
    
    }


    
    private function autenticar(){
        $autenticacion= new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Profesores');
    }
}
