<?php

require_once 'config.php';

session_start();

if (isset($_REQUEST['email'])   &&  isset($_REQUEST['pass'])){
    $username =$_REQUEST['email'];
    $user_pass = $_REQUEST['pass'];

}else{
	
    return;
}


$connect = mysqli_connect(DB_HOST , DB_USER  ,DB_PASS , DB_NAME);
if ($connect->error){
    echo "connect error  is   : " . $connect->error ;
}
mysqli_query($connect , "SET NAMES utf8");
$query = "SELECT * FROM `normal_user` WHERE `email`='$username'AND`pass`='$user_pass'";

$db_Query = mysqli_query($connect  , $query);


// now we must to create array from result of $db_Query

if (mysqli_num_rows($db_Query) == 0)
{
    header('Location: login_wrong.html');
}

$Out_Put = array();
while ($row = mysqli_fetch_array($db_Query)){
    $Item = array();

    $Item['userId'] = $row['id'];
    $Item['email'] = $row['email'];
    $Item['pass'] = $row['pass'];
    $Item['name'] = $row['First_name'];
    $Item['lastname'] = $row['Last_name'];


    // If we write  '  $Out_Put = $Item;   ' we have  the last obj of row
    // if we want all of obj of row we must  '  write $Out_Put [] = $Item;   '  to increase the obj at the
    // end of the array
    $Out_Put [] = $Item;
}

// for show Out_Put and convert Out_Put to Json we must write this code
      // echo json_encode($Out_Put);
       /*echo"$username";*/
    $_SESSION["First_name"] = $Item['name'];
    $_SESSION["Last_name"] = $Item['lastname'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود</title>
    <link rel="stylesheet" href="login.css">
</head>
<body><!--تمام لینک های داخل منو باید تا وقتی لاگین نکرده وارد صفحه لاگین شوند!!!!!!!!!!!!-->
<div id="container">
    <div id="header">
        <ul id="sign_ul">
            <div class="user-info"><a href="dashboard.php"> <?php echo $_SESSION["First_name"];
                    echo " ";
                    echo $_SESSION["Last_name"]; ?></a></div>
            <li id="icon"><img src="unvarm.gif" alt="icon"></li>
        </ul>
    </div>
    <div id="menu">
        <ul class="menu_ul">
            <li class="menu_li"><a href="main%20page.php">خانه</a></li>
            <li class="menu_li"><a href="jozve.php">جزوات</a></li>
            <li class="menu_li"><a href="film.php">فیلم های آموزشی</a></li>
            <li class="menu_li"><a href="soal.php">نمونه سوال</a></li>
            <li class="menu_li"><a href="konkor.php">سوالات کنکور</a></li>
            <li class="menu_li"><a href="ketab.php">کتب</a></li>
            <li class="menu_li dropdown">آپلود
                <div class="dropdown-content">
                    <a href="upload/upload_jozve.php">جزوه</a>
                    <a href="upload/upload_nemone_soal.php">نمونه سوال</a>
                    <a href="upload/ketab.php">کتاب</a>
                    <a href="upload/upload_konkor.php">سوال کنکور</a>
                    <a href="upload/upload_video.php">فیلم آموزشی</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<div id="content" class="content">
    سلام
    <?php echo $Item['name']; echo " "; echo $Item['lastname'];?>
</div>
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