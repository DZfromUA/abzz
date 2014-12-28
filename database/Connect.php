<?php
//подключение к бд
Class Connect
{
    private static $_db = null;

    public static function getInstance()
    {
        if (self::$_db == 0) {
            self::$_db = new PDO('mysql:host=localhost;dbname=test-abz', 'root', '');
        }
        return self::$_db;
    }

    public static function setTable($tableName) {

    }
}