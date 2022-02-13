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
        
        $count= $this->sentenciaObj("SELECT MAX (id_area) as id FROM areas");
        $count=$count['id'];
        if ($count) {
            $count=$count+1;
            $this->insertarObj("INSERT INTO areas(id_area,nombre,slug) VALUES($count,'$nombre','$slug')");
        } else {
            $this->insertarObj("INSERT INTO areas VALUES(1,'$nombre','$slug')");
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

    public function especializacion_profesores(){
        return $this->sentenciaAll('SELECT p.cedula,p.nombre 
                                    FROM se_especializan AS se, profesores AS p,areas AS a
                                    WHERE p.cedula=se.cedula
                                    AND a.id_area=se.id_area
                                    GROUP BY(p.cedula,p.nombre)');
    }

    public function validarEspecializacionProfesor($cedula,$idarea){
        $sql="SELECT * FROM se_especializan  
                        WHERE cedula=$cedula
                        AND id_area=$idarea";
        $resultado= $this->sentenciaObj($sql);
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    public function AsignarEspecializacion($cedula,$idarea){
        $this->insertarObj("INSERT INTO se_especializan (cedula,id_area) VALUES($cedula,$idarea)");
    }
    
    public function eliminar_Especializacion_Profesor($cedula,$idarea){
        return $this->sentenciaObj("DELETE FROM se_especializan WHERE cedula=$cedula AND id_area=$idarea");
    }
}
