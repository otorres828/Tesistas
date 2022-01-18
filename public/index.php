<?php


require dirname(__DIR__) . '/vendor/autoload.php';

/*
   ERRORES Y EXCEPCIONES
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/*
    RUTAS
*/
include_once ('../routes/web.php');
