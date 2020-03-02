<?php
require_once 'config.php' ;

session_start();

$connect = mysqli_connect(DB_HOST, DB_USER , DB_PASS , DB_NAME);
if (mysqli_connect_error()){
    echo  "ERROR IS : " ."<br>" .mysqli_connect_error() . "<br>" ;
    return;
}
mysqli_query($connect , "SET NAMES utf8");
//******************************get user data***************************************
$fname = $_SESSION["First_name"];
$lname = $_SESSION["Last_name"];
$db_query_user = mysqli_query($connect,"SELECT `id` FROM `normal_user` WHERE `First_name`='$fname' AND `Last_name`='$lname'");
$Out_Put_user = array();
while($row = mysqli_fetch_array($db_query_user))
{
    $Item = array();
    $Item['id'] = $row['id'];
    $Out_Put_user []=$Item;
}
//**************************************get source data*******************************
$source_id = $_GET['id'];
$db_query_source = mysqli_query($connect,"select * from `source` where `id`='$source_id'");
$db_query_soal = mysqli_query($connect,"select * from `source_example` where `Source_id`='$source_id'");
$Out_Put = array();
while ($row = mysqli_fetch_array($db_query_source)){
    $Item = array();
    $Item['Course_name'] = $row['source_name'];
    $Item['author'] = $row['Source_author_name'];
    $Item['Rate'] = $row['Rate'];
    $Item['date'] = $row['Upload_data'];
    $Item['download_count'] = $row['Donload_count'];
    $Item['Rate'] = $row['Rate'];
    $Item['download_link'] = $row['Download_Link'];
    $Item['download_img'] = $row['Download_img'];
    $Out_Put [] = $Item;
}
$Out_Put_soal = array();
while ($row = mysqli_fetch_array($db_query_soal)){
    $Item = array();
    $Item['year'] = $row['year'];
    $Item['Master_name'] = $row['Master_name'];
    $Item['term'] = $row['term'];
    $Out_Put_soal [] = $Item;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>نمونه سوال</title> <!--bayad name nemone soale motde nazar bashe-->
    <link rel="stylesheet" href="nemone%20soal.css">
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
<div class="content" id="content">
    <img class="img_of_nemone_soal" src="<?php echo "../upload/".$Out_Put[0]['download_img'] ?>">
    <div class="information_nemone_soal" id="informaion_nemone_soal">
        <p>نام نمونه سوال:<?php echo $Out_Put[0]['Course_name'] ?></p>
        <p>نام استاد:<?php echo $Out_Put_soal[0]['Master_name'] ?></p>
        <p>سال: <?php echo $Out_Put_soal[0]['year'] ?></p>
        <p>ترم: <?php echo $Out_Put_soal[0]['term'] ?></p>
        <p>تعداد دانلود:  <?php echo $Out_Put[0]['download_count'] ?></p>
        <p> تاریخ آپلود:<?php echo $Out_Put[0]['date'] ?></p>
        <p> نام فرستنده:<?php echo $Out_Put[0]['author'] ?> </p>
        <div class="show-rate">
            امتیاز:
            <div class="stars-outer">
                <div class="stars-inner"></div>
            </div>
        </div>
        <div class="rate">
            <form action="submit_rate.php" method="get">
                امتیاز:
                <input type="number" style="display: none;"  name="source_id" value= <?php echo $_GET['id']; ?> >
                <input type="hidden"  name="rate_per" value= <?php echo $Out_Put[0]['Rate']; ?> >
                <input type="range" name="rate" min="0" max="5" value="0" step="1" class="slider">
                <input type="submit" value="ثبت کنید!" class="submit_button" >
            </form>
        </div>
        <form>
            <button id="download_button"><a href="<?php echo"../upload/".$Out_Put[0]['download_link'] ?>" >دانلود</a></button>
        </form>
    </div>
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
<script>
    //****************show rate*******************
    const starTotal=5;
    var rate = <?php echo $Out_Put[0]['Rate'] ?> ;
    const starPercentage = (rate / starTotal) * 100;
    const starPercentageRounded =(Math.round(starPercentage / 10) * 10) + '%';
    console.log(starPercentageRounded);
    document.getElementsByClassName('stars-inner')[0].style.width = starPercentageRounded;
    //***************************add download count*******************
    document.getElementById("download_button").addEventListener("click",addDownloadCount,false);
    function addDownloadCount() {
        var id_user = <?php echo $Out_Put_user[0]['id'] ?> ;
        var id = <?php echo $source_id ?>;
        var count = <?php echo $Out_Put[0]['download_count'] ?>;
        count++;
        var ajx = new XMLHttpRequest();
        var test = document.getElementById('test');
        var params = "id="+id+"&count="+count+"&id_user="+id_user;

        ajx.onreadystatechange = function() {
            if(ajx.readyState == 4 ) {
                if(ajx.status == 200) {
                    /*test.innerHTML = ajx.responseText ;*/
                    console.log(ajx.responseText);

                } else if (ajx.status === 404) {
                    alert("???? ???? ???? ?????");


                } else {
                    alert('Error Message: ' + ajx.statusText);
                }
            }
        }

        ajx.open('POST', 'update_download_count.php');
        ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        /* ajx.setRequestHeader("Content-length", params.length);
         ajx.setRequestHeader("Connection", "close");*/
        ajx.send(params);
    }

</script>
</body>
</html>