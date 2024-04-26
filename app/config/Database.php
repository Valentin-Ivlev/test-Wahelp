<?php

namespace App\Config;

use PDO;

class Database
{
    private static $instance = null;

    private function __construct() {}

    public static function getInstance()
    {
        if (self::$instance === null) {

            $config = [
                'host' => 'localhost',
                'port' => '3306',
                'database' => 'wahelp-db',
                'username' => 'username',
                'password' => 'password',
            ];

            $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']}";
            self::$instance = new PDO($dsn, $config['username'], $config['password']);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }

    private function __clone() {}
}