<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\Tesistas;

class TesistaController extends \Core\Controller
{


    // Ver todos los tesistas en escuela-tesistas
    public function tesistasTodos()
    {
        $this->autenticar();
        $tesistas = (new Tesistas())->get();        // Listar todos los Tesisistas 
        View::render('escuela/tesistas-todos.php', ['tesistas' => $tesistas]);
    }

    // VISTA PARA CARGAR ARCHIVO
    public function tesistasCargar()
    {
        $this->autenticar();
        View::render('escuela/cargar-tesistas.php',);
    }
  
    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
