 


 <?php
 session_start();
        include_once '../PRJ_Library/connect_DB.php';
        if(isset($_POST["bt_signIn"]))
        {
            $acc = $_POST["username"];
            $pass = $_POST["password"];
            $mail = $_POST["email"];
          
            $query = "INSERT INTO `member`(`acc`,`pass`,`mail`) VALUES ('$acc','$pass','$mail')";
            $result = mysqli_query($link, $query);
            if (!($result))
            {
                die('Đăng Ký Thất Bại');
            } else {
                echo'<h4>Đăng Ký Thành Công</h4>';    
            }
        mysqli_close($link);
                        exit();
        }

        ?>

