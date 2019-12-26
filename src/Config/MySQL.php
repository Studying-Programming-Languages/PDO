<?php

namespace App\PDO\Config;

use PDO;
use App\PDO\Config\Settings;
use App\PDO\Config\IConnection;

class MySQL implements IConnection
{
    private static $user;
    private static $pass;
    private static $dsn;

    public function __construct()
    {
        self::$user = Settings::MYSQL['USER'];
        self::$pass = Settings::MYSQL['PASS'];
        self::$dsn = Settings::MYSQL['DRIVER'] . ":host=" . Settings::MYSQL['HOST'] . ";dbname=" . Settings::MYSQL['DBNAME'] .
            ";port=" . Settings::MYSQL['PORT'];
    }

    public static function getConnection()
    {
        $connection = new PDO(self::$dsn, self::$user, self::$pass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }

}
