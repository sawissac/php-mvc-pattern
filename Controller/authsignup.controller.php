<?php

use Models\UserModel;

$username = qrGt('username');
$email = qrGt('email');
$password = qrGt('password');
$urlQueryExist = $email['exist'] && $password['exist'] && $username['exist'];
$isNotEmpty = !$email['empty'] && !$password['empty'] && !$username['empty'];
$checkUser = false;
$data = [];

if ($urlQueryExist && $isNotEmpty) {
  $checkUser = UserModel::checkUser($email['value']);
  $checkUser = empty($checkUser) ? false : true;
}


if ($checkUser) {
  redirect('/signup?auth=denied');
} else {
  UserModel::insertUser([
    "username" => $username['value'],
    "email" => $email['value'],
    "password" => password_hash($password['value'],PASSWORD_BCRYPT)
  ]);
  redirect('/login');
}
