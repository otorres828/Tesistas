<?php

namespace App\Controllers\escuela;

use App\Models\AreasComiteConsejo;
use App\Models\Auth;
use \Core\View;
use App\Models\Comites;




class ComiteController extends \Core\Controller
{
    // Ver todos los tesistas en escuela-tesistas
    public function comitesTodos()
    {
        $this->autenticar();
        $comites = (new Comites())->get();        // Listar todos los comites 
        View::render('escuela/comites/comites-todos.php', ['comites' => $comites]);
    }
    // Cargar comites 
    public function comitesCargar()
    {
        $this->autenticar();
        View::render('escuela/comites/cargar-comites.php');
    }
  
    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
