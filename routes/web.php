<?php

$router = new Core\Router();
$router->add('', ['controller' => 'autenticacion\AuthController', 'method' => 'index']);

//=====================================ERRORES
$router->add('error', ['controller' => 'autenticacion\AuthController', 'method' => 'error']);
$router->add('error-redirect', ['controller' => 'autenticacion\AuthController', 'method' => 'redirect']);
$router->add('test', ['controller' => 'autenticacion\AuthController', 'method' => 'test']);

//=====================================LOGIN
$router->add('login', ['controller' => 'autenticacion\AuthController', 'method' => 'index']);
$router->add('login-iniciar', ['controller' => 'autenticacion\AuthController', 'method' => 'comprobarLogin']);
$router->add('login-cerrarsesion', ['controller' => 'autenticacion\AuthController', 'method' => 'cerrarSesion']);

//=====================================TESISTAS
$router->add('tesistas', ['controller' => 'tesistas\TesistasController', 'method' => 'index']);
$router->add('tesista-perfil', ['controller' => 'tesistas\TesistasController', 'method' => 'perfil']);
$router->add('tesista-perfil-modificarTelefono', ['controller' => 'tesistas\TesistasController', 'method' => 'modificarTelefono']);
$router->add('tesista-perfil-modificarCodigo', ['controller' => 'tesistas\TesistasController', 'method' => 'modificarCodigo']);
$router->add('tesista-perfil-modificarCorreo', ['controller' => 'tesistas\TesistasController', 'method' => 'modificarCorreo']);
$router->add('tesista-perfil-modificarClave', ['controller' => 'tesistas\TesistasController', 'method' => 'modificarClave']);
$router->add('tesistas-guardar-propuesta', ['controller' => 'tesistas\TesistasController', 'method' => 'guardarpropuesta']);
$router->add('tesista-propuestas-aprobadas', ['controller' => 'tesistas\TesistasController', 'method' => 'mispropuestasaprobadas']);
$router->add('propuestas-aprobadas-imprimir', ['controller' => 'tesistas\TesistasController', 'method' => 'reporte']);


//=====================================PROFESORES
$router->add('profesores', ['controller' => 'profesores\ProfesorController', 'method' => 'index']);
$router->add('profesor-perfil', ['controller' => 'profesores\ProfesorController', 'method' => 'perfil']);
$router->add('profesor-revisor', ['controller' => 'profesores\RevisorController', 'method' => 'revisor']);
$router->add('profesor-revisor-evaluar', ['controller' => 'profesores\RevisorController', 'method' => 'evaluarRevisor']);
$router->add('profesor-revisor-evaluar-enviar', ['controller' => 'profesores\RevisorController', 'method' => 'formularioRevisor']);
$router->add('profesor-tutor', ['controller' => 'profesores\TutorController', 'method' => 'tutor']);
$router->add('profesor-tutor-evaluar', ['controller' => 'profesores\TutorController', 'method' => 'evaluarTutor']);

$router->add('profesor-jurado', ['controller' => 'profesores\JuradoController', 'method' => 'jurado']);

//=====================================ESCUELA
$router->add('escuela', ['controller' => 'escuela\EscuelaController', 'method' => 'index']);
$router->add('escuela-perfil', ['controller' => 'escuela\EscuelaController', 'method' => 'perfil']);
$router->add('escuela-perfil-modificarClave', ['controller' => 'escuela\EscuelaController', 'method' => 'modificarClave']);
$router->add('escuela-perfil-modificarCorreo', ['controller' => 'escuela\EscuelaController', 'method' => 'modificarCorreo']);

// Tesistas
$router->add('escuela-tesistas', ['controller' => 'escuela\TesistaController', 'method' => 'tesistasTodos']);
$router->add('escuela-tesistas-cargar', ['controller' => 'escuela\TesistaController', 'method' => 'tesistasCargar']);
$router->add('escuela-tesistas-crear', ['controller' => 'escuela\TesistaController', 'method' => 'crearTesista']);
$router->add('escuela-tesistas-eliminar', ['controller' => 'escuela\TesistaController', 'method' => 'eliminarTesista']);
$router->add('escuela-tesistas-mostrar-tesista', ['controller' => 'escuela\TesistaController', 'method' => 'mostrarTesista']);

// Profesores

