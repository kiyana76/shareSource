<?php
require_once 'config.php';

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_error()) {
    echo "ERROR IS : " . "<br>" . mysqli_connect_error() . "<br>";
    return;
}
mysqli_query($connect, "SET NAMES utf8");
if(isset($_REQUEST['First_name']) && isset($_REQUEST['Last_name']) && isset($_REQUEST['email']) && isset($_REQUEST['Group_id']) &&
isset($_REQUEST['Filed_id']) && isset($_REQUEST['pass']))
{
    $First_name = $_REQUEST['First_name'];
    $Last_name = $_REQUEST['Last_name'];
    $email = $_REQUEST['email'];
    $Group_id = $_REQUEST['Group_id'];
    $Filed_id = $_REQUEST['Filed_id'];
    $pass = $_REQUEST['pass'];
}

$query = "INSERT INTO `seconder_user`(`email`,`First_name`,`Last_name`,`pass`,`Filed_id`,`Group_id`) 
                              VALUES ('$email','$First_name','$Last_name','$pass','$Filed_id','$Group_id') ;";
if ($connect->query($query)===  true) {
    echo 'ok';
}else{
    echo 'unsuccessful';
}
?>
