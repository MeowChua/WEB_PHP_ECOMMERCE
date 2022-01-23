<!--?php
	$pageTitle = "DANH SÁCH YÊU THÍCH | GIÀY B.STORE - Hệ thống giày thể thao chính hãng";
	function customPageHeader(){?>
		<title>$pageTitle</title>
	<--?php }

	include 'header.php';
?>
		<!- MAIN-CONTENT-SECTION START ->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!- BSTORE-BREADCRUMB START ->
						<div class="bstore-breadcrumb">
							<a href="index.php">TRANG CHỦ <span><i class="fa fa-caret-right"></i> </span> </a>
							<a href="my-account.php"> TÀI KHOẢN CỦA TÔI <span><i class="fa fa-caret-right"></i></span></a>
							<span> Danh sách yêu thích</span>
						</div>
						<!- BSTORE-BREADCRUMB END ->
					</div>
				</div>
				<div class="row">					
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<!- SINGLE SIDEBAR TAG START ->
						<div class="product-left-sidebar">
							<h2 class="left-title pro-g-page-title">Tags </h2>
							<div class="category-tag">
								<a href="#">Adidas</a>
								<a href="#">Nike</a>
								<a href="#">Converse</a>
								<a href="#">Vans</a>
								<a href="#">Bitis</a>
								<a href="#">Newbalance</a>
								<a href="#">Asics</a>
							
							</div>
						</div>	
						<!- SINGLE SIDEBAR TAG END ->
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<h2 class="page-title">Danh sách yêu thích của tôi</h2>
						<!- WISHLISTS-AREA START ->
						<div class="wishlists-area">
							<form class="new-wishlists-box primari-box" id="savewishlist" method="post" action="#">
								<h3 class="box-subheading">Danh sách mới</h3>
								<div class="primary-box-content">
									<div class="form-group wishlists-form-group primary-form-group">
										<label for="wishlist">Tên danh sách</label>
										<input type="text" value="" name="wishlist" id="wishlist" class="form-control input-feild white">
									</div>
									<div class="submit-button">
										<a href="#" id="savewishlish" class="btn main-btn">Lưu <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</form>								
						</div>
						<!- WISHLISTS-AREA END -->
						<!-- WISHLISTS-CHART START ->
						<div class="wishlists-chart table-responsive">
							<table class="table table-bordered">
								<tr>
									<th class="wish-name">Tên danh sách</th>
									<th class="wish-qty">Số lượng</th>
									<th class="wish-view">Lượt xem</th>
									<th class="wish-create">Đã tạo</th>
									<th class="wish-link">Đường dẫn sản phẩm</th>
									<th class="wish-default">Mặc định</th>
									<th class="wish-delete">Xóa</th>
								</tr>
								<tr>
									<td>
										<a href="#">Danh sách yêu thích của tôi </a>
									</td>
									<td>
										<span>3</span>
									</td>
									<td>
										<span>0</span>
									</td>
									<td>
										<span>2020-04-02</span>
									</td>
									<td>
										<a href="#">Xem </a>
									</td>
									<td>
										<span><i class="fa fa-check-square"></i></span>
									</td>
									<td>
										<a class="dele-wish-list" href="#"><i class="fa fa-close"></i></a>
									</td>
								</tr>
							</table>
						</div>	
						<!- WISHLISTS-CHART END -->
						<!-- WISHLISTS-ITEM START ->
						<div class="wishlists-item">
							<div class="wishlists-item-title">
								<a href="#">Ẩn thông tin sản phẩm đã mua. <i class="fa fa-close"></i></a>
							</div>
							<div class="Permalink">
								<p>Permalink:</p>
								<input type="text" readonly="readonly" value="htpp://bootexpert.com/product/single-item" class="form-control view-permalink">
								<a href="#" class="send-wish-list">Gửi danh dách này</a>
							</div>
							<div class="wishlists-all-item">
								<div class="row">
									<div class="col-md-3 col-sm-4 col-xs-12">
										<!- WISHLISTS-SINGLE-ITEM START ->
										<div class="wishlists-single-item">
											<div class="wishlist-image">
												<a href="#"><img src="img/wishlist/01.png" alt="" /></a>
											</div>
											<div class="wishlist-title">
												<p>CONVERSE CHUCK TAYLOR CLASSIC BLACK <a href="#"><i class="fa fa-close"></i></a></p>
											</div>
											<div class="form-group primary-form-group wishlists-form-group">
												<label>Số lượng: </label>
												<input type="text" value="1" name="quantity" class="form-control input-feild">
											</div>
											<div class="form-group primary-form-group wishlists-form-group">
												<label>Mức độ ưu tiên: </label>
												<div class="wish-prioriti">
													<select name="wishprioriti" id="wishPrioriti1">
														<option value="">Cao</option>
														<option value="">Trung bình</option>
														<option value="">Thấp</option>
													</select>												
												</div>											
											</div>	
											<a class="wish-save" href="#">Lưu</a>									
										</div>
										<!- WISHLISTS-SINGLE-ITEM END ->
									</div>	
									<div class="col-md-3 col-sm-4 col-xs-12">
										<!- WISHLISTS-SINGLE-ITEM START ->
										<div class="wishlists-single-item">
											<div class="wishlist-image">
												<a href="#"><img src="img/wishlist/02.png" alt="" /></a>
											</div>
											<div class="wishlist-title">
												<p>ASICS GEL-RESPECTOR BLACK GOLD<a href="#"><i class="fa fa-close"></i></a></p>
											</div>
											<div class="form-group primary-form-group wishlists-form-group">
												<label>Số lượng: </label>
												<input type="text" value="1" name="quantity" class="form-control input-feild">
											</div>
											<div class="form-group primary-form-group wishlists-form-group">
												<label>Mức độ ưu tiên: </label>
												<div class="wish-prioriti">
													<select name="wishprioriti" id="wishPrioriti2">
														<option value="">Cao</option>
														<option value="">Trung bình</option>
														<option value="">Thấp</option>
													</select>												
												</div>											
											</div>	
											<a class="wish-save" href="#">Lưu</a>								
										</div>
										<!- WISHLISTS-SINGLE-ITEM END ->
									</div>	
									<div class="col-md-3 col-sm-4 col-xs-12">
										<!- WISHLISTS-SINGLE-ITEM START ->
										<div class="wishlists-single-item">
											<div class="wishlist-image">
												<a href="#"><img src="img/wishlist/03.png" alt="" /></a>
											</div>
											<div class="wishlist-title">
												<p>NIKE AIR MAX 90 ORANGE BLUE<a href="#"><i class="fa fa-close"></i></a></p>
											</div>
											<div class="form-group primary-form-group wishlists-form-group">
												<label>Số lượng: </label>
												<input type="text" value="1" name="quantity" class="form-control input-feild">
											</div>
											<div class="form-group primary-form-group wishlists-form-group">
												<label>Mức độ ưu tiên: </label>
												<div class="wish-prioriti">
													<select name="wishprioriti" id="wishPrioriti3">
														<option value="">Cao</option>
														<option value="">Trung bình</option>
														<option value="">Thấp</option>
													</select>												
												</div>											
											</div>	
											<a class="wish-save" href="#">Lưu</a>								
										</div>
										<!- WISHLISTS-SINGLE-ITEM END ->
									</div>
									<div class="col-md-3 col-sm-4 col-xs-12 hidden-sm">
										<!- WISHLISTS-SINGLE-ITEM START ->
										<div class="wishlists-single-item">
											<div class="wishlist-image">
												<a href="#"><img src="img/wishlist/04.png" alt="" /></a>
											</div>
											<div class="wishlist-title">
												<p>AIR FORCE 1 SHADOW AQUA PINK <a href="#"><i class="fa fa-close"></i></a></p>
											</div>
											<div class="form-group primary-form-group wishlists-form-group">
												<label>Số lượng: </label>
												<input type="text" value="1" name="quantity" class="form-control input-feild">
											</div>
											<div class="form-group primary-form-group wishlists-form-group">
												<label>Mức độ ưu tiên: </label>
												<div class="wish-prioriti">
													<select name="wishprioriti" id="wishPrioriti4">
														<option value="">Cao</option>
														<option value="">Trung bình</option>
														<option value="">Thấp</option>
													</select>												
												</div>											
											</div>	
											<a class="wish-save" href="#">Lưu</a>								
										</div>
										<!- WISHLISTS-SINGLE-ITEM END ->
									</div>										
								</div>
								<!- WISH-LIST BACT HOME START->
								<div class="wish-back-link">
									<a  class="wish-save" href="my-account.php"><i class="fa fa-chevron-left"></i> Quay lại tài khoản của bạn</a>
									<a  class="wish-save" href="index.php"><i class="fa fa-chevron-left"></i> Trang chủ</a>
								</div>
								<!- WISH-LIST BACT HOME END ->
							</div>
						</div>	
						<!- WISHLISTS-ITEM END ->
					</div>
				</div>
			</div>
		</section>
		<!- MAIN-CONTENT-SECTION END ->
<-?php
	include 'footer.php';
?-->
		<!-- JS 
		===============================================-->
		<!-- jquery js ->
		<script src="js/vendor/jquery-1.11.3.min.js"></script>
		
		<!- fancybox js ->
        <script src="js/jquery.fancybox.js"></script>
		
		<!- bxslider js ->
        <script src="js/jquery.bxslider.min.js"></script>
		
		<!- meanmenu js ->
        <script src="js/jquery.meanmenu.js"></script>
		
		<!- owl carousel js ->
        <script src="js/owl.carousel.min.js"></script>
		
		<!- nivo slider js ->
        <script src="js/jquery.nivo.slider.js"></script>
		
		<!- jqueryui js ->
        <script src="js/jqueryui.js"></script>
		
		<!- bootstrap js ->
        <script src="js/bootstrap.min.js"></script>
		
		<!- wow js ->
        <script src="js/wow.js"></script>		
		<script>
			new WOW().init();
		</script>

		<!- Google Map js ->
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
		<!- main js ->
        <script src="js/main.js"></script>
    </body>

</html-->