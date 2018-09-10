<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}

if (!isset($_GET["id"])) {
    exit('Chưa Có Mã Đơn Hàng');
}
$id = $_GET["id"];
include_once '../../PRJ_Library/connect_DB.php';
$query = "SELECT * FROM `invoice` WHERE `ID` =$id";
$result = mysqli_query($link, $query);
if (!$result) {
    die('Không Tìm Thấy Hóa Đơn');
}
$col = mysqli_fetch_array($result);
?>
<h2>Edit Invoice: <?php echo $col[0] ?></h2>
<div style="overflow: hidden">
    <div style="float: left"> 
        <a href="admin_manage_invoice.php" style="text-decoration: none" >Back to Manage Invoice</a>
    </div>
    <div style="float: right; margin-right: 20px">
        <a href="../admin_log_out.php" style="text-decoration: none;">Log Out</a>
    </div> 
</div>
<hr/>   
<form method="get" action="admin_edit_invoice2.php">
    <p>ID Invoice: <?php echo $col[0] ?> <input type="hidden" name="id_invoice" value="<?php echo $col[0]    ?>"></p>
    <p>Account: <input type="text" maxlength="15" value="<?php echo $col[1]?>" name="account" required=""></p>
    <p>Price: <?php echo $col[2] ?></p>
    <p><textarea name="note" maxlength="500" rows="6" cols="100"><?php echo $col[3] ?></textarea></p>
    <p>Date and Time Order: <input name="date_time_or" type="datetime" value="<?php echo $col[4] ?>" required</p>
    <p>Estimate Date Recive: <input type="date" name="es_date_re" value="<?php echo $col[5] ?>" required></p>
    <p>Deposit: <input name="deposit" type="text" max="20" value="<?php echo $col[6] ?>" required></p>
    <p>Status: <input name="status" type="text" maxlength="50" value="<?php echo $col[7] ?>" required> </p>
    <p>Date Receive: <input type="date" name="date_re" value="<?php echo $col[8] ?>" > </p>
            <p>Admin Comfirm: <select name="admin_confirm">
                    
                    <?php 
                    $query2 = "SELECT `id` FROM `admin`";
                    $result2 = mysqli_query($link, $query2);
                    $num2 = mysqli_num_rows($result2);
                    if($num2==0)
                    {
                        echo "<option value='0'>No Data</option>";
                        die();
                    }
                    while ($col2 = mysqli_fetch_array($result2))
                    {
                        echo "<option value='$col2[0]'>$col2[0]</option>";
                    }
                    mysqli_close($link);
                    ?>
        </select>
    <p><input name="bt_edit_invoice" type="submit" value="Edit"></p>
</form>

