<?php


namespace App\PDO\Config;

use PDO;

class Postgres implements IConnection
{
    private static $dsn;

    public function __construct()
    {
        self::$dsn = Settings::POSTGRES['DRIVER'] . ":host=" . Settings::POSTGRES['HOST'] .
            ";dbname=" . Settings::POSTGRES['DBNAME'] . ";port=" . Settings::POSTGRES['PORT'] .
            ";user=" . Settings::POSTGRES['USER'] . ";password=" . Settings::POSTGRES['PASS'];
    }

    public static function getConnection()
    {
        $connection = new PDO(self::$dsn);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}