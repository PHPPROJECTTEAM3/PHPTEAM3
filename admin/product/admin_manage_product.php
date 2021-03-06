
<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}

include_once '../../PRJ_Library/connect_DB.php';
$query = "SELECT * FROM `product`";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manager Product</title>
        <script src="../../Lib_/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="../jquery-latest.js" type="text/javascript"></script>
        <script src="../jquery.tablesorter.js" type="text/javascript"></script>
        <link href="../blue/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    </head>
    <body class="margin5px">
        <h2>Product List</h2>
        <div style="overflow: hidden">
            <div style="float: left"> 
                <span style="margin-left: 3px"> Admin: <?php echo $_SESSION["admin"] ?></span>
            </div>
            <div style="float: right; margin-right: 20px">
                <a href="../admin_log_out.php" style="text-decoration: none;">Log Out</a>
            </div> 
        </div>
        <hr/>   
        <form>
            <p>
                <input class="btn btn-info active"  name="manage_brand" type="submit" value="Manage Brand">
                <input class="btn btn-info active" style="margin-left: 50px" name="manage_version" type="submit" value="Manage Version">
                <input class="btn btn-info active" style="margin-left: 50px" name="manage_invoice" type="submit" value="Manage Invoice">  
                <input class="btn btn-info active" style="margin-left: 50px" name="manage_member" type="submit" value="Manage Member"> 
                <input  class="btn btn-info active" style="margin-left: 50px" name="manage_feedback" type="submit" value="Manage Feedback">  
                <input class="btn btn-info active" style="margin-left: 50px" name="manage_statistical" type="submit" value="Manage Statistical">  
            </p>


            <input class="btn btn-default" name="add_pro" type="submit" value="Add Product" style="margin-right: 50px">
            ID Product: <input id="id_search" type="number"  placeholder="Enter Name Product" style="margin-right: 50px">
            Name Product: <input id="name_search" type="text" placeholder="Enter Name Product"  style="margin-right: 50px">
            <input class="btn btn-default" name="bt_refesh" type="submit" value="Refesh" style="margin-right: 50px">
        </form>

        <script>
            $(document).ready(function () {
                $("#id_search").keyup(function () {
                    var id_search = $(this).val();
                    $.get("admin_search_product.php", {id_search: id_search}, function (data) {
                        $("#myTable").html(data);

                    });
                });
                $("#name_search").keyup(function () {
                    var name_search = $(this).val();
                 
                    $.get("admin_search_product.php", {name_search: name_search}, function (data) {
                        $("#myTable").html(data);
                    });
                    $()
                });
            });
        </script>

        <?php
        if (isset($_GET["add_pro"])) {
            header("location:admin_add_product.php");
            mysqli_close($link);
            exit();
        }
        if (isset($_GET["bt_refesh"])) {
            header("location:admin_manage_product.php");
            mysqli_close($link);
            exit();
        }
        if (isset($_GET["manage_member"])) {
            header("location:../member/admin_manage_member.php");
            mysqli_close($link);
            exit();
        }
        if (isset($_GET["manage_statistical"])) {
            header("location:../statistical/admin_manage_statistical.php");
            mysqli_close($link);
            exit();
        }
        if (isset($_GET["manage_feedback"])) {
            header("location:../feedback/admin_manage_feedback.php");
            mysqli_close($link);
            exit();
        }
        if (isset($_GET["manage_brand"])) {
            header("location:../brand/admin_manage_brand.php");
            mysqli_close($link);
            exit();
        }
        if (isset($_GET["manage_version"])) {
            header("location:../version/admin_manage_version.php");
            mysqli_close($link);
            exit();
        }
        if (isset($_GET["manage_invoice"])) {
            header("location:../invoice/admin_manage_invoice.php");
            mysqli_close($link);
            exit();
        }
        $result = mysqli_query($link, $query);
        ?>

        <table id="myTable" class="tablesorter" > 
            <thead> 
                <tr>
                    <th style="width: 4%">ID</th>
                    <th >Name</th>
                    <th >Brand</th>
                    <th >Image</th>
                    <th >Version</th>
                    <th >Price (VND)</th>
                    <th >Quantity Sold</th>
                    <th >Launch Date</th>
                    <th colspan="2">....</th>
                </tr>
            </thead> 

            <tbody>

                <?php
                if (mysqli_num_rows($result) == 0) {
                    echo "<tr><td><h3>No Data</h3</td></tr>";
                    mysqli_close($link);
                    exit();
                }
                while ($row = mysqli_fetch_array($result)) {

                    echo "<tr>";
                    echo "<td><center>$row[0]</center></td>";
                    echo "<td><center>$row[1]</center></td>";
                    echo "<td><center>$row[2]</center></td>";
                    echo "<td><center><img src='../../Images/$row[name_brand]/$row[img]' height='130px'></center></td>";
                    echo "<td><center>$row[4]</center></td>";
                    $leght = strlen($row[5]);
                    $price = 0;
                    if ($leght == 7) {
                        $add = substr_replace($row[5], '.', 1, 0);
                        $add2 = substr_replace($add, '.', 5, 0);
                        $price = $add2;
                    }
                    if ($leght == 8) {
                        $add = substr_replace($row[5], '.', 2, 0);
                        $add2 = substr_replace($add, '.', 6, 0);
                        $price = $add2;
                    }

                    echo "<td><center>$price</center></td>";
                    echo "<td><center>$row[6]</center></td>";
                    echo "<td><center>$row[7]</center></td>";
                    echo "<td><center><a href='admin_edit_product.php?id=$row[0]'>Edit</a></center></td>";
                    echo "<td><center><a href='admin_delete_product.php?id=$row[0]' onclick=\"javascript: return confirm('Are you sure?');\">Delete</a></center></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                $("#myTable").tablesorter();

            }
            );
        </script>

        <?php
        mysqli_close($link);
        exit();
        ?>
    </body>
</html>
