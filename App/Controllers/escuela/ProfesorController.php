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

    public function crearProfesor(){
        if (isset($_POST['nuevoprofesor'])) {
            session_start();
           if (isset($_POST['nombre']) && isset($_POST['cedula']) && isset($_POST['correoparticular']) && isset($_POST['direccion']) && isset($_POST['telefono'])   ) {
               $validacion = (new Profesores())->validarcedula($_POST['cedula']);
               if($validacion){
                    $_SESSION['mensaje'] = "Cedula ya registrada";
                    $_SESSION['colorcito'] = "danger";
               }else{
                    $validacion= (new Profesores())->validarcorreoparticular($_POST['correoparticular']);
                    if($validacion){
                        $_SESSION['mensaje'] = "Correo particular ya registrado";
                        $_SESSION['colorcito'] = "danger"; 
                    }else{
                        $validacion= (new Profesores())->validartelefono($_POST['telefono']);
                        if ($validacion) {
                            $_SESSION['mensaje'] = "Telefono ya registrada";
                            $_SESSION['colorcito'] = "danger";                         
                        } else {
                             (new Profesores())->insertarprofesor($_POST['cedula'],$_POST['nombre'],$_POST['direccion'],$_POST['correoparticular'],$_POST['telefono'],$_POST['tipo']);
                          
                             $_SESSION['mensaje'] = "Profesor Registrado con Exito";
                             $_SESSION['colorcito'] = "success";  
                             
            
                        }              
                    }
               }
               header('location:escuela-profesores');
            } else {
                $_SESSION['mensaje'] = "Hay campos que no han sido llenados";
                $_SESSION['colorcito'] = "warning";
           }
           
        } else {
            header('location:error');
        }    }
  
    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Escuela');
    }
}
