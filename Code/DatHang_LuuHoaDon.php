<?php
include_once '../PRJ_Library/data_product.inc';
include_once '../PRJ_Library/connect_DB.php';
session_start();
 if(!(isset($_SESSION["cartuser"])))
{
    header("location:Home.php");
    exit();
}


if(!(isset($_SESSION["username"])))
{
    echo 'Bạn Phải Đăng Nhập Trước Khi Mua Hàng';
    exit();
}

$acc_name= $_SESSION["username"];
date_default_timezone_set("Asia/Ho_Chi_Minh");
$date_or = date("Y-m-d - H:i:s");
$dateor = date("Y-m-d");
$date = new DateTime("$dateor");
$date->modify("+1 day");
$date_re =$date->format("Y-m-d");

$query = "INSERT INTO `invoice`(`ac_name`,`date_or`,date_re) VALUES ('$acc_name','$date_or','$date_re')";
$result = mysqli_query($link, $query);
if(!($result))
{
    die('Gặp Lỗi trong quá trình xử lý');
}

$query2= "SELECT `ID` FROM `invoice`";
$result2= mysqli_query($link, $query2);

$num = mysqli_num_rows($result2);
while ($row = mysqli_fetch_array($result2)) {
    $id_inv[] = $row[0];
}

$ID_Invoice =0;
if($num ==0)
{
    $ID_Invoice = 1;
   
} else 
{
$ID_Invoice = max($id_inv);    
}



foreach ($_SESSION["cartuser"] as $ID=>$SP)
    {
   
    $id_pro= $SP->proID;
    $Name_pro = $SP->proName;
    $img_pro = $SP->proImg;
    $price_pro = $SP->proPrice;
    $quantity_pro = $SP->proAmount;
    $total_pro = ($SP->proPrice*$SP->proAmount);
    $query3="INSERT INTO `detail_invoice`(`ID_Invoice`, `ID_Pro`, `Name_pro`, `img_pro`, `price_pro`, `quantity_pro`, `total`) VALUES ($ID_Invoice, $id_pro,'$Name_pro','$img_pro',$price_pro,$quantity_pro,$total_pro)";
    $result3 = mysqli_query($link, $query3);
    }
   
    

if(!($result3))
{
    die('Thanh Toán Thất Bại');
}
 else {
     echo('Thanh Toán Thành Công');
}

        exit();
        ?>
