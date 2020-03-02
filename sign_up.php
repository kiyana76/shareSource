<?php


require_once 'config.php';
// get info from client
session_start();

if (isset($_REQUEST['F_name'])   && isset($_REQUEST['L_name'])   && isset($_REQUEST['email'])
					&& isset($_REQUEST['pass'])  && isset($_REQUEST['Filed_id'])   && isset($_REQUEST['Group_id'])){

    $F_name = $_REQUEST['F_name'];
	$L_name = $_REQUEST['L_name'];
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['pass'];
	$F_id = $_REQUEST['Filed_id'];
	$G_id = $_REQUEST['Group_id'];
   
}else{
    return;
}




// connection
$connect = mysqli_connect(DB_HOST , DB_USER , DB_PASS,DB_NAME);

// check connection
if ($connect->error){
    echo "Connect Error is   :" . $connect->error ."<br>";
}

mysqli_query($connect , "SET NAMES utf8");
$Query  = "INSERT INTO `normal_user`( `email`, `First_name` , `Last_name` , `pass` , `Filed_id` , `Group_id`) 
						VALUES ('$email', '$F_name' , '$L_name' , '$pass' , '$F_id' , '$G_id')";


if ($connect->query($Query) === true){
	$_SESSION['First_name'] = $F_name ;
	$_SESSION['Last_name'] = $L_name ;
	header('Location: main page.php');
}else{
    echo "Query Error   :" . $connect->error ;
}


?>
