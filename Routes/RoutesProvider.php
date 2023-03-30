<?php

namespace Routes;

class RoutesProvider
{
    public static function is($route, $callback, &$routes)
    {
        array_push($routes, $route);

        $uri = self::url();

        if ($uri === $route) {
            $callback();
        }
    }

    public static function end($routes)
    {

        $uri = self::url();

        if (!in_array($uri, $routes)) {
            view("page404");
        }

    }

    public static function url(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
