



<?php


require_once 'config.php';

if (isset($_REQUEST['id']) && isset($_REQUEST['id_user'])) {
    $id = $_REQUEST['id'];
    $userId = $_REQUEST['id_user'];
} else {
    echo 'hi';
    return;
}


$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($connect->error) {
    echo "connect error  is   : " . $connect->error;
}
/*mysqli_query($connect, "SET NAMES utf8");*/
$num =1;
$query = "UPDATE `source` SET `validity` = '$num' , `Seconder_id` = '$userId' WHERE `id` = '$id';";
/*$db_query = mysqli_query($connect,$query);*/
if ($connect->query($query)===  true) {
    header("location:javascript://history.go(-1)");
}else{
    echo "error    "  .$connect->error ;
}

?>
