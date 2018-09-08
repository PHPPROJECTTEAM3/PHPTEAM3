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
    
            <h2>Invoice List</h2>
             <div style="overflow: hidden">
                <div style="float: left"> 
                    <a href="../product/admin_manage_product.php" style="text-decoration: none" >Back to Manage Product</a>
            </div>
                <div style="float: right; margin-right: 20px">
                    <a href="../admin_log_out.php" style="text-decoration: none;">Log Out</a>
                </div> 
            </div>
            <hr/>   
     
    

        <table border="2">
            <tr>
                <th style="width:5%">ID</th>
                <th style="width:10%">Account</th>
                <th style="width:6%">Total</th>
                <th style="width:25%">Note</th>
                <th style="width:10%">Date Order</th>
                <th style="width:6%">Date Recive</th>
                <th style="width:9%">Deposit</th>
                <th style="width:8%">Status</th>
                <th style="width:11%" colspan="3">....</th>
            </tr><center></center>
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
                echo "<td><center>$row[0]</center></td>";
                 echo "<td><center>$row[1]</center></td>";
                 echo "<td><center>$row[2]</center></td>";
                 echo "<td><center>$row[3]</center></td>";
                 echo "<td><center>$row[4]</center></td>";
                 echo "<td><center>$row[5]</center></td>";
                 echo "<td><center>$row[6]</center></td>";
                 echo "<td><center>$row[7]</center></td>";
                 echo "<td><center><a href='admin_detail_invoice.php?id=$row[0]'>Detail</a></center></td>"; 
                echo "<td><center><a href='admin_edit_Invoice.php?id=$row[0]'>Edit</a></center></td>"; 
                echo "<td><center><a href='admin_delete_Invoice.php?id=$row[0]' onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></center></td>";   
                echo "</tr>";
               
                // tự động cập nhật khi đơn hàng tróng
                 $query2 = "SELECT `ID_Pro` FROM `detail_invoice` WHERE `ID_Invoice` =$row[0];";
                $result2= mysqli_query($link, $query2);
                $num = mysqli_num_rows($result2);
                if($num == 0)
                {   
                    $query3 = "DELETE FROM `invoice` WHERE `ID` = $row[0]";
                    $result3 = mysqli_query($link, $query3);
                    
                    if($result3 == FALSE)
                    {
                        echo "<tr><td><h4>Delete Invoice Empty Faile</h4><td><tr>";
                    }
                }
                
                // tự động update giá sản phẩm 
                $query3 = "SELECT SUM(`total`) FROM `detail_invoice` WHERE `ID_Invoice`= $row[0]";
                $result3 = mysqli_query($link, $query3);
                if($result)
                {           
                    $row2 = mysqli_fetch_array($result3);
                    $total_update = $row2[0];
                    if($total_update == NULL)
                    {
                        $total_update = 0;
                    }
                    $query4 = "UPDATE `invoice` SET `total`=$total_update WHERE `ID`= $row[0]";
                    $result4 = mysqli_query($link, $query4);
                    if($result4 == FALSE)
                    {
                        echo "<tr><td><h4>Update Total Invoice Faile</h4><td><tr>";
                    }
                }
              
                
            }
            mysqli_close($link);
            exit();
            ?>

        </table>


    </body>
</html>
