<?php
include_once '../PRJ_Library/connect.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        <script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>   
    </head>
    <body>
        <div id="modal-wrapper" class="modal">
  
            <form class="modalsign-content animatesign" method="POST" style="width: 60%"> 
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
                         
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
                                        <input id="user" type="text" class="input" name="acc">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pass">
				</div>
<!--				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>-->
				<div class="group">
                                    <input type="submit" class="button" name="btsignin" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="acc">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pass">
				</div>
				<div class="group">
					<label for="pass" class="label">Last Name</label>
					<input id="Lname" type="password" class="input" name="L_name">
				</div>
                            <div class="group">
					<label for="pass" class="label">First Name</label>
					<input id="Fname" type="text" class="input" name="F_name">
				</div>
				<div class="group">
					<label for="pass" class="label">Phone</label>
					<input id="phone" type="text" class="input" name="phone">
				</div>
                            <div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="mail" type="number" class="input" name="mail">
				</div>
                            <div class="group">
					<label for="pass" class="label">Address</label>
					<input id="Addr" type="mail" class="input" name="addr">
				</div>
				<div class="group">
                                    <input type="submit" class="button" name="btsignin" value="Sign Up">
				</div>
				
			</div>
		</div>
	</div>
</div>
    </div>
    </form>
       </div><!--formloginuser-->
       
                                </li>    <!--loginuser-->
        <?php
        
            if(isset($_POST["btsignin"]))
            {
                $acc_log = $_POST["acc"];
                $pass_log = $_POST["pass"];
                
                $query = "SELECT * FROM tai_khoan WHERE acc like '$acc_log' AND pass LIKE '$pass_log'";
                $result = mysqli_query($link, $query);
                $re = mysqli_num_rows($result);
                if($re==0)
                {
                    die('<h4>Sai Tên Đăng Nhập hoặc Mật Khẩu</h4>');
                }
                else {
                    echo '<h4>Đăng nhập thành công</h4>';
                    $_SESSION["User"] = $acc_log;
                }
                
            }
            mysqli_close($link);
        ?>
        
        
                                <?php
        
        if(isset($_POST["btsignin"]))
        {
            $acc = $_POST["acc"];
            $pass = $_POST["pass"];
            $L_name = $_POST["L_name"];
            $F_name = $_POST["F_name"];
            $mail = $_POST["mail"];
            $phon = $_POST["phone"];
            $address = $_POST["addr"];
                    
            $query = "INSERT INTO tai_khoan`(acc`, pass, l_name, first_name, mail, phone, addr) VALUES ('$acc','$pass','$L_name','$F_name','$mail','$phon','$address')";
            $result = mysqli_query($link, $query);
            if (!$result)
            {
                die('<h4>Đăng ký Không Thành Công</h4>');
            } else {
                echo '<h4>Đăng ký Thành Công</h4>';    
            }
        }
        ?>
    </body>
</html>
