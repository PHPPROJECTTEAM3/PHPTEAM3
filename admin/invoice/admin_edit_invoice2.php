<?php 
if(isset($_GET["bt_edit_invoice"]))
{
    include_once '../../PRJ_Library/connect_DB.php';
    $id_invoice = $_GET["id_invoice"];
    $account = $_GET["account"];
    $note = $_GET["note"];
    $date_re = $_GET["date_re"];
    $deposit = $_GET["deposit"];
    $status = $_GET["status"];
    $admin_confirm = $_GET["admin_confirm"];
    $date_time_or = $_GET["date_time_or"];
    $es_date_re = $_GET["es_date_re"];
    
            
    $query = "UPDATE `invoice` SET `ac_name`='$account',`note`='$note' ,`date_or`='$date_time_or',`es_date_re`='$es_date_re',`deposit`='$deposit',`status`='$status', `admin_comfirm` = '$admin_confirm',`Date_Re`= '$date_re' WHERE `ID` = $id_invoice";
    $result = mysqli_query($link, $query);
    
    if($result)
    {
        header("location:admin_manage_invoice.php");
        exit();         
    } else {
    echo "Edit Invoice $id_invoice False !!!";
    echo "<p><a href='admin_manage_invoice.php'>Back To Manage Invoice</a></p>";
    }
    mysqli_close($link);
    exit();
}
?>