<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\PropuestaTG;
use App\Models\Escuela;
use App\Models\Tesistas;

class EscuelaController extends \Core\Controller
{

    // Vista del dashboard para la escuela
    public function index()
    {
        
        $propuestasTG = (new PropuestaTG())->get();     
        $estadisticas = (new Escuela())->estadisticas(); 


        View::render('escuela/index.php', [
            'propuestasTG' => $propuestasTG,
            'estadisticas' => $estadisticas
        ]);
    }

    // Ver todas las propuestas tg  en escuela-propuestastg
    public function propuestastgTodas()
    {
        $this->autenticar();
        $propuestasTG = (new PropuestaTG())->get();   // Listar todas las propuestas de TG 

        View::render('escuela/trabajosdg/propuestastg-todos.php', [
            'propuestasTG' => $propuestasTG
        ]);
    }
  
    public function trabajosdegrado(){
        $propuestas = (new PropuestaTG())->aprobados();
        View::render('escuela/trabajosdg/aprobados.php',['propuestas'=>$propuestas]);
    }

    public function verpropuesta(){
        if(isset($_POST['num_c'])){
            $num_c=$_POST['num_c'];
            $trabajodg= (new PropuestaTG())->where('num_c','=',$_POST['num_c'])->getOb();
            $tesistas= (new Tesistas())->sentenciaAll("SELECT t.* FROM tesistas as t, presentan as p
                                                        WHERE t.cedula=p.cedula
                                                        AND p.num_c=$num_c");
            View::render('escuela/trabajosdg/vertrabajo.php',['trabajodg'=> $trabajodg,
                                                              'tesistas'=>$tesistas]);   
        }else{
            header('location:error');
        }
    }

    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
