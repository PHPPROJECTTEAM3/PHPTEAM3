<!--header-->
<?php
include_once '../PRJ_Library/data_product.inc';
session_start();
$pageTitle = "Giohangcuaban";
$activeMenu = "cart";
include_once '../PRJ_Library/header.php';
?>

</table>
<!--body-->

<form method="GET" action="DatHang_LuuHoaDon.php" style="padding-bottom: 1%;">
    <div class="DetailsGioHang">

        <h2 class="text-center">Giỏ hàng của bạn</h2>
        <div class="container"> 
            <table id="cart" class="table table-hover table-condensed">
                <!--Table thông tin từng cột-->

                <thead> 
                    <tr> 
                        <th style="width:50%">Tên sản phẩm</th> 
                        <th style="width:10%">Giá</th> 
                        <th style="width:8%">Số lượng</th> 
                        <th style="width:22%" class="text-center">Thành tiền</th> 
                        <th style="width:5%">Chỉnh Sửa</th> 
                        <th style="width:5%">Xóa</th> 
                    </tr> 
                </thead> 


                <!--Sản phẩm của khách hàng đã chọn-->
                <tbody>
                    <?php
                    if (!(isset($_SESSION["cartuser"]))) {
                        echo '<td><h4>Giỏ Hàng Trống</h4></td>';
                        exit();
                    }
                    foreach ($_SESSION["cartuser"] as $ID => $SP) {
                        ?>


                        <tr> 
                            <td data-th="Sản Phẩm"> 
                                <div class="row"> 
                                    <div class="col-sm-2 ">
                                        <img src="<?php $SP->printImg(); ?>" alt="image" class="img-responsive" width="100">
                                    </div> 
                                    <div class="col-sm-10"> 
                                        <h4 class="nomargin" style="color: #288ad6"><?php $SP->printName(); ?></h4> 
                                        <p><strong>Nhà Sản Xuất: <?php $SP->printBrand(); ?></strong></p> 
                                    </div> 
                                </div> 
                            </td> 
    <?php
    $leght = strlen($SP->proPrice);
    $price = 0;
    if ($leght == 7) {
        $add = substr_replace($SP->proPrice, '.', 1, 0);
        $add2 = substr_replace($add, '.', 5, 0);
        $price = $add2;
    }
    if ($leght == 8) {
        $add = substr_replace($SP->proPrice, '.', 2, 0);
        $add2 = substr_replace($add, '.', 6, 0);
        $price = $add2;
    }
    ?>
                            <td data-th="Price" class="price2"><strong><?php echo $price; ?>₫</strong></td>
                            <td data-th="Quantity"><strong><?php $SP->printQuantity(); ?></strong></td>  
                            <?php
                            $total_product = ($SP->proPrice * $SP->proAmount);
                            $leght2 = strlen($total_product);
                            $price2 = 0;
                            if ($leght2 == 7) {
                                $addd = substr_replace($total_product, '.', 1, 0);
                                $addd2 = substr_replace($addd, '.', 5, 0);
                                $price2 = $addd2;
                            }
                            if ($leght2 == 8) {
                                $addd = substr_replace($total_product, '.', 2, 0);
                                $addd2 = substr_replace($addd, '.', 6, 0);
                                $price2 = $addd2;
                            }
                            ?>
                            <td data-th="Subtotal" class="text-center" style="color: #c1000c " ><strong><?php echo $price2 ?>₫</strong></td> 
                            <td class="actions" data-th="">
                                <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                </button> 
                            </td>
                            <td class="actions" data-th=""> 
                                <a href="<?php echo "delete_sanpham_trong_Giohang.php?ID=$SP->proID" ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a></td>
                        </tr> 

<?php } ?>
                </tbody>

                <tfoot> 
                    <tr>
                        <td><label><h3>Ghi Chú</h3></label><br/>
                            <textarea name="note_cus" maxlength="500" rows="5" cols="100"></textarea></td>
                    </tr>

                    <tr> 
                        <td><a href="Home.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                        </td> 
                        <td colspan="2" class="hidden-xs"> </td> 
<?php
$total_invoice = 0;
foreach ($_SESSION["cartuser"] as $ID => $SP) {
    $total_invoice += ($SP->proAmount * $SP->proPrice);
}
$leght3 = strlen($total_invoice);
$price3 = 0;
if ($leght3 == 7) {
    $adddd = substr_replace($total_invoice, '.', 1, 0);
    $adddd2 = substr_replace($adddd, '.', 5, 0);
    $price3 = $adddd2;
}
if ($leght3 == 8) {
    $adddd = substr_replace($total_invoice, '.', 2, 0);
    $adddd2 = substr_replace($adddd, '.', 6, 0);
    $price3 = $adddd2;
}
?>
                        <td class="hidden-xs text-center" style="color: #c1000c;"><strong><?php echo $price3 ?>đ</strong><input type="hidden" name="total_invoice" value="<?php echo $total_invoice ?>">
                        </td> 
                        <td><button  name="bt_order" value="bt_order"  class="btn btn-success btn-block" onclick="javascript: return confirm('Xác Nhận Đặt Hàng')">Thanh toán <i class="fa fa-angle-right"></i></button>
                        </td> 
                    </tr> 
                </tfoot> 
            </table>

        </div>
    </div>
</form>
<!--footer-->
<?php
include_once '../PRJ_Library/footer.html';
?>

