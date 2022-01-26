<?php

namespace App\Controllers\profesores;

use App\Models\Auth;
use App\Models\Tesistas;
use \Core\View;

class ProfesorController extends \Core\Controller{

    public function index() {
        Auth::verificado();
        Auth::rol('Profesores');
        if(isset($_SESSION['modelo']))
        $profesor=(new Auth())->where('cedula','=',$_SESSION['cedula'])->getOb();                          
        
        View::render('profesores\index.php',['profesor'=>$profesor]);
    }

}
