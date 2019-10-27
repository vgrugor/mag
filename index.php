<?php

    //FRONT CONTROLLER

    // 1. Общие настройки

    //вкючение отображения всех ошибок
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // 2. Подключение файлов системы
    
    define('ROOT', dirname(__FILE__));
    require_once ROOT . '/components/Router.php'; #подключение файла класса роутера
    require_once ROOT . '/components/Db.php';  #Подключаем класс, который осуществляет подключение к БД
    
    // 3. Установка соединения с БД

    // 4. Вызов роутера
    $router = new Router();
    $router->run();


