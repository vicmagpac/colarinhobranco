<?php

namespace App\Database;

class Database
{
    protected static $db;

    private function __construct()
    {
        try {
            self::$db = new \PDO('pgsql:host=10.0.0.55; dbname=colarinhobranco', 'postgres', 'postgres');
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        } catch (\PDOException $e) {
            die("Connection Error: " . $e->getMessage());
        }
    }

    public static function conexao()
    {

        if (!self::$db)
        {
            new Database();
        }

        return self::$db;
    }
}