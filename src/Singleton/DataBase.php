<?php

require_once __DIR__ . "/../db/db.php";

class DataBase{
    private static $instance = null;
    private $pdo;
    
    private function __construct()
    {
        $host = DB::$host;
        $dbname = DB::$dbname;
        $username = DB::$username;
        $password = DB::$password;

        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function GetInstance(){
        if(self::$instance === null){
            self::$instance = new DataBase();
        }
        return self::$instance->pdo;
    }
}