<?php

use Routes\RoutesProvider;

$currentUrl = RoutesProvider::url();

if ($currentUrl !== '/' && !isset($_SESSION['user'])) {
  $_SESSION['user'] = [];
}

$excludeRoute = ['/', '/login', '/signup', '/auth-login', '/auth-signup'];

if (
  !in_array($currentUrl, $excludeRoute) &&
  empty($_SESSION['user']['email'])
) {
  redirect('/login');
}


if (
  in_array($currentUrl, $excludeRoute) &&
  !empty($_SESSION['user']['email'])
) {
  redirect('/notes');
}