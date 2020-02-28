<?php
class Model {
    private static $DSN  = "mysql:host=localhost; port=3306; dbname=barapates";
    private static $user = "root";
    private static $pwd	= "antoine";
    private static $sql = null;

    private function __construct() {
            self::$sql = new PDO(Model::$DSN, Model::$user, Model::$pwd);
    }

    public static function getInstance() {
        if (self::$sql === null) {
            new self;
            return self::$sql;
        } else {
            return self::$sql;
        }
    }



}