<?php
require_once 'config.php' ;

session_start();

$connect = mysqli_connect(DB_HOST, DB_USER , DB_PASS , DB_NAME);
if (mysqli_connect_error()){
echo  "ERROR IS : " ."<br>" .mysqli_connect_error() . "<br>" ;
return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>آپلود</title>
    <link rel="stylesheet" href="process.css">
</head>
<body><!--تمام لینک های داخل منو باید تا وقتی لاگین نکرده وارد صفحه لاگین شوند!!!!!!!!!!!!-->
<div id="container">
    <div id="header">
        <ul id="sign_ul">
            <div class="user-info"><a href="../dashboard.php"> <?php echo $_SESSION["First_name"];
                    echo " ";
                    echo $_SESSION["Last_name"]; ?></a></div>
            <li id="icon"><img src="unvarm.gif" alt="icon"></li>
        </ul>
    </div>
    <div id="menu">
        <ul class="menu_ul">
            <li class="menu_li"><a href="../main%20page.php">خانه</a></li>
            <li class="menu_li"><a href="../jozve.php">جزوات</a></li>
            <li class="menu_li"><a href="../film.php">فیلم های آموزشی</a></li>
            <li class="menu_li"><a href="../soal.php">نمونه سوال</a></li>
            <li class="menu_li"><a href="../konkor.php">سوالات کنکور</a></li>
            <li class="menu_li"><a href="../ketab.php">کتب</a></li>
            <li class="menu_li dropdown">آپلود
                <div class="dropdown-content">
                    <a href="../upload/upload_jozve.php">جزوه</a>
                    <a href="../upload/upload_nemone_soal.php">نمونه سوال</a>
                    <a href="../upload/ketab.php">کتاب</a>
                    <a href="../upload/upload_konkor.php">سوال کنکور</a>
                    <a href="../upload/upload_video.php">فیلم آموزشی</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<div id="content" class="content">
<br>

</div>




<!--//******************************php code**********************************-->
<?php
mysqli_query($connect , "SET NAMES utf8");
if (isset($_REQUEST['source_name'])   &&  isset($_REQUEST['Master_name']) && isset($_REQUEST['term']) && isset($_REQUEST['year']) && isset($_REQUEST['Group_id']) && isset($_REQUEST['Filed_id']) ){
    $source_name = $_REQUEST['source_name'];
    $Master_name= $_REQUEST['Master_name'];
    $term = $_REQUEST['term'];
    $year = $_REQUEST['year'];
    $Group_id = $_REQUEST['Group_id'];
    $Filed_id = $_REQUEST['Filed_id'];
}
if (/*isset($_REQUEST['file']) &&*/ !empty($_FILES["file"]))
{
    /*echo 'uploaded';*/
}
else{
    echo "unsuccessful";
    return;
}


//**************************************upload file**********************************
$allowedExts = array("pdf", "zip", "rar", "PDF", "ZIP", "RAR"); //faghat file haye ghabele upload
$temp = explode(".", $_FILES["file"]["name"]); //tajzie kardate esme file be jahate daravardane passvand
$extension = end($temp); //bedast avardane pasvand


if (in_array($extension, $allowedExts)) { //check kardane inke file upload shode dar pasvand haye mojaz bashad.
    if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    } else {
       /* echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Stored in: " . $_FILES["file"]["tmp_name"];*/
        echo "فایل"  . $_FILES["file"]["name"] . "با موفقیت آپلود شد.منتظر تایید ادمین بمانید تا در سایت نمایش داده شود.";
    }
    while (!allocateName($extension)) ; //ta vaghti ke esme randomi ke dar file upload mojod nabashad ra peida nakonad tamam nemishavad.

    move_uploaded_file($_FILES["file"]["tmp_name"],
        "upload/jozve/" . $_FILES["file"]["name"]);
    /*echo "Stored in: " . "upload/jozve/" . $_FILES["file"]["name"];*/

} else {
    echo "Invalid file.";
}

function allocateName($ext)
{
    $newName = rand(1, 1000000000) . "." . $ext; //ekhtesas dadane name jadid
    $_FILES["file"]["name"] = $newName; //taghire name file ba name jadid
    if (file_exists("upload/jozve/" . $_FILES["file"]["name"])) {
        return false;
    } else {
        return true;
    }
}



