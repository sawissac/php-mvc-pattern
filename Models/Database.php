<?php

namespace Models;

use PDO;

class DB
{
    public static $db;

    public static function init()
    {
        $dbhost = '127.0.0.1';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'test';
        self::$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    }

    public static function start($callback){
        self::init();
        return $callback(self::$db);
    }
}
