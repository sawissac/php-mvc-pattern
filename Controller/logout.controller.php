<?php

$_SESSION['user'] = null;
session_destroy();


redirect('/');
exit();
