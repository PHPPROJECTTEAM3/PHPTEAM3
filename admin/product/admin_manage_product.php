<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}

include_once '../../PRJ_Library/connect_DB.php';
$query = "SELECT * FROM `product`";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) < 0) {
    die("No Data");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>List Product</h2>
        <hr/>
        <form>
            <p><input name="add_pro" type="submit" value="Add Product">
                <input name="manage_brand" type="submit" value="Manage Brand">
                <input name="manage_version" type="submit" value="Manage Version">
                <input name="manage_invoice" type="submit" value="Manage Invoice">
                
            </p>
            <?php 
            if(isset($_GET["add_pro"]))
            {
                header("location:admin_add_product.php");
                exit();
            }
            if(isset($_GET["manage_brand"]))
            {
               header("location:../brand/admin_manage_brand.php");
                exit(); 
                include_once '';
            }
            if(isset($_GET["manage_version"]))
            {
               header("location:../version/admin_manage_version.php");
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
