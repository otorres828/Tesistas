<?php

namespace Core;

use PDO;
use App\Config;
use Crud;
use Exception;

abstract class Model
{ 
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
             try {
                 $db = new PDO("pgsql:host=localhost;port=5432;dbname=mansion-de-cristo",'postgres','26269828');
                 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                 echo "Ocurrió un error con la base de datos: " . $e->getMessage();
            }


            // $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
            // $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

            // // Throw an Exception when an error occurs
            // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }
}
