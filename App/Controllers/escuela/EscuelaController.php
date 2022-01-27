<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;

class EscuelaController extends \Core\Controller{

    public function index() {
        $autenticacion= new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
        
        View::render('escuela/index.php');
    }

}
