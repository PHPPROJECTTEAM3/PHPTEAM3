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
        <form method="get">
        <h2>List Product</h2>
        <button name="bt_log_out">Log Out</button>
        <hr/>
        </form>
    <?php
    if(isset($_GET["bt_log_out"]))
    {
        unset($_SESSION["admin"]);
        header("location:../admin_log_in.php");
        mysqli_close($link);
        exit();
    }
    
    ?>
        <form>
            <p>
                <input name="manage_brand" type="submit" value="Manage Brand">
                <input name="manage_version" type="submit" value="Manage Version">
                <input name="manage_invoice" type="submit" value="Manage Invoice">  
            </p>
          
            <p><input name="add_pro" type="submit" value="Add Product"></p>
            <?php 
            if(isset($_GET["add_pro"]))
            {
                header("location:admin_add_product.php");
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
        
        <table border='2'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Image</th>
                <th>Version</th>
                <th>Price</th>
                <th>Launch Date</th>
                <th>Amount Sold</th>
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
                echo "<td><img src='../../Images/$row[name_brand]/$row[img]' width=200px height=150px></td>";
                echo "<td>$row[4]</td>";
                echo "<td>$row[5]</td>";
                echo "<td>$row[6]</td>";
                echo "<td>$row[7]</td>";
                echo "<td><a href='admin_edit_product.php?id=$row[0]'>Edit</a></td>";
                echo "<td><a href='admin_delete_product.php?id=$row[0]' 'onclick=\"javascript: return confirm('Are you sure?');\"'>Delete</a></td>";
                echo "<tr>";
            }
            mysqli_close($link);
            ?>
            
        </table>
    </body>
</html>
