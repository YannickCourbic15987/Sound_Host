<?php

namespace App\Src\Core;

use PDO;

abstract class Data
{
    private static $pdo;
    private const HOSTNAME = "localhost;";
    private const DBNAME = "sound_host;";
    private const PORT = "3306;";
    private const USERNAME = "root";
    private const PASSWORD = "";

    private static function setData()
    {
        self::$pdo = new PDO("mysql:host=" . self::HOSTNAME . "dbname=" . self::DBNAME . "port=" . self::PORT . "charset=utf8", self::USERNAME, self::PASSWORD);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    protected function getData()
    {
        if (self::$pdo === null) {
            self::setData();
        }
        return self::$pdo;
    }
}
