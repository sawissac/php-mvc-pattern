<?php

session_start();

require('../requirer.php');

use Routes\RoutesProvider;

document(function () {

    $routes = [];

    RoutesProvider::is('/', function () {
        controller('home');
    }, $routes);

    RoutesProvider::is('/login', function () {
        controller('login');
    }, $routes);

    RoutesProvider::is('/signup', function () {
        controller('signup');
    }, $routes);

    RoutesProvider::is('/notes', function () {
        controller('notes');
    }, $routes);

    RoutesProvider::is('/note', function () {
        controller('note');
    }, $routes);

    RoutesProvider::is('/note/edit', function () {
        controller('note');
    }, $routes);

    RoutesProvider::is('/note/delete', function () {
        controller('note');
    }, $routes);

    RoutesProvider::is('/note/create', function () {
        controller('note');
    }, $routes);

    RoutesProvider::is('/todo', function () {
        controller('todo');
    }, $routes);

    
    
    RoutesProvider::is('/auth-login', function () {
        controller('authlogin');
    }, $routes);

    RoutesProvider::is('/auth-signup', function () {
        controller('authsignup');
    }, $routes);

    RoutesProvider::is('/logout', function () {
        controller('logout');
    }, $routes);

    RoutesProvider::end($routes);
});
