<?php 
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            form 
            {
                    width: 500px;
                    margin: 0 auto;
                    padding-left: 300px;
                    padding-bottom: 20px;
                   
            }
              
            h4
            {
                text-align: center;
            }
            body
            {
                font-family: sans-serif;
            }
        </style>
    </head>
    <body>
        <h2>Log In</h2>
        <hr/>
        <form method="POST">
            <p>Username: </p><input name="txtid" type="text" required maxlength="15"><br/>
            <p>Password: </p><input name="txtpass" type="password" required maxlength="15"><br/><br/>
            <input name="login_bt" type="submit" value="Log In" style="margin-left: 95px">
        </form>
        <?php
        include_once '../PRJ_Library/connect_DB.php';
        
        if(isset($_POST["login_bt"]))
        {
            $id = $_POST["txtid"];
            $pass = $_POST["txtpass"];
            
            $query = "SELECT * FROM admin WHERE id = '$id' and pass='$pass';";
            $result = mysqli_query($link, $query);
           
            if(mysqli_num_rows($result)==0)
            {
                die("<h4 style='color:red'>Username or password incorrect !!!</h4>");
            } else {
                $row = mysqli_fetch_array($result);
                $_SESSION["admin"]=$row[0];
                $_SESSION["role"]=$row[2];
                if($_SESSION["role"]==1)
                {
                    header("location:./admin_account/admin_manage_admin.php");                   
                   mysqli_close($link);
                    exit();
                    
                } else {
                     header("location:./product/admin_manage_product.php");
                      mysqli_close($link);
                      exit();
                }
                exit();
            }
        }       
        ?>
    </body>
</html>
