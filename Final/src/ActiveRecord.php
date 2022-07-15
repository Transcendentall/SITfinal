<?php

namespace GachiNameSpace;

use PDO;

require_once('../vendor/autoload.php');
$dotenv = \Dotenv\Dotenv::createImmutable('../');

$dotenv->load();


class ActiveRecord
{
    protected static $connection;

    protected static function connect()
    {
        if (!isset(self::$connection)) {
            self::$connection = new PDO(
                "mysql:host=" . $_ENV['host'] .
                ";dbname=" . $_ENV['namedatabase'] .
                ";port=" . $_ENV['port'] . ";",
                $_ENV['username'],
                $_ENV['password']);
        }
    }

    protected static function unsetConnect()
    {
        self::$connection = null;
    }
}