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
        $this->modificarCodigo();
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
        $tesista = (new Tesistas())->query();
        View::render('tesistas/perfil.php', ['tesista' => $tesista]);
    }

    public function propuestasaprobadas()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Tesistas');

        $tesista = (new Auth())->where('cedula', '=', $_SESSION['cedula'])->getOb();
        $propuestasaprobadas = "";
        View::render('tesistas/propuestasaprobadas.php', [
            'tesista' => $tesista,
            'propuestasaprobadas' => $propuestasaprobadas
        ]);
    }

    public function modificarClave(){
        if (isset($_POST['modificarclave'])) {
            if (isset($_POST['claveactual']) && isset($_POST['nuevaclave'])) {
                session_start();
         
                $autenticado = (new Auth());
                $usuario=$autenticado->autenticado();

                $actual = password_verify($_POST['claveactual'], $usuario['contraseña']);
                if ($actual > 0) {

                    $nueva = password_hash($_POST['nuevaclave'], PASSWORD_BCRYPT);
                    
                    $autenticado->cambiarcontraseña($nueva,$usuario['cedula']);
                    
                    $_SESSION['mensaje'] = "contraseña cambiada con exito";
                    $_SESSION['colorcito'] =  "success";
                } else {
                    $_SESSION['mensaje'] = "la contraseña que ingreso no coincide con la registrada";
                    $_SESSION['colorcito'] =  "danger";
                }

            }
        }
        header("Location: tesista-perfil");

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
        }
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
                header('location:tesista-perfil');
            }
        }
    }

    public function modificarCodigo()
    {
        if (isset($_POST['modificarcodigo'])) {
            $key = "";
            $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
            $max = strlen($pattern) - 1;
            for ($i = 0; $i < 26; $i++) {
                $key .= substr($pattern, mt_rand(0, $max), 1);
            }
            (new Tesistas())->modificarcodigo($key);
            $_SESSION['mensaje'] = "Se modifico el codigo con exito";
            $_SESSION['colorcito'] = "info";
            header('location:tesista-perfil');
        }
    }


    private function autenticar()
    {
        $autenticacion = new Auth();
        $autenticacion->verificado();
        $autenticacion->rol('Tesistas');
    }
}
