<!--header-->

<?php
include_once '../PRJ_Library/data_product.inc';
session_start();
$pageTitle = "PHPMOBILE";
$activeMenu = "home";

if (isset($_GET["name"])) {
    $_SESSION["username"] = $_GET["name"];
} else {
    
}


include_once '../PRJ_Library/header.php';
?>    

<?php
$query1 = "SELECT * FROM advertise";
$result1 = mysqli_query($link, $query1);
if (mysqli_num_rows($result1) == 0) {
    die("No data in table");
}
?>
<!--phần tìm nhanh-->

<!--<div class="gird-container">
            <div class="row">
                <div class="navbar-collapse collapse findlist">
                    <ul class="nav navbar-nav navbar-right" id="navbar-menu" style="margin-right: 16%;">
                        <li>

                            <a href="">Bảo Hành </a>

                        </li>
                        
                        <li>
                            <a href="">Khuyến Mãi</a>
                        </li>
                        <li>
                            <a href="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="">Liên hệ</a>
                        </li>
                        
                        <li style="margin-top: 2%;"><input style="text"></li>
                    </ul>
                    
                </div>
            </div>
        </div>-->


<!--Background-->

<div class="container">
    <div class="row">
        <div class="slideqc" style="margin-top:0.5rem;">

<?php while ($col1 = mysqli_fetch_array($result1)) { ?>
                <div class="slideshow-container">
                    <div class="mySlides"> 
                        <img width="100%" height="100%" src="<?php echo"../Images/$col1[img_adv]"; ?>">

                    </div>
                </div>
<?php } ?>

        </div>
    </div>
</div>

<!-- phần danh mục -->

<div class="container">
    <div class="row">
        <div class="danhmuc" style="padding-top: 3%; margin-left: 8%;">
        <div class="col-sm-3">
            <div class="dropdown">
                <button class="dropbtn">Thương Hiệu</button>
                <div class="dropdown-content">
                    <a href="#">Apple</a>
                    <a href="#">Oppo</a>
                    <a href="#">Samsung</a>
                </div>
            </div>

        </div>
        <div class="col-sm-3">
            <div class="dropdown">
                <button class="dropbtn"><a href="">Sản Phẩm Mới</a></button>
              
            </div>

        </div>
        <div class="col-sm-3">
            <div class="dropdown">
                <button class="dropbtn"><a href="https://www.facebook.com/">Sản Phẩm Bán Chạy</a></button>

            </div>

        </div>
        <div class="col-sm-3">
            <div class="dropdown">
                <button class="dropbtn">Sắp Xếp Theo</button>
                <div class="dropdown-content">
                    <a href="zingmp3.com.vn">A-Z</a>
                    <a href="#">Z-A</a>
                    <a href="#">Giá Thấp->Cao</a>
                    <a href="#">Giá Cao->Thấp</a>
                </div>
            </div>

        </div>
        </div>
    </div>
</div>

<!-- phan san pham-->

<?php
$count = 0;
$query = "SELECT * FROM product";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No data in table");
}
?>

<div class="sanpham">
    <div class="container">
        <div class="row">
<?php
while ($col = mysqli_fetch_array($result)) {
    $col_half = "";
    if ($count % 5 == 0) {
        $col_half = "col-sm-offset-1";
    }
    ?>
                <div>
                    <div class="col-sm-2 <?= $col_half ?>">
                        <div class="col-sm-12 mobile nopaddingsp" style="margin-top:5%; padding-bottom: 3%;">
                            <div class="phone">
                                <img width="120px" height="150px" src="<?php echo "../Images/$col[2]/$col[img]"; ?>"/>
                                <div class="overlay"><!--hover xem chi tiet-->
                                    <a href="<?php echo "Thongtinsanpham.php?ID=$col[0]" ?>" class="detailsmb">
                                        <i class="fa fa-eye"></i>
                                    </a><br/>
    <?php
    echo "<a href='addproduct.php?ID=$col[0]' class='detailsmb'>";
    echo "<i class='glyphicon glyphicon-shopping-cart'></i>";
    echo "</a><br/>";
    ?>
                                </div>
                            </div>
                            <h5><?php echo "$col[name]"; ?></h5>
                            <?php 
                            $leght = strlen($col[5]);
                    $price = 0;
                    if ($leght == 7) {
                        $add = substr_replace($col[5], '.', 1, 0);
                        $add2 = substr_replace($add, '.', 5, 0);
                        $price = $add2;
                    }
                    if ($leght == 8) {
                        $add = substr_replace($col[5], '.', 2, 0);
                        $add2 = substr_replace($add, '.', 6, 0);
                        $price = $add2;
                    }
                            ?>
                            <span><strong><?php echo $price ?>₫</strong></span>
                        </div>
                    </div>

                </div>

            
    
    <?php $count++;
} ?>
        </div>
    </div>
    
</div>


<!-- footer-->
</div>
<?php
include_once '../PRJ_Library/footer.html';
mysqli_close($link);
?>


<!-- slideshow hình -->
<script>
    var slideIndex = 0;
    showSlides(slideIndex, true);
    window.setInterval(function () {
        //thanks to closure, topicid is visible here
        showSlides(slideIndex, true);
    }, 3800);

// Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n, false);
    }

// Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n, false);
    }


    function showSlides(n, auto) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        if (auto == true) {
            slideIndex++;
        } else {
            slideIndex = n;
        }

        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";




    }
    $('#buttonsearch').click(function () {
        $('#formsearch').slideToggle("fast", function () {
            $('#content').toggleClass("moremargin");
        });
        $('#searchbox').focus()
        $('.openclosesearch').toggle();
    });





</script>

