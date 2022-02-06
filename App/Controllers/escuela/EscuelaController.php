<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\Tesistas;
use App\Models\Profesores;



class EscuelaController extends \Core\Controller
{

    public function index()
    {
        $this->autenticar();

        // Listar todos los profesores 
        $profesores = (new Profesores())->get();
        View::render('escuela/index.php', ['profesores' => $profesores]);
    }


    // ver todos los tesistas en escuela/tesistas
    public function tesistasTodos()
    {
        $this->autenticar();
        $tesistas = (new Tesistas())->get();
        View::render('escuela/tesistas-todos.php', ['tesistas' => $tesistas]);
    }

    // Cargar tesistas mediante csv 
    public function tesistasCargar()
    {
        $this->autenticar();
        View::render('escuela/tesistas-cargar.php',);
    }


    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
