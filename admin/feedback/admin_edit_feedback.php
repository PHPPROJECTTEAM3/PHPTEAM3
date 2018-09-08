<?php
if(!(isset($_GET["id"])))
{
    header("location:admin_manage_feedback.php");
    exit();
    
}
include_once '../../PRJ_Library/connect_DB.php';
$id= $_GET["id"];
$query = "SELECT * FROM `feed_back` WHERE `id`='$id'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No Data");
}

$row = mysqli_fetch_array($result);

?>
 <h2>Edit Brand</h2>
             <div style="overflow: hidden">
                <div style="float: left"> 
                    <a href="admin_manage_brand.php" style="text-decoration: none" >Back to Manage Brand</a>
            </div>
                <div style="float: right; margin-right: 20px">
                    <a href="../admin_log_out.php" style="text-decoration: none;">Log Out</a>
                </div> 
            </div>
            <hr/>   
            <form method="get" action="admin_edit_feedback_php.php">
            <p>ID: <?php echo $row[0] ?> </p>
            <input type="hidden" name="id_feed" value="<?php echo $row[0] ?>"
            <p>Account: <?php echo $row[1] ?> 
          
            <p>Content Feedback<br/> <textarea cols=80" rows="8" readonly><?php echo $row[2] ?></textarea></p>
            <p>Date Feedback: <?php echo $row[3] ?></p>
            <p>Content Reply<br/> <textarea cols=80" rows="8" name="con_rep"><?php echo $row[4] ?></textarea></p>
            <p>Date Reply: <input name="date_rep" type="date" value="<?php echo $row[5] ?>"></p>
            
            <p>Addmin Reply: <input name="addmin_rep" type="text" value="<?php echo $row[6] ?>"></p>
            <p><input name="bt_edit" type="submit" value="Edit"></p>
        </form>
