<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) 
{    
    header("location:../admin_log_in.php");
    exit();  
}
if($_SESSION["role"]!=1){
    session_destroy();
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
?>
<h2>Admin List</h2>
             <div style="overflow: hidden">
                <div style="float: left">                   
            </div>
                <div style="float: right; margin-right: 20px">
                    <a href="../admin_log_out.php" style="text-decoration: none;">Log Out</a>
                </div> 
            </div>
            <hr/> 
            <p><input name="add_admin" type="submit" value="Add Account Admin"></p>
             <?php 
            if(isset($_GET["add_admin"]))
            {
                header("location:admin_add_product.php");
                  mysqli_close($link);
                exit();
            }?>
            <center><table border="2">
                <tr>
                    <th style="width: 20%">Account Name</th>
                    <th style="width: 20%">Password</th>
                    <th style="width: 20%">Role</th>
                    <th colspan="2">...</th>
                </tr>
                <?php
                $query = "SELECT * FROM `admin`";
                $result = mysqli_query($link, $query);
                $num = mysqli_num_rows($result);
                if($num == 0)
                {
                    die("<tr><td>No Data</td></tr>");
                }
                while ($col = mysqli_fetch_array($result))
                {
                echo '<tr>';
                echo "<td><center>$col[0]</center></td>";
                echo "<td><center>$col[1]</center></td>";
                echo "<td><center>$col[2]</center></td>";
                echo "<td><center><a href='#'>Edit</a></center></td>";
                echo "<td><center><a href='#'>Delete</a></center></td>";
                echo '</tr>';
                }
                ?>
                </table></center>
