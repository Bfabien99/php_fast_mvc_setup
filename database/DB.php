<?php
namespace Database;

use PDO;

class DB{
    private static PDO $pdo;

    public function __construct(){
        try {
            $driver = $_ENV['DB_DRIVER'];
            $host = $_ENV['DB_HOST'];
            $port = $_ENV['DB_PORT'];
            $dbName = $_ENV['DB_DATABASE'];
            $username = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];

            static::$pdo = new PDO("$driver:host=$host:$port;dbname=$dbName", $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (\PDOException $pDOException) {
            throw new \PDOException($pDOException->getMessage(), $pDOException->getCode());
        }
    }

    public static function getConnection(){
        return static::$pdo;
    }
}