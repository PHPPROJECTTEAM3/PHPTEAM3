<!--<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Members</title>
        <link href="Template.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="../Code/dangkydangnhap.css" rel="stylesheet" type="text/css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    </head>
    <body>-->
<?php
$pageTitle = "Members";
$activeMenu = "home";
include_once '../PRJ_Library/header.html';
?>
<div style="background-color:#fff ">
<div class="container" style="padding-bottom: 10%;">
            <div class="row">
                <div class="col-sm-3" style="padding-top: 10%;">
                    <ul>
                        <li><a href=""><i class="fa fa-eye" style="color: black;"></i>Thông tin tài khoản</a></li>
                        <li><a href="hoadon.php">Quản lí đơn hàng</a></li>
                        <li><a href="">Thông báo</a></li>
                        <li><a href="">Đăng xuất</a></li>
                       
                    </ul>
                </div>
                
                
                <div class="col-sm-8" style="margin-top: 10%; background-color: white; text-align: center; border-radius:5px; ">
                <table class="table table-striped">
<thead>
<tr>
<th>STT</th>
<th>Hình Sản Phẩm</th>
<th>Mã Đơn Hàng</th>
<th>Mã Sản Phẩm</th>
<th>Tên Sản phẩm</th>
<th>Số Lượng</th>
<th>Tổng Tiền</th>
</tr>
</thead>
<tbody>
  
<tr>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">Null</a></td>
<td><a href="#" class="listchr">PHP01</a></td>
<td><a href="#" class="listchr">APPX</a></td>
<td><a href="#" class="listchr">IphoneX</a></td>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">22.000.000 VNĐ</a></td>
</tr>
<tr>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">Null</a></td>
<td><a href="#" class="listchr">PHP01</a></td>
<td><a href="#" class="listchr">APPX</a></td>
<td><a href="#" class="listchr">IphoneX</a></td>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">22.000.000 VNĐ</a></td>
</tr>
<tr>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">Null</a></td>
<td><a href="#" class="listchr">PHP01</a></td>
<td><a href="#" class="listchr">APPX</a></td>
<td><a href="#" class="listchr">IphoneX</a></td>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">22.000.000 VNĐ</a></td>
</tr>
<tr>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">Null</a></td>
<td><a href="#" class="listchr">PHP01</a></td>
<td><a href="#" class="listchr">APPX</a></td>
<td><a href="#" class="listchr">IphoneX</a></td>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">22.000.000 VNĐ</a></td>
</tr>
<tr>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">Null</a></td>
<td><a href="#" class="listchr">PHP01</a></td>
<td><a href="#" class="listchr">APPX</a></td>
<td><a href="#" class="listchr">IphoneX</a></td>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">22.000.000 VNĐ</a></td>
</tr>
<tr>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">Null</a></td>
<td><a href="#" class="listchr">PHP01</a></td>
<td><a href="#" class="listchr">APPX</a></td>
<td><a href="#" class="listchr">IphoneX</a></td>
<td><a href="#" class="listchr">1</a></td>
<td><a href="#" class="listchr">22.000.000 VNĐ</a></td>
</tr>

   
</tbody> 
<!--<tbody>
  <?php foreach ($result as $key => $item)  { ?>
<tr>
<td><a href="#" class="listchr"><?php echo $key+1; ?></a></td>
<td><a href="#" class="listchr"><?php  echo "$item[namechurch]" ?></a></td>
</tr>
    <?php } ?>
</tbody>  -->
                </table>                    
                </div>
            </div>
        </div>
</div>
<?php
include_once '../PRJ_Library/footer.html';
?>
