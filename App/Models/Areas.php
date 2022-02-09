<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class Areas extends ModeloGenerico
{
    public function __construct($propiedades = null)
    {
        parent::__construct("areas", Areas::class, $propiedades);
    }
    public $sql;

    public function crearArea($nombre, $slug)
    {
        
        $count= $this->sentenciaObj("SELECT COUNT (id_area) as id FROM areas");
        $count=$count['id'];
        if ($count) {
            $count=$count+1;
            $this->sentenciaObj("INSERT INTO areas(id_area,nombre,slug) VALUES($count,'$nombre','$slug')");
        } else {
            $this->sentenciaObj("INSERT INTO areas VALUES(1,'$nombre','$slug'");
        }
    }
    
    public function modificarArea($nombre, $slug, $id)
    {
        return $this->sentenciaObj("UPDATE areas set nombre='$nombre', slug='$slug'
                                    WHERE id_area=$id");
    }

    public function eliminarArea($id)
    {
        return $this->sentenciaObj("DELETE FROM areas WHERE id_area=$id");
    }
}
