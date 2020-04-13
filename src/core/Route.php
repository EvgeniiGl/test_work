<?php

class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action          = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
//TODO добавить валидацию путей
        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        // получаем имя экшена
        if (!empty($routes[2])) {
            $action = $routes[2];
        }
        // добавляем префиксы
        $controller_name = 'Factory' . $controller_name . 'Controller';
        $action_name     = $action;

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name . '.php';

        $controller_path = "src/controllers/factories/" . $controller_file;

        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            throw new Exception('Контроллер не найден');
        }

        // создаем контроллер
        $controllerFactory = new $controller_name;
        $controller        = $controllerFactory->createController();
        $action            = $action_name;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            throw new Exception('Метод не найден');
        }

    }

}
