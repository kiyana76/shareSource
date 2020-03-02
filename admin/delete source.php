<?php
require_once 'config.php';
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_error()) {
    echo "ERROR IS : " . "<br>" . mysqli_connect_error() . "<br>";
    return;
}
mysqli_query($connect, "SET NAMES utf8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>حذف منابع</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div id="container">
    <div id="header">
        <ul id="sign_ul">
            <!--<div class="user-info"><?php /*echo $_SESSION["First_name"];
                echo " ";
                echo $_SESSION["Last_name"]; */ ?></div>-->
            <li id="icon"><img src="unvarm.gif" alt="icon"></li>
        </ul>
    </div>
    <div id="menu">
        <ul class="menu_ul">
            <li class="menu_li"><a href="delete%20source.php">حذف منبع</a></li>
            <li class="menu_li"><a href="delete%20secondery.php">حذف کاربر ویژه</a></li>
            <li class="menu_li"><a href="admin_accept_secondery_user.php">تایید کاربر ویژه</a></li>
        </ul>
    </div>
</div>
<div class="content">
    نام منبع مورد نظر برای حدف را وارد نمایید:
    <form action="process_delete.php" method="post">
        <input type="text" name="source_name" placeholder="نام منبع">
        <input type="submit">
    </form>
</div>
<div id="footer" class="footer">
    <div id="footer_right" class="footer_right">
        <h5>خدمات الکترونیکی</h5>
        <ul class="footer_ul">
            <li class="footer_li"><a href="http://edu.usc.ac.ir/">سیستم آموزشی گلستان</a></li>
            <li class="footer_li"><a href="http://mail.usc.ac.ir/">پست الکترونیکی</a></li>
            <li class="footer_li"><a href="http://uscconf.ir/">کنفرانس های دانشگاه</a></li>
            <li class="footer_li"><a
                    href="http://oa.usc.ac.ir/FarzinSoft/eOrgan/Login/LoginFrm.aspx?Rnd=5:52:38%20PM&GSN=1">اتوماسیون
                    اداری فرزین</a></li>
            <li class="footer_li"><a href="http://food.usc.ac.ir/">اتوماسیون تغذیه</a></li>
            <li class="footer_li"><a href="http://journal.usc.ac.ir/fa">سامانه نشریات</a></li>
            <li class="footer_li"><a href="http://lib.usc.ac.ir/">کتابخانه دیجیتال</a></li>
            <li class="footer_li"><a href="http://sinapress.ir/">خبرگزاری سیناپرس</a></li>
        </ul>
    </div>
    <div id="footer_center" class="footer_center">
        <h5>پیوند های بیرونی</h5>
        <ul class="footer_ul">
            <li class="footer_li"><a
                    href="http://old.usc.ac.ir/IPPWebV1C035/Persian_WebUI/Templates/WebSiteTemplate1/WebSiteFile1183.aspx">نشریات
                    علمی جهاد دانشگاهی</a></li>
            <li class="footer_li"><a href="https://www.msrt.ir/">وزارت علوم و فناوری</a></li>
            <li class="footer_li"><a href="http://www.behdasht.gov.ir/">وزارت بهداشت,درمان و آموزش پزشکی</a></li>
            <li class="footer_li"><a href="http://sanjesh.org/">سازمان سنجش و آموزش کشور</a></li>
            <li class="footer_li"><a href="http://www.acecr.ac.ir/">جهاد دانشگاهی</a></li>
            <li class="footer_li"><a
                    href="http://old.usc.ac.ir/IPPWebV1C035/Persian_WebUI/Templates/WebSiteTemplate1/WebSiteFile1045.aspx">شعب
                    دانشگاه علم و فرهنگ</a></li>
            <li class="footer_li"><a
                    href="http://old.usc.ac.ir/IPPWebV1C035/Persian_WebUI/Templates/WebSiteTemplate1/WebSiteFile1019.aspx">دانشگاه
                    ها و مراکز آموزش عالی</a></li>
            <li class="footer_li"><a href="https://iueam.ir/">نشریه اقتصاد و مدیریت شهری</a></li>
            <li class="footer_li"><a
                    href="http://old.usc.ac.ir/IPPWebV1C035/Persian_WebUI/Templates/WebSiteTemplate1/WebSiteFile1018.aspx">موتور
                    های جست و جو</a></li>
            <li class="footer_li"><a href="https://t.me/USCNEWSLINE">کانال تلگرام دانشگاه</a></li>
            <li class="footer_li"><a href="http://usc.ac.ir/news/5a48945a03e89e2deb8b4567/staticpage">مراکز جهاد جهاد
                    دانشگاهی</a></li>
        </ul>
    </div>
    <div id="footer_left" class="footer_left">
        <img src="logo2.jpg">
        <p>ساختمان مرکزی:<br>
            بلوار اشرفی اصفهانی - نرسیده به پل اتوبان همت - خیابان شهید قموشی -<br> خیابان بهار - دانشگاه علم و فرهنگ
        </p>
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
