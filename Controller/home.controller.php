<?php

view('home', ['isLogin' => !empty($_SESSION['user']['email']),]);
