<?php

if(!(isset($_GET["id"])))
{
    header("location:admin_manage_brand.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
$id= $_GET["id"];
$query = "SELECT * FROM `brand` Where name ='$id'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No Data");
}

$row = mysqli_fetch_array($result);

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      
        <h2>Edit Brand</h2>
          <p><a href="admin_manage_brand.php">Back to Manage Brand</a></p><hr/>
        
        <form method="get" action="edit.php">
            <p>Current Name Brand</p>
            <p><input type="text" readonly value="<?php echo $row[0] ;?>"  name="current_name"></p>
            <p>New Name Brand</p>
            <p><input type="text" name="new_name" maxlength="15"></p>
            <p>Logo</p>
            <p>---Current Logo <img src="<?php echo'../../../Image/'.$row[1]?>" width=200px height=150px> <input name="current_image" type="hidden" value="<?php echo $row[1]?>">
            <p>---New Logo <input name="new_logo" type="file"> <!--Có Thể Để Trống -->
            <p><input name="bt_edit" type="submit" value="Edit">
        </form>
        
    </body>
</html>
