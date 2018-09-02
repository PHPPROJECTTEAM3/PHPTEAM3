<?php
$pageTitle = "ThongTinSanPham";
$activeMenu = "home";
include_once '../PRJ_Library/header.php';
?>

<?php
        $query = "SELECT * FROM version";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 0){
            die("No data in table");
        }
     
?>



<div style="background-color:#fff ">
<div class="container" style="padding-bottom: 10%;">
            <div class="row">
                <div class="col-sm-3" style="padding-top: 10%;">
                    
                </div>
                
                
                <div class="col-sm-8" style="margin-top: 10%; background-color: white; text-align: center; border-radius:5px; ">
                  
                     <a href="../PDF/Apple/Iphone 7 128GB.pdf"></a>
            </div>
        </div>
</div>






<?php
include_once '../PRJ_Library/footer.html';
?>