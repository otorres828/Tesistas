<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\Tesistas;
use App\Models\Profesores;
use App\Models\PropuestaTG;
use App\Models\Escuela;



class EscuelaController extends \Core\Controller
{

    // Vista del dashboard para la escuela
    public function index()
    {
        $this->autenticar();
        $profesores = (new Profesores())->get();         // Listar todos los profesores 
        $propuestasTG = (new PropuestaTG())->get();      // Listar todas las propuestas de TG 
        $estadisticas = (new Escuela())->estadisticas();  // Estadisticas de la escuela

        // var_dump($estadisticas['cantidad-tesistas']['cantidadtesistas']);
        // echo $estadisticas['cantidad-tesistas']['cantidadtesistas'] . '<br>';
        View::render('escuela/index.php', [
            'profesores' => $profesores,
            'propuestasTG' => $propuestasTG,
            'estadisticas' => $estadisticas
        ]);
    }


    // Ver todos los profesores revidores en profesor-revisor.php
    public function profesoresRevisores()
    {
        $this->autenticar();
        $profesores = (new Profesores())->revisores();

        View::render('escuela/profesor-revisor.php', ['profesores' => $profesores]);
    }
    // Ver todos los profesores revidores en profesor-tutor.php
    public function profesoresTutores()
    {
        $this->autenticar();
        $profesores = (new Profesores())->tutores();

        View::render('escuela/profesor-tutor.php', ['profesores' => $profesores]);
    }
    // Ver todos los profesores revidores en profesor-tutor.php
    public function profesoresJurados()
    {
        $this->autenticar();
        $profesores = (new Profesores())->jurados();

        View::render('escuela/profesor-jurado.php', ['profesores' => $profesores]);
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
