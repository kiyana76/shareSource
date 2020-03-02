<?php

require_once 'config.php';

session_start();

if (isset($_REQUEST['email']) && isset($_REQUEST['pass'])) {
    $username = $_REQUEST['email'];
    $user_pass = $_REQUEST['pass'];

} else {

    return;
}


$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($connect->error) {
    echo "connect error  is   : " . $connect->error;
}
mysqli_query($connect, "SET NAMES utf8");
$query = "SELECT * FROM `seconder_user` WHERE `email`='$username'AND`pass`='$user_pass'";

$db_Query = mysqli_query($connect, $query);


// now we must to create array from result of $db_Query

if (mysqli_num_rows($db_Query) == 0) {
    header('Location: login_process_wrong.html');
}

$Out_Put_user = array();
while ($row = mysqli_fetch_array($db_Query)) {
    $Item = array();

    $Item['userId'] = $row['id'];
    $Item['email'] = $row['email'];
    $Item['pass'] = $row['pass'];
    $Item['name'] = $row['First_name'];
    $Item['lastname'] = $row['Last_name'];


    // If we write  '  $Out_Put = $Item;   ' we have  the last obj of row
    // if we want all of obj of row we must  '  write $Out_Put [] = $Item;   '  to increase the obj at the
    // end of the array
    $Out_Put_user [] = $Item;
}

$query_source = "SELECT * FROM `source` where `validity`= 0";
$db_query_source = mysqli_query($connect, $query_source);

$Out_Put_source = array();
while ($row = mysqli_fetch_array($db_query_source)) {
    $Item = array();

    $Item['Course_name'] = $row['source_name'];
    $Item['author'] = $row['Source_author_name'];
    $Item['source_id'] = $row['id'];
    $Item['date'] = $row['Upload_data'];
    $Item['Download_img'] = $row['Download_img'];
    $Item['Download_Link'] = $row['Download_Link'];
    $Item['Filed_id'] = $row['Filed_id'];
    $Item['Group_id'] = $row['Group_id'];
    $Item['Filed_name'] = '';
    $Item['Source_Type'] = $row['Source_type'];
    if ($Item['Source_Type'] == 1) {
        $Item['Source_Type_Name'] = 'جزوه';
    } elseif ($Item['Source_Type'] == 2) {
        $Item['Source_Type_Name'] = 'کتاب';
    } elseif ($Item['Source_Type'] == 3) {
        $Item['Source_Type_Name'] = 'نمونه سوال';
    } elseif ($Item['Source_Type'] == 4) {
        $Item['Source_Type_Name'] = 'فیلم آموزشی';
    } elseif ($Item['Source_Type'] == 5) {
        $Item['Source_Type_Name'] = 'سوالات کنکور';
    }


    $Out_Put_source [] = $Item;
}


//************************************access filed_name********************
$i = 0;
while ($i < count($Out_Put_source)) {
    switch ($Out_Put_source[$i]['Group_id']) {
        case 1:
            switch ($Out_Put_source[$i]['Filed_id']) {
                case 1:
                    $Out_Put_source[$i]['Filed_name'] = 'مهندسی کامپیوتر';
                    break;
                case 2:
                    $Out_Put_source[$i]['Filed_name'] = 'مهندسی عمران';
                    break;
                case 3:
                    $Out_Put_source[$i]['Filed_name'] = 'آمار';
                    break;
                case 4:
                    $Out_Put_source[$i]['Filed_name'] = 'مهندسی برق';
                    break;
                case 5:
                    $Out_Put_source[$i]['Filed_name'] = 'مهندسی صنایع';
                    break;
                case 6:
                    $Out_Put_source[$i]['Filed_name'] = 'مهندسی مکانیک';
                    break;
            }
            break;
        case 2:
            switch ($Out_Put_source[$i]['Filed_id']) {
                case 1:
                    $Out_Put_source[$i]['Filed_name'] = 'مدیریت مالی';
                    break;
                case 2:
                    $Out_Put_source[$i]['Filed_name'] = 'حسابداری';
                    break;
                case 3:
                    $Out_Put_source[$i]['Filed_name'] = 'مدیریت بازرگانی';
                    break;
                case 4:
                    $Out_Put_source[$i]['Filed_name'] = ' مدیریت صنعتی';
                    break;
                case 5:
                    $Out_Put_source[$i]['Filed_name'] = ' مدیریت فرهنگی هنری';
                    break;
                case 6:
                    $Out_Put_source[$i]['Filed_name'] = ' حقوق';
                    break;
                case 7:
                    $Out_Put_source[$i]['Filed_name'] = ' روانشماسی';
                    break;
                case 8:
                    $Out_Put_source[$i]['Filed_name'] = ' جهانگردی';
                    break;
            }
            break;
        case 3:
            switch ($Out_Put_source[$i]['Filed_id']) {
                case 1:
                    $Out_Put_source[$i]['Filed_name'] = ' هنرهای تجسمی';
                    break;
                case 2:
                    $Out_Put_source[$i]['Filed_name'] = 'ارتباط تصویری';
                    break;
                case 3:
                    $Out_Put_source[$i]['Filed_name'] = ' معماری';
                    break;
                case 4:
                    $Out_Put_source[$i]['Filed_name'] = 'نقاشی';
                    break;
                case 5:
                    $Out_Put_source[$i]['Filed_name'] = ' معماری داخلی';
                    break;
                case 6:
                    $Out_Put_source[$i]['Filed_name'] = ' طراحی پارچه و لباس';
                    break;
                case 7:
                    $Out_Put_source[$i]['Filed_name'] = ' هنر های اسلامی';
                    break;
            }
            break;
        case 4:
            switch ($Out_Put_source[$i]['Filed_id']) {
                case 1:
                    $Out_Put_source[$i]['Filed_name'] = 'علوم پایه';
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
    <title>تایید منابع</title>
    <link rel="stylesheet" href="login_process.css">
</head>
<body>

<div id="content">
    <div id="main_content">
        <h3> تایید نشده ها</h3>
        <div id="recommended_jozve">
            <ul id="jadvale_recommended_jozve">  <!--jadvale jozavate pishnahadie-->
                <?php $i = 0;
                if (count($Out_Put_source) != 0) {
                    while ($i < count($Out_Put_source)) { ?>
                        <li class="list_result">
                            <div>
                                <img class="img_recommend"
                                     src="<?php echo '../upload/' . $Out_Put_source[$i]['Download_img']; ?>">
                                <P>
                                    <?php echo $Out_Put_source[$i]['Course_name'] ?></P>
                                <p> تاریخ انتشار:<?php echo $Out_Put_source[$i]['date'] ?></p>
                                <p>نام منتشرکننده:<?php echo $Out_Put_source[$i]['author'] ?></p>
                                <p>رشته:<?php echo $Out_Put_source[$i]['Filed_name'] ?></p>
                                <p>نوع منبع:<?php echo $Out_Put_source[$i]['Source_Type_Name'] ?></p>
                                <button class="submit_button"><a href="<?php echo"../upload/".$Out_Put_source[$i]['Download_Link'] ?>">دانلود منبع</a></button>
                                <form action="accept_source.php" method="post">
                                    <input type="submit" value="منبع مورد تایید است" class="submit_button">
                                    <input type="hidden" name="id" value=<?php echo $Out_Put_source[$i]['source_id']?>>
                                    <input type="hidden" name="id_user" value=<?php echo $Out_Put_user[0]['userId']?>>
                                </form>
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
</body>