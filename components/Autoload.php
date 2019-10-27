<?php

function __autoload($className) {
    
    //папки с классами для автозагрузки
    $arrayPaths = [
        '/components/',
        '/models/'
    ];
    
    //перебираем папки и подключаем файлы, если они существуют
    foreach ($arrayPaths as $path) {
        
        $path = ROOT . $path . $className . '.php';
        
        if (is_file($path)) {
            require_once $path;
        }
    }
}

