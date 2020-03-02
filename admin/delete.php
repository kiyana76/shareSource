<?php
require_once 'config.php';
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_error()) {
    echo "ERROR IS : " . "<br>" . mysqli_connect_error() . "<br>";
    return;
}
mysqli_query($connect, "SET NAMES utf8");
if (isset($_REQUEST['id']) && isset($_REQUEST['type']))
{
    $id = $_REQUEST['id'];
    $type = $_REQUEST['type'];
}
$db_query = mysqli_query($connect,"DELETE FROM `source` WHERE `id`='$id';");
if($type == 1)
$db_query1 = mysqli_query($connect,"DELETE FROM `source_jozveh` WHERE `Source_id`='$id';");
else if($type == 2)
$db_query1 = mysqli_query($connect,"DELETE FROM `source_book` WHERE `Source_id`='$id';");
else if($type == 3)
$db_query1 = mysqli_query($connect,"DELETE FROM `source_example` WHERE `Source_id`='$id';");
else if($type == 4)
$db_query1 = mysqli_query($connect,"DELETE FROM `source_educational_film` WHERE `Source_id`='$id';");
else if($type == 5)
$db_query1 = mysqli_query($connect,"DELETE FROM `source_entrance_exam` WHERE `Source_id`='$id';");

echo 'ok';
?>