<?php
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'test';
// mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect($dbhost,$dbuser,$dbpass);

if(!$conn){
    die("error");
}
if(!mysqli_select_db($conn, $dbname)){
    die('can not select db.');
}

$result = mysqli_query($conn,"SELECT * FROM user");