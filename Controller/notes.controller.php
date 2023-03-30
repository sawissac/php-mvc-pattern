<?php

use Models\NotesModel;
use Models\TodoModel;

$pagination = qrGt('start');


if ($pagination['trueExist']) {

    if ($pagination['value'] < 0) redirect('/notes?start=0');

    $pagiValue = $pagination['value'];
    $maxPagi = NotesModel::max();
    $from = $pagiValue > $maxPagi ? $maxPagi - 25 : $pagiValue;
    $to = $pagiValue > $maxPagi ? $maxPagi : $pagiValue + 25;

    if ($pagination['value'] > $maxPagi) redirect('/notes?start='.$maxPagi - 25);

    view('notes', [
        'isLogin' => !empty($_SESSION['user']['email']),
        'noteData' => NotesModel::limit($from, $to),
        'pagination' => $pagination['value'],
    ]);
} else {
    view('notes', [
        'isLogin' => !empty($_SESSION['user']['email']),
        'noteData' => NotesModel::limit(0, 25),
        'pagination' => 0,
    ]);
}
