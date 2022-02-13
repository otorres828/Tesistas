<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class Empresas extends ModeloGenerico
{
    public function __construct($propiedades = null)
    {
        parent::__construct("empresas", Empresas::class, $propiedades);
    }
    public $sql;

    public function crear($nombre,$slug)
    {
        $this->insertarObj("INSERT INTO empresas VALUES('$nombre','$slug')");
      
    }
    
    public function modificar($nombre, $slug, $sluganterior)
    {
        return $this->sentenciaObj("UPDATE empresas set nombre='$nombre', slug='$slug'
                                    WHERE slug='$sluganterior'");
    }

    public function eliminar($slug)
    {
        return $this->sentenciaObj("DELETE FROM empresas WHERE slug='$slug'");
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
