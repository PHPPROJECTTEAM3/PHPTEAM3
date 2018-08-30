<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Add Brand</h2><hr/>
        <form>
            <p>Name Brand</p>
            <input name="name_brand" type="text" maxlenght="15" required>
            <p>Logo</p>
            <input name="logo_brand" type="file"><br/><br/>
            <input name="bt_add_pro" type="submit" value="Add">
        </form>
        <?php
        include_once '../../PRJ_Library/connect_DB.php';
        if (isset($_GET["bt_add_pro"])) {
            $name = $_GET["name_brand"];
            $logo = $_GET["logo_brand"];

            $query = "INSERT INTO `brand`(`name`, `logo`) VALUES ('$name','$logo')";
            $result = mysqli_query($link, $query);

            if (!$result) {
                die("Add Faile !!!");
            } else {
                header("location:admin_manage_brand.php");
                exit();
                mysqli_close($link);
            }
        }
        ?>
    </body>
</html>
