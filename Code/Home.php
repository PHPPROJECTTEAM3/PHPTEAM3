<!--header-->

<?php 
session_start();
$pageTitle = "PHPMOBILE";
$activeMenu = "home";
$_SESSION['username']="LeTuan";

   include_once '../PRJ_Library/header.html';
   
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
  <div class="slideqc" style="margin-top:8%;">
    <div class="slideshow-container">
       <div class="mySlides">
           <img src="../Images/qc4.jpg" width="100%" >
      </div>
    </div>
    </div>
    </div>
        </div>
        
        <!-- phần danh mục -->
        
        <div class="container">
            <div class="row">
                <div class="danhmuc">
                <div class="col-sm-3">
                    <div class="col-sm-12 danhmuc1">
                        <a href="#"><img src="../Images/icondienthoai.png" width="48">Điện thoại</a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-12 danhmuc2">
                        <a href="#"><img src="../Images/iconusb.png" width="49">USB</a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-12 danhmuc3">
                        <a href="#"><img src="../Images/icontainghe.png" width="97">Tai nghe</a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-12 danhmuc4"> 
                        <a href="#"><img src="../Images/iconcapsac.png" width="48">Cáp sạc</a>
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
        if (mysqli_num_rows($result) == 0){
            die("No data in table");
        }
        
       
?>

       <div class="sanpham">
        <div class="container">
            <div class="row">
                <?php while ($col = mysqli_fetch_array($result)) {
                    $col_half = "";
                    if($count %5 == 0){
                        $col_half = "col-sm-offset-1";
                    }
                    ?>
                <div>
                        <div class="col-sm-2 <?=$col_half?>">
                        <div class="col-sm-12 mobile nopaddingsp">
                            <div class="phone">
                                <img src="<?php echo "../Images/$col[2]/$col[img]"; ?>" width="94%"
                                 height="auto"/>
                                <div class="overlay"><!--hover xem chi tiet-->
                                <a href="#" class="detailsmb">
                                       <i class="fa fa-eye"></i>
                                </a><br/>
                                <?php echo "<a href='addproduct.php?ID=$col[0]' class='detailsmb'>";
                                     echo "<i class='glyphicon glyphicon-shopping-cart'></i>";
                                    echo  "</a><br/>"; ?>
                                    </div>
                                </div>
                            <h5><?php echo "$col[name]"; ?></h5>
                            <span><?php echo "$col[price]₫"; ?></span>
                    

                        </div>
                    </div>
                    
                </div>
                
<?php $count++;} ?>
            </div>
        </div>
            </div>


<!-- footer-->
</div>
<?php
include_once '../PRJ_Library/footer.html';
?>


<!-- slideshow hình -->
<script>
var slideIndex = 0;
showSlides(slideIndex,true);
window.setInterval(function(){
    //thanks to closure, topicid is visible here
    showSlides(slideIndex, true);
  },3800);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n,false);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n,false);
}


function showSlides(n, auto) {
  var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
	if(auto == true){
		slideIndex++;
	}else{
		slideIndex = n;
	}
    
    if (slideIndex > slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    
    
    
    
}
$('#buttonsearch').click(function(){
				$('#formsearch').slideToggle( "fast",function(){
					 $( '#content' ).toggleClass( "moremargin" );
				} );
				$('#searchbox').focus()
				$('.openclosesearch').toggle();
		});
                
     
</script>
