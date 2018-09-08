<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
$query = "SELECT * FROM `member`";
$result = mysqli_query($link, $query);
$num = mysqli_num_rows($result);
if($num == 0)
{
    die("No Data");
}
?>

 <h2>Member List</h2>
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
                    <th style="width: 12%">Account Name</th>
                    <th style="width: 12%">Password</th>
                    <th style="width: 12%">Last Name</th>
                    <th style="width: 8%">First Name</th>
                    <th style="width: 18%">Mail</th>
                    <th style="width: 8%">Phone</th>
                    <th style="width: 3%">Gender</th>
                    <th style="width: 7%">Date Of Birth</th>
                    <th style="width: 7%">Reliability</th>
                    <th style="width: 8%"colspan="2">...</th>
                </tr>
                <?php 
                while ($col = mysqli_fetch_array($result))
                {
                    echo '<tr>';
                   echo"<td><center>$col[0]</center></td>";
                   echo"<td><center>$col[0]</center></td>";
                   echo"<td><center>$col[0]</center></td>";
                   echo"<td><center>$col[0]</center></td>";
                   echo"<td><center>$col[0]</center></td>";
                   echo"<td><center>$col[0]</center></td>";
                   echo"<td><center>$col[0]</center></td>";
                   echo"<td><center>$col[0]</center></td>";    
                   echo"<td><center><a href='#'>Edit</a></center></td>";
                   echo"<td><center><a href='#'>Delete</a></center></td>";
                    echo '</tr>';
                }
                ?>
            </table>
