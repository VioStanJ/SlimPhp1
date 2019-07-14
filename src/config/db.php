<?php

class DB{
    private $dbname = 'cloudcontact';
    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $dbpass = '';

    static function connect(){
        $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname,
        $dbuser, $dbpass);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        return $pdo;
    }
}