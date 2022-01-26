<?php

namespace App\Controllers\profesores;

use App\Models\Auth;
use \Core\View;

class ProfesorController extends \Core\Controller{

    public function index() {
        $autores = (new Auth())->get();
        View::render('profesores\index.php',['autores'=>$autores]);
    }

}
