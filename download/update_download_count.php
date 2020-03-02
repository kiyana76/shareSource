<?php
require_once 'config.php' ;
$connect = mysqli_connect(DB_HOST, DB_USER , DB_PASS , DB_NAME);
if (mysqli_connect_error()){
    echo  "ERROR IS : " ."<br>" .mysqli_connect_error() . "<br>" ;
    return;
}
if(isset($_REQUEST['id']) && isset($_REQUEST['count']) && isset($_REQUEST['id_user']))
{
    $id = $_REQUEST['id'];
    $download_count = $_REQUEST['count'];
    $id_user = $_REQUEST['id_user'];
}
//*****************************update download_count*********************
$query = "UPDATE `source` SET `Donload_count` = '$download_count' WHERE `id` = '$id'";
$db_query = mysqli_query($connect,$query);
//*************************update download detail for dashboard***********
date_default_timezone_set("Iran");
$download_data = date("Y-m-d h:i:sa");
$query_download = "INSERT INTO `download_details`(`User_id`,`Source_id`,`Download_Date`) VALUES ('$id_user','$id','$download_data');";
$db_query_download = mysqli_query($connect,$query_download);
?>