<?php
require_once 'config.php';

session_start();
$connect = mysqli_connect(DB_HOST , DB_USER  ,DB_PASS , DB_NAME);
if ($connect->error){
    echo "connect error  is   : " . $connect->error ;
}
mysqli_query($connect , "SET NAMES utf8");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>آپلود سوالات کنکور</title>
    <link rel="stylesheet" href="upload.css">
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
<div class="content">
    <form action="process_konkor.php" method="post" id="upload" class="form_upload" onsubmit="return checkNotEmpty(this)" enctype="multipart/form-data">
        <ul class="ul_upload">
            <li class="li_upload">
                نام:<input type="text" name="source_name" placeholder="نام " class="input_upload" id="field">
            </li>
            <li class="li_upload">
                سال:<input type="number" name="year" placeholder="سال" min="1387" max="1399" class="input_upload" id="year">
            </li>
            <li class="li_upload">
                آپلود فایل :<input type="file" name="file" class="input_upload" id="upload_file" accept=".rar,application/zip,application/pdf"><p style="font-size: small">*فقط مجاز به آپلود PDF , ZIP , RAR هستید.</p>
            </li>
            <li class="li_upload">
                آپلود عکس :<input type="file" name="image" class="input_upload" id="upload_img" accept="image/jpg,image/png,image/gif,image/jpeg">
            </li>
            <li class="li_upload">
                گروه:<select id="group_list" name="Group_id"  form="upload" class="select_signup" onchange="configDDL()">
                    <option name="defualt" value="0">--گزوه خود را انتخاب کنید--</option>
                    <option name="fani" value=1>فنی و مهندسی</option>
                    <option name="ensani" value=2>علوم انسانی</option>
                    <option name="honar" value=3>هنر و معماری</option>
                    <option name="paye" value=4>علوم پایه</option>
                </select>
            </li>
            <li class="li_upload">
                رشته:<select id="field_list" name="Filed_id"  form="upload" class="select_signup">
                </select>
            </li>
            <li class="li_upload">
                <input type="submit" value="ثبت کنید" class="submit_button">
            </li>
        </ul>
    </form>
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
    //checking not empty field
    function checkNotEmpty(form) {
        var field = document.getElementById("field").value;
        var year = document.getElementById("year").value;
        var upload_file = document.getElementById("upload_file").value;
        var upload_img = document.getElementById("upload_img").value;

        // If name not entered
        if (field == ''){
            alert ("لطفا رشته را وارد کنید");
            return false;
        }
        // If year not entered
        else if (year == ''){
            alert ("لطفا سال را وارد کنید!");
            return false;
        }
        // If file not entered
        else if (upload_file == '') {
            alert("لطفا فایل را آپلود کنید!");
            return false;
        }
        // If image not entered
        else if (upload_img == '') {
            alert("لطفا یک عکس برای جزوه آپلود کنید!");
            return false;
        }

        // If same return True.
        else{
            return true;
        }
    }

    var dataSets =
        [
            {
                name:1,//manzor az name hamon meghdar value dar <option> ast.
                options: ["کامپیوتر", "عمران", "آمار", "برق","صنایع","مکانیک"],
                value: [1,2,3,4,5,6]
            },

            {
                name: 2,
                options: ["مدیریت مالی", "حسابداری", "مدیریت بازرگانی", "مدیریت صنعتی","مدیریت فرهنگی هنری","حقوق","روانشناسی","جهانگردی"],
                value: [1,2,3,4,5,6,7,8]
            },
            {
                name:3,
                options:["هنر های تجسمی","ارتباط تصویری","معماری","نقاشی","معماری داخلی","طراحی پارچه و لباس","هنر های اسلامی"],
                value:[1,2,3,4,5,6,7]
            },
            {
                name:4,
                options:["علوم پایه"],
                value:[1]
            }
        ];
    function configDDL()
    {
        var  optionselected, str, j, optionElTwo;

        // get currently selected first option
        optionselected = document.getElementById("group_list").value;

        var i = 0;
        while(dataSets[i].name != optionselected && i < dataSets.length)
        {
            i++;
        }
        //populate second menu
        str = '';
        for(j=0; j < dataSets[i].options.length; j++)
        {
            str += '<option value = "'+dataSets[i].value[j]+'">'+dataSets[i].options[j]+'</option>';

        }
        optionElTwo = document.getElementById("field_list");

        optionElTwo.innerHTML = str;

    }
</script>
</body>
</html>