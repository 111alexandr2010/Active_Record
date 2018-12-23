<?php

//namespace Classes;

class DBase
{
    protected static $_pdo = null;

    protected static $dbHost = '127.0.0.1:3307';
    protected static $dbName = 'clinic2';
    protected static $dbUser = 'root';
    protected static $dbPass = '';

    protected function __construct()
    {
        echo 'Running the constructor .<br/>';
    }

    protected function __clone() {}

    protected function __wakeup() {}

    public static function pdo()
    {
        if (is_null(self::$_pdo)) {
            echo 'Creating new connection.<br/>';
            self::$_pdo = new PDO ('mysql:dbname='. DBase::$dbName . ';host=' . DBase::$dbHost, DBase::$dbUser, DBase::$dbPass);
        };
        return self::$_pdo;
    }
}