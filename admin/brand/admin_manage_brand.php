<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}

include_once '../../PRJ_Library/connect_DB.php';

$query = "SELECT * FROM `brand`";
$result = mysqli_query($link, $query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../blue/style2.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body class="margin5px">
<h2>Brand List</h2>
             <div style="overflow: hidden">
                <div style="float: left"> 
                    <a href="../product/admin_manage_product.php" style="text-decoration: none" >Back to Manage Product</a>
            </div>
                <div style="float: right; margin-right: 20px">
                    <a href="../admin_log_out.php" style="text-decoration: none;">Log Out</a>
                </div> 
            </div>
            <hr/>   

        <form
           
            <p><input class="btn btn-info active" name="bt_add" type="submit" value="Add Brand"></p>
        </form>
<?php
if (isset($_GET["bt_add"])) {
    header("location:admin_add_brand.php");
    mysqli_close($link);
    exit();
}
?>
        <center><table id="myTable" class="tablesorter">
                <thead>
            <tr>
                <th style="width: 20%">Brand Name</th>
                <th style="width: 20%">Logo</th>
                <th style="width: 10%"colspan="2">....</th>
            </tr>
                </thead>
                <tbody>
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
                echo "<td><center><a href='admin_edit_brand.php?id=$row[0]'>Edit</a></center></td>";
                echo "<td><center><a href='admin_delete_brand.php?id=$row[0]'onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></center></td>";
                echo "</tr>";
            }
            
            ?>
                </tbody>
            </table></center>

<?php 
mysqli_close($link);
exit();
?>
    </body>
</html>
