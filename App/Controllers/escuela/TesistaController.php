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
        View::render('escuela/tesistas/tesistas-todos.php', ['tesistas' => $tesistas]);
    }

    // VISTA PARA CARGAR ARCHIVO
    public function tesistasCargar()
    {
        $this->autenticar();
        View::render('escuela/tesistas/cargar-tesistas.php',);
    }
  
    public function crearCargar(){
        if (isset($_POST['nuevotesista'])) {
            session_start();
           if (isset($_POST['nombre']) && isset($_POST['cedula']) && isset($_POST['correoucab']) && isset($_POST['correoparticular']) && isset($_POST['telefono'])   ) {
               $validacion = (new Tesistas())->validarcedula($_POST['cedula']);
               if($validacion){
                    $_SESSION['mensaje'] = "Cedula ya registrada";
                    $_SESSION['colorcito'] = "danger";
               }else{
                    $validacion= (new Tesistas())->validarcorreoucab($_POST['correoucab']);
                    if($validacion){
                        $_SESSION['mensaje'] = "Correo Ucab ya registrada";
                        $_SESSION['colorcito'] = "danger"; 
                    }else{
                        $validacion= (new Tesistas())->validarcorreoparticular($_POST['correoparticular']);
                        if ($validacion) {
                            $_SESSION['mensaje'] = "Correo particular ya registrada";
                            $_SESSION['colorcito'] = "danger";                         
                        } else {
                            $validacion= (new Tesistas())->validartelefono($_POST['telefono']);
                            if($validacion){
                                $_SESSION['mensaje'] = "El telefono ya se encuentra registrado";
                                $_SESSION['colorcito'] = "danger";     
                            }else{
                                if(isset($_POST['comentario'])){
                                    (new Tesistas())->insertartesistaconcomentario($_POST['cedula'],$_POST['nombre'],$_POST['correoucab'],$_POST['correoparticular'],$_POST['telefono'],$_POST['comentario']);
                                }else{
                                    (new Tesistas())->insertartesista($_POST['cedula'],$_POST['nombre'],$_POST['correoucab'],$_POST['correoparticular'],$_POST['telefono']);
                                }
                                $_SESSION['mensaje'] = "Bachiller Registrado con Exito";
                                $_SESSION['colorcito'] = "success";  
                            }
            
                        }              
                    }
               }
               header('location:escuela-tesistas');
            } else {
                $_SESSION['mensaje'] = "Hay campos que no han sido llenados";
                $_SESSION['colorcito'] = "warning";
           }
           
        } else {
            header('location:error');
        }
        
    }

    public function eliminarTesista(){
        if(isset($_POST['eliminartesista'])){
            session_start();
            $validar = (new Tesistas())->validarEliminar($_POST['eliminartesista']);
            if($validar){
                $_SESSION['mensaje'] = "No se puede Eliminar el Bachiller porque ya tiene registros guardados de Propuestas de Trabajo de Grado";
                $_SESSION['colorcito'] = "danger";
            }else{
                (new Tesistas())->eliminarTesista($_POST['eliminartesista']);
                $_SESSION['mensaje'] = "El Bachiller se elimino con exito";
                $_SESSION['colorcito'] = "success"; 
            }
            header('location:escuela-tesistas');

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
