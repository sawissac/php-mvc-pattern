<?php

use Models\UserModel;

$email = qrGt('email');
$password = qrGt('password');

if (
  $email['trueExist'] &&
  $password['trueExist']
) {
  $data = UserModel::checkUser($email['value']);

  if (password_verify($password['value'], $data['password'])) {

    $_SESSION['user'] = $data;
    redirect('/notes?start=0');

  } else {
    redirect('/login?auth=denied');
  }
}
