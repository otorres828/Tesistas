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
    $this->sql = "SELECT ptg.num_c,ptg.titulo,ptg.modalidad,ptg.observaciones,p.nombre as tutor,ptg.fecha_defensa,ec.estatus,ecj.estatus as estatusc 
                      FROM propuestatg AS ptg,evaluacioncomite AS ec,evaluacionconsejo AS ecj,profesores AS p
                      WHERE ptg.num_c=ec.num_c
                        AND ptg.cedula_tutor=p.cedula 
                        AND ptg.num_c=ecj.num_c
                        AND ec.estatus='APROBADO'
                        AND ecj.estatus='APROBADO'
                        AND ptg.num_c = ANY(SELECT Num_C FROM Presentan WHERE Cedula =$cedula)";
    return $this->sentenciaAll($this->sql);
  }

  //LISTADO DE MIS PROPUESTAS
  public function mispropuestas($cedula)
  {
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
  public function getModalidad($num_c)
  {
    $sql = "SELECT modalidad FROM propuestatg WHERE num_c=$num_c";
    return $this->sentenciaObj($sql);
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



  //PARA EVALUACION COMITE, TRAER LAS PROPUESTAS QUE NO HAN SIDO EVALUADAS
  public function propuestasNoEvaluadasPorElComite()
  {
    $sql = "SELECT * FROM propuestatg AS ptg  WHERE ptg.num_c NOT IN (SELECT num_c FROM evaluacioncomite) ORDER BY ptg.num_c ASC";
    return $this->sentenciaAll($sql);
  }


  //PARA EVALUACION consejo, TRAER LAS PROPUESTAS QUE NO HAN SIDO EVALUADAS
  public function propuestasAprobadasPorComite()
  {
    // $sql = "SELECT ptg.num_c,ptg.titulo,ptg.modalidad 
    //         FROM propuestatg as ptg,evaluacioncomite as ec 
    //         WHERE ptg.num_c = ec.num_c 
    //           AND ec.estatus='APROBADO' 
    //           AND ptg.num_c 
    //           NOT IN (SELECT num_c FROM evaluacionconsejo)";
    $sql = "SELECT ptg.num_c,ptg.titulo,ptg.modalidad 
            FROM propuestatg as ptg,evaluacioncomite as ec 
            WHERE ptg.num_c = ec.num_c 
              AND ec.estatus='APROBADO' 
              AND ptg.num_c
              NOT IN (SELECT num_c FROM evaluacionconsejo)
            GROUP BY (ptg.num_c)
            HAVING (SELECT count(nota) from revisa_experimental 
            WHERE num_c IN (SELECT num_c 
                      FROM propuestatg 
                      WHERE cedula_revisor IS NOT NULL)
              AND nota='APROBADO')>=((SELECT count(nota) FROM revisa_experimental)*0.5) ";

    return $this->sentenciaAll($sql);
  }


  public function evaluadosComiteYNoConsejo()
  {
    $sql = "";
    return $this->sentenciaAll($sql);
  }

  //PARA TRABAJOS DE GRADO
  public function aprobados()
  {
    return $this->sentenciaAll("SELECT ptg.*
      FROM presentan AS p,evaluacioncomite AS ec,evaluacionconsejo AS ecj,propuestatg AS ptg
      WHERE p.num_c=ptg.num_c
      AND p.num_C=ec.num_c
      AND ec.num_c=ecj.num_c
      AND ec.estatus='APROBADO'
      AND ecj.estatus='APROBADO'
      GROUP BY(ptg.num_c)");
  }
}
