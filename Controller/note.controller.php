<?php

use Models\NotesModel;
use Routes\RoutesProvider;

$requestID = qrGt("id");
$routeUrl = RoutesProvider::url();

if ($routeUrl === '/note' && $requestID['trueExist']) {

    $noteData = NotesModel::find($requestID['value']);

    if (!empty($noteData)) {
        view('note', [
            'isLogin' => !empty($_SESSION['user']['email']),
            'noteData' => $noteData,
            'route' => $routeUrl
        ]);
    } else {
        view("page404");
    }
}




if ($routeUrl === '/note/edit') {
    $userId = $_SESSION['user']['id'];
    $noteTitle = qrPt('title');
    $noteBody = qrPt('body');
    $noteId = qrPt('id');
    if (
        $noteTitle['trueExist'] &&
        $noteBody['trueExist'] &&
        $noteId['trueExist']
    ) {
        NotesModel::update($noteBody['value'], $noteTitle['value'], $noteId['value']);
        redirect('/note?id=' . $noteId['value']);
    } else {
        view('note', [
            'isLogin' => !empty($_SESSION['user']['email']),
            'noteData' => NotesModel::find($requestID['value'], $userId),
            'route' => $routeUrl
        ]);
    }
}


if ($routeUrl === '/note/delete') {
    $userId = $_SESSION['user']['id'];
    NotesModel::delete($userId, $requestID['value']);
    redirect('/notes');
}

if ($routeUrl === '/note/create') {
    $userId = $_SESSION['user']['id'];
    $noteTitle = qrPt('title');
    $noteBody = qrPt('body');
    if($noteTitle['trueExist'] && $noteTitle['trueExist'] && $noteBody['trueExist']){
        NotesModel::insert($noteTitle['value'],$noteBody['value'],$userId);
        redirect("/notes");
    }

    view('note', [
        'isLogin' => !empty($_SESSION['user']['email']),
        'route' => $routeUrl
    ]);
}
