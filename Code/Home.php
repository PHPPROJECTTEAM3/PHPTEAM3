<!--header-->

<?php
include_once '../PRJ_Library/data_product.inc';
session_start();
$pageTitle = "PHPMOBILE";
$activeMenu = "home";
if (isset($_GET["name"])) {
    $_SESSION["username"] = $_GET["name"];
}
require_once '../PRJ_Library/header.php';
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

<!--<div class="container">
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
</div>-->

<!-- phần danh mục -->

<div class="container">
    <div class="row">
        <div class="danhmuc" style="padding-top: 3%; margin-left: 8%;">
            <div class="col-sm-3">
                <div class="dropdown">
                    <button class="dropbtn">Thương Hiệu</button>
                    <div class="dropdown-content" style="width: 400px;">
                        <?php
                        $queryH = "SELECT * FROM `brand`";
                        $resultH = mysqli_query($link, $queryH);
                        $numH = mysqli_num_rows($resultH);
                        if ($numH == 0) {
                            echo 'No Data Brand';
                        } else {
                            while ($colH = mysqli_fetch_array($resultH)) {
                                ?>
                                <button id="<?php echo $colH[0] ?>" value="<?php echo $colH[0] ?>" class="btn btn-default" style="width:100% ;height:70px;"><strong><?php echo $colH[0] ?></strong><img src="<?php echo "../Images/Brand/$colH[1]" ?>" width="150px" height="50px" style="float: right;"></button>

                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>

            </div>
            <div class="col-sm-3">
                <div class="dropdown">

                    <button class="dropbtn" id="SPBC" >Sản Phẩm Bán Chạy</button>

                </div>

            </div>

            <div class="col-sm-3">
                <div class="dropdown">
                    <button class="dropbtn">Sắp Xếp Theo</button>
                    <div class="dropdown-content">                                                
                        <button class="btn btn-link"  id="GTD">Giá Thấp->Cao</button>
                        <button class="btn btn-link"  id="GGD">Giá Cao->Thấp</button>                   
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="dropdown">                                    
                    <button class="dropbtn"  id="ALL">Tất Cả Sản Phẩm</button>      
                </div>
            </div>
            <div>
                <p>Chọn Mức Giá:                     
                    <button class="btn btn-link" id="duoi-2-trieu">Dưới 2 Triệu</button>
                    <button class="btn btn-link"  id="tu-2-4-trieu">Từ 2 - 4 triệu</button>
                    <button class="btn btn-link"  id="tu-4-7-trieu">Từ 4 - 7 triệu</button>
                    <button class="btn btn-link"  id="tu-7-13-trieu">Từ 7 - 13 triệu</button>
                    <button class="btn btn-link"  id="tren-13-trieu">Trên 13 triệu</button>   </p>   
            </div>
        </div>
    </div>
    <?php
//    $query = "SELECT * FROM `product` ORDER BY `L_Date` DESC";
//------------------------------------------------
//    if (isset($_SESSION["brand_pro"])) {
//        if (isset($_GET["SPBC"])) {
//            $query = "SELECT * FROM `product` WHERE `name_brand` like '" . $_SESSION["brand_pro"] . "' ORDER BY `a_s` DESC";
//        }
//      
//        if (isset($_GET["duoi-2-trieu"])) {
//            $query = "SELECT * FROM `product` WHERE `name_brand` like '" . $_SESSION["brand_pro"] . "' AND `price`< 2000000 ORDER BY `product`.`price` DESC";
//        }
//        if (isset($_GET["tu-2-4-trieu"])) {
//            
//        }
//        if (isset($_GET["tu-4-7-trieu"])) {
//           
//        }
//        if (isset($_GET["tu-7-13-trieu"])) {
//            
//        }
//        if (isset($_GET["tren-13-trieu"])) {
//            
//        }
//    }
//---------------------------------------------------------------------
//    if (!isset($_SESSION["brand_pro"])) {
//        if (isset($_GET["SPBC"])) {
//            $query = "SELECT * FROM `product` ORDER BY `a_s` DESC";
//        }
//        if (isset($_GET["GTD"])) {
//            
//        }
//        if (isset($_GET["GGD"])) {
//           
//        }
//        if (isset($_GET["duoi-2-trieu"])) {
//            
//        }
//        if (isset($_GET["tu-2-4-trieu"])) {
//           
//        }
//        if (isset($_GET["tu-4-7-trieu"])) {
//           
//        }
//        if (isset($_GET["tu-7-13-trieu"])) {
//           
//        }
//        if (isset($_GET["tren-13-trieu"])) {
//            
//        }
//    }
//    if (isset($_GET["ALL"])) {
//        unset($_SESSION["brand_pro"]);
//    }
//    $result = mysqli_query($link, $query);
//    if (mysqli_num_rows($result) == 0) {
//        echo "Không Có Sản Phẩm";  //// Error----------------------------------------------
//    } else {
    ?>
</div>
<!-- phan san pham-->

<div class="sanpham">
    <div class="container">
        <div id="product_H" class="row">
            <!--                Hiện sản phẩm ở đây -->
            
        </div>
        <h3 id="no_data" style="display: none">Không Có Sản Phẩm</h3>
        <input id="xemthem" value="Xem Thêm" type="button">
        <input id="xemthem_brand" value="Xem Thêm" type="button">
      
    </div>


</div>


<!-- footer-->

<?php
include_once '../PRJ_Library/footer.html';
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




    document.getElementById("hien").addEventListener("mouseover", mouseOver);
    document.getElementById("hien").addEventListener("mouseout", mouseOut);
    function mouseOut() {
        document.getElementById("hien2").style.display = 'none';
    }
    function mouseOver() {
        document.getElementById("hien2").style.display = 'block';
    }
    function myFunction() {
        var input, filter, ul, li, a, i, hienn;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        b = input.value.length;
        hienn = document.getElementById("hien2");
        if (b == 0) {
            hienn.style.display = "none";
        }
        if (b >= 2)
        {
            hienn.style.display = "block";
        }
        for (i = 0; i < li.length; i++) {

            a = li[i].getElementsByTagName("a")[0];
            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "block";
            } else {
                li[i].style.display = "none";
            }
        }
    }
    function Reset_clear()
    {
        document.getElementById("myInput").value = '';
        myFunction().reset();

    }


</script>

<?php
mysqli_close($link);
exit();
?>