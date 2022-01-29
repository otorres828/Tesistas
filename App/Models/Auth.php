<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class Auth extends ModeloGenerico{
  
    public function __construct($propiedades = null) {
        parent::__construct("usuarios", Auth::class, $propiedades);
    }

    public function correo($correo){
        $resultado=$this->where('correo','=',$correo)->getOb();
        // $query = $this->conexion->prepare('SELECT * FROM users WHERE email = :correo');
        // $query->bindParam(':correo', $correo);
        // $query->execute();
        // $resultado = $query->fetch(PDO::FETCH_ASSOC);
        if($resultado>0){
            return 1;
        }
        return 0;
    }

    public function clave($correo, $clave){
        $resultado=$this->where('correo','=',$correo)->getOb();
        $cla=password_verify($clave, $resultado['contraseña']);
        if($cla>0){    
            return 1;     
        }else{
            return 0;           
        }
       
    }

    public  function verificado(){
        session_start();
        if(!isset($_SESSION['cedula']) && !isset($_SESSION['modelo'])){
            session_destroy();
            header("Location: login");                   
        }
    }

    public function rol($tabla){
        if(isset($_SESSION['modelo']))
            if($_SESSION['modelo']!=$tabla)
                header("Location: error");                   
    }

    public function autenticado(){
        return $this->where('cedula','=',$_SESSION['cedula'])->getOb();
    }
}