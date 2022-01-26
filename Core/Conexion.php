<?php

class Conexion {

    private $conexion;
    private $configuracion = [
        "driver" => "mysql",
        "host" => "localhost",
        "database" => "mansiondecristo",
        "port" => "3306",
        "username" => "root",
        "password" => "",
        "charset" => "utf8mb4"
    ];

    public function __construct() {
        
    }

    public function conectar() {
        try {
            // $CONTROLADOR = $this->configuracion["driver"];
            // $SERVIDOR = $this->configuracion["host"];
            // $BASE_DATOS = $this->configuracion["database"];
            // $PUERTO = $this->configuracion["port"];
            // $USUARIO = $this->configuracion["username"];
            // $CLAVE = $this->configuracion["password"];
            // $CODIFICACION = $this->configuracion["charset"];

            // $url = "{$CONTROLADOR}:host={$SERVIDOR}:{$PUERTO};"
            //         . "dbname={$BASE_DATOS};charset={$CODIFICACION}";
            // //Se crea la conexión.
            // $this->conexion = new PDO($url, $USUARIO, $CLAVE);

            $contraseña = "26269828";
            $usuario = "postgres";
            $nombreBaseDeDatos = "Tesistas";
            $rutaServidor = "localhost";
            $puerto = "5432";
            try {
                $this->conexion = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos",$usuario,$contraseña);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo "Ocurrió un error con la base de datos: " . $e->getMessage();
            }
            
            return $this->conexion;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
