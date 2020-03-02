<?php
require_once 'config.php';

session_start();

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_error()) {
    echo "ERROR IS : " . "<br>" . mysqli_connect_error() . "<br>";
    return;
}
mysqli_query($connect, "SET NAMES utf8");
$query = "SELECT * FROM `seconder_user`";
$db_query = mysqli_query($connect, $query);
$Out_Put = array();
while ($row = mysqli_fetch_array($db_query)) {
    $Item = array();
    $Item['id'] = $row['id'];
    $Item['First_name'] = $row['First_name'];
    $Item['Last_name'] = $row['Last_name'];
    $Item['Group_id'] = $row['Group_id'];
    $Item['Filed_id'] = $row['Filed_id'];
    $Item['Email'] = $row['email'];
    $Item['pass'] = $row['pass'];
    $Item['Filed_name'] = '';
    $Out_Put [] = $Item;
}
//*********************************access filed name*****************
$i = 0;
while ($i < count($Out_Put)) {
    switch ($Out_Put[$i]['Group_id']) {
        case 1:
            switch ($Out_Put[$i]['Filed_id']) {
                case 1:
                    $Out_Put[$i]['Filed_name'] = 'مهندسی کامپیوتر';
                    break;
                case 2:
                    $Out_Put[$i]['Filed_name'] = 'مهندسی عمران';
                    break;
                case 3:
                    $Out_Put[$i]['Filed_name'] = 'آمار';
                    break;
                case 4:
                    $Out_Put[$i]['Filed_name'] = 'مهندسی برق';
                    break;
                case 5:
                    $Out_Put[$i]['Filed_name'] = 'مهندسی صنایع';
                    break;
                case 6:
                    $Out_Put[$i]['Filed_name'] = 'مهندسی مکانیک';
                    break;
            }
            break;
        case 2:
            switch ($Out_Put[$i]['Filed_id']) {
                case 1:
                    $Out_Put[$i]['Filed_name'] = 'مدیریت مالی';
                    break;
                case 2:
                    $Out_Put[$i]['Filed_name'] = 'حسابداری';
                    break;
                case 3:
                    $Out_Put[$i]['Filed_name'] = 'مدیریت بازرگانی';
                    break;
                case 4:
                    $Out_Put[$i]['Filed_name'] = ' مدیریت صنعتی';
                    break;
                case 5:
                    $Out_Put[$i]['Filed_name'] = ' مدیریت فرهنگی هنری';
                    break;
                case 6:
                    $Out_Put[$i]['Filed_name'] = ' حقوق';
                    break;
                case 7:
                    $Out_Put[$i]['Filed_name'] = ' روانشماسی';
                    break;
                case 8:
                    $Out_Put[$i]['Filed_name'] = ' جهانگردی';
                    break;
            }
            break;
        case 3:
            switch ($Out_Put[$i]['Filed_id']) {
                case 1:
                    $Out_Put[$i]['Filed_name'] = ' هنرهای تجسمی';
                    break;
                case 2:
                    $Out_Put[$i]['Filed_name'] = 'ارتباط تصویری';
                    break;
                case 3:
                    $Out_Put[$i]['Filed_name'] = ' معماری';
                    break;
                case 4:
                    $Out_Put[$i]['Filed_name'] = 'نقاشی';
                    break;
                case 5:
                    $Out_Put[$i]['Filed_name'] = ' معماری داخلی';
                    break;
                case 6:
                    $Out_Put[$i]['Filed_name'] = ' طراحی پارچه و لباس';
                    break;
                case 7:
                    $Out_Put[$i]['Filed_name'] = ' هنر های اسلامی';
                    break;
            }
            break;
        case 4:
            switch ($Out_Put[$i]['Filed_id']) {
                case 1:
                    $Out_Put[$i]['Filed_name'] = 'علوم پایه';
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
    <title>حذف کاربرهای تایید کننده</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div id="container">
    <div id="header">
        <ul id="sign_ul">
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
    <table>
        <tr>
            <th>ایمیل</th>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>رشته</th>
            <th>حذف کردن</th>
            <th>ثبت</th>
        </tr>
        <?php
        $i = 0;
        while ($i < count($Out_Put)) {
            ?>
            <tr>
                <td><?php echo $Out_Put[$i]['Email'] ?></td>
                <td><?php echo $Out_Put[$i]['First_name'] ?></td>
                <td><?php echo $Out_Put[$i]['Last_name'] ?></td>
                <td><?php echo $Out_Put[$i]['Filed_name'] ?></td>
                <td>
                    <form action="process_delete_secondery.php" method="post" id="checkbox_accept">
                        <input type="checkbox" name="accept">
                        <input type="hidden" name="id" value=<?php echo $Out_Put[$i]['id']?>>
                </td>
                <td>
                    <input type="submit" value="حذف">
                    </form>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </table>
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
