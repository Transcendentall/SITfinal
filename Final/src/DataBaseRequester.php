<?php

namespace GachiNameSpace;


require_once('../vendor/autoload.php');
$dotenv = \Dotenv\Dotenv::createImmutable('../');

$dotenv->load();

class DataBaseRequester
{
    protected static $connection;

    protected static function connect()
    {
        if (!isset(self::$connection)) {
            self::$connection = new \PDO(
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

    public static function execute_with_fetch(string $sql, array $parameters, bool $fetchAll = false)
    {
        self::connect();

        $statement = self::$connection->prepare($sql);
        $statement->execute($parameters);
        if (!$fetchAll) {
            $result = $statement->fetch();
        } else {
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        self::unsetConnect();
        return $result;
    }

    public static function execute(string $sql, array $parameters)
    {
        self::connect();

        $statement = self::$connection->prepare($sql);
        $statement->execute($parameters);

        self::unsetConnect();
    }
}