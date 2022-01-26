<?php

$router = new Core\Router();

$router->add('', ['controller' => 'autenticacion\AuthController', 'method' => 'index']);
//LOGIN
$router->add('login', ['controller' => 'autenticacion\AuthController', 'method' => 'index']);
$router->add('login-iniciar', ['controller' => 'autenticacion\AuthController', 'method' => 'comprobarLogin']);
$router->add('login-cerrarsesion', ['controller' => 'autenticacion\AuthController', 'method' => 'cerrarSesion']);


//ESCUELA
$router->add('administrador', ['controller' => 'escuela\EscuelaController', 'method' => 'index']);

//TESISTAS
$router->add('tesistas',['controller' => 'tesistas\TesistasController','method'=>'index']);
$router->add('tesistas-guardar-propuesta',['controller' => 'tesistas\TesistasController','method'=>'guardarpropuesta']);

//PROFESORES
$router->add('profesores',['controller'=>'profesores\ProfesorController','method'=>'index']);


$router->dispatch($_SERVER['QUERY_STRING']);
