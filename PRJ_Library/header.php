<?php
include_once '../PRJ_Library/connect_DB.php';

?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title><?php echo $pageTitle ?></title>
        <link href="Template.css" rel="stylesheet" type="text/css"/>
        <!--<script src='http://code.jquery.com/jquery-2.1.4.min.js'></script>-->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="../Code/dangkydangnhap.css" rel="stylesheet" type="text/css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <script src="../PRJ_Library/typeahead.js" type="text/javascript"></script>
        <script>
      function validate(){

            var pass = document.getElementById("su_pass").value;
            var comfirm_pass = document.getElementById("su_cfpass").value;
            if (pass!=comfirm_pass) {
                   alert('Nhập Lại Mật Khẩu Không Chính');
               return false;
            }
        }
        
        //code search
        $(document).ready(function () {
           
        $('#txtSearch').typeahead({
         
        source: function (query, result) {
            console.log(query);
            $.ajax({
                url: "searchProduct.php",
                data: 'query=' + query,
                dataType: "json",
                type: "POST",
                success: function (data) {
                    console.log(query);
                    result($.map(data, function (item) {
                        
                        return item;
                        
                    }));
                }
            });
        }
    });
        })   ;
        
        $('#txtSearch').typeahead().bind('typeahead:closed', function () {
            $(this).val("");
        });
        
        $('#txtSearch').on('typeahead:cursorchanged', function (e, datum) {
    console.log(datum);
});
            </script>
    </head>
    <body>
        <!--phần menu-->
<div class="above-nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <p>PHPMOBILE@GMAIL.COM - Hotline:1900 9090</p>
            </div>
            <div class="col-sm-3">
                
                <?php
                    if(isset($_SESSION["username"]))
                    {
                ?>
                <div style="padding-top: 4%;">
                                        <i class="glyphicon glyphicon-user" style="font-size: 18px;"></i>
                                        <a href="quanlytaikhoan.php" style="padding-left: 8%; color: white;">
                                            <?php
                                            echo "Chào ".$_SESSION["username"];
                                            ?>
                                             
                                        </a>
                                        
                                        <a style="color: white;">
                                            <?php
                                            echo "|"
                                            ?>
                                        </a>
                                        
                                        <a href="" style="padding-left: 1%; color: white;">
                                            <?php
                                            echo "Đăng Xuất"
                                            ?>
                                        </a>
                                    </div>
                <?php
                    }else{
                ?>
                    <div href="" onclick="document.getElementById('modal-wrapper').style.display='block'">
                                        <i class="glyphicon glyphicon-user" style="font-size: 18px;"></i>
                                        <div style="padding-top: 4%; padding-left: 9%; color: white;">
                                            Tài Khoản
                                        </div>
                                    </div>
                <?php
                    }
                ?>
               
                                        
                                    
                                    <!--loginuser-->
                                    
                                        
                                    <!--formloginuser-->
       <div id="modal-wrapper" class="modal">
  
    <form class="modalsign-content animatesign" style="width: 60%">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Ðăng Nhập</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Ðăng Ký</label>
                <form class="modalsign-content animatesign"></form>
                <div class="login-form">
                    <form class="login" action="../Code/signIn_User.php" method="POST">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Tên Ðăng Nhập</label>
                                        <input id="user" type="text" class="input" required maxlength="15" name="user_si">
				</div>
				<div class="group">
					<label for="pass" class="label">Mật Khẩu</label>
                                        <input id="pass" type="password" class="input" data-type="password" required maxlength="15" name="pass_si">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span>Ghi Nhớ Tài Khoản</label>
				</div>
				<div class="group">
                                    <input type="submit" class="button" value="Ðăng Nhập" name="bt_signIn">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Quên Mật Khẩu</a>
				</div>
			</div>
                    </form>
                    
                    <form class="formreg" onSubmit="return validate();" action="../Code/signUp_user.php" method="POST">
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Tên Ðăng Nhập</label>
                                        <input id="user" type="text" class="input" required name="username" maxlength="15">
				</div>
				<div class="group">
					<label for="pass" class="label">Mật Khẩu</label>
                                        <input id="su_pass" type="password" class="input" data-type="password" required name="password" maxlength="15">
				</div>
				<div class="group">
					<label for="pass" class="label">Xác Nhận Mật Khẩu</label>
                                        <input id="su_cfpass" type="password" class="input" data-type="password" required maxlength="15">
                                        <span id='message'></span>
				</div>
				<div class="group">
					<label for="pass" class="label">Ðịa Chỉ Email</label>
                                        <input id="pass" type="email" class="input" required name="email" maxlength="50">
				</div>
				<div class="group">
                                    <input type="submit" class="button" value="Ðăng Ký" name="bt_signIn">
				</div>
				
			</div>
                    </form>
		</div>
	</div>
</div>
    </div>
    </form>
       </div><!--formloginuser-->
       
                 <!--loginuser-->
            </div>
        </div>
    </div>
</div>

<div class="nav-wrapper">
    <nav class="navbar-custom" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!--<a class="navbar-logo" href="#" class="pull-left">-->
                <!--<img src="http://placehold.it/200x50&text=@1x" srcset="http://placehold.it/200x50&text=@1x 1x, http://placehold.it/400x100&text=@2x 2x" alt="image" width="200" height="50">-->
                <!--</a>-->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-logo">
                    <img style="height: 50px; display: inline-block;"
                         src="../Images/Thegioididong-icon.png" usemap="#Map" border="0">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right" id="navbar-menu">


                    <li class="<?php if($activeMenu == 'home'){echo 'active';}?>">
                        <a href="Home.php">Trang Chủ </a>

                    </li>
                    <li><a href="">Giới Thiệu</a></li>
                    <li>
                        <a href="">Liên Hệ</a>
                    </li>

                     <li>
                        <form action="" class="search-form">
                            <div class="form-group has-feedback">
                                <label for="search" class="sr-only">Search</label>
                                <input autocomplete="off" type="text" class="form-control" name="search" id="txtSearch" placeholder="search">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </form>

                    </li>

                    <li class="<?php if($activeMenu == 'cart'){echo 'active';}?>">
                        <a href="giohang.php">
                        <button class="cart-form-button" id="cart">
                        <span class="glyphicon glyphicon-shopping-cart" style="font-size: 18px;"></span>
                        </button>
                            <span class="cart-item-quality">0</span>
                        </a>


                    </li>


                </ul>

            </div>
        </div><!-- /.container-fluid -->
    </nav>


</div>
        <div style="background-color: #cccccc">
