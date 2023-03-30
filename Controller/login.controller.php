<?php

$error = [];
$email = qrPt('email');
$password = qrPt('password');
$userAuth = qrGt('auth');

$urlQueryExist = $email['exist'] && $password['exist'];

if (
  $urlQueryExist && 
  $email['empty']
) {
  $error['email'] = 'Email can\'t be empty!';
}

if ( 
  $urlQueryExist &&  
  $password['empty']
) {
  $error['password'] = "Password can't be empty!";
}

if (
  $urlQueryExist && 
  !$email['empty'] &&
  !filter_var($email['value'], FILTER_VALIDATE_EMAIL)
) {
  $error['email'] = "Invalid email!";
}

if(
  $userAuth['exist'] && 
  $userAuth['value'] === 'denied'
){
  $error['auth'] = 'denied';
}

if (
  $urlQueryExist &&
  !$email['empty'] &&
  !$password['empty'] &&
  filter_var($email['value'], FILTER_VALIDATE_EMAIL)
) {
  redirect('/auth-login?email='.$email['value'].'&password='.$password['value']);
}

view('login', ['isLogin' => !empty($_SESSION['user']['email']), 'error' => $error]);
