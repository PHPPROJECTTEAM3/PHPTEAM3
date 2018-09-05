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
    </head>
    <body>

        <form method="get">
            <h2>Brand List</h2>
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
            <p><input name="back_product_list" type="submit" value="Back To Product List">
                <input name="bt_add" type="submit" value="Add Brand"></p>
        </form>
<?php
if (isset($_GET["bt_add"])) {
    header("location:admin_add_brand.php");
    mysqli_close($link);
    exit();
}
if (isset($_GET["back_product_list"])) {
    header("location:../product/admin_manage_product.php");
    mysqli_close($link);
    exit();
}
?>
        <table border="2">
            <tr>
                <th>Brand Name</th>
                <th>Logo</th>
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
                echo "<td><a href='admin_edit_brand.php?id=$row[0]'>Edit</a></td>";
                echo "<td><a href='admin_delete_brand.php?id=$row[0]'onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></td>";
                echo "</tr>";
            }
            mysqli_close($link);
            ?>

        </table>


    </body>
</html>
