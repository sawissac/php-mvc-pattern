<?php

const BASE_PATH = __DIR__ . '/';
const VIEW_PATH = BASE_PATH . 'View/';
const ROUTE_PATH = BASE_PATH . 'Routes/';
const CONTROLLER_PATH = BASE_PATH . 'Controller/';
const MODEL_PATH = BASE_PATH . 'Models/';
const MIDDLEWARE_PATH = BASE_PATH . 'Middleware/';

function debug_die($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function view($path, $dependency = [])
{
    extract($dependency);
    require(VIEW_PATH . $path . '.view.php');
}

function controller($path)
{
    require(CONTROLLER_PATH . $path . '.controller.php');
}

function middleware($path)
{
    return require(MIDDLEWARE_PATH . $path . '.mid.php');
}

function document($callback)
{
    view("document", ['insertComponent' => $callback]);
}

function redirect($path)
{
    header('location: ' . $path);
}

function qrGt($query)
{
    $result = [
        'exist' => false,
        'empty' => false,
        'trueExist' => false,
        'value' => ''
    ];

    if (isset($_GET[$query])) {
        $result['exist'] = true;
    }

    if (isset($_GET[$query]) && empty($_GET[$query])) {
        $result['empty'] = true;
    }

    if (isset($_GET[$query]) && !empty($_GET[$query])) {
        $result['trueExist'] = true;
        $result['value'] = $_GET[$query];
    }

    return $result;
}

function qrPt($query)
{
    $result = [
        'exist' => false,
        'empty' => false,
        'trueExist' => false,
        'value' => ''
    ];

    if (isset($_POST[$query])) {
        $result['exist'] = true;
    }

    if (isset($_POST[$query]) && empty($_POST[$query])) {
        $result['empty'] = true;
    }

    if (isset($_POST[$query]) && !empty($_POST[$query])) {
        $result['trueExist'] = true;
        $result['value'] = $_POST[$query];
    }


    return $result;
}
