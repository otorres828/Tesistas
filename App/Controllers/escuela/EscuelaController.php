<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\Tesistas;
use App\Models\Profesores;
use App\Models\PropuestaTG;



class EscuelaController extends \Core\Controller
{

    // Vista del dashboard para la escuela
    public function index()
    {
        $this->autenticar();
        $profesores = (new Profesores())->get();         // Listar todos los profesores 
        $propuestasTG = (new PropuestaTG())->get();      // Listar todas las propuestas de TG 


        View::render('escuela/index.php', [
            'profesores' => $profesores,
            'propuestasTG' => $propuestasTG
        ]);
    }


    // Ver todos los tesistas en escuela-tesistas
    public function tesistasTodos()
    {
        $this->autenticar();
        $tesistas = (new Tesistas())->get();        // Listar todos los Tesisistas 
        View::render('escuela/tesistas-todos.php', ['tesistas' => $tesistas]);
    }

    // Ver todas las propuestas tg  en escuela-propuestastg
    public function propuestastgTodas()
    {
        $this->autenticar();
        $propuestasTG = (new PropuestaTG())->get();   // Listar todas las propuestas de TG 

        View::render('escuela/propuestastg-todos.php', [
            'propuestasTG' => $propuestasTG
        ]);
    }

    // POR HACER Cargar tesistas mediante csv 
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
