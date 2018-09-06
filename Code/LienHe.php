<?php
$pageTitle = "Liên Hệ";
$activeMenu = "LienHe";
include_once '../PRJ_Library/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <form class="fedb">
           Quý Khách Quan Tâm Về:
        <select class="fed">
            <option>Chọn chủ đề</option>
            <option>Khiếu Nại-Phản Ánh</option>
            <option>Góp Ý</option>
            <option>Tư Vấn</option>
      </select><br/>
      <div class="form-group">
      <label>Tiêu Đề</label>
      <input class="fed form-control" type="text" value="">
      </div>
      <div class="form-group">
      <label>Nội Dung</label>
      <input class="fed form-control" type="text" value="">
      </div>
      <div class="form-group">
      <label>Họ và Tên</label>
      <input class="fed form-control" type="text" value="">
      </div>
      <div class="form-group">
      <label>Email</label>
      <input class="fed form-control" type="text" value="">
      </div>
      <div class="form-group">
          <button class="subfed">SUBMIT</button>
      </div>
           </form> 
        </div>
    </div>
</div>
    
    
    
    
    
    
<?php
include_once '../PRJ_Library/footer.html';
?>