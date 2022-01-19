<?php

$router = new Core\Router();

$router->add('', ['controller' => 'autenticacion\AuthController', 'method' => 'index']);
//LOGIN
$router->add('login', ['controller' => 'autenticacion\AuthController', 'method' => 'index']);
$router->add('login-iniciar', ['controller' => 'autenticacion\AuthController', 'method' => 'comprobarLogin']);


//ESCUELA
$router->add('administrador', ['controller' => 'escuela\EscuelaController', 'method' => 'index']);



$router->dispatch($_SERVER['QUERY_STRING']);
