<?php

class DB{

    static function connect(){
        $dbname = 'cloudcontact';
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';

        $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname,
        $dbuser, $dbpass);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        return $pdo;
    }
}