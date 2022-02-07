<?php

namespace App\Controllers\tesistas;

use App\Models\Auth;
use App\Models\PropuestaTG;
use App\Models\Tesistas;
use \Core\View;

class TesistasController extends \Core\Controller
{

    public function index()
    {
        $this->autenticar();
        $tesista = (new Auth())->where('cedula', '=', $_SESSION['cedula'])->getOb();
        $mispropuestas = (new PropuestaTG())->mispropuestas($_SESSION['cedula']);
        View::render('tesistas/index.php', [
            'tesista' => $tesista,
            'mispropuestas' => $mispropuestas
        ]);
    }

    public function perfil()
    {
        $this->autenticar();
        $tesista = (new Tesistas())->perfil();
        View::render('tesistas/perfil.php', ['tesista' => $tesista]);
    }

    public function mispropuestasaprobadas()
    {
        $this->autenticar();
        $tesista = (new Auth())->where('cedula', '=', $_SESSION['cedula'])->getOb();
        $propuestasaprobadas=(new PropuestaTG())->mispropuestasaprobadas();
        View::render('tesistas/propuestasaprobadas.php', [ 'tesista' => $tesista,
                                                         'propuestasaprobadas' => $propuestasaprobadas
                                                         ]);
    }

    public function modificarClave()
    {
        if (isset($_POST['modificarclave'])) {
            if (isset($_POST['claveactual']) && isset($_POST['nuevaclave'])) {
                session_start();

                $autenticado = (new Auth());
                $usuario = $autenticado->autenticado();

                $actual = password_verify($_POST['claveactual'], $usuario['contraseña']);
                if ($actual > 0) {

                    $nueva = password_hash($_POST['nuevaclave'], PASSWORD_BCRYPT);
                    $autenticado->cambiarcontraseña($nueva, $usuario['cedula']);

                    $_SESSION['mensaje'] = "contraseña cambiada con exito";
                    $_SESSION['colorcito'] =  "success";
                } else {
                    $_SESSION['mensaje'] = "la contraseña que ingreso no coincide con la registrada";
                    $_SESSION['colorcito'] =  "danger";
                }
                header("Location: tesista-perfil");
            }
        } else
            header("Location: error");
    }

    public function modificarCorreo()
    {

        if (isset($_POST['modificarcorreo'])) {
            if (isset($_POST['correo'])) {
                $resultado = (new Auth())->where('correo', '=', $_POST['correo'])->getOb();

                if ($resultado > 0) {
                    session_start();
                    $_SESSION['mensaje'] = "Correo ya registrado, intente con otro correo";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    (new Tesistas())->modificarCorreo($_POST['correo']);
                    $_SESSION['mensaje'] = "Se modifico el correo con exito";
                    $_SESSION['colorcito'] = "success";
                }
                header('location:tesista-perfil');
            }
        } else
            header('location:error');
    }

    public function modificarTelefono()
    {
        if (isset($_POST['modificartelefono'])) {
            if (isset($_POST['telefono'])) {
                $resultado = (new Tesistas())->where('telefono', '=', $_POST['telefono'])->getOb();
                if ($resultado > 0) {
                    session_start();
                    $_SESSION['mensaje'] = "Telefono ya registrado, intente con otro numero";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    (new Tesistas())->modificarTelefono($_POST['telefono']);
                    $_SESSION['mensaje'] = "Se modifico el telefono con exito";
                    $_SESSION['colorcito'] = "success";
                }
            }
            header('location:tesista-perfil');
        } else
            header('location:error');
    }

    public function modificarCodigo()
    {
        if (isset($_POST['modificarcodigo'])) {
            $key = "";
            $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
            $max = strlen($pattern) - 1;
            for ($i = 0; $i <26; $i++) {
                $key .= substr($pattern, mt_rand(0, $max), 1);
            }
            (new Tesistas())->modificarcodigo($key);
            $_SESSION['mensaje'] = "Se modifico el codigo con exito";
            $_SESSION['colorcito'] = "info";
            header('location:tesista-perfil');
        } else
            header('location:error');
    }

