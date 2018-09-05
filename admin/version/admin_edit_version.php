<?php

if(!(isset($_GET["id"])))
{
    header("location:admin_manage_version.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
$id= $_GET["id"];
$query = "SELECT * FROM `version` Where ver_code ='$id'";
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
        <h2>Edit Version</h2>
        <p><a href="admin_manage_version.php">Back to Manage Versions</a></p><hr/>
        <form method="get" action="edit_version.php">
            <p>Current Version Name</p>
            <p><input type="text" readonly value="<?php echo $row[0] ;?>"  name="current_version"></p>
            <p>New Version Name</p>
            <p><input type="text" name="new_version" maxlength="30"></p>
            <p>File PDF</p>
            <p>---Current File <input name="current_file" type="text" value="<?php echo $row[1]?>">
            <p>---New File <input name="new_file" type="file"> <!--Có Thể Để Trống -->
            <p><input name="bt_edit" type="submit" value="Edit">
        </form>
        
    </body>
</html>
