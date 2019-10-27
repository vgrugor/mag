<?php


class Db {
    
    public static function getConnection() {
        
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include $paramsPath;  //только include, иначе при использовании двух моделей в одном контроллере не будут получены параметры соедиения
        
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        $db->exec('set names utf8');
        
        return $db;
    }
}