    public function guardarpropuesta()
    {
        session_start();
        $slug="";
        if (isset($_POST['nuevapropuesta'])) {
            $tesista = (new Tesistas());
            if (($_POST['cedula']!='')  && ($_POST['codigo']!='') && isset($_POST['nombrepropuesta']) && isset($_POST['modalidad'])) {
                $slug=$this->slug($_POST['nombrepropuesta']);
                $valor = $tesista->comprobar_nombre_propuesta($slug);
                if ($valor > 0) {
                    $_SESSION['mensaje'] = "El nombre de la propuesta ya existe";
                    $_SESSION['colorcito'] = "danger";
                } else {
                    $valor = $tesista->comprobar_codigo($_POST['cedula'], $_POST['codigo']);
                    if ($valor > 0) {
                        $validar = $this->validarregistro_solo();
                        if($validar){
                            $validar = $this->validarregistro_pareja($_POST['cedula']);
                            if($validar){
                                $tesista->guardar_propuesta_pareja($slug,$_POST['nombrepropuesta'], $_POST['modalidad'], $_POST['cedula']);
                                $_SESSION['mensaje'] = "Propuesta registrada con exito";
                                $_SESSION['colorcito'] = "success";
                            }else{
                                $_SESSION['mensaje'] = "No puede su compañero ya tiene una propuesta activa. Escoja otro compañero";
                                $_SESSION['colorcito'] = "danger";                               
                            }

                        }else{
                            $_SESSION['mensaje'] = "No puede crear la propuesta porque ya tiene otra activa. Espere a que la propuesta anterior sea rechazada";
                            $_SESSION['colorcito'] = "danger";
                        }

                    } else {
                        $_SESSION['mensaje'] = "la cedula o el codigo de su compañero no coinciden";
                        $_SESSION['colorcito'] = "danger";
                    }
                }
            } else if (($_POST['cedula']=='') && ($_POST['codigo']=='') ) {
                $slug=$this->slug($_POST['nombrepropuesta']);
                $valor = $tesista->comprobar_nombre_propuesta($slug);
                if ($valor > 0) {
                    $_SESSION['mensaje'] = "El nombre de la propuesta ya existe";
                    $_SESSION['colorcito'] = "danger";
                }else{
                    $validar = $this->validarregistro_solo();
                    if($validar>0){
                        $tesista->guardarpropuesta_solo($slug,$_POST['nombrepropuesta'],$_POST['modalidad']);
                        $_SESSION['mensaje'] = "Propuesta registrada con exito";
                        $_SESSION['colorcito'] = "success";
                    }else{
                        $_SESSION['mensaje'] = "No puede crear la propuesta porque ya tiene otra activa. Espere a que la propuesta anterior sea rechazada";
                        $_SESSION['colorcito'] = "danger";
                    }
                }
            } else {
                $_SESSION['mensaje'] = "No ha llenado los campos necesarios para avanzar";
                $_SESSION['colorcito'] = "danger";
            }
        } else {
            header('location:error');
        }
        header('location:tesistas');

    }

    public function validarregistro_solo(){
        $propuesta = new PropuestaTG();
        $cuenta1=$propuesta->contar_mis_propuestas();
        if($cuenta1){
            $cuenta2=$propuesta->contar_por_evaluacion_comite();
            if($cuenta2){
                if ($cuenta1['cuenta']==$cuenta2['cuenta']){  
                    $estatus=$propuesta->ultimo_estatus_comite();
                    if($estatus){
                        if ($estatus['estatus']=='REPROBADO') {
                            return 1;
                        }else {               
                            $cuenta3=$propuesta->contar_por_evaluacion_consejo();      
                            if($cuenta3){
                                if($cuenta1['cuenta']==$cuenta3['cuenta']){
                                    $estatus=$propuesta->ultimo_estatus_consejo();
                                    if($estatus){
                                        if($estatus['estatus']==$cuenta1['REPROBADO']){
                                            return 1;
                                        }else{
                                            return 0;
                                        }
                                    }else{
                                        return 0;
                                    }
             
                                }else{
                                    return 0;
                                }                            
                            }else{
                                return 0;
                            }  
    
                        }
                    } 
                }             
                else{
                    return 0;
                } 
            }else{
                return 1;
            }

        }else{
            return 1;
        }
    }

    public function validarregistro_pareja($cedula){
        $propuesta = new PropuestaTG();
        $cuenta1=$propuesta->contar_mis_propuestas_pareja($cedula);
        if($cuenta1){
            $cuenta2=$propuesta->contar_por_evaluacion_comite_pareja($cedula);
            if($cuenta2){
                if ($cuenta1['cuenta']==$cuenta2['cuenta']){  
                    $estatus=$propuesta->ultimo_estatus_comite_pareja($cedula);
                    if($estatus){
                        if ($estatus['estatus']=='REPROBADO') {
                            return 1;
                        }else {               
                            $cuenta3=$propuesta->contar_por_evaluacion_consejo_pareja($cedula);      
                            if($cuenta3){
                                if($cuenta1['cuenta']==$cuenta3['cuenta']){
                                    $estatus=$propuesta->ultimo_estatus_consejo_pareja($cedula);
                                    if($estatus){
                                        if($estatus['estatus']==$cuenta1['REPROBADO']){
                                            return 1;
                                        }else{
                                            return 0;
                                        }
                                    }else{
                                        return 0;
                                    }
             
                                }else{
                                    return 0;
                                }                            
                            }else{
                                return 0;
                            }  
    
                        }
                    } 
                }             
                else{
                    return 0;
                } 
            }else{
                return 1;
            }

        }else{
            return 1;
        }
    }

    public function slug($propuesta)
    {
        return $propuesta = str_replace(' ', '-', strtolower(preg_replace('([^A-Za-z0-9 ])', '', trim($propuesta))));
    }

    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Tesistas');
    }
}
