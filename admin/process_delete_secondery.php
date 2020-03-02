<?php
require_once 'config.php';

session_start();

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_error()) {
    echo "ERROR IS : " . "<br>" . mysqli_connect_error() . "<br>";
    return;
}
if (isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
}
mysqli_query($connect, "SET NAMES utf8");
mysqli_query($connect,"DELETE FROM `seconder_user` WHERE `id`='$id';");
echo 'ok';
