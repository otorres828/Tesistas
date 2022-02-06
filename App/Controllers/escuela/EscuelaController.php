<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\Tesistas;



class EscuelaController extends \Core\Controller
{

    public function index()
    {
        $this->autenticar();
        View::render('escuela/index.php');
    }


    // ver todos los tesistas en escuela/tesistas
    public function tesistasTodos()
    {
        $this->autenticar();
        $tesistas = (new Tesistas())->get();
        View::render('escuela/tesistas-todos.php', ['tesistas' => $tesistas]);
    }


    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
