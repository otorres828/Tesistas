<?php

namespace App\Models;

use Exception;
use ModeloGenerico;
use PDO;

require '../Core/ModeloGenerico.php';
class Auth extends ModeloGenerico{
  
    public function __construct($propiedades = null) {
        parent::__construct("users", Auth::class, $propiedades);
    }

    public function correo($correo){
        $resultado=$this->where('email','=',$correo)->getOb();
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
        $resultado=$this->where('email','=',$correo)->getOb();
        $cla=password_verify($clave, $resultado['password']);
        if($cla>0){
            // session_start();
            // $_SESSION['user_id'] = $resultado['id'];
            // $_SESSION['username']=  $resultado['name'];
            return 1;
        }else{
            return 0;           
        }
       
    }
}