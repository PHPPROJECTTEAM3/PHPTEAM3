<?php 
if(!(isset($_GET["id"])))
{
    header("location:admin_manage_product.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';

$id= $_GET["id"];
$query = "SELECT * FROM `product` Where id =$id";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No Data");
}
$row = mysqli_fetch_array($result);

//Lấy ra Brand Name để admin chọn 
$query2 = "SELECT * FROM `brand`";
$result2 = mysqli_query($link, $query2);
if (mysqli_num_rows($result2) == 0) {
    die("Error Brand !!!");
}

//Lấy ra Mã Phiên Bản để admin chọn
$query3 = "SELECT `ver_code` FROM `version`";
$result3 = mysqli_query($link, $query3);
if (mysqli_num_rows($result3) == 0) {
    die("Error Brand !!!");
}
$current_id = $row[0];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link href="../blue/style2.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body class="margin5px">
        <h2>Edit Product ID: <?php echo $id ?></h2>
<div style="overflow: hidden">
    <div style="float: left"> 
        <a href="admin_manage_product.php" style="text-decoration: none" >Back to Manage Product</a>
    </div>
    <div style="float: right; margin-right: 20px">
        <a href="../admin_log_out.php" style="text-decoration: none;">Log Out</a>
    </div> 
</div>
<hr/>   
        
        
        <form method="GET" action="edit_pro.php">
            <input type="hidden" name="current_ID" value="<?php echo $current_id ?>" readonly="">
            <p>ID</p>
            <input name="id_pro" value="<?php echo $row[0] ?>" required> 
            <p>Product Name</p>
            <input name="name_pro" type="text" maxlength="50" value="<?php echo $row[1] ?>" required>
            <p>Brand Name</p>
            <select name="brand_pro" >
                <?php
                echo "<option value='$row[2]'>$row[2](default)</option>";
                while ($row2 = mysqli_fetch_array($result2)) {
                    echo "<option value='$row2[0]'>$row2[0]</option>";
                }
                ?>
            </select>
            <p>Current Image</p>
          
            <img src="<?php echo "../../Images/$row[name_brand]/$row[img]" ?>" width=200px height=150px><input name="current_image_pro" type="hidden" value="<?php echo $row[3] ?>">
             <p>New Image</p>
            <input name="new_image_pro" type="file" >
            <p>Version</p>
            <select name="ver_pro">
                <?php
                echo"<option value='$row[4]'>$row[4](default)</option>";
                while ($row3 = mysqli_fetch_array($result3)) {
                    echo "<option value='$row3[0]'>$row3[0]</option>";
                }
                ?>
            </select>
            <p>Price</p>
            <input name="price_pro" type="number" maxlength="9" min="500000" value="<?php echo $row[5] ?>" required>
            <p>Amount Sold</p>
            <input name="a_s_pro" type="number" maxlength="3" value="<?php echo $row[6] ?>">
            <p>Launch Date</p>
            <input name="l_date_pro" type="date" value="<?php echo $row[7]?>"><br/><br/>
            <input class="btn btn-success" name="edit_pro" type="submit" value="Edit"> 

        </form>
       
    </body>
</html>
