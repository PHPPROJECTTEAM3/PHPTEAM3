<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}

include_once '../../PRJ_Library/connect_DB.php';

$query = "SELECT * FROM `invoice`";
$result = mysqli_query($link, $query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="get">
            <h2>Invoice List</h2>
            <button name="bt_log_out">Log Out</button>
            <hr/>   
        </form>
        <?php
        if (isset($_GET["bt_log_out"])) {
            unset($_SESSION["admin"]);
            header("location:../admin_log_in.php");
            mysqli_close($link);
            exit();
        }
        ?>

        <form
            <p><input name="back_product_list" type="submit" value="Back To Product List"></p>
        </form>
       <?php 
       if(isset($_GET["back_product_list"]))
       {
           header("location:../product/admin_manage_product.php");
           mysqli_close($link);
           exit();
       }
       ?>

        <table border="2">
            <tr>
                <th>ID</th>
                <th>Account</th>
                <th>Total</th>
                <th style="width:30%" >Note</th>
                <th>Date Order</th>
                <th>Date Recive</th>
                <th>Deposit</th>
                <th>Status</th>
                <th colspan="2">....</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) == 0) {
                echo "<tr><td><h3>No Data</h3</td></tr>";
                mysqli_close($link);
                exit();
            }
            ?>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>$row[0]</td>";
                 echo "<td>$row[1]</td>";
                 echo "<td>$row[2]</td>";
                 echo "<td>$row[3]</td>";
                 echo "<td>$row[4]</td>";
                 echo "<td>$row[5]</td>";
                 echo "<td>$row[6]</td>";
                 echo "<td>$row[7]</td>";
                 echo "<td><a href='admin_detail_invoice.php?id=$row[0]'>Detail</a></td>"; 
                echo "<td><a href='admin_edit_invoice.php?id=$row[0]'>Edit</a></td>";               
                echo "</tr>";
               
                // tự động cập nhật khi đơn hàng tróng
                 $query2 = "SELECT `ID_Pro` FROM `detail_invoice` WHERE `ID_Invoice` =$row[0];";
                $result2= mysqli_query($link, $query2);
                $num = mysqli_num_rows($result2);
                if($num == 0)
                {   
                    $query3 = "UPDATE `invoice` SET `status`='Đơn Hàng Trống' WHERE `ID` = $row[0]";
                    $result3 = mysqli_query($link, $query3);
                    
                    if($result3 == FALSE)
                    {
                        echo "<tr><td><h4>Update Status Invoice Faile</h4><td><tr>";
                    }
                }
                
            }
              
            
            mysqli_close($link);
            ?>

        </table>


    </body>
</html>
