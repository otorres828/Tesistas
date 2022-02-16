<?php

namespace App\Models;

use Exception;
use ModeloGenerico;
use PDO;

require_once '../Core/ModeloGenerico.php';
class Tesistas extends ModeloGenerico
{

    public function __construct($propiedades = null)
    {
        parent::__construct("tesistas", Tesistas::class, $propiedades);
    }

    public function perfil()
    {
        $cedula = (new Auth())->autenticado();
        return $this->sentenciaObj('SELECT u.nombre_usuario,t.correoparticular as correo,u.codigo,t.correoucab,t.telefono,t.comentario 
                                    FROM usuarios AS u, tesistas AS t 
                                    WHERE t.cedula=u.cedula 
                                    AND u.cedula=' . $cedula['cedula']);
    }

    public function perfilEscuelaTesista($cedula)
    {
        return $this->sentenciaObj('SELECT u.cedula,u.nombre_usuario,t.correoparticular as correo,u.codigo,t.correoucab,t.telefono,t.comentario 
                                    FROM usuarios AS u, tesistas AS t 
                                    WHERE t.cedula=u.cedula 
                                    AND u.cedula=' . $cedula);
    }

    public function modificarCorreo($correo)
    {
        $cedula = (new Auth())->autenticado();
        $this->sentenciaObj("UPDATE tesistas SET correoparticular=" . "'" . $correo . "'" . " WHERE cedula=" . $cedula['cedula']);
    }

    public function modificartelefono($telefono)
    {
        session_start();
        $cedula = (new Auth())->autenticado();
        return $this->sentenciaObj("UPDATE tesistas SET telefono=" . $telefono . "WHERE cedula=" . $cedula['cedula']);
    }

    public function modificarcodigo($codigo)
    {
        session_start();
        $cedula = (new Auth())->autenticado();
        return $this->sentenciaObj("UPDATE usuarios SET codigo=" . "'" . $codigo . "'" . " WHERE cedula=" . $cedula['cedula']);
    }

    public function comprobar_nombre_propuesta($nombre_propuesta)
    {
        return $this->sentenciaObj("SELECT slug FROM propuestatg WHERE slug=" . "'" . $nombre_propuesta . "'");
    }

    public function comprobar_codigo($cedula, $codigo)
    {
        return $this->sentenciaObj("SELECT cedula,codigo FROM usuarios WHERE cedula=" . "'" . $cedula . "'" . "AND codigo=" . "'" . $codigo . "'");
    }

    public function guardar_propuesta_pareja($slug, $nombrepropuesta, $modalidad, $cedula)
    {
        $cedula_log = $_SESSION['cedula'];
        $this->sentenciaObj("INSERT INTO propuestatg (titulo,modalidad,slug) VALUES ('$nombrepropuesta','$modalidad','$slug')");
        $num_c = $this->sentenciaObj('SELECT num_c FROM propuestatg WHERE slug=' . "'" . $slug . "'");
        $nc = $num_c['num_c'];
        $this->sentenciaObj("INSERT INTO presentan (num_c,cedula) VALUES ($nc,$cedula_log)");
        $this->sentenciaObj("INSERT INTO presentan (num_c,cedula) VALUES ($nc,$cedula)");
    }

    public function guardarpropuesta_solo($slug, $nombrepropuesta, $modalidad)
    {
        $cedula_log = $_SESSION['cedula'];
        $this->sentenciaObj("INSERT INTO propuestatg (titulo,modalidad,slug) VALUES ('$nombrepropuesta','$modalidad','$slug')");
        $num_c = $this->sentenciaObj('SELECT num_c FROM propuestatg WHERE slug=' . "'" . $slug . "'");
        $nc = $num_c['num_c'];
        $this->sentenciaObj("INSERT INTO presentan (num_c,cedula) VALUES ($nc,$cedula_log)");
    }

    //CREAR TESISTAS 
    //validar cedula
    public function validarcedula($cedula)
    {
        $resultado = $this->sentenciaObj("SELECT cedula FROM tesistas WHERE cedula=$cedula");
        if ($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function validarcorreoucab($correoucab)
    {
        $resultado = $this->sentenciaObj("SELECT correoucab FROM tesistas WHERE correoucab='$correoucab'");
        if ($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function validarcorreoparticular($correoparticular)
    {
        $resultado = $this->sentenciaObj("SELECT correoparticular FROM tesistas WHERE correoparticular='$correoparticular'");
        if ($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function validartelefono($telefono)
    {
        $resultado = $this->sentenciaObj("SELECT telefono FROM tesistas WHERE telefono='$telefono'");
        if ($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function insertartesista($cedula, $nombre, $correoucab, $correoparticular, $telefono)
    {
        $query = "INSERT INTO  tesistas (cedula,nombre,correoucab,correoparticular,telefono) VALUES($cedula,'$nombre','$correoucab','$correoparticular','$telefono')";
        $this->insertarObj($query);
        $contraseña = password_hash($cedula, PASSWORD_BCRYPT);
        $sql = "INSERT INTO  usuarios (cedula,nombre_usuario,correo,contraseña,modelo,codigo) VALUES($cedula,'$nombre','$correoucab','$contraseña','Tesistas','$contraseña')";
        $this->insertarObj($query);
        $this->insertarObj($sql);
    }

    public function insertartesistaconcomentario($cedula, $nombre, $correoucab, $correoparticular, $telefono, $comentario)
    {
        $query = "INSERT INTO  tesistas (cedula,nombre,correoucab,correoparticular,telefono,comentario) VALUES($cedula,'$nombre','$correoucab','$correoparticular','$telefono','$comentario')";
        $contraseña = password_hash($cedula, PASSWORD_BCRYPT);
        $sql = "INSERT INTO  usuarios (cedula,nombre_usuario,correo,contraseña,modelo,codigo) VALUES($cedula,'$nombre','$correoucab','$contraseña','Tesistas','$contraseña')";
        $this->insertarObj($query);
        $this->insertarObj($sql);
    }

    public function validarEliminar($cedula)
    {
        $this->sql = "SELECT COUNT (num_c) AS cuenta 
                          FROM presentan 
                          WHERE cedula=$cedula
                          GROUP BY(cedula)";
        $resultado = $this->sentenciaObj($this->sql);
        if ($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarTesista($cedula)
    {
        $this->sentenciaObj("DELETE FROM tesistas WHERE cedula=$cedula");
        $this->sentenciaObj("DELETE FROM usuarios WHERE cedula=$cedula");
    }

    public function misjurados($num_c, $modalidad)
    {
        if ($modalidad == 'I') {
            return $this->sentenciaAll("SELECT p.nombre,p.cedula 
            FROM ES_JURADO_INSTRUMENTAL AS es, profesores AS p
            WHERE es.num_c=$num_c
            AND p.cedula=es.cedula");
        } else {
            return $this->sentenciaAll("SELECT p.nombre,p.cedula 
            FROM ES_JURADO_EXPERIMENTAL AS es, profesores AS p
            WHERE es.num_c=$num_c
            AND p.cedula=es.cedula");
        }
    }

    public function miTutoracademico($num_c)
    {
        return $this->sentenciaObj("SELECT p.nombre 
                                    FROM propuestatg AS ptg, profesores AS p
                                    WHERE ptg.num_c=$num_c
                                    AND p.cedula=ptg.cedula_tutor");
    }

    public function notafinal($cedula, $num_c, $modalidad)
    {
        if ($modalidad == 'E') {
            $jurados = $this->sentenciaAll("SELECT * FROM es_jurado_experimental WHERE num_c=$num_c");
            $acumulativo = 0;
            foreach ($jurados as $jurado) {
                $cedulajurado = $jurado['cedula'];

                $nota = $this->sentenciaObj("SELECT SUM(NOTA) as nota
                                        FROM es_evaluado_por_jurado
                                        WHERE cedula=$cedula
                                          AND cedula_jurado=$cedulajurado");
                $acumulativo = $acumulativo + $nota['nota'];
            }
            $notatutor = $this->sentenciaObj("SELECT SUM(NOTA) AS nota
                                            FROM evalua_experimental
                                            WHERE num_c=$num_c");
            $notafinal = ($acumulativo + $notatutor['nota']) / 3;
            return $notafinal;
        } else {
            $jurados = $this->sentenciaAll("SELECT * FROM es_jurado_instrumental WHERE num_c=$num_c");
            $acumulativo = 0;
            foreach ($jurados as $jurado) {
                $cedulajurado = $jurado['cedula'];

                $nota = $this->sentenciaObj("SELECT SUM(NOTA) as nota
                                            FROM es_evaluado_por_jurado
                                            WHERE cedula=$cedula
                                              AND cedula_jurado=$cedulajurado");
                $acumulativo = $acumulativo + $nota['nota'];
            }
            $notatutor = $this->sentenciaObj("SELECT SUM(NOTA) AS nota
                                                FROM evalua_instrumental
                                                WHERE num_c=$num_c");
            $notafinal = ($acumulativo + $notatutor['nota']) / 3;
            return $notafinal;
        }
    }

    //PROFESORES
    public function tesistasdeunapropuesta($num_c)
    {
        return $this->sentenciaAll("SELECT t.* FROM tesistas as t, presentan as p WHERE p.cedula=t.cedula AND p.num_c= $num_c");
    }
}
