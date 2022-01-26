<?php

namespace App\Controllers\tesistas;

use App\Models\Auth;
use App\Models\PropuestaTG;
use \Core\View;

class TesistasController extends \Core\Controller{

    public function index() {
        Auth::verificado();
        Auth::rol('Tesistas');
        $tesista=(new Auth())->where('cedula','=',$_SESSION['cedula'])->getOb();
        View::render('tesistas/index.php',['tesista'=>$tesista]); 
    }

    public function guardarpropuesta(){
        session_start();
        $objeto= new PropuestaTG();
        $valor = $objeto->comprobarnombre($_POST['nombrepropuesta']);
        if($valor==0){
            $objeto->insertar($_POST['nombrepropuesta'], $_POST['flexRadioDefault'],$_POST['descripcion']);
            $_SESSION['mensaje'] = "OBJETO INSERTADO";
            $_SESSION['colorcito'] = "success";
        } else{
            $_SESSION['mensaje'] = "OBJETO NO INSERTADO";
            $_SESSION['colorcito'] = "danger";
        }
        // header("Location: tesistas");                    

    }
}
