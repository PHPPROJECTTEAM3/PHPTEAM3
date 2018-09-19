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
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <link href="../blue/style2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="margin5px">
        <h2>Add Brand</h2><hr/>
        <form>
            <p>Name Brand</p>
            <input name="name_brand" type="text" maxlenght="15" required>
            <p>Logo</p>
            <input  name="logo_brand" type="file"><br/><br/>
            <input class="btn btn-success" name="bt_add_pro" type="submit" value="Add">
        </form>
        <?php
        include_once '../../PRJ_Library/connect_DB.php';
        if (isset($_GET["bt_add_pro"])) {
            $name = $_GET["name_brand"];
            $logo = $_GET["logo_brand"];
            $name2 = strtoupper($name);
            $query = "INSERT INTO `brand`(`name`, `logo`) VALUES ('$name2','$logo')";
            $result = mysqli_query($link, $query);

            if (!$result) {
                die("Add Faile !!!");
            } else {
                header("location:admin_manage_brand.php");
                exit();
            }
        }
        ?>
        <p><a href="admin_manage_brand.php">Back to Manage Brand</a></p>
        <?php 
mysqli_close($link);
exit();
?>
    </body>
</html>
