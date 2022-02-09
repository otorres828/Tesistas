<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;
use App\Models\Tesistas;
use App\Models\Profesores;
use App\Models\PropuestaTG;
use App\Models\Escuela;
use App\Models\Criterios;




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

    public function CriteriosExpTodos()
    {
        $criteriosRevisoresExp = (new Criterios())->criteriosRevExp();
        $criteriosTutoresExp = (new Criterios())->criteriosTutExp();
        $criteriosJuradosExp = (new Criterios())->criteriosJurExp();

        View::render('escuela/criterios-exp-todos.php', [
            'criteriosRevisoresExp' => $criteriosRevisoresExp,
            'criteriosTutoresExp' => $criteriosTutoresExp,
            'criteriosJuradosExp' => $criteriosJuradosExp,

        ]);
    }



    public function CriteriosInsTodos()
    {
        $criteriosRevisoresIns = (new Criterios())->criteriosRevIns();
        $criteriosTutoresIns = (new Criterios())->criteriosTutIns();
        $criteriosJuradosIns = (new Criterios())->criteriosJurIns();

        View::render('escuela/criterios-ins-todos.php', [
            'criteriosRevisoresIns' => $criteriosRevisoresIns,
            'criteriosTutoresIns' => $criteriosTutoresIns,
            'criteriosJuradosIns' => $criteriosJuradosIns,

        ]);
    }

    // Permite habilitar o desshabilitar los criterios
    public function escuelaHabilitar()
    {
        $pizza = $_POST['habilitar-revExp'];
        $porciones = explode(",", $pizza);
        $id_criterio = $porciones[0];
        $tipo_de_criterio = $porciones[1]; //Exp=experimental / Ins=institucional
        $tipo_de_persona = $porciones[2]; //Rev=revisor / Tut=tutor / Jur=jurado
        $proximo_estatus = $porciones[3]; //ACTIVO=El estado del criterio pasara de INACTIVO -> ACTIVO / INACTIVO=El estado del criterio pasara de ACTIVO -> INACTIVO

        switch ($tipo_de_criterio) {
                // en caso de que sea experimental
            case 'Exp':

                switch ($tipo_de_persona) {
                        // en caso de que sea revisor
                    case 'Rev':

                        $sql = " ";
                        $pene = (new Criterios())->modificarestatus($proximo_estatus, $id_criterio);

                        // $criteriosRevisoresExp = (new Criterios())->criteriosRevExp();
                        // $criteriosTutoresExp = (new Criterios())->criteriosTutExp();
                        // $criteriosJuradosExp = (new Criterios())->criteriosJurExp();

                        // var_dump($criteriosRevisoresExp);
                        // var_dump($criteriosTutoresExp);
                        // var_dump($criteriosJuradosExp);
                        // View::render('escuela/criterios-exp-todos.php', [
                        //     'criteriosRevisoresExp' => $criteriosRevisoresExp,
                        //     'criteriosTutoresExp' => $criteriosTutoresExp,
                        //     'criteriosJuradosExp' => $criteriosJuradosExp,

                        // ]);
                        break;
                        // en caso de que sea tutor
                    case 'Tut':
                        break;
                        // en caso de que sea jurado
                    case 'Jur':
                        break;
                }
                break;
                // en caso de que sea instrumental
            case 'Ins':
                switch ($tipo_de_persona) {
                        // en caso de que sea revisor
                    case 'Rev':
                        break;
                        // en caso de que sea tutor
                    case 'Tut':
                        break;
                        // en caso de que sea jurado
                    case 'Jur':
                        break;
                }

                break;
        }
    }




    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
