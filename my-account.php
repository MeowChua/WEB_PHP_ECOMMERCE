<?php
session_start();
	$pageTitle = "TÀI KHOẢN CỦA TÔI | GIÀY B.STORE - Hệ thống giày thể thao chính hãng";
	function customPageHeader(){?>
		<title>$pageTitle</title>
	<?php }

	include 'header.php';
?>
		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.php">TRANG CHỦ</a>
							<span><i class="fa fa-caret-right	"></i></span>
							<span>Tải khoản của tôi</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Tài khoản của tôi</h2>
					</div>	
					<div class="account-info-text">
						Xin chào,<br>
						Bạn có thể quản lý tất cả thông tin cá nhân và đơn hàng ở đây.
					</div>
					<!-- ACCOUNT-INFO-TEXT START -->
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="account-info">
							<div class="single-account-info">
								<ul>
									<!--li><a href="#"><i class="fa fa-building"></i><span>Thêm địa chỉ</span>	</a></li-->
									<li><a href="order_status.php"><i class="fa fa-list-ol"></i><span>Chi tiết và lịch sử đơn hàng</span>	</a></li>
									<!--li><a href="#"><i class="fa fa-file-o"></i><span>Thẻ tín dụng</span>	</a></li-->
									<!--li><a href="checkout-address.php"><i class="fa fa-building"></i><span>Sổ địa chỉ</span>	</a></li-->
									<li><a href="information.php"><i class="fa fa-user"></i><span>Thông tin cá nhân</span>	</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!--div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="account-info">
							<div class="single-account-info">
								<ul>
									<li><a href="wishlist.php"><i class="fa fa-heart"></i><span>Danh sách yêu thích</span>	</a></li>
								</ul>
							</div>
						</div>
					</div-->
					<!-- ACCOUNT-INFO-TEXT END -->
					<!--logout-->
					<?php 
					  if($_SERVER['REQUEST_METHOD']=="POST")
					  {
						  if(isset($_POST['logout']))
						  {
							  unset($_SESSION['ten']);?>
							  <script>window.location="index.php";</script>
						 <?php }
					  }
					?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BACK TO HOME START -->
						<div class="home-link-menu">
							<ul>
							<!--?php if(isset($_SESSION['ten']))-->
								<form method="post" action="">
								<?php
								echo '<input type="submit" value="ĐĂNG XUẤT" name="logout">';
								 ?>
								 </form>
							</ul>
						</div>
						<!-- BACK TO HOME END -->
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!--script>
		   function xoa()
		   {
			   <!?php
					  unset($_SESSION['ten']);
					  header("location:index.php");
				?>
		   }
		</script-->
<?php
	include 'footer.php';
?>
		<!-- JS 
		===============================================-->
		<!-- jquery js -->
		<script src="js/vendor/jquery-1.11.3.min.js"></script>
		
		<!-- fancybox js -->
        <script src="js/jquery.fancybox.js"></script>
		
		<!-- bxslider js -->
        <script src="js/jquery.bxslider.min.js"></script>
		
		<!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
		
		<!-- owl carousel js -->
        <script src="js/owl.carousel.min.js"></script>
		
		<!-- nivo slider js -->
        <script src="js/jquery.nivo.slider.js"></script>
		
		<!-- jqueryui js -->
        <script src="js/jqueryui.js"></script>
		
		<!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
		
		<!-- wow js -->
        <script src="js/wow.js"></script>		
		<script>
			new WOW().init();
		</script>

		<!-- Google Map js -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>	
		<script>
			function initialize() {
			  var mapOptions = {
				zoom: 8,
				scrollwheel: false,
				center: new google.maps.LatLng(35.149868, -90.046678)
			  };
			  var map = new google.maps.Map(document.getElementById('googleMap'),
				  mapOptions);
			  var marker = new google.maps.Marker({
				position: map.getCenter(),
				map: map
			  });

			}
			google.maps.event.addDomListener(window, 'load', initialize);				
		</script>
		<!-- main js -->
        <script src="js/main.js"></script>
    </body>


</html>