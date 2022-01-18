<?php
/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'ContactanosController', 'method' => 'index']);
//$router->add('{controller}/{method}');
$router->add('administrador-usuarios', ['controller' => 'ContactanosController', 'method' => 'index']);
$router->add('administrador-usuarios-store', ['controller' => 'ContactanosController', 'method' => 'store']);

$router->dispatch($_SERVER['QUERY_STRING']);
