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


//=====================================ESCUELA
$router->add('escuela', ['controller' => 'escuela\EscuelaController', 'method' => 'index']);

// tesistas
$router->add('escuela-tesistas', ['controller' => 'escuela\TesistaController', 'method' => 'tesistasTodos']);
$router->add('escuela-tesistas-cargar', ['controller' => 'escuela\TesistaController', 'method' => 'tesistasCargar']);

// profesores
$router->add('escuela-profesor-revisor', ['controller' => 'escuela\ProfesorController', 'method' => 'profesoresRevisores']);
$router->add('escuela-profesor-tutor', ['controller' => 'escuela\ProfesorController', 'method' => 'profesoresTutores']);
$router->add('escuela-profesor-jurado', ['controller' => 'escuela\ProfesorController', 'method' => 'profesoresJurados']);
$router->add('escuela-profesores-cargar', ['controller' => 'escuela\ProfesorController', 'method' => 'profesorCargar']);

// criterios
$router->add('escuela-criterios-exp-todos', ['controller' => 'escuela\EscuelaController',  'method' => 'CriteriosExpTodos']);
$router->add('escuela-habilitar', ['controller' => 'escuela\EscuelaController',  'method' => 'escuelaHabilitar']);

$router->add('escuela-criterios-exp-cargar', ['controller' => 'escuela\EscuelaController', 'method' => 'CriteriosExpCargar']);
$router->add('escuela-criterios-ins-todos', ['controller' => 'escuela\EscuelaController',  'method' => 'CriteriosInsTodos']);
$router->add('escuela-criterios-ins-cargar', ['controller' => 'escuela\EscuelaController', 'method' => 'CriteriosExpCargar']);
// comites
$router->add('escuela-comites', ['controller' => 'escuela\ComiteController', 'method' => 'comitesTodos']);
$router->add('escuela-comites-up', ['controller' => 'escuela\ComiteController', 'method' => 'comitesCargar']);
// propuestas
$router->add('escuela-propuestastg', ['controller' => 'escuela\EscuelaController', 'method' => 'propuestastgTodas']);

$router->dispatch($_SERVER['QUERY_STRING']);
