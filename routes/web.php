<?php

$router = new Core\Router();
$router->add('', ['controller' => 'autenticacion\AuthController', 'method' => 'index']);

//ERRORES
$router->add('error', ['controller' => 'autenticacion\AuthController', 'method' => 'error']);
$router->add('error-redirect', ['controller' => 'autenticacion\AuthController', 'method' => 'redirect']);

//LOGIN
$router->add('login', ['controller' => 'autenticacion\AuthController', 'method' => 'index']);
$router->add('login-iniciar', ['controller' => 'autenticacion\AuthController', 'method' => 'comprobarLogin']);
$router->add('login-cerrarsesion', ['controller' => 'autenticacion\AuthController', 'method' => 'cerrarSesion']);

//TESISTAS
$router->add('tesistas', ['controller' => 'tesistas\TesistasController', 'method' => 'index']);
$router->add('tesista-perfil', ['controller' => 'tesistas\TesistasController', 'method' => 'perfil']);
$router->add('tesista-perfil-modificarTelefono', ['controller' => 'tesistas\TesistasController', 'method' => 'modificarTelefono']);
$router->add('tesista-perfil-modificarCodigo', ['controller' => 'tesistas\TesistasController', 'method' => 'modificarCodigo']);
$router->add('tesista-perfil-modificarCorreo', ['controller' => 'tesistas\TesistasController', 'method' => 'modificarCorreo']);
$router->add('tesista-perfil-modificarClave', ['controller' => 'tesistas\TesistasController', 'method' => 'modificarClave']);
$router->add('tesistas-guardar-propuesta', ['controller' => 'tesistas\TesistasController', 'method' => 'guardarpropuesta']);

$router->add('tesista-propuestas-aprobadas', ['controller' => 'tesistas\TesistasController', 'method' => 'propuestasaprobadas']);

//PROFESORES
$router->add('profesores', ['controller' => 'profesores\ProfesorController', 'method' => 'index']);
$router->add('profesor-perfil', ['controller' => 'profesores\ProfesorController', 'method' => 'perfil']);


//ESCUELA
$router->add('escuela', ['controller' => 'escuela\EscuelaController', 'method' => 'index']);
$router->add('escuela-tesistas', ['controller' => 'escuela\EscuelaController', 'method' => 'tesistasTodos']);
$router->add('escuela-tesistas-cargar', ['controller' => 'escuela\EscuelaController', 'method' => 'tesistasCargar']);


$router->dispatch($_SERVER['QUERY_STRING']);
