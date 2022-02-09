<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\Tesistas;
use App\Models\Profesores;
use App\Models\PropuestaTG;
use App\Models\Escuela;
use App\Models\Comites;




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


 


    // Ver todas las propuestas tg  en escuela-propuestastg
    public function propuestastgTodas()
    {
        $this->autenticar();
        $propuestasTG = (new PropuestaTG())->get();   // Listar todas las propuestas de TG 

        View::render('escuela/propuestastg-todos.php', [
            'propuestasTG' => $propuestasTG
        ]);
    }


  
    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
