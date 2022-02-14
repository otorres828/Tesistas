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

    public function perfil(){
        
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
    
    public function evaluacioncomite(){
        if (isset($_POST['BOTON_ENVIAR_EVALUACION'])) {
            $id_comite=$_POST['id_comite'];
            $num_c=$_POST['num_c'];
            $estatus=$_POST['estatus'];
            if($_POST['estatus']=='REPROBADO'){
                $query="UPDATE propuestatg SET id_comite=$id_comite WHERE num_c=$num_c";
            }else{
                $cedula_revisor=$estatus=$_POST['cedula_revisor'];
                $query="UPDATE propuestatg SET id_comite=$id_comite,cedula_revisor=$cedula_revisor WHERE num_c=$num_c";
            }
            $sql="INSERT INTO evaluacioncomite values ($id_comite,$num_c,'$estatus')";
            (new PropuestaTG())->insertarObj($query);
            (new PropuestaTG())->insertarObj($sql);
        } else {
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