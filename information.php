<?php
session_start();
	$pageTitle = "TÀI KHOẢN CỦA TÔI | GIÀY B.STORE - Hệ thống giày thể thao chính hãng";
	function customPageHeader(){?>
		<title>$pageTitle</title>
	<?php }
	include 'config.php';
	include 'header.php';
?>
<?php

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
						<h2 class="page-title">Thông tin cá nhân</h2>
					</div>	
					<div class="account-info-text">
						Xin chào,<br>
						Bạn có thể quản lý tất cả thông tin cá nhân.
					</div>
					<!-- ACCOUNT-INFO-TEXT START -->
					<!--div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="account-info">
							<div class="single-account-info">
								<ul>
									<li><a href="#"><i class="fa fa-building"></i><span>Thêm địa chỉ</span>	</a></li>
									<li><a href="order_status.php"><i class="fa fa-list-ol"></i><span>Chi tiết và lịch sử đơn hàng</span>	</a></li>
									<li><a href="#"><i class="fa fa-file-o"></i><span>Thẻ tín dụng</span>	</a></li>
									<li><a href="checkout-address.php"><i class="fa fa-building"></i><span>Sổ địa chỉ</span>	</a></li>
									<li><a href="checkout-registration.php"><i class="fa fa-user"></i><span>Thông tin cá nhân</span>	</a></li>
								</ul>
							</div>
						</div>
                    </div-->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- PERSONAL-INFOMATION START -->
						<div class="personal-infomation">
							<?php
							if(isset($_SESSION['ten']))
							{
								$khachhang=$_SESSION['ten'];
							
							$thongtin=mysqli_query($conn,"SELECT maKhachHang,hoTenKhachHang,thuDienTuKH FROM tbl_khachhang WHERE tenDangNhap='$khachhang' ");
							$row=mysqli_fetch_assoc($thongtin);
							
						  ?>
						  		<!--h3 class="box-subheading">Thông tin cá nhân của bạn</h3>
								<div class="personal-info-content">
                                    <div class="form-group primary-form-group p-info-group">
										<label for="firstname">Tên khách hàng<sup>*</sup></label>
										<input type="text" value="<!?php echo $row['hoTenKhachHang']; ?>" name="name" id="name" class="form-control input-feild">
                                    </div>
                                    <div class="form-group primary-form-group p-info-group">
										<label for="firstname">Thư điện tử<sup>*</sup></label>
										<input type="text" value="<!?php echo $row['thuDienTuKH']; ?>" name="mail" id="mail" class="form-control input-feild">
                                    </div>
                                    <--div class="form-group primary-form-group p-info-group">
										<label for="firstname">Tên<sup>*</sup></label>
										<input type="text" value="" name="firstname" id="firstname" class="form-control input-feild">
									</div->
							   </div>
							   <div class="home-link"-->
							   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- REGISTERED-ACCOUNT START -->
						<div class="primari-box registered-account">
							<form class="new-account-box" id="accountLogin" method="post" action="update.php?user_id=<?php echo $row['maKhachHang'];?>">
								<h3 class="box-subheading">Thông tin cá nhân của bạn</h3>
								<div class="form-content">
									<div class="form-group primary-form-group">
										<label for="loginemail">Tên khách hàng</label>
										<input type="text" disabled value="<?php echo $row['hoTenKhachHang']; ?>" name="name" id="name" class="form-control input-feild">
									</div>
									<div class="form-group primary-form-group">
										<label for="password">Thư điện tử</label>
										<input type="text" disabled value="<?php echo $row['thuDienTuKH']; ?>" name="mail" id="mail" class="form-control input-feild">
									</div>
									<div class="submit-button">
										<a href="update.php" id="signinCreate" class="btn main-btn">
										<span>
											<!--i class="fa fa-lock submit-icon"></i-->
											 Sửa
										</span>
										</a>
									</div>
								</div>
							</form>							
						</div>
						<!-- REGISTERED-ACCOUNT END -->
					</div>
						<!--ul>
							<form method="post" action="update.php?user_id=<!?php echo $row['maKhachHang'];?>">
							<li><button name="xoa" value="<!?php echo $row['maKhachHang'];?>" > SỬA</button></li>	
							</form>
						</ul-->
						</div>
							<?php } ?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BACK TO HOME START -->
						<!-- BACK TO HOME END -->
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
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BACK TO HOME START -->
						<div class="home-link-menu">
							<ul>
							<li><a href="my-account.php"><i class="fa fa-chevron-left"></i> TRỞ VỀ</a></li>							</ul>
						</div>
						<!-- BACK TO HOME END -->
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!--script language="javascript" type="text/javascript"> 

            function popitup(url) { //Popup cửa sổ
                newwindow=window.open(url,'name','height=580,width=700');
                if (window.focus) {
                    newwindow.focus()
                    }
                return false;
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