//***********************************************upload image****************************
$allowedExtsImg = array("gif", "GIF", "jpeg", "JPEG", "jpg", "JPG", "png", "PNG"); //faghat file haye ghabele upload
$temp = explode(".", $_FILES["image"]["name"]); //tajzie kardate esme file be jahate daravardane passvand
$extension = end($temp); //bedast avardane pasvand


if (in_array($extension, $allowedExtsImg)) { //check kardane inke file upload shode dar pasvand haye mojaz bashad.
    if ($_FILES["image"]["error"] > 0) {
        echo "Error: " . $_FILES["image"]["error"] . "<br>";
    } else {
        /*echo "Upload: " . $_FILES["image"]["name"] . "<br>";
        echo "Type: " . $_FILES["image"]["type"] . "<br>";
        echo "Size: " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
        echo "Stored in: " . $_FILES["image"]["tmp_name"];*/
    }
    while (!allocateNameImg($extension)) ; //ta vaghti ke esme randomi ke dar file upload mojod nabashad ra peida nakonad tamam nemishavad.

    move_uploaded_file($_FILES["image"]["tmp_name"],
        "upload/jozve_img/" . $_FILES["image"]["name"]);
    /*echo "Stored in: " . "upload/jozve_img/" . $_FILES["image"]["name"];*/

} else {
    echo "Invalid file.";
}

function allocateNameImg($ext)
{
    $newName = rand(1, 1000000000) . "." . $ext; //ekhtesas dadane name jadid
    $_FILES["image"]["name"] = $newName; //taghire name file ba name jadid
    if (file_exists("upload/jozve_img/" . $_FILES["image"]["name"])) {
        return false;
    } else {
        return true;
    }
}



//************************************************insert in db******************************
$First_name = $_SESSION["First_name"];
$Last_name = $_SESSION["Last_name"];
$query = "SELECT * FROM `normal_user` WHERE `First_name`='$First_name'AND`Last_name`='$Last_name'"; //daryafte userid
$db_Query_user_id = mysqli_query($connect  , $query);
$Out_Put = array();
while ($row = mysqli_fetch_array($db_Query_user_id)){
    $Item = array();

    $Item['userId'] = $row['id'];
    $Item['email'] = $row['email'];
    $Item['pass'] = $row['pass'];
    $Item['name'] = $row['First_name'];
    $Item['lastname'] = $row['Last_name'];
    $Out_Put [] = $Item;
}
$User_id = $Out_Put[0]['userId'];
$Source_author_name = $Out_Put[0]['name'] . $Out_Put[0]['lastname'];
$Source_type = 1;
$Donload_count = 0;
$Rate = 0;
$validity = 0;
$Rate_count = 0;
$Download_Link = "upload/jozve/". $_FILES["file"]["name"];
$Download_img = "upload/jozve_img/" . $_FILES["image"]["name"];
date_default_timezone_set("Iran");
$Upload_data = date("Y-m-d h:i:sa");

$sql_query = "INSERT INTO `source` (`User_id`,`Filed_id`,`Group_id`,`Upload_data`,
							`source_name`,`Source_author_name`,`Source_type`,`Donload_count`,`Rate`,`validity`,`Download_Link`,`Download_img`,`Rate_count`) 
  VALUES ('$User_id','$Filed_id','$Group_id','$Upload_data',
  '$source_name','$Source_author_name','$Source_type','$Donload_count','$Rate','$validity','$Download_Link','$Download_img' , '$Rate_count')" ;

// execute $sql_qery
if ($connect->query($sql_query)===  true) {
    $Result=1;
      echo "new record added";
}else{
    $Result=0;
    // echo "error    "  .$connect->error ;
}

if($Result == 1){

$sql_query_1 = "SELECT `id`,`Source_type` FROM `source` 
		WHERE `Source_type`='$Source_type' AND `Group_id`='$Group_id'    AND `Filed_id`='$Filed_id'
		AND `Download_Link`='$Download_Link'    AND `Upload_data`='$Upload_data'  AND `User_id`='$User_id'
		AND `source_name`='$source_name'    AND `Source_author_name`='$Source_author_name' " ;


$db_Query = mysqli_query($connect  , $sql_query_1);

while ($row = mysqli_fetch_array($db_Query)){

    $N_Source_id= $row['id'];
    $S_Type = $row['Source_type'];
}

if( $S_Type== 1  ){

    $in_year = $_REQUEST['year'];
    $in_term = $_REQUEST['term'];
    $in_Master_name = $_REQUEST['Master_name'];

    $query_1 = "UPDATE `source_jozveh`
			SET `year` = '$in_year' , `term` = '$in_term',  `Master_name` = '$in_Master_name' 
			WHERE `Source_id`='$N_Source_id';";

    $db_Query_1 = mysqli_query($connect  , $query_1);

    if ($connect->query($query_1)===  true) {
        echo " ";
    }else{
        echo "error    "  .$connect->error ;
    }


}



}else{
    echo "error    "  .$connect->error ;
}
?>

