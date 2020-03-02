<?php
require_once 'config.php' ;

session_start();

$connect = mysqli_connect(DB_HOST, DB_USER , DB_PASS , DB_NAME);
if (mysqli_connect_error()){
    echo  "ERROR IS : " ."<br>" .mysqli_connect_error() . "<br>" ;
    return;
}
mysqli_query($connect , "SET NAMES utf8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ساخت حساب کاربری</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body><!--تمام لینک های داخل منو باید تا وقتی لاگین نکرده وارد صفحه لاگین شوند!!!!!!!!-->
<div id="container">
    <div id="header">
        <ul id="sign_ul">
            <li class="sign_li"><button id="sign_in" class="button_sign"><a href="login.html">ورود</a></button></li>
            <li id="icon"><img src="unvarm.gif" alt="icon"></li>
        </ul>
    </div>
    <div id="menu">
        <ul class="menu_ul">
            <li class="menu_li"><a href="signup.php">خانه</a></li>
            <li class="menu_li"><a href="signup.php">جزوات</a></li>
            <li class="menu_li"><a href="signup.php">فیلم های آموزشی</a></li>
            <li class="menu_li"><a href="signup.php">نمونه سوال</a></li>
            <li class="menu_li"><a href="signup.php">سوالات کنکور</a></li>
            <li class="menu_li"><a href="signup.php">کتب</a></li>
            <li class="menu_li dropdown">آپلود
                <div class="dropdown-content">
                    <a href="signup.php">جزوه</a>
                    <a href="signup.php">نمونه سوال</a>
                    <a href="signup.php">کتاب</a>
                    <a href="signup.php">سوال کنکور</a>
                    <a href="signup.php">فیلم آموزشی</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="div_signup">
    <h3>ساخت حساب کاربری</h3>
    <div class="div_signup_form">
        <form action="sign_up.php" method="post" id="sign_up" onSubmit = "return checkPassword(this)">
            <ul class="ul_signup">
                <li class="li_signup">
            نام:        <input type="text" name="F_name" placeholder="نام" class="input_signup">
                </li>
                <li class="li_signup">
                    نام خانوادگی:<input type="text" name="L_name" placeholder="نام خانوادگی" class="input_signup">
                </li>
                <li class="li_signup">
                     ایمیل:
                    <input type="email" name="email" placeholder="ایمیل" class="input_signup">
                    <p style="font-size: small;"><span style="color: red;">*</span>از این ایمیل به عنوان نام کاربری شما استفاده خواهد شد.در ثبت آن دقت کنید!</p>
                </li>
                <li class="li_signup">
                    رمز ورود:<input type="text" name="pass" placeholder="رمز ورود" class="input_signup" id="password1">
                </li>
                <li class="li_signup">
                     تکرار رمز ورود:<input type="text" placeholder="رمز ورود" class="input_signup" id="password2">
                </li>
                <li class="li_signup">
                    گروه:<select id="group_list" name="Group_id"  form="sign_up" class="select_signup" onchange="configDDL()">
                        <option name="defualt" value="0">--گزوه خود را انتخاب کنید--</option>
                        <option name="fani" value=1>فنی و مهندسی</option>
                        <option name="ensani" value=2>علوم انسانی</option>
                        <option name="honar" value=3>هنر و معماری</option>
                        <option name="paye" value=4>علوم پایه</option>
                    </select>
                </li>
                <li class="li_signup">
                    رشته:<select id="field_list" name="Filed_id"  form="sign_up" class="select_signup">
                </select>
                </li>
                <li class="li_signup">
                    <input type="submit" value="ثبت کنید" class="submit_button">
                </li>
            </ul>


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

    // Function to check Whether both passwords
    // is same or not.
    function checkPassword(form) {
        var password1 = document.getElementById("password1").value;
        var password2 = document.getElementById("password2").value;

        // If password not entered
        if (password1 == ''){
            alert ("لطفا رمز ورود خود را وارد کنید");
            return false;
        }

        // If confirm password not entered
        else if (password2 == '') {
            alert("لطفا رمز ورود خود را تکرار کنید!");
            return false;
        }

        // If Not same return False.
        else if (password1 != password2) {
            alert ("\nرمز ورود مطابق نبود لطفا دوباره رمز ورود خود را تکرار کنید");
            return false;
        }

        // If same return True.
        else{
            return true;
        }
    }



    //filling out select-option for field

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