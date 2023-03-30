<?php
$error = [];
$username = qrPt('username');
$email = qrPt('email');
$password = qrPt('password');
$confirmPassword = qrPt('confirmPassword');
$userAuth = qrGt('auth');

$urlQueryExist = $username['exist'] &&
  $email['exist'] &&
  $password['exist'] &&
  $confirmPassword['exist'];


if ($urlQueryExist && $username['empty']) {
  $error['username'] = 'Username can\'t be empty!';
}
if ($urlQueryExist && $email['empty']) {
  $error['email'] = 'Email can\'t be empty!';
}
if ($urlQueryExist &&  $password['empty']) {
  $error['password'] = "Password can't be empty!";
}
if ($urlQueryExist &&  $confirmPassword['empty']) {
  $error['confirmPassword'] = "Confirm password can't be empty!";
}
if (
  $urlQueryExist &&
  !$email['empty'] &&
  !filter_var($email['value'], FILTER_VALIDATE_EMAIL)
) {
  $error['email'] = "Invalid email!";
}

if (
  $urlQueryExist &&
  !$password['empty'] &&
  !$confirmPassword['empty'] &&
  $password['value'] !== $confirmPassword['value']
) {
  $error['confirmPassword'] = "Password doesn't match";
}

if (
  $userAuth['exist'] &&
  $userAuth['value'] === 'denied'
) {
  $error['auth'] = 'denied';
}

if (
  $urlQueryExist &&
  !$username['empty'] &&
  !$email['empty'] &&
  !$password['empty'] &&
  !$confirmPassword['empty'] &&
  filter_var($email['value'], FILTER_VALIDATE_EMAIL) &&
  $password['value'] === $confirmPassword['value']
) {
  redirect('/auth-signup?email=' . $email['value'] . '&password=' . $password['value'] . '&username=' . $username['value']);
}


view('signup', ['isLogin' => !empty($_SESSION['user']['email']), 'error' => $error]);
