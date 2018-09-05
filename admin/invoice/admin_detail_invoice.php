<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}
if(!isset($_GET["id"]))
{
    header("location:admin_manage_invoice.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
$ID = $_GET["id"];
$query = "SELECT `ID_Pro`,`Name_pro`,`img`,`price_pro`,`Quantity_pro`,`total` FROM `detail_invoice` WHERE `ID_Invoice` = $ID";
$result = mysqli_query($link, $query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
            <h2>Detail Invoice : <?php echo $ID; ?></h2>
            <a href="admin_manage_invoice.php">Back to Manage Invoice</a>
            <hr/>    

        <table border="2">
            <tr>
                <th>STT</th>
                <th>ID Product</th>
                <th>Name Product</th>
                <th>Image</th>
                <th>Price Product</th>
                <th>Quantity</th>
                <th>Total</th>
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
            $count = 1;
            while ($row = mysqli_fetch_array($result)) {
               
                echo "<tr>";
                echo "<td>$count</td>";
                echo "<td>$row[0]</td>";
                 echo "<td>$row[1]</td>";
                 echo "<td>$row[2]</td>";
                 echo "<td>$row[3]</td>";
                 echo "<td>$row[4]</td>";
                 echo "<td>$row[5]</td>";
                 echo "<td><a href='admin_edit_detail_invoice.php?id=$row[0]&invoice=$ID'>Edit Quantity</a></td>"; 
                echo "<td><a href='admin_edit_invoice.php?id=$row[0]'>Delete</a></td>";               
                echo "</tr>";
                $count++;
            }
            mysqli_close($link);
            ?>

        </table>


    </body>
</html>
