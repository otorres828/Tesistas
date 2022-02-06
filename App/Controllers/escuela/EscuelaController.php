<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\Tesistas;
use App\Models\Profesores;
use App\Models\PropuestaTG;



class EscuelaController extends \Core\Controller
{

    public function index()
    {
        $this->autenticar();

        // Listar todos los profesores 
        $profesores = (new Profesores())->get();
        $propuestasTG = (new PropuestaTG())->get();

        View::render('escuela/index.php', [
            'profesores' => $profesores,
            'propuestasTG' => $propuestasTG
        ]);
    }


    // ver todos los tesistas en escuela/tesistas
    public function tesistasTodos()
    {
        $this->autenticar();
        $tesistas = (new Tesistas())->get();
        View::render('escuela/tesistas-todos.php', ['tesistas' => $tesistas]);
    }

    // ver todas las propuestas tg  en escuela-propuestastg
    public function propuestastgTodas()
    {
        $this->autenticar();
        $propuestasTG = (new PropuestaTG())->get();

        View::render('escuela/propuestastg-todos.php', [
            'propuestasTG' => $propuestasTG
        ]);
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
