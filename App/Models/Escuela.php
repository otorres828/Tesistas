<?php

namespace App\Models;

use Exception;
use ModeloGenerico;
use PDO;

require_once '../Core/ModeloGenerico.php';
class Escuela extends ModeloGenerico
{

    public function __construct($propiedades = null)
    {
        parent::__construct("Escuela", Auth::class, $propiedades);
    }

    public function estadisticas()
    {
        $sql = "SELECT COUNT(*) AS cantidadprofesores FROM Profesores";
        $profesores = $this->sentenciaObj($sql);

        $sql = "SELECT COUNT(*) AS cantidadtesistas FROM Tesistas";
        $tesistas = $this->sentenciaObj($sql);

        $sql = "SELECT COUNT(*) AS cantidadpropuestasTG FROM PropuestaTG";
        $propuestasTG = $this->sentenciaObj($sql);


        return [
            'cantidad-profesores' => $profesores,
            'cantidad-tesistas' => $tesistas,
            'cantidad-propuestasTG' => $propuestasTG
        ];
    }
}
