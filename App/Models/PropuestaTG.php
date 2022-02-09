<?php

namespace App\Models;

use ModeloGenerico;

require_once '../Core/ModeloGenerico.php';
class PropuestaTG extends ModeloGenerico
{
  public $sql;

  public function __construct($propiedades = null)
  {
    parent::__construct("propuestatg", PropuestaTG::class, $propiedades);
  }
  //PERFIL PROPUESTAS APROBADAS
  public function mispropuestasaprobadas()
  {
    $cedula = $_SESSION['cedula'];
    $this->sql = "SELECT ptg.num_c,ptg.titulo,ptg.modalidad,ptg.observaciones,ec.estatus,ecj.estatus as estatusc 
                      FROM propuestatg AS ptg,evaluacioncomite AS ec,evaluacionconsejo AS ecj
                      WHERE ptg.num_c=ec.num_c
                        AND ptg.num_c=ecj.num_c
                        AND ec.estatus='APROBADO'
                        AND ecj.estatus='APROBADO'
                        AND ptg.num_c = ANY(SELECT Num_C FROM Presentan WHERE Cedula =$cedula)";
    return $this->sentenciaAll($this->sql);
  }
  public function obtenerdatos(){
    // $this->sql = "SELECT p.cedula,ptg.num_c,ptg.titulo,ptg.modalidad,ptg.observaciones,ptg.id_comite as estatus,ptg.nro_consejo as estatusc 
    // FROM propuestatg AS ptg,  presentan AS p 
    // WHERE  ptg.num_c=p.num_c
    // AND cedula =$cedula";
    return $this->sentenciaAll($this->sql);
  }
  public function mispropuestas($cedula)
  {
    // $this->sql = "SELECT ptg.num_c,ptg.titulo,ptg.modalidad,ptg.observaciones,ec.estatus,ecj.estatus as estatusc 
    //               FROM propuestatg AS ptg,evaluacioncomite AS ec,evaluacionconsejo AS ecj
    //               WHERE ptg.num_c=ec.num_c
    //               AND ptg.num_c=ecj.num_c
    //               AND ptg.num_c = ANY(SELECT Num_C FROM Presentan WHERE Cedula =$cedula)";             
    $this->sql = "SELECT p.cedula,ptg.num_c,ptg.titulo,ptg.modalidad,ptg.observaciones,ptg.id_comite as estatus,ptg.nro_consejo as estatusc 
                    FROM propuestatg AS ptg,  presentan AS p 
                    WHERE  ptg.num_c=p.num_c
                    AND cedula =$cedula";
    return $this->sentenciaAll($this->sql);
  }

  public function contar_mis_propuestas()
  {
    $cedula = $_SESSION['cedula'];
    $this->sql = "SELECT COUNT (num_c) AS cuenta 
                      FROM presentan 
                      WHERE cedula=$cedula
                      GROUP BY(cedula)";
    return $this->sentenciaObj($this->sql);
  }

  public function contar_por_evaluacion_comite()
  {
    $cedula = $_SESSION['cedula'];
    $this->sql = "SELECT COUNT  (e.num_c) AS cuenta 
                      FROM evaluacioncomite AS e,propuestatg as ptg, presentan AS p
                      WHERE e.num_c=ptg.num_c
                        AND  p.num_c=ptg.num_c
                        AND p.cedula=$cedula
                      GROUP BY (p.cedula)";
    return $this->sentenciaObj($this->sql);
  }

  public function contar_por_evaluacion_consejo()
  {
    $cedula = $_SESSION['cedula'];
    $this->sql = "SELECT COUNT  (e.num_c) AS cuenta 
                      FROM evaluacionconsejo AS e,propuestatg as ptg, presentan AS p
                      WHERE e.num_c=ptg.num_c
                        AND  p.num_c=ptg.num_c
                        AND p.cedula=$cedula
                      GROUP BY (p.cedula)";
    return $this->sentenciaObj($this->sql);
  }

  public function ultimo_estatus_comite()
  {
    $cedula = $_SESSION['cedula'];
    $this->sql = "SELECT e.estatus 
                  FROM evaluacioncomite AS e,propuestatg as ptg, presentan AS p
                  WHERE e.num_c=ptg.num_c
                    AND  p.num_c=ptg.num_c
                    AND p.cedula=$cedula
                  GROUP BY (e.num_c,e.id_comite)
                  ORDER BY(e.num_c) DESC
                  limit 1";
    return $this->sentenciaObj($this->sql);
  }

  public function ultimo_estatus_consejo()
  {
    $cedula = $_SESSION['cedula'];
    $this->sql = "SELECT COUNT  (e.num_c) AS cuenta 
                      FROM evaluacionconsejo AS e,propuestatg as ptg, presentan AS p
                      WHERE e.num_c=ptg.num_c
                        AND  p.num_c=ptg.num_c
                        AND p.cedula=$cedula
                      GROUP BY (p.cedula)";
    return $this->sentenciaObj($this->sql);
  }
  //REGISTRO DE PAREJA
  public function contar_mis_propuestas_pareja($cedula)
  {
    $this->sql = "SELECT COUNT (num_c) AS cuenta 
                      FROM presentan 
                      WHERE cedula=$cedula
                      GROUP BY(cedula)";
    return $this->sentenciaObj($this->sql);
  }
 
  public function contar_por_evaluacion_comite_pareja($cedula)
  {
    $this->sql = "SELECT COUNT  (e.num_c) AS cuenta 
                      FROM evaluacioncomite AS e,propuestatg as ptg, presentan AS p
                      WHERE e.num_c=ptg.num_c
                        AND  p.num_c=ptg.num_c
                        AND p.cedula=$cedula
                      GROUP BY (p.cedula)";
    return $this->sentenciaObj($this->sql);
  }

  public function ultimo_estatus_comite_pareja($cedula)
  {
    $this->sql = "SELECT e.estatus 
                  FROM evaluacioncomite AS e,propuestatg as ptg, presentan AS p
                  WHERE e.num_c=ptg.num_c
                    AND  p.num_c=ptg.num_c
                    AND p.cedula=$cedula
                  GROUP BY (e.num_c,e.id_comite)
                  ORDER BY(e.num_c) DESC
                  limit 1";
    return $this->sentenciaObj($this->sql);
  }

  public function contar_por_evaluacion_consejo_pareja($cedula)
  {
    $this->sql = "SELECT COUNT  (e.num_c) AS cuenta 
                      FROM evaluacionconsejo AS e,propuestatg as ptg, presentan AS p
                      WHERE e.num_c=ptg.num_c
                        AND  p.num_c=ptg.num_c
                        AND p.cedula=$cedula
                      GROUP BY (p.cedula)";
    return $this->sentenciaObj($this->sql);
  }

  public function ultimo_estatus_consejo_pareja($cedula)
  {
    $this->sql = "SELECT COUNT  (e.num_c) AS cuenta 
                      FROM evaluacionconsejo AS e,propuestatg as ptg, presentan AS p
                      WHERE e.num_c=ptg.num_c
                        AND  p.num_c=ptg.num_c
                        AND p.cedula=$cedula
                      GROUP BY (p.cedula)";
    return $this->sentenciaObj($this->sql);
  }

  

}
