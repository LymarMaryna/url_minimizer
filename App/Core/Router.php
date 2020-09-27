<?php


namespace App\Core;


class Router
{
    private static $controllerName = 'IndexController';
    private static $action = 'fetch';

    public static function run()
    {
        $controllerName = self::$controllerName;
        $action = self::$action;

        $route = ltrim($_SERVER['REQUEST_URI'], '/');

        if (!empty($route)) {
            switch ($route) {
                case 'stat':
                {
                    $controllerName = 'StatController';
                    break;
                }
                case 'minify':
                {
                    $action = 'ajaxMinifyUrl';
                    break;
                }
                default:
                {
                    $controllerName = 'RedirectController';
                    break;
                }
            }
        }

        $controller = 'App\\Controllers\\' . $controllerName;
        $controllerObj = new $controller;

        if (!method_exists($controllerObj, $action)) {
            $controller = 'App\\Controllers\\ErrorController';
            $controllerObj = new $controller;
            $action = 'pageNotFound';
        }

        $controllerObj->$action();
    }
}

