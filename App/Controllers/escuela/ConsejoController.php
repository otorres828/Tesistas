<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\Consejos;


class ConsejoController extends \Core\Controller
{
    public function index()
    {
        $consejos = (new Consejos())->get();        // Listar todos los consejos de escuela 
        View::render('escuela/consejos-todos.php', ['consejos' => $consejos]);
    }

    public function cargarconsejo()
    {
        $this->autenticar();
        View::render('escuela/consejos-cargar.php');
    }
  
    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
