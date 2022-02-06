<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;

class EscuelaController extends \Core\Controller{

    public function index() {
        $this->autenticar();
        View::render('escuela/index.php');
    }

    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }

}
