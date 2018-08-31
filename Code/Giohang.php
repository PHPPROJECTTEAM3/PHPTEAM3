<!--header-->
<?php
include_once '../PRJ_Library/data_product.inc';
session_start();
$pageTitle = "Giohangcuaban";
$activeMenu = "cart";
include_once '../PRJ_Library/header.html';
?>

    </table>
<!--body-->

<form method="GET" action="DatHang_LuuHoaDon.php">
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
      $count=1;

if(!(isset($_SESSION["cartuser"])))
{
    echo '<td><h4>Giỏ Hàng Trống</h4></td>';
    exit();
}
   foreach ($_SESSION["cartuser"] as $ID=>$SP)
    {
 ?>
      
      
      <tr> 
   <td data-th="Sản Phẩm"> 
    <div class="row"> 
     <div class="col-sm-2 ">
         <img src="<?php $SP->printImg(); ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
     </div> 
     <div class="col-sm-10"> 
      <h4 class="nomargin"><?php $SP->printName(); ?></h4> 
      <p>Nhà Sản Xuất: <?php $SP-> printBrand(); ?></p> 
     </div> 
    </div> 
   </td> 
   <td data-th="Price"><?php $SP->printPrice(); ?>đ</td>
   <td data-th="Quantity"><?php $SP->printAmount(); ?></td>  
   <td data-th="Subtotal" class="text-center"><?php $SP->printTotal() ?>đ</td> 
   <td class="actions" data-th="">
    <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
    </button> 
   </td>
   <td class="actions" data-th=""> 
       <a href="<?php echo "delete_sanpham_trong_Giohang.php?ID=$SP->proID" ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a></td>
  </tr> 
  
<?php $count++; } ?>
  </tbody>
  <tfoot> 
   <tr class="visible-xs"> 
    <td class="text-center"><strong>Tổng 200.000 đ</strong>
    </td> 
   </tr> 
   <tr> 
       <td><a href="Home.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
    </td> 
    <td colspan="2" class="hidden-xs"> </td> 
    <?php foreach ($_SESSION["cartuser"] as $ID=>$SP)
    {
        $total_invoice += ($SP->proAmount*$SP->proPrice);
    }?>
    <td class="hidden-xs text-center"><strong><?php echo $total_invoice ?> đ</strong>
    </td> 
    <td><button value="bt_order"  class="btn btn-success btn-block" onclick="javascript: return confirm('Xác Nhận Đặt Hàng')">Thanh toán <i class="fa fa-angle-right"></i></button>
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