$router->add('escuela-profesores', ['controller' => 'escuela\ProfesorController', 'method' => 'index']);
$router->add('escuela-profesor-revisor', ['controller' => 'escuela\ProfesorController', 'method' => 'profesoresRevisores']);
$router->add('escuela-profesor-tutor', ['controller' => 'escuela\ProfesorController', 'method' => 'profesoresTutores']);
$router->add('escuela-profesor-jurado', ['controller' => 'escuela\ProfesorController', 'method' => 'profesoresJurados']);
$router->add('escuela-profesores-cargar', ['controller' => 'escuela\ProfesorController', 'method' => 'profesorCargar']);
$router->add('escuela-profesores-crear', ['controller' => 'escuela\ProfesorController', 'method' => 'crearProfesor']);
$router->add('escuela-profesores-eliminar', ['controller' => 'escuela\ProfesorController', 'method' => 'eliminarProfesor']);
$router->add('escuela-profesores-mostrar-profesor', ['controller' => 'escuela\ProfesorController', 'method' => 'mostrarPerfilProfesor']);
// Asignaciones / evaluaciones
$router->add('escuela-evaluacion-comite', ['controller' => 'escuela\EvaluacionController', 'method' => 'evaluacionComite']);
$router->add('escuela-evaluar-comite', ['controller' => 'escuela\EvaluacionController', 'method' => 'evaluarComite']);
$router->add('escuela-evaluacion-consejo', ['controller' => 'escuela\EvaluacionController', 'method' => 'evaluacionConsejo']);
$router->add('escuela-evaluar-consejo', ['controller' => 'escuela\EvaluacionController', 'method' => 'evaluarConsejo']);

// Criterios
$router->add('escuela-criterios-experimentales-todos', ['controller' => 'escuela\CriteriosController', 'method' => 'criteriosExperimentalesTodos']);
$router->add('escuela-criterios-instrumentales-todos', ['controller' => 'escuela\CriteriosController', 'method' => 'criteriosInstrumentalesTodos']);
$router->add('escuela-criterios-modificar-estatus', ['controller' => 'escuela\CriteriosController', 'method' => 'criteriosModificarEstatus']);
$router->add('escuela-criterios-crear', ['controller' => 'escuela\CriteriosController', 'method' => 'crearCriterio']);
$router->add('escuela-criterios-eliminar', ['controller' => 'escuela\CriteriosController', 'method' => 'eliminarCriterio']);
// Comites
$router->add('escuela-comites', ['controller' => 'escuela\ComiteController', 'method' => 'comitesTodos']);
$router->add('escuela-comites-up', ['controller' => 'escuela\ComiteController', 'method' => 'comitesCargar']);
// Consejo
$router->add('escuela-consejos', ['controller' => 'escuela\ConsejoController', 'method' => 'index']);
$router->add('escuela-consejos-cargar', ['controller' => 'escuela\ConsejoController', 'method' => 'cargarconsejo']);
// propuestastg
$router->add('escuela-propuestastg', ['controller' => 'escuela\EscuelaController', 'method' => 'propuestastgTodas']);
$router->add('escuela-trabajodegrado', ['controller' => 'escuela\EscuelaController', 'method' => 'trabajosdegrado']);
$router->add('escuela-ver-propuesta', ['controller' => 'escuela\EscuelaController', 'method' => 'verpropuesta']);

// AREAS
$router->add('escuela-areas', ['controller' => 'escuela\AreasController', 'method' => 'index']);
$router->add('escuela-areas-crear', ['controller' => 'escuela\AreasController', 'method' => 'crearArea']);
$router->add('escuela-areas-modificar', ['controller' => 'escuela\AreasController', 'method' => 'modificarArea']);
$router->add('escuela-areas-eliminar', ['controller' => 'escuela\AreasController', 'method' => 'eliminarArea']);
$router->add('escuela-areas-cargar', ['controller' => 'escuela\AreasController', 'method' => 'cargarArea']);
//ASIGNAR AREAS A PROFESORES
$router->add('escuela-areas-profesores', ['controller' => 'escuela\AreasController', 'method' => 'index_profesor']);
$router->add('escuela-areas-profesores-cargar', ['controller' => 'escuela\AreasController', 'method' => 'Cargarespecializacion']);
$router->add('escuela-areas-profesores-asignar', ['controller' => 'escuela\AreasController', 'method' => 'asignarArea']);
$router->add('escuela-areas-profesores-eliminar', ['controller' => 'escuela\AreasController', 'method' => 'eliminarespecializacion']);

// EMPRESAS
$router->add('escuela-empresas', ['controller' => 'escuela\EmpresaController', 'method' => 'index']);
$router->add('escuela-empresas-crear', ['controller' => 'escuela\EmpresaController', 'method' => 'crear']);
$router->add('escuela-empresas-modificar', ['controller' => 'escuela\EmpresaController', 'method' => 'modificar']);
$router->add('escuela-empresas-eliminar', ['controller' => 'escuela\EmpresaController', 'method' => 'eliminar']);
$router->add('escuela-empresas-cargar', ['controller' => 'escuela\EmpresaController', 'method' => 'cargar']);

$router->dispatch($_SERVER['QUERY_STRING']);
