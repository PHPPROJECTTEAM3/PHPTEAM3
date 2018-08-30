<?php
 include_once '../PRJ_Library/connect_DB.php';
        if(isset($_POST["bt_signIn"]))
        {
            $acc_si = $_POST["user_si"];
            $pass_si = $_POST["pass_si"];
            
            $query = "SELECT * FROM member WHERE acc like '$acc_si' AND pass like '$pass_si'";
            $result = mysqli_query($link, $query);
            if (!($result))
            {
                die('Đăng Nhập Thất Bại');
            } else {
                echo'<h4>Đăng Nhập Thành Công</h4>';    
                
                header("location:Home.php?name=$acc_si");
                mysqli_close($link);
                exit();
            }
        }
        ?>

