<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\Profesores;
use App\Models\PropuestaTG;
use App\Models\Escuela;




class ProfesorController extends \Core\Controller
{

    // Vista del dashboard para la escuela
    public function index()
    {
        $this->autenticar();
        $profesores = (new Profesores())->get();         // Listar todos los profesores
        View::render('escuela/profesores/profesores-todos.php', [
                                'profesores' => $profesores
        ]);
    }

    // Ver todos los profesores revidores en profesor-revisor.php
    public function profesoresRevisores()
    {
        $this->autenticar();
        $profesores = (new Profesores())->revisores();

        View::render('escuela/profesores/profesor-revisor.php', ['profesores' => $profesores]);
    }
    // Ver todos los profesores revidores en profesor-tutor.php
    public function profesoresTutores()
    {
        $this->autenticar();
        $profesores = (new Profesores())->tutores();

        View::render('escuela/profesores/profesor-tutor.php', ['profesores' => $profesores]);
    }
    public function profesorCargar()
    {
        $this->autenticar();
        View::render('escuela/profesores/cargar-profesores.php',);    }

    // Ver todos los profesores revidores en profesor-tutor.php
    public function profesoresJurados()
    {
        $this->autenticar();
        $profesores = (new Profesores())->jurados();

        View::render('escuela/profesores/profesor-jurado.php', ['profesores' => $profesores]);
    }


  
    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
