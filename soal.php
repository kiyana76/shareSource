<?php
require_once 'config.php';

session_start();

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_error()) {
    echo "ERROR IS : " . "<br>" . mysqli_connect_error() . "<br>";
    return;
}
mysqli_query($connect, "SET NAMES utf8");

//*************************************access nemone soal**********************
$query_2 = "SELECT * FROM `source` WHERE `Source_type` = 3 AND `validity`=1 ORDER BY id DESC LIMIT 24 ";
$db_query_2 = mysqli_query($connect, $query_2);
$Out_Put_soal = array();
while ($row = mysqli_fetch_array($db_query_2)) {
    $Item = array();
    $Item['Course_name'] = $row['source_name'];
    $Item['author'] = $row['Source_author_name'];
    $Item['source_id'] = $row['id'];
    $Item['date'] = $row['Upload_data'];
    $Item['Download_img'] = $row['Download_img'];
    $Item['Filed_id'] = $row['Filed_id'];
    $Item['Group_id'] = $row['Group_id'];
    $Item['Filed_name'] = '';
    $Item['Source_Type'] = $row['Source_type'];
    if ($Item['Source_Type'] == 1) {
        $Item['Source_Type_Name'] = 'jozve';
    } elseif ($Item['Source_Type'] == 2) {
        $Item['Source_Type_Name'] = 'ketab';
    } elseif ($Item['Source_Type'] == 3) {
        $Item['Source_Type_Name'] = 'soal';
    } elseif ($Item['Source_Type'] == 4) {
        $Item['Source_Type_Name'] = 'film';
    } elseif ($Item['Source_Type'] == 5) {
        $Item['Source_Type_Name'] = 'konkor';
    }
    $Out_Put_soal [] = $Item;
}
//************************************access filed_name********************
$i = 0;
while ($i < count($Out_Put_soal)) {
    switch ($Out_Put_soal[$i]['Group_id']) {
        case 1:
            switch ($Out_Put_soal[$i]['Filed_id']) {
                case 1:
                    $Out_Put_soal[$i]['Filed_name'] = 'مهندسی کامپیوتر';
                    break;
                case 2:
                    $Out_Put_soal[$i]['Filed_name'] = 'مهندسی عمران';
                    break;
                case 3:
                    $Out_Put_soal[$i]['Filed_name'] = 'آمار';
                    break;
                case 4:
                    $Out_Put_soal[$i]['Filed_name'] = 'مهندسی برق';
                    break;
                case 5:
                    $Out_Put_soal[$i]['Filed_name'] = 'مهندسی صنایع';
                    break;
                case 6:
                    $Out_Put_soal[$i]['Filed_name'] = 'مهندسی مکانیک';
                    break;
            }
            break;
        case 2:
            switch ($Out_Put_soal[$i]['Filed_id']) {
                case 1:
                    $Out_Put_soal[$i]['Filed_name'] = 'مدیریت مالی';
                    break;
                case 2:
                    $Out_Put_soal[$i]['Filed_name'] = 'حسابداری';
                    break;
                case 3:
                    $Out_Put_soal[$i]['Filed_name'] = 'مدیریت بازرگانی';
                    break;
                case 4:
                    $Out_Put_soal[$i]['Filed_name'] = ' مدیریت صنعتی';
                    break;
                case 5:
                    $Out_Put_soal[$i]['Filed_name'] = ' مدیریت فرهنگی هنری';
                    break;
                case 6:
                    $Out_Put_soal[$i]['Filed_name'] = ' حقوق';
                    break;
                case 7:
                    $Out_Put_soal[$i]['Filed_name'] = ' روانشماسی';
                    break;
                case 8:
                    $Out_Put_soal[$i]['Filed_name'] = ' جهانگردی';
                    break;
            }
            break;
        case 3:
            switch ($Out_Put_soal[$i]['Filed_id']) {
                case 1:
                    $Out_Put_soal[$i]['Filed_name'] = ' هنرهای تجسمی';
                    break;
                case 2:
                    $Out_Put_soal[$i]['Filed_name'] = 'ارتباط تصویری';
                    break;
                case 3:
                    $Out_Put_soal[$i]['Filed_name'] = ' معماری';
                    break;
                case 4:
                    $Out_Put_soal[$i]['Filed_name'] = 'نقاشی';
                    break;
                case 5:
                    $Out_Put_soal[$i]['Filed_name'] = ' معماری داخلی';
                    break;
                case 6:
                    $Out_Put_soal[$i]['Filed_name'] = ' طراحی پارچه و لباس';
                    break;
                case 7:
                    $Out_Put_soal[$i]['Filed_name'] = ' هنر های اسلامی';
                    break;
            }
            break;
        case 4:
            switch ($Out_Put_soal[$i]['Filed_id']) {
                case 1:
                    $Out_Put_soal[$i]['Filed_name'] = 'علوم پایه';
                    break;
            }
            break;
    }
    $i++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>نمونه سولات</title>
    <link rel="stylesheet" href="main%20page.css">
</head>
<body>
<div id="container">
    <div id="header">
        <ul id="sign_ul">
            <div class="user-info"><?php echo $_SESSION["First_name"];
                echo " ";
                echo $_SESSION["Last_name"]; ?></div>
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
<div id="content">
    <div id="main_content">
        <h3> جدیدترین ها....</h3>
        <h4>نمونه سوال</h4>
        <div>
            <h4>نمونه سوالات</h4>
            <div id="recommended_nemone_soal">
                <ul id="jadvale_recommended_nemone_soal">  <!--jadvale nemonesoal pishnahadie-->
                    <?php $i = 0;
                    if (count($Out_Put_soal) != 0) {
                        while ($i < count($Out_Put_soal)) { ?>
                            <li class="list_result">
                                <div>
                                    <img class="img_recommend"
                                         src="<?php echo 'upload/' . $Out_Put_soal[$i]['Download_img']; ?>">
                                    <a href="download/<?php echo $Out_Put_soal[$i]['Source_Type_Name'] ?>.php?id=<?php echo $Out_Put_soal[$i]['source_id'] ?>">
                                        <?php echo $Out_Put_soal[$i]['Course_name'] ?></a>
                                    <p> تاریخ انتشار:<?php echo $Out_Put_soal[$i]['date'] ?></p>
                                    <p>نام منتشرکننده:<?php echo $Out_Put_soal[$i]['author'] ?></p>
                                    <p>رشته:<?php echo $Out_Put_soal[$i]['Filed_name'] ?></p>
                                </div>
                            </li>
                            <?php $i++;
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
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