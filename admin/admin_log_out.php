<?php
session_start();
session_destroy();
header("Location:admin_log_in.php");
exit;
?>
