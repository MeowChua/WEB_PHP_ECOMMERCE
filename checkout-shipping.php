<?php
	$pageTitle = "THÔNG TIN VẬN CHUYỂN | GIÀY B.STORE - Hệ thống giày thể thao chính hãng";
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
							<span><i class="fa fa-caret-right"></i></span>
							<span>Vận chuyển</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">THÔNG TIN VẬN CHUYỂN:</h2>
					</div>	
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-todo first step-done">
									<span><a href="cart.php">01. GIỎ HÀNG</a></span>
								</li>
								<li class="step-todo second step-done">
									<span><a href="checkout-signin.php">02. ĐĂNG NHẬP</a></span>
								</li>
								<li class="step-todo third step-done">
									<span><a href="checkout-address.php">03. ĐỊA CHỈ</a></span>
								</li>
								<li class="step-current four">
									<span>04. VẬN CHUYỂN</span>
								</li>
								<li class="step-todo last" id="step_end">
									<span>05. THANH TOÁN</span>
								</li>
							</ul>									
						</div>
						<!-- SHOPING-CART-MENU END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- PRODUCT-DELIVERY-OPTION START -->
						<div class="product-delivery-option">
							<div class="product-delivery-address">
								<p>Chọn một phương thức vận chuyển:</p>
							</div>
							<!-- PRODUCT-DELIVERY-ITEM START -->
							<div class="product-delivery-item">
								<div class="product-delivery-single-item">
									<div class="table-responsive">
										<!-- PRODUCT-DELIVERY SINGLE OPTION START -->
									    <table class="table table-bordered delivery-table">
											<tr>
												<td class="delivery-option-radio">
													<div class="dalivery-radio">
														<span class="radio-box">
															<input type="radio" value="1" name="deliverymethod">
														</span>
													</div>
												</td>											
												<td class="delivery-method-icon">
													<img src="img/delivery-method.jpg" alt="" />
												</td>
												<td class="carrey-info">
													<strong>Giao Hàng Nhanh</strong><br>
													Thời gian giao hàng: 1-2 ngày <br />
												</td>
												<td class="carrey-cost">Miễn phí</td>
											</tr>
									    </table>
										<!-- PRODUCT-DELIVERY SINGLE OPTION END -->
									</div>
									<div class="table-responsive">
										<!-- PRODUCT-DELIVERY SINGLE OPTION START -->
									    <table class="table table-bordered delivery-table">
											<tr>
												<td class="delivery-option-radio">
													<div class="dalivery-radio">
														<span class="radio-box">
															<input type="radio" value="1" name="deliverymethod">
														</span>
													</div>
												</td>											
												<td class="delivery-method-icon">
													<img src="img/delivery-method.jpg" alt="" />
												</td>
												<td class="carrey-info">
													<strong>Giao Hàng Tiết Kiệm</strong><br>
													Thời gian giao hàng: 1-3 ngày
												</td>
												<td class="carrey-cost">
													Miễn phí
												</td>
											</tr>
									    </table>
										<!-- PRODUCT-DELIVERY SINGLE OPTION END -->
									</div>
								</div>
							</div>
							<!-- PRODUCT-DELIVERY-ITEM START -->
							<!-- TERMS-OF-SERVICE START -->
							<div class="terms-of-service">
								<p>Điều khoản dịch vụ</p>
								<div class="form-group new-ac-form-group p-info-group ">
									<label class="cheker">
										<input type="checkbox" name="checkbox">
										<span></span>
									</label>
									<span class="agree">Đồng ý với điều khoản dịch vụ của chúng tôi.<a href="#">(Đọc điều khoản dịch vụ)</a></span>
								</div>								
							</div>
							<!-- TERMS-OF-SERVICE END -->
						</div>
						<!-- PRODUCT-DELIVERY-OPTION END -->
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<!--a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua sắm</a-->
							<a href="checkout.php" class="procedtocheckout">Tiếp tục đơn hàng<i class="fa fa-chevron-right"></i></a>
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->	
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