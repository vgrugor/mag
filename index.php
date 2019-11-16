<?php

    //FRONT CONTROLLER

    // 1. Общие настройки

    //вкючение отображения всех ошибок
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // 2. Подключение файлов системы
    
    define('ROOT', dirname(__FILE__));
    require_once ROOT . '/components/Autoload.php'; #ф-ия автозагрузки классов
    
    session_start();
    
    // 3. Установка соединения с БД

    // 4. Вызов роутера
    $router = new Router();
    $router->run();


