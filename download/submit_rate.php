<?php
require_once 'config.php' ;

session_start();

$connect = mysqli_connect(DB_HOST, DB_USER , DB_PASS , DB_NAME);
if (mysqli_connect_error()){
    echo  "ERROR IS : " ."<br>" .mysqli_connect_error() . "<br>" ;
    return;
}
mysqli_query($connect , "SET NAMES utf8");
//******************************************submit rate****************
$Rate=0;
$rate_per=0;
$id = "";
if(isset($_REQUEST['rate']) && isset($_REQUEST['source_id'])  && isset($_REQUEST['rate_per']))
{
    $Rate = (int)$_REQUEST['rate'];
    $id = $_REQUEST['source_id'];
    $rate_per = (int)$_REQUEST['rate_per'];
}
//*************************************access rate count************************
$query = "SELECT `Rate_count` FROM `source` where `id` = '$id'";
$db_query = mysqli_query($connect,$query);
$Out_Put = array();
while ($row = mysqli_fetch_array($db_query)){
    $Item = array();

   $Item['Rate_count'] = $row['Rate_count'];

    $Out_Put [] = $Item;
}
$Rate_count = $Out_Put[0]['Rate_count'];
//********************************************************
$Rate = ($rate_per*$Rate_count)+$Rate;
$Rate = $Rate/($Rate_count+1);
$Rate_count+=1;
$query_1 = "UPDATE `source` SET `Rate` = '$Rate' , `Rate_count` = '$Rate_count' WHERE `id`= '$id' ";
$db_query_1 = mysqli_query($connect , $query_1 );
if ($connect->query($query_1)===  true) {
    echo " ";
}else{
    echo "error    "  .$connect->error ;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ثبت امتیاز</title> <!--name jozve bayad beshe-->
    <link rel="stylesheet" href="jozve.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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
            <li class="menu_li">خانه</li>
            <li class="menu_li">جزوات</li>
            <li class="menu_li">فیلم های آموزشی</li>
            <li class="menu_li">نمونه سوال</li>
            <li class="menu_li">سوالات کنکور</li>
            <li class="menu_li">کتب</li>
            <li class="menu_li dropdown">آپلود
                <div class="dropdown-content">
                    <a href="upload/upload_jozve.html">جزوه</a>
                    <a href="upload/upload_nemone_soal.html">نمونه سوال</a>
                    <a href="upload/ketab.html">کتاب</a>
                    <a href="upload/upload_konkor.html">سوال کنکور</a>
                    <a href="upload/upload_video.html">فیلم آموزشی</a>
                </div>
            </li>
        </ul>
    </div>
</div>

<div id="content">
    <br>
    نظر شما ثبت شد.از رای و نظر شما متشکریم!
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
