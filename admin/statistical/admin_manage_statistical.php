<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:../admin_log_in.php");
    exit();
}

include_once '../../PRJ_Library/connect_DB.php';
?>
<h2>Statistical</h2>
<div style="overflow: hidden">
    <div style="float: left"> 
        <a href="../product/admin_manage_product.php" style="text-decoration: none" >Back to Manage Product</a>
    </div>
    <div style="float: right; margin-right: 20px">
        <a href="../admin_log_out.php" style="text-decoration: none;">Log Out</a>
    </div> 
</div>
<hr/>  
<form>
    <p>
        <input name="current_month" type="submit" value="Invoice In Current Month">
        <input style="margin-left: 50px" name="current_year" type="submit" value="Invoice In Current Year">
        <input style="margin-left: 50px" name="optionn" type="submit" value="Option">  
    </p>
</form>

<?php
if (isset($_GET["current_month"])) {
    $query = "SELECT * FROM `invoice`";
    $result = mysqli_query($link, $query);
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        die('No data');
    }
    $month_now = date("m");
    $year_now2 = date("Y");
    $year_now = date("y");
    ?>
    <center><h3>Đơn Hàng Trong Tháng: <?php echo $month_now ?> Năm <?php echo $year_now2 ?></h3></center>
    <center><table border="2" style="width: 80%">
            <tr>
                <th >ID</th>
                <th >Account</th>
                <th >Total</th>
                <th >Date Order</th>                        
                <th >Status</th>   
            </tr>
            <?php
            $count = 0;

            while ($col = mysqli_fetch_array($result)) {

                $month_order = date("m", strtotime($col[4]));

                $year_order = date("y", strtotime($col[4]));
                if ($month_now == $month_order && $year_now == $year_order) {
                    echo "<tr>";
                    echo "<td><center>$col[0]</center></td>";
                    echo "<td><center>$col[1]</center></td>";
                    $leght = strlen($col[2]);
                    $price = 0;
                    if ($leght == 7) {
                        $add = substr_replace($col[2], '.', 1, 0);
                        $add2 = substr_replace($add, '.', 5, 0);
                        $price = $add2;
                    }
                    if ($leght == 8) {
                        $add = substr_replace($col[2], '.', 2, 0);
                        $add2 = substr_replace($add, '.', 6, 0);
                        $price = $add2;
                    }
                    echo "<td><center>$price VNĐ</center></td>";

                    echo "<td><center>$col[4]</center></td>";
                    echo "<td><center>$col[7]</center></td>";
                    echo "</tr>";

                    $count++;
                } else {
                    continue;
                }
            }
            echo "</table></center>";
            echo "<center><p>Tông số đơn hàng: $count </p></center><br/>";
            ?>


            <center><h3>Các Đơn Hàng Đã Được Nhận Và Thanh Toán Trong Tháng: <?php echo $month_now ?> Năm <?php echo $year_now2 ?></h3></center>
            <center><table border="2" style="width: 80%">
                    <tr>
                        <th >ID</th>
                        <th >Account</th>
                        <th >Total</th>
                        <th >Date Order</th>                        
                        <th >Status</th>   
                        <th >Date Receive</th>   
                    </tr>
                    <?php
                    $count2 = 0;
                    $totall = 0;
                    $query2 = "SELECT * FROM `invoice`";
                    $result2 = mysqli_query($link, $query);
                    while ($col2 = mysqli_fetch_array($result2)) {

                        $month_order2 = date("m", strtotime($col2[4]));

                        $year_order2 = date("y", strtotime($col2[4]));
                        if ($month_now == $month_order2 && $year_now == $year_order2 && $col2[7] == 'Đã Nhận Hàng') {
                            echo "<tr>";
                            echo "<td><center>$col2[0]</center></td>";
                            echo "<td><center>$col2[1]</center></td>";
                            $leght = strlen($col2[2]);
                            $price = 0;
                            if ($leght == 7) {
                                $add = substr_replace($col2[2], '.', 1, 0);
                                $add2 = substr_replace($add, '.', 5, 0);
                                $price = $add2;
                            }
                            if ($leght == 8) {
                                $add = substr_replace($col2[2], '.', 2, 0);
                                $add2 = substr_replace($add, '.', 6, 0);
                                $price = $add2;
                            }
                            echo "<td><center>$price VNĐ</center></td>";

                            echo "<td><center>$col2[4]</center></td>";
                            echo "<td><center>$col2[7]</center></td>";
                            echo "<td><center>$col2[9]</center></td>";
                            echo "</tr>";

                            $count2++;
                            $totall += $col2[2];
                        } else {
                            continue;
                        }
                    }
                    echo "</table></center>";
                    $leght2 = strlen($totall);
                    $price2 = 0;
                    if ($leght2 == 7) {
                        $add3 = substr_replace($totall, '.', 1, 0);
                        $add4 = substr_replace($add3, '.', 5, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 8) {
                        $add3 = substr_replace($totall, '.', 2, 0);
                        $add4 = substr_replace($add3, '.', 6, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 9) {
                        $add3 = substr_replace($totall, '.', 3, 0);
                        $add4 = substr_replace($add3, '.', 7, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 10) {
                        $add3 = substr_replace($totall, '.', 4, 0);
                        $add4 = substr_replace($add3, '.', 8, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 11) {
                        $add3 = substr_replace($totall, '.', 5, 0);
                        $add4 = substr_replace($add3, '.', 9, 0);
                        $price2 = $add4;
                    }
                    echo "<center><p>Tổng số đơn hàng: <strong>$count2</strong> <br/> Tổng Số Tiền Thu Về: <strong>$price2</strong>    VNĐ</p></center><br/>";
                }
                ?>

                    <?php
if (isset($_GET["current_year"])) {
    $query = "SELECT * FROM `invoice`";
    $result = mysqli_query($link, $query);
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        die('No data');
    }
    
    $year_now2 = date("Y");
    $year_now = date("y");
    ?>
    <center><h3>Đơn Hàng Trong Năm <?php echo $year_now2 ?></h3></center>
    <center><table border="2" style="width: 80%">
            <tr>
                <th >ID</th>
                <th >Account</th>
                <th >Total</th>
                <th >Date Order</th>                        
                <th >Status</th>   
            </tr>
            <?php
            $count = 0;

            while ($col = mysqli_fetch_array($result)) {

                

                $year_order = date("y", strtotime($col[4]));
                if ($year_now == $year_order) {
                    echo "<tr>";
                    echo "<td><center>$col[0]</center></td>";
                    echo "<td><center>$col[1]</center></td>";
                    $leght = strlen($col[2]);
                    $price = 0;
                    if ($leght == 7) {
                        $add = substr_replace($col[2], '.', 1, 0);
                        $add2 = substr_replace($add, '.', 5, 0);
                        $price = $add2;
                    }
                    if ($leght == 8) {
                        $add = substr_replace($col[2], '.', 2, 0);
                        $add2 = substr_replace($add, '.', 6, 0);
                        $price = $add2;
                    }
                    echo "<td><center>$price VNĐ</center></td>";

                    echo "<td><center>$col[4]</center></td>";
                    echo "<td><center>$col[7]</center></td>";
                    echo "</tr>";

                    $count++;
                } else {
                    continue;
                }
            }
            echo "</table></center>";
            echo "<center><p>Tông số đơn hàng: $count </p></center><br/>";
            ?>


            <center><h3>Các Đơn Hàng Đã Được Nhận Và Thanh Toán Trong Năm <?php echo $year_now2 ?></h3></center>
            <center><table border="2" style="width: 80%">
                    <tr>
                        <th >ID</th>
                        <th >Account</th>
                        <th >Total</th>
                        <th >Date Order</th>                        
                        <th >Status</th>   
                        <th >Date Receive</th>   
                    </tr>
                    <?php
                    $count2 = 0;
                    $totall = 0;
                    $query2 = "SELECT * FROM `invoice`";
                    $result2 = mysqli_query($link, $query);
                    while ($col2 = mysqli_fetch_array($result2)) {

                        $month_order2 = date("m", strtotime($col2[4]));

                        $year_order2 = date("y", strtotime($col2[4]));
                        if (  $year_now == $year_order2 && $col2[7] == 'Đã Nhận Hàng') {
                            echo "<tr>";
                            echo "<td><center>$col2[0]</center></td>";
                            echo "<td><center>$col2[1]</center></td>";
                            $leght = strlen($col2[2]);
                            $price = 0;
                            if ($leght == 7) {
                                $add = substr_replace($col2[2], '.', 1, 0);
                                $add2 = substr_replace($add, '.', 5, 0);
                                $price = $add2;
                            }
                            if ($leght == 8) {
                                $add = substr_replace($col2[2], '.', 2, 0);
                                $add2 = substr_replace($add, '.', 6, 0);
                                $price = $add2;
                            }
                            echo "<td><center>$price VNĐ</center></td>";

                            echo "<td><center>$col2[4]</center></td>";
                            echo "<td><center>$col2[7]</center></td>";
                            echo "<td><center>$col2[9]</center></td>";
                            echo "</tr>";

                            $count2++;
                            $totall += $col2[2];
                        } else {
                            continue;
                        }
                    }
                    echo "</table></center>";
                    $leght2 = strlen($totall);
                    $price2 = 0;
                    if ($leght2 == 7) {
                        $add3 = substr_replace($totall, '.', 1, 0);
                        $add4 = substr_replace($add3, '.', 5, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 8) {
                        $add3 = substr_replace($totall, '.', 2, 0);
                        $add4 = substr_replace($add3, '.', 6, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 9) {
                        $add3 = substr_replace($totall, '.', 3, 0);
                        $add4 = substr_replace($add3, '.', 7, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 10) {
                        $add3 = substr_replace($totall, '.', 4, 0);
                        $add4 = substr_replace($add3, '.', 8, 0);
                        $price2 = $add4;
                    }
                    if ($leght2 == 11) {
                        $add3 = substr_replace($totall, '.', 5, 0);
                        $add4 = substr_replace($add3, '.', 9, 0);
                        $price2 = $add4;
                    }
                    echo "<center><p>Tổng số đơn hàng: <strong>$count2</strong> <br/> Tổng Số Tiền Thu Về: <strong>$price2</strong>    VNĐ</p></center><br/>";
                }
                ?>