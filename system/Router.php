<?php 

namespace BigBear\System;
use BigBear\System\Loader;

class Router{
    private static $_routes = [];

    public static function get($url, $callback){
        self::$_routes[] = [
            'method' => 'GET',
            'url' => $url,
            'callback' => $callback
        ];
    }

    public static function post($url, $callback){
        self::$_routes[] = [
            'method' => 'POST',
            'url' => $url,
            'callback' => $callback
        ];
    }

    public static function dispatch($globals){
        $requestUri = trim($globals['REQUEST_URI'], '/');
        $requestMethod = $globals['REQUEST_METHOD'];
        foreach(self::$_routes as $route) {
            $pattern = str_replace('{id}', '(\d+)', trim($route['url'], '/'));
            $pattern = str_replace('{slug}', '([a-zA-Z0-9\-_]+)', $pattern);
            if (preg_match('#' . $pattern . '#i', $requestUri, $matchedParameters) && $route['method'] === $requestMethod) {
                array_shift($matchedParameters);
                $parameters = $matchedParameters;
                if (is_callable($route['callback'])) {
                    call_user_func_array($route['callback'], $parameters);
                } else if (gettype($route['callback']) === 'string' ) {
                    list($controller, $action) = explode(':', $route['callback']);
                    $controllerObject = Loader::loadController($controller);
                    call_user_func_array([$controllerObject, $action], $parameters);
                }
                return;
                
            }
        }
        $errorController = Loader::loadController('Error');
        call_user_func([$errorController, 'error404']);
    }
}