 


 <?php
 session_start();
        include_once '../PRJ_Library/connect_DB.php';
        if(isset($_POST["bt_signIn"]))
        {
            $acc = $_POST["username"];
            $pass = $_POST["password"];
            $mail = $_POST["email"];
            $default_reliability ="Khá";
            $query = "INSERT INTO `member`(`acc`,`pass`,`mail`,`reliability`) VALUES ('$acc','$pass','$mail','$default_reliability')";
            $num = mysqli_query($link, $query);
            if ($num==0)
            {
                die('Đăng Ký Thất Bại');
            } else {
                echo'<h4>Đăng Ký Thành Công</h4>';    
            }
            
        mysqli_close($link);
            exit();
        }
        ?>

