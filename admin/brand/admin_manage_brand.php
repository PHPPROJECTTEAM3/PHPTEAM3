<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}

include_once '../../PRJ_Library/connect_DB.php';

$query = "SELECT * FROM `brand`";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No Data");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h2>Manage Brand</h2><hr/>
        <p>
        <form>
            <p><input name="bt_add" type="submit" value="Add Brand"></p>
        </form>

    </p>

    <table border="2">
        <tr>
            <th>Brand Name</th>
            <th>Logo</th>
            <th colspan="2">....</th>
        </tr>
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "<td><a href='admin_edit_brand.php?id=$row[0]'>Edit</a></td>";
    echo "<td><a href='admin_delete_brand.php?id=$row[0]'onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></td>";
    echo "</tr>";
}

?>
        
    </table>
        <?php
        if (isset($_GET["bt_add"])) {
            header("location:admin_add_brand.php");
            exit();
        }
      
        ?>
    
</body>
</html>
