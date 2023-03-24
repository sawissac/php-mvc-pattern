<?php

namespace Models;

class UserModel
{
    public static $db;

    public static function init(){
        $dbhost = '127.0.0.1';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'test';
        self::$db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    }

    public static function fetchData()
    {   
        self::init();
        $result = mysqli_query(self::$db, 'SELECT * FROM useraccount');
        return mysqli_fetch_assoc($result);
    }
}
