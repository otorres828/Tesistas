<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class PropuestaTG extends ModeloGenerico{
    public $sql;
    
    public function __construct($propiedades = null) {
        parent::__construct("propuestatg", PropuestaTG::class, $propiedades);
    }

    public function mispropuestasaprobadas(){
        $cedula=$_SESSION['cedula'];
        $this->sql = "SELECT ptg.num_c,ptg.titulo,ptg.modalidad,ptg.observaciones,ec.estatus,ecj.estatus as estatusc 
                      FROM propuestatg AS ptg,evaluacioncomite AS ec,evaluacionconsejo AS ecj
                      WHERE ptg.num_c=ec.num_c
                      AND ptg.num_c=ecj.num_c
                      AND ptg.num_c = ANY(SELECT Num_C FROM Presentan WHERE Cedula =$cedula)";             
        return $this->sentenciaAll($this->sql);        
    }

    public function mispropuestas($cedula){
        $this->sql = "SELECT ptg.num_c,ptg.titulo,ptg.modalidad,ptg.observaciones,ec.estatus,ecj.estatus as estatusc 
                      FROM propuestatg AS ptg,evaluacioncomite AS ec,evaluacionconsejo AS ecj
                      WHERE ptg.num_c=ec.num_c
                      AND ptg.num_c=ecj.num_c
                      AND ptg.num_c = ANY(SELECT Num_C FROM Presentan WHERE Cedula =$cedula)";             
        return $this->sentenciaAll($this->sql);
    }

    public function contar_mis_propuestas(){
        $cedula= $_SESSION['cedula'];
        $this->sql = "SELECT COUNT (num_c) AS cuenta 
                      FROM presentan 
                      WHERE cedula=$cedula
                      GROUP BY(cedula)"; 
        return $this->sentenciaObj($this->sql);          
    }

    public function contar_por_evaluacion_comite(){
        $cedula= $_SESSION['cedula'];
        $this->sql = "SELECT COUNT  (e.num_c) AS cuenta 
                      FROM evaluacioncomite AS e,propuestatg as ptg, presentan AS p
                      WHERE e.num_c=ptg.num_c
                        AND  p.num_c=ptg.num_c
                        AND p.cedula=$cedula
                      GROUP BY (p.cedula)";
        return $this->sentenciaObj($this->sql);          
    }

    public function contar_reprobados_evaluacion_comite(){
         $cedula= $_SESSION['cedula'];
        $this->sql = "SELECT COUNT  (e.num_c) AS cuenta 
                      FROM evaluacioncomite AS e,propuestatg as ptg, presentan AS p
                      WHERE e.num_c=ptg.num_c
                        AND  p.num_c=ptg.num_c
                        AND e.estatus='REPROBADO'
                        AND p.cedula=$cedula
                      GROUP BY (p.cedula)";
        return $this->sentenciaObj($this->sql);           
    }

    public function contar_por_evaluacion_consejo(){
        $cedula= $_SESSION['cedula'];
        $this->sql = "SELECT COUNT  (e.num_c) AS cuenta 
                      FROM evaluacionconsejo AS e,propuestatg as ptg, presentan AS p
                      WHERE e.num_c=ptg.num_c
                        AND  p.num_c=ptg.num_c
                        AND p.cedula=$cedula
                      GROUP BY (p.cedula)";
        return $this->sentenciaObj($this->sql);     
    }

    public function contar_reprobados_evaluacion_consejo(){
        $cedula= $_SESSION['cedula'];
        $this->sql = "SELECT COUNT  (e.num_c) AS cuenta 
                      FROM evaluacionconsejo AS e,propuestatg as ptg, presentan AS p
                      WHERE e.num_c=ptg.num_c
                        AND  p.num_c=ptg.num_c
                        AND e.estatus='REPROBADO'
                        AND p.cedula=$cedula
                      GROUP BY (p.cedula)";
        return $this->sentenciaObj($this->sql);           
    }

    public function contar_propuestas_compañero($cedula){
        $this->sql = "SELECT COUNT (num_c) AS cuenta 
                      FROM presentan 
                      WHERE cedula=$cedula
                      GROUP BY(cedula)"; 
        return $this->sentenciaObj($this->sql);  
    }

    public function contar_por_evaluacion_comite_compañero($cedula){
        $this->sql = "SELECT COUNT  (e.num_c) AS cuenta 
                      FROM evaluacioncomite AS e,propuestatg as ptg, presentan AS p
                      WHERE e.num_c=ptg.num_c
                        AND  p.num_c=ptg.num_c
                        AND p.cedula=$cedula
                      GROUP BY (p.cedula)";
        return $this->sentenciaObj($this->sql);  
    }
}