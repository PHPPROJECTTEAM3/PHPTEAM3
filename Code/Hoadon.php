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
session_start();
$pageTitle = "Tài Khoản";
$activeMenu = "home";
include_once '../PRJ_Library/header.html';

include_once '../PRJ_Library/connect_DB.php';
?>
<div style="background-color:#fff ">
    <div class="container" style="padding-bottom: 10%;">
        <div class="row">
            <div class="col-sm-3" style="padding-top: 10%;">
                <ul>
                    <li><button id="bt_profile"><i class="fa fa-eye" style="color: black;"></i>Thông tin tài khoản</button></li>
                    <li><button id="bt_invoice">Quản lí đơn hàng</button></li>
                    <li><a id="bt_notice" href="">Thông báo</a></li>
                    <li><a id="bt_logout" href="">Đăng xuất</a></li>
                </ul>     
            </div>
            

 <?php
                    if(!isset($_SESSION["username"]))
                    {
                        exit('Bặn Chưa Đăng Nhập');
                    }
                     $acc = $_SESSION["username"];
                    ?>
                <!-- Phần Hóa Đơn --> 
                
                <?php 
               

                $query3 = "SELECT invoice.ID ,invoice.ac_name , detail_invoice.img, detail_invoice.ID_Pro,detail_invoice.Name_pro,detail_invoice.Quantity_pro,detail_invoice.total 
                            FROM invoice, detail_invoice 
                            WHERE invoice.ID = detail_invoice.ID_Invoice AND invoice.ac_name ='$acc'";
                $result3 = mysqli_query($link, $query3);
                $num = mysqli_num_rows($result3);
               
                ?>
                <div class="col-sm-8" style="margin-top: 10%; background-color: white; text-align: center; border-radius:5px; ">
                    <table class="table table-striped">
                    <thead id="initial_invoice">
                        <?php
                        
                         if($num ==0)
                            {
                                echo '<tr><td><h2>Chưa Có Đơn Hàng</h2></td></tr>';
                            }else {    
                                while ($col = mysqli_fetch_array($result3))
                                {                           $code_invoice = 0;
                               
                               
                        ?>
                        <tr>
                            <td><h3>Mã Đơn Hàng: <?php echo $col[0] ?></h3></td>
                        </tr>
                        <tr>
                            <th>STT</th>
                            <th>Hình Ảnh</th>
                            <th>Mã Sản Phẩm</th>
                            <th>Tên Sản phẩm</th>
                            <th>Số Lượng</th>
                            <th>Tổng Tiền</th>
                        </tr>
                        
                         <?php 
                                 $count = 1;
                         {?>
                    </thead>
                    <tbody id="end_invoice">
                        <tr>
                            
                            <td><a href="#" class="listchr"><?php echo $count ?></a></td>
                            <td><a href="#" class="listchr"><?php echo $col[2] ?></a></td>
                            <td><a href="#" class="listchr"><?php echo $col[3] ?></a></td>
                            <td><a href="#" class="listchr"><?php echo $col[4] ?></a></td>
                            <td><a href="#" class="listchr"><?php echo $col[5] ?></a></td>
                            <td><a href="#" class="listchr"><?php echo $col[6] ?></a></td>
                        </tr>
                    </tbody> 
                </table>
                            <?php $count++; }}}?>
                    <!-- End Hóa Đơn -->


                    <!-- Phẩn Thông tin Tài Khoản -->
                  <?php 
                 
                  
                  $query = "SELECT * FROM `member` WHERE `acc` LIKE '$acc'";
                  $result = mysqli_query($link, $query);
                  
                  $col = mysqli_fetch_array($result);
                  ?>
                    <form method="POST">                      
                        <table class="table table-striped">
                    <thead id="initial_profile">   
                        <tr>
                            <th><h2>Thông Tin Tài Khoản</h2></th>
                        </tr>
                    </thead>

                    <tbody id="end_profile" style="width: 100%;">
                        <tr>
                            <td><label>Họ và Tên Đệm</label> <input name="L_Name_profile" type="text" maxlength="30" required value="<?php echo $col[2]; ?>"></td>

                        </tr>
                        <tr> <td><label>Tên</label> <input name="F_Name_profile" type="text" maxlength="20" required value="<?php echo $col[3]; ?>"></td></tr>
                        <tr>
                            <td><label>Số Điện Thoại</label> <input name="Phone_profile" type="tel" maxlength="10" required value="0<?php echo $col[5]; ?>"></td>
                        </tr>
                        <tr>
                            <td><label>Địa Chỉ Email</label> <input name="Email_profile" type="email" maxlength="50" required value="<?php echo $col[4]; ?>"></td>
                        </tr>
                        <tr>
                            <td>
                                <label>Giới Tính</label>
                                <select name="Gender_profile">
                                    <option value="<?php echo $col[6]; ?>"><?php echo $col[6].' (Đã Chọn)' ?></option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </td>
                        </tr>
                        <tr> 
                            <td><label>Ngày Sinh</label> <input name="Dob_profile" type="date" maxlength="10" required value="<?php echo $col[7]; ?>"></td>
                        </tr>
                         <tr> 
                             <td><p><strong>Mức Độ Tin Cậy:</strong> <?php echo $col[8] ?></p></td>
                        </tr>
                        <tr>      
                            <td><input name="bt_profile" type="submit" value="Cập Nhật Thông Tin"></td>
                        </tr>
                    </tbody>
                        </table>
                    </form>
                  

                    <script language="javascript">
                        //Hide Hóa Đơn
                        $("#initial_invoice").hide();
                        $("#end_invoice").hide();
                        
                        // function Hóa Đơn
                        $(document).ready(function () {
                            $("#bt_invoice").click(function () {
                                $("#initial_invoice").toggle();
                                $("#end_invoice").toggle();
                  
                                $("#initial_profile").hide();
                                $("#end_profile").hide();
                            });
                         
                         //function Profile
                     
                            $("#bt_profile").click(function () {
                                $("#initial_profile").toggle();
                                $("#end_profile").toggle();
                                
                                $("#initial_invoice").hide();
                                $("#end_invoice").hide();
                            });
                        }); //End $(document).ready function
                    </script>

<!--<tbody>
                    <?php foreach ($result as $key => $item) { ?>
    <tr>
    <td><a href="#" class="listchr"><?php echo $key + 1; ?></a></td>
    <td><a href="#" class="listchr"><?php echo "$item[namechurch]" ?></a></td>
    </tr>
                    <?php } ?>
</tbody>  -->
                                  
            </div>
        </div>
    </div>
</div>

<?php 
                    if(isset($_POST["bt_profile"]))
                    {
                        $l_name = $_POST["L_Name_profile"];
                        $f_name = $_POST["F_Name_profile"];
                        $phone_ = $_POST["Phone_profile"];
                        $email_ = $_POST["Email_profile"];
                        $gender_ = $_POST["Gender_profile"];
                        $Dob_ = $_POST["Dob_profile"];
                     
                        $query2 ="UPDATE `member` SET `l_name`='$l_name',`f_name`='$f_name',`mail`='$email_',`phone`= $phone_,`gender`= '$gender_',`date_birth`= '$Dob_' WHERE acc like '$acc'";
                        $result2 = mysqli_query($link, $query2);
                        if ($result)
                        {
                            echo '<h2>Cập Nhật Thành Công</h2>';
                           //header("Refresh:0;"); Không Dùng được lệnh header
                        }
                        
                        
                        
                    }
                    ?>


<?php
include_once '../PRJ_Library/footer.html';
?>
