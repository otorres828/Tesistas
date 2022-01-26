<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;

class EscuelaController extends \Core\Controller{

    public function index() {
        Auth::verificado();
        Auth::rol('Escuela');
        
        View::render('escuela/index.php');
    }

}
