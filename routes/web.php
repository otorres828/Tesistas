<?php

$router = new Core\Router();
//ERRORES
$router->add('error', ['controller' => 'autenticacion\AuthController', 'method' => 'error']);
//LOGIN
$router->add('login', ['controller' => 'autenticacion\AuthController', 'method' => 'index']);
$router->add('login-iniciar', ['controller' => 'autenticacion\AuthController', 'method' => 'comprobarLogin']);
$router->add('login-cerrarsesion', ['controller' => 'autenticacion\AuthController', 'method' => 'cerrarSesion']);


//ESCUELA
$router->add('escuela', ['controller' => 'escuela\EscuelaController', 'method' => 'index']);

//TESISTAS
$router->add('tesistas',['controller' => 'tesistas\TesistasController','method'=>'index']);
$router->add('tesistas-guardar-propuesta',['controller' => 'tesistas\TesistasController','method'=>'guardarpropuesta']);

//PROFESORES
$router->add('profesores',['controller'=>'profesores\ProfesorController','method'=>'index']);


$router->dispatch($_SERVER['QUERY_STRING']);
