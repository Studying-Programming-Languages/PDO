<?php

namespace App\PDO\Config;

class Settings
{
    const MYSQL =  array(
        'HOST' => '172.17.0.3',
        'PORT' => '3306',
        'USER' => 'root',
        'PASS' => 'R00t',
        'DBNAME' => 'pessoas',
        'DRIVER' => 'mysql'
    );

    const POSTGRES =  array(
        'HOST' => '172.17.0.2',
        'PORT' => '5432',
        'USER' => 'postgres',
        'PASS' => 'R00t',
        'DBNAME' => 'pessoas',
        'DRIVER' => 'pgsql'
    );
}