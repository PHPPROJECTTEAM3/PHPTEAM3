<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}
if(!isset($_GET["id"]) && !isset($_GET["invoice"]))
{
    header("location:delete_detail_invoice");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
$id = $_GET["id"];
$invoice = $_GET["invoice"];
$query="SELECT `ID_Pro`,`Name_pro`,`Quantity_pro`,`price_pro` FROM `detail_invoice` WHERE `ID_Invoice` =$invoice AND `ID_Pro` =$id";
$result= mysqli_query($link, $query);

$col = mysqli_fetch_array($result);


?>

<h2>Edit Quantity Product In Invoice <?php echo $invoice ?></h2>
 <a href="admin_manage_invoice.php">Back to Manage Invoice</a><hr/>
 <form method="GET" action="#">
     <p>ID Product : <?php echo $col[0] ?></p> 
     <p>Name Product : <?php echo $col[1] ?></p> 
    <p><input name="quantity_edit" type="number" value="<?php echo $col[2] ?>" required max="3" min="1"  ></p>
    <input type="submit" name="bt_edit" value="Edit">   
</form>
 
 
  <?php 
if(isset($_GET["bt_edit"]))
{    

    $price = $col[3];
    $quantity_edit = $_GET["quantity_edit"];
    $total = ($price*$quantity_edit);
    $query2 = "UPDATE `detail_invoice` SET `Quantity_pro`=$quantity_edit, `total`=$total WHERE `ID_Invoice` =$invoice AND `ID_Pro` =$id";
    $result2 = mysqli_query($link, $query2);
    
    if($result2 == TRUE)
    {
        echo 'Edit Success !!!';   
    } else {
        echo 'Edit Faile !!!';      
    }
    mysqli_close($link);
        exit();

}
 ?>
