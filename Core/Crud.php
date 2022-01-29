<?php
require_once 'Conexion.php';

class Crud {

    protected $tabla;
    protected $conexion;
    protected $wheres = "";
    protected $sql = null;

    public function __construct($tabla = null) {
        $this->conexion = (new Conexion())->conectar();
        $this->tabla = $tabla;
    }
    // Devuelve un array que contiene todas las filas del conjunto de resultados
    public function get() {
        try {
            $this->sql = "SELECT * FROM {$this->tabla} {$this->wheres}";
            $query = $this->conexion->prepare($this->sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
     // Devuelve la siguiente fila de un conjunto de resultados
     public function getOb() {
        try {
            $this->sql = "SELECT * FROM {$this->tabla} {$this->wheres}";
            $query = $this->conexion->prepare($this->sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }   

    public function first() {
        $lista = $this->get();
        if (count($lista) > 0) {
            return $lista[0];
        } else {
            return null;
        }
    }

    public function insert($obj) {
        try {
            $campos = implode("`, `", array_keys($obj)); //nombre`, `apellido`, `edad
            $valores = ":" . implode(", :", array_keys($obj)); //:nombre, :apellido, :edad
            $this->sql = "INSERT INTO {$this->tabla} (`{$campos}`) VALUES ({$valores})";
            $this->ejecutar($obj);
            $id = $this->conexion->lastInsertId();
            return $id;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function update($obj) {
        try {
            $campos = "";
            foreach ($obj as $llave => $valor) {
                $campos .= "`$llave`=:$llave,"; //`nombres`=:nombres,`edad`=:edad
            }
            $campos = rtrim($campos, ",");
            $this->sql = "UPDATE {$this->tabla} SET {$campos} {$this->wheres}";
            $filasAfectadas = $this->ejecutar($obj);
            return $filasAfectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function delete() {
        try {
            $this->sql = "DELETE FROM {$this->tabla} {$this->wheres}";
            $filesAfectadas = $this->ejecutar();
            return $filesAfectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    //strpos = encuentra la posicion de la primera ocurrencia
    public function where($llave, $condicion, $valor) {
        $this->wheres .= (strpos($this->wheres, "WHERE")) ? " AND " : " WHERE ";
        $valor = "'" .$valor."'";
        $this->wheres .= "$llave $condicion  $valor  ";
        return $this;
    }

    public function orWhere($llave, $condicion, $valor) {
        $this->wheres .= (strpos($this->wheres, "WHERE")) ? " OR " : " WHERE ";
        //"\"$valor\"" 
        $valor = "'" .$valor."'";
        $this->wheres .= "$llave $condicion " . ((is_string($valor)) ? $valor: $valor) . " ";
        return $this;
    }

    private function ejecutar($obj = null) {
        $sth = $this->conexion->prepare($this->sql);
        if ($obj !== null) {
            foreach ($obj as $llave => $valor) {
                if (empty($valor)) {
                    $valor = NULL;
                }
                $sth->bindValue(":$llave", $valor);
            }
        }
        $sth->execute();
        $this->reiniciarValores();
        return $sth->rowCount();
    }

    private function reiniciarValores() {
        $this->wheres = "";
        $this->sql = null;
    }

    public function sentencia($obj){
        try {
            $query = $this->conexion->prepare($obj);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }  
    }

}
