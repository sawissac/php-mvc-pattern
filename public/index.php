<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'function.php';

$routes = require base_path('routes.php');


$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

if(array_key_exists($uri, $routes)){
    require base_path($routes[$uri]);
}else{
    echo '404';
}