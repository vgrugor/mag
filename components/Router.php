<?php

class Router {
    
    private $routes;
    
    public function __construct() {
        //получам значения из файла роутов
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = require_once $routesPath;
    }
    
    /**
     * Возвращает строку запроса. 
     * Вызывается в методе Router->run()
     */
    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI']);
        }
    }

    public function run() {
        
        //Получить строку запроса
        $uri = $this->getURI();
        
        //Проверить наличие полученного запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            
            //сравниваем ключ массива routes c строкой запроса $uri
            if (preg_match("~$uriPattern~", $uri)) {
                
                //получаем внутренй путь из внешнего
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                //определяем контроллер, экшен, параметры
                
                //получаем название контролера и экшена в массив
                $segments = explode('/', $internalRoute);
                
                //Получаем имя контроллера, удаляем его из массива $segments
                $controllerName = array_shift($segments) . 'Controller';
                
                //Делам первую букву в названии контроллера большой
                $controllerName = ucfirst($controllerName);
                
                //Получаем имя экшена, удаляем его из массива $segments
                //Делаем первую букву второго слова большой
                $actionName = 'action' . ucfirst(array_shift($segments));
                
                //оставшиеся в массиве элементы будут переданы как параметры
                $parameters = $segments;
                
                //создаем строку с полным путем к файлу на диске
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                
                //если файл существует, то подключаем его
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                }
                
                //создаем обьект контроллера
                $controllerObject = new $controllerName;
                
                //вызываем метод контроллера с параметрами, которые из массива распакуются в отдельные переменные
                $result = call_user_func_array([$controllerObject, $actionName], $parameters);
                
                if ($result != null) {
                    break;
                }
            }
        }
        
    }
}
