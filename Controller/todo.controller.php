<?php

use Models\TodoModel;
use Routes\RoutesProvider;

$createList = qrGt("create");
$deleteList = qrGt("delete");
$updateList = qrGt("update");
$todoId = qrGt("id");
$routeUrl = RoutesProvider::url();

if ($createList['trueExist']) {
  TodoModel::insert($createList['value'], $_SESSION['user']['id']);
  redirect('/todo');
}

if ($todoId['trueExist'] && $updateList['trueExist']) {
  TodoModel::update($updateList['value'], $todoId['value']);
  redirect('/todo');
}

if ($deleteList['trueExist']) {
  TodoModel::delete($deleteList['value']);
  redirect('/todo');
}

view('todo', [
  'isLogin' => !empty($_SESSION['user']['email']),
  'listData' => TodoModel::find($_SESSION['user']['id'])
]);