<div id="footer" class="footer">
    <div id="footer_right" class="footer_right">
        <h5>خدمات الکترونیکی</h5>
        <ul class="footer_ul">
            <li class="footer_li"><a href="http://edu.usc.ac.ir/">سیستم آموزشی گلستان</a></li>
            <li class="footer_li"><a href="http://mail.usc.ac.ir/">پست الکترونیکی</a></li>
            <li class="footer_li"><a href="http://uscconf.ir/">کنفرانس های دانشگاه</a></li>
            <li class="footer_li"><a href="http://oa.usc.ac.ir/FarzinSoft/eOrgan/Login/LoginFrm.aspx?Rnd=5:52:38%20PM&GSN=1">اتوماسیون اداری فرزین</a></li>
            <li class="footer_li"><a href="http://food.usc.ac.ir/">اتوماسیون تغذیه</a></li>
            <li class="footer_li"><a href="http://journal.usc.ac.ir/fa">سامانه نشریات</a></li>
            <li class="footer_li"><a href="http://lib.usc.ac.ir/">کتابخانه دیجیتال</a></li>
            <li class="footer_li"><a href="http://sinapress.ir/">خبرگزاری سیناپرس</a></li>
        </ul>
    </div>
    <div id="footer_center" class="footer_center">
        <h5>پیوند های بیرونی</h5>
        <ul class="footer_ul">
            <li class="footer_li"><a href="http://old.usc.ac.ir/IPPWebV1C035/Persian_WebUI/Templates/WebSiteTemplate1/WebSiteFile1183.aspx">نشریات علمی جهاد دانشگاهی</a></li>
            <li class="footer_li"><a href="https://www.msrt.ir/">وزارت علوم و فناوری</a></li>
            <li class="footer_li"><a href="http://www.behdasht.gov.ir/">وزارت بهداشت,درمان و آموزش پزشکی</a></li>
            <li class="footer_li"><a href="http://sanjesh.org/">سازمان سنجش و آموزش کشور</a></li>
            <li class="footer_li"><a href="http://www.acecr.ac.ir/">جهاد دانشگاهی</a></li>
            <li class="footer_li"><a href="http://old.usc.ac.ir/IPPWebV1C035/Persian_WebUI/Templates/WebSiteTemplate1/WebSiteFile1045.aspx">شعب دانشگاه علم و فرهنگ</a></li>
            <li class="footer_li"><a href="http://old.usc.ac.ir/IPPWebV1C035/Persian_WebUI/Templates/WebSiteTemplate1/WebSiteFile1019.aspx">دانشگاه ها و مراکز آموزش عالی</a></li>
            <li class="footer_li"><a href="https://iueam.ir/">نشریه اقتصاد و مدیریت شهری</a></li>
            <li class="footer_li"><a href="http://old.usc.ac.ir/IPPWebV1C035/Persian_WebUI/Templates/WebSiteTemplate1/WebSiteFile1018.aspx">موتور های جست و جو</a></li>
            <li class="footer_li"><a href="https://t.me/USCNEWSLINE">کانال تلگرام دانشگاه</a></li>
            <li class="footer_li"><a href="http://usc.ac.ir/news/5a48945a03e89e2deb8b4567/staticpage">مراکز جهاد جهاد دانشگاهی</a></li>
        </ul>
    </div>
    <div id="footer_left" class="footer_left">
        <img src="logo2.jpg">
        <p>ساختمان مرکزی:<br>
            بلوار اشرفی اصفهانی - نرسیده به پل اتوبان همت - خیابان شهید قموشی -<br> خیابان بهار - دانشگاه علم و فرهنگ</p>
        <ul>
            <li>صندوق پستی:‌ ۸۷۱-۱۳۱۴۵</li>
            <li> کدپستی: ۱۴۶۱۹۶۸۱۵۱</li>
            <li> تلفن: ۴۴۲۳۸۱۷۱</li>
            <li>نمابر: ۴۴۲۱۴۷۵۰</li>
        </ul>
    </div>
</div>
</body>
</html>

