<?php
class Conexao {

    private static $instance;

    public static function getConn() {
        if(!isset(self::$instance)) {
            self::$instance = new \PDO("mysql:host=localhost;dbname=aula_crud;charset:utf8", 'root', 'vertrigo');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }

}