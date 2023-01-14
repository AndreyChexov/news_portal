<?php

class Route
{
    public function run(): void
    {
        $pathData = explode('path=', $_SERVER['QUERY_STRING'] ?? 'path=');
        $params = [];
        

        if (!empty($pathData)) {
            $route = explode('/', $pathData[1]);
            $controller = $route[0] ?? '';
            $action = $route[1] ?? '';
            $params[] = $route[2] ?? [];
            $params[] = $route[3] ?? [];
        
        }
        
        if (empty($controller)) {
            $controller = 'news';
        }

        if (empty($action)) {
            $action = 'index';
        }
        

        $className = ucfirst($controller) . 'Controller';


        $controllerClass = __DIR__ . '/../../controllers/' . $className . '.php';

        if (file_exists($controllerClass)) {
            require_once 'controllers/AbstractController.php';
            require_once 'controllers/BaseController.php';
            require_once 'classes/Connection/Connect.php';
            require_once $controllerClass;

            $controllerObject = new $className();
            $controllerObject->$action($params);
            
           
        } else {

            require_once 'templates/404.php';
        }
    }

}