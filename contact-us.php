<?php
	$pageTitle = "LIÊN HỆ CHÚNG TÔI | GIÀY B.STORE - Hệ thống giày thể thao chính hãng";
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
							<span>Liên hệ chúng tôi</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title contant-page-title">CHĂM SÓC KHÁCH HÀNG - LIÊN HỆ</h2>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- CONTACT-US-FORM START -->
						<div class="contact-us-form">
							<div class="contact-form-center">
								<h3 class="contact-subheading">Gửi tin nhắn</h3>
								<!-- CONTACT-FORM START -->
								<form class="contact-form" id="contactForm" method="post" action="#">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
											<div class="form-group primary-form-group">
												<label>Chủ đề cần trợ giúp</label>
												<div class="con-form-select">
													<select id="conForm" name="conform">
														<option value="">Thủ tục dịch vụ</option>
														<option value="">Đơn hàng</option>
														<option value="">...</option>
													</select>												
												</div>
											</div>		
											<div class="form-group primary-form-group">
												<label>Địa chỉ email</label>
												<input type="text" class="form-control input-feild" id="contactEmail" name="contactemail" value="">
											</div>	
											<div class="form-group primary-form-group">
												<label>Đơn hàng tham khảo</label>
												<div class="con-form-select">
													<select id="orderRef" name="orderref">
														<option value="">Bootexpert</option>
														<option value="">...</option>
													</select>												
												</div>
											</div>	
											<div class="form-group primary-form-group">
												<div class="file-uploader">
													<label>Tệp đính kèm</label>
													<input type="file" class="form-control" name="fileUpload">
													<span class="filename">Chưa có tệp</span>
													<span class="action">Chọn tệp</span>
												</div>
											</div>	
											<button type="submit" name="submit" id="sendMessage" class="send-message main-btn">GỬI <i class="fa fa-chevron-right"></i></button>
										</div>
										<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
											<div class="type-of-text">
												<div class="form-group primary-form-group">
													<label>Nội dung tin nhắn</label>
													<textarea class="contact-text" name="ContactMessage"></textarea>
												</div>													
											</div>
										</div>
									</div>
								</form>
								<!-- CONTACT-FORM END -->
							</div>
						</div>
						<!-- CONTACT-US-FORM END -->
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
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