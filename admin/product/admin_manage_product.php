<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}

include_once '../../PRJ_Library/connect_DB.php';
$query = "SELECT * FROM `product`";
$result = mysqli_query($link, $query);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <h2>Product List</h2>
             <div style="overflow: hidden">
                <div style="float: left"> 
                    <span>Admin: <?php echo $_SESSION["admin"]?></span>
            </div>
                <div style="float: right; margin-right: 20px">
                    <a href="../admin_log_out.php" style="text-decoration: none;">Log Out</a>
                </div> 
            </div>
            <hr/>   
        <form>
            <p>
                <input name="manage_brand" type="submit" value="Manage Brand">
                <input style="margin-left: 50px" name="manage_version" type="submit" value="Manage Version">
                <input style="margin-left: 50px" name="manage_invoice" type="submit" value="Manage Invoice">  
                <input style="margin-left: 50px" name="manage_member" type="submit" value="Manage Member"> 
                <input style="margin-left: 50px" name="manage_feedback" type="submit" value="Manage Feedback">  
                 <input style="margin-left: 50px" name="manage_statistical" type="submit" value="Manage Statistical">  
            </p>
          
            <p><input name="add_pro" type="submit" value="Add Product"></p>
            <?php 
            if(isset($_GET["add_pro"]))
            {
                header("location:admin_add_product.php");
                  mysqli_close($link);
                exit();
            }
            if(isset($_GET["manage_member"]))
            {
                header("location:../member/admin_manage_member.php");
                  mysqli_close($link);
                exit();
            }
            if(isset($_GET["manage_statistical"]))
            {
                header("location:../statistical/admin_manage_statistical.php");
                  mysqli_close($link);
                exit();
            }
            if(isset($_GET["manage_feedback"]))
            {
                header("location:../feedback/admin_manage_feedback.php");
                mysqli_close($link);
                exit();
            }
            if(isset($_GET["manage_brand"]))
            {
               header("location:../brand/admin_manage_brand.php");
                 mysqli_close($link);
                exit(); 
               
            }
            if(isset($_GET["manage_version"]))
            {
               header("location:../version/admin_manage_version.php");
                 mysqli_close($link);
                exit(); 
            }
             if(isset($_GET["manage_invoice"]))
            {
               header("location:../invoice/admin_manage_invoice.php");
                 mysqli_close($link);
                exit(); 
            }
            ?>
        </form>
        
    <center><table border='2' style="width: 95%">
            <tr>
                <th >ID</th>
                <th >Name</th>
                <th >Brand</th>
                <th >Image</th>
                <th >Version</th>
                <th >Price</th>
                <th >Launch Date</th>
                <th >Quantity Sold</th>
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
                echo "<td><center>$row[0]</center></td>";
                echo "<td><center>$row[1]</center></td>";
                echo "<td><center>$row[2]</center></td>";
                echo "<td><center><img src='../../Images/$row[name_brand]/$row[img]' height='130px'></center></td>";
                echo "<td><center>$row[4]</center></td>";
                echo "<td><center>$row[5]</center></td>";
                echo "<td><center>$row[7]</center></td>";
                echo "<td><center>$row[6]</center></td>";
                echo "<td><center><a href='admin_edit_product.php?id=$row[0]'>Edit</a></center></td>";
                echo "<td><center><a href='admin_delete_product.php?id=$row[0]' 'onclick=\"javascript: return confirm('Are you sure?');\"'>Delete</a></center></td>";
                echo "<tr>";
            }
            mysqli_close($link);
            ?>
            
        </table></center>
    </body>
</html>
