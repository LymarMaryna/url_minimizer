<?php


namespace App\Core\Database;


class Db
{
    private static $instance = null;
    public $db;

    private function __construct()
    {
        $driver = getenv('DATABASE_DRIVER');
        $host = getenv('DATABASE_HOST');
        $user = getenv('DATABASE_USER');
        $password = getenv('DATABASE_PASSWORD');
        $db_name = getenv('DATABASE_NAME');

        $this->db = new \PDO("$driver:host=$host;dbname=$db_name", $user, $password, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __clone()
    {
    }
}