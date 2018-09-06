<?php
$pageTitle = "Liên Hệ";
$activeMenu = "LienHe";
include_once '../PRJ_Library/header.php';
?>



<div style="margin-top: 5%; margin-bottom: 5%;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <p style="font-size: 25px; border-left: 5px solid #09afdf; padding-left: 3%;"><strong> PHPMobile xin hân hạnh được hỗ trợ quý khách </strong> </p>
                <form class="fedb">
                    
                    <strong>Quý Khách Quan Tâm Về: </strong>
                    <select class="fed">
                        <option>Chọn chủ đề</option>
                        <option>Khiếu Nại-Phản Ánh</option>
                        <option>Góp Ý</option>
                        <option>Tư Vấn</option>
                    </select><br/>
                    <p style="border: 1px solid #09afdf;"></p>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
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
                        <label>Nội Dung</label>
                        <textarea  class="fed form-control" type="text" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <button class="subfed">SUBMIT</button>
                    </div>
                </form> 
            </div>
            <div class="col-sm-8">
                <p style="border: 2px solid #ddd;"></p>
                <p style="font-size: 20px"> <strong> THÔNG TIN LIÊN HỆ KHÁC </strong>
                <hr/>
                <p>Tìm cửa hàng PHP Mobile? <br/></p>
                <p>Tổng đài tư vấn, hỗ trợ khách hàng (7h30 đến 22h): <strong> 19009090 </strong> <br/> </p>
                <p>Email: <a href="mailto:phpmobile@gmail.com?Subject=Hello" target="_top"><strong>phpmobile@gmail.com</strong></a></p>

                <iframe style="width: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.325711139572!2d106.66413961463098!3d10.78634669231479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed23ec9a3ef%3A0x3a6f9c50875209d!2zVsSDbiBwaMOybmcgRlBUIEdyZWVud2ljaCBIQ00sIFRyxrDhu51uZyDEkOG6oWkgSOG7jWMgRlBU!5e0!3m2!1svi!2s!4v1536209391226" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>    





<?php
include_once '../PRJ_Library/footer.html';
?>