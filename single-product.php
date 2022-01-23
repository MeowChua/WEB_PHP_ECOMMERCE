<?php 
//header('Content-Type:text/html;charset=utf-8');
session_start();
	include_once 'classes/product.php';
	include_once 'admin/helpers/format.php';
?>
<?php 
	if (!isset($_GET['maSanPham']) || $_GET['maSanPham'] == ''){
        echo "<script>window.location = '404.php'</script>";
    }else{
        $idSanPham = $_GET['maSanPham'];
    }
    $fm = new Format();
	$prod = new product();
	$prodList = $prod->getproductbyId($idSanPham);
	$resultProd = $prodList->fetch_assoc();
	//echo session_id();
?>		
<?php
	$pageTitle = $resultProd['tenSanPham']. " | GIÀY B.STORE - Hệ thống giày thể thao chính hãng";
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
							<a href="index.php">TRANG CHỦ<span><i class="fa fa-caret-right"></i> </span> </a>
							<span> <i class="fa fa-caret-right"> </i> </span>
							<?php
								$catList = $cat->getcatbyId($resultProd['maLoai']);
								$resultCat = $catList->fetch_assoc();
							?>
							<a href="shop-gird.php?maLoai=<?php echo $resultCat['maLoai']; ?>"> Giày <?php echo $resultCat['tenLoai']; ?> </a>
							<span><?php echo $resultProd['tenSanPham']; ?></span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>				
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!-- SINGLE-PRODUCT-DESCRIPTION START -->
						<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
								<div class="single-product-view">
									  <!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="thumbnail_1">
											<div class="single-product-image">
												<img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="single-product-image" />
												<!-- <a class="new-mark-box" href="#">mới</a> -->
												<a class="fancybox" href="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" data-fancybox-group="gallery"><span class="btn large-btn">Phóng to <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div>
										<div class="tab-pane" id="thumbnail_2">
											<div class="single-product-image">
												<img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="single-product-image" />
												<!-- <a class="new-mark-box" href="#">mới</a> -->
												<a class="fancybox" href="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" data-fancybox-group="gallery"><span class="btn large-btn">Phóng to <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div>
										<div class="tab-pane" id="thumbnail_3">
											<div class="single-product-image">
												<img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="single-product-image" />
												<!-- <a class="new-mark-box" href="#">mới</a> -->
												<a class="fancybox" href="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" data-fancybox-group="gallery"><span class="btn large-btn">Phóng to <i class="fa fa-search-plus"></i></span></a>
											</div>		
										</div>
										<div class="tab-pane" id="thumbnail_4">
											<div class="single-product-image">
												<img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="single-product-image" />
												<!-- <a class="new-mark-box" href="#">mới</a> -->
												<a class="fancybox" href="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" data-fancybox-group="gallery"><span class="btn large-btn">Phóng to <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div>	
									</div>										
								</div>
								<div class="select-product">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs select-product-tab bxslider">
										<li class="active">
											<a href="#thumbnail_1" data-toggle="tab"><img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="pro-thumbnail" /></a>
										</li>
										<li>
											<a href="#thumbnail_2" data-toggle="tab"><img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="pro-thumbnail" /></a>
										</li>
										<li>
											<a href="#thumbnail_3" data-toggle="tab"><img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="pro-thumbnail" /></a>
										</li>
										<li>
											<a href="#thumbnail_4" data-toggle="tab"><img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="pro-thumbnail" /></a>
										</li>	
									</ul>										
								</div>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
								<div class="single-product-descirption">	
									<h2 name="m"><?php echo $resultProd['tenSanPham']; ?></h2>
									<div class="single-product-social-share">
										<ul>
											<li><a href="#" class="twi-link"><i class="fa fa-twitter"></i>Tweet</a></li>
											<li><a href="#" class="fb-link"><i class="fa fa-facebook"></i>Share</a></li>
											<li><a href="#" class="g-plus-link"><i class="fa fa-google-plus"></i>Google+</a></li>
											<li><a href="#" class="pin-link"><i class="fa fa-pinterest"></i>Pinterest</a></li>
										</ul>
									</div>
									<div class="single-product-review-box">
										<div class="rating-box">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-empty"></i>
										</div>
										<div class="read-reviews">
											<a href="#">Đọc đánh giá (1)</a>
										</div>
										<div class="write-review">
											<a href="#">Viết một đánh giá</a>
										</div>		
									</div>
									<div class="single-product-condition">
									<p>Mã sản phẩm: <span > <?php echo $resultProd['maSanPham']; ?></span></p>
										<!-- <p>Màu: <span>Aqua Pink</span></p> -->
										<p>Tình trạng: <span>Hàng mới</span></p>
									</div>
									<div class="single-product-price">
										<h2><?php echo number_format($resultProd['giaSanPham']); ?> VNĐ</h2>
									</div>
									<div class="single-product-desc">
										<p><?php echo $resultProd['mieuTaSanPham']; ?></p>
										<div class="product-in-stock">
											<p><?php if ($resultProd['trangThaiSanPham'] == '1')
											 echo 'Còn lại '.$resultProd['soLuongSanPham'].' sản phẩm' ?>
											 <!--?php if ($resultProd['trangThaiSanPham'] == '1') echo ' <button class="btn btn-success" >Còn hàng</button>'; -->
											<?php if($resultProd['soLuongSanPham']>0) echo ' <button class="btn btn-success" >Còn hàng</button>';
											 else if($resultProd['soLuongSanPham']<0)   echo ' <button class="btn btn-danger" >Hết hàng</button>'; ?>										
											</p>
										</div>
									</div>
									<div class="single-product-info">
										<a href="#"><i class="fa fa-envelope"></i></a>
										<a href="#"><i class="fa fa-print"></i></a>
										<a href="#"><i class="fa fa-heart"></i></a>
									</div>
									<!--
									<div class="single-product-color">
										<p class="small-title">Color </p> 
										<a href="#"><span></span></a>
										<a class="color-blue" href="#"><span></span></a>
									</div>
									-->
									<div class="single-product-add-cart">
												<!--div class="single-product-quantity">
													<p class="small-title">Số lượng:</p> 
													<div class="cart-quantity">
														<div class="cart-plus-minus-button single-qty-btn">
															<input class="cart-plus-minus sing-pro-qty" type="text" name="qtybutton" value="1">
														</div>
													</div>
												</div-->
												<div class="single-product-size">
													<p class="small-title">Size: </p> 
													<select name="product-size" id="product-size">
														<option value="<?php echo $resultProd["sizeSanPham"]; ?>"><?php echo $resultProd["sizeSanPham"]; ?></option>	
													</select>
												</div>
												<form method="post" action="add_cart.php?id=<?php echo $resultProd['maSanPham'];?>">
												<div class="single-product-quantity">
													<!--p class="small-title">Số lượng:</p--> 
													<!--div class="cart-quantity">
														<div class="cart-plus-minus-button single-qty-btn"-->
														<?php 
														//$masp = $resultProd['maSanPham'];
														if($resultProd['soLuongSanPham']>0)
														{ echo '<p class="small-title">Số lượng:</p>
															<div class="cart-quantity">
															<div class="cart-plus-minus-button single-qty-btn">
															<input class="cart-plus-minus sing-pro-qty" type="text" name="qtybutton" value="1"  readonly="readonly">
															</div>
															</div>';
														}
														/*else {
															echo '<div id="soluong">
															SẢN PHẨM ĐÃ HẾT HÀNG!!
															</div>';
														}*/?>
															<!--input class="cart-plus-minus sing-pro-qty" type="text" name="qtybutton" value="1"  -->
														<!--/div>
													</div-->
												</div>
												<?php 
												  if($resultProd['soLuongSanPham']>0)
												  {
													echo '<input type="submit" name ="add_to_cart" class="add-cart-text" value="Thêm vào giỏ hàng" title="Add to cart">';
												  }
												  else {
													echo '<input type="submit" disabled name ="add_to_cart" class="add-cart-text" value="Sản Phẩm Hết">';
												  }?>
												<!--input type="submit" name ="add_to_cart" class="add-cart-text" value="Thêm vào giỏ hàng" title="Add to cart"-->
												</form>
											   <!--?php include 'add_cart.php'?-->      
									</div>
								</div>
							</div>
						</div>
						<!-- SINGLE-PRODUCT-DESCRIPTION END -->
						<!-- SINGLE-PRODUCT INFO TAB START -->
						<div class="row">
							<div class="col-sm-12">
								<div class="product-more-info-tab">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs more-info-tab">
										<li class="active"><a href="#moreinfo" data-toggle="tab">Miêu tả sản phẩm</a></li>
										<li><a href="#datasheet" data-toggle="tab">Chi tiết sản phẩm</a></li>
										<li><a href="#review" data-toggle="tab">Đánh giá</a></li>
									</ul>
									  <!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="moreinfo">
											<div class="tab-description">
												<p><?php echo $resultProd['mieuTaSanPham']; ?></p>
											</div>
										</div>
										<div class="tab-pane" id="datasheet">
											<div class="deta-sheet">
												<table class="table-data-sheet">			
													<tbody>
														<tr class="odd">
															<td>Màu sắc:  </td>
															<td></td>
														</tr>
														<tr class="even">
															<td class="td-bg">Mã sản phẩm: </td>
															<td class="td-bg"><?php echo $resultProd['maSanPham']; ?></td>
														</tr>	
													</tbody>
												</table>				
											</div>
										</div>
										<div class="tab-pane" id="review">
											<div class="row tab-review-row">
												<div class="col-xs-5 col-sm-4 col-md-4 col-lg-3 padding-5">
													<div class="tab-rating-box">
														<span>Thanh Phong Trần</span>
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>	
														<div class="review-author-info">
															<strong>Đẹp, dễ mang</strong>
															<span>04/2/2020</span>
														</div>															
													</div>
												</div>
												<div class="col-xs-7 col-sm-8 col-md-8 col-lg-9 padding-5">
													<div class="write-your-review">
														<p><strong>Viết một đánh giá</strong></p>
														<p>Viêt một đánh giá</p>
														<span class="usefull-comment">Đánh giá này có ích với bạn không? <span>Có</span><span>Không</span></span>
														<a href="#">Báo cáo lạm dụng</a>
													</div>
												</div>
												<a href="#" class="write-review-btn">Viết đánh giá của bạn ngay!</a>
											</div>
										</div>
									</div>									
								</div>
							</div>
						</div>
						<!-- SINGLE-PRODUCT INFO TAB END -->
						<!-- RELATED-PRODUCTS-AREA START -->
						<div class="row">
							<div class="col-sm-12">
								<div class="left-title-area">
									<h2 class="left-title">Sản phẩm tương tự</h2>
								</div>	
							</div>
							<div class="related-product-area featured-products-area">
								<div class="col-sm-12">
									<div class=" row">
										<!-- RELATED-CAROUSEL START -->
										<div class="related-product">
											<!-- SINGLE-PRODUCT-ITEM START -->
											<?php 
														$prodSame = new product();
														$prodListSame = $prodSame->show_product();
														if ($prodListSame){
														while ($resultProdSame = $prodListSame->fetch_assoc()){
															if (($resultProdSame['trangThaiSanPham'] == '1') && ($resultProdSame['maLoai'] == $resultProd['maLoai']) && ($resultProdSame['maSanPham'] != $resultProd['maSanPham']) ){
											//Show sản phẩm cùng loại, còn hàng, khác sản phẩm hiện tại														
											?>
											<div class="item">	
												<div class="single-product-item">	
													<div class="product-image">
														<a href="single-product.php?maSanPham=<?php echo $resultProdSame['maSanPham']; ?>"><img src="admin/pages/uploads/<?php echo $resultProdSame['hinhAnhSanPham']; ?>" alt="product-image" /></a>
													</div>
													<div class="product-info">
														<div class="customar-comments-box">
															<div class="rating-box">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-half-empty"></i>
															</div>
															<div class="review-box">
																<span>1 Đánh giá</span>
															</div>
														</div>
														<a href="single-product.php?maSanPham=<?php echo $resultProdSame['maSanPham']; ?>">
															<span style="text-transform: uppercase;">
															<?php
                                                            	echo $textSh = $fm->textShorten($resultProdSame['tenSanPham'], 30); //Giới hạn kí tự để hiển thị
                                                        	?> 
                                                        	</span>
														</a>
														<div class="price-box">
															<span class="price"><?php echo number_format($resultProdSame['giaSanPham']); ?> VNĐ</span>
															<!-- <span class="old-price">1,400,000 VND</span> -->
														</div>
													</div>
												</div>									
											</div>
											<?php 				
													}
												}
											}
											?>
											<!-- SINGLE-PRODUCT-ITEM END -->									
										</div>
										<!-- RELATED-CAROUSEL END -->
									</div>	
								</div>
							</div>	
						</div>
						<!-- RELATED-PRODUCTS-AREA END -->
					</div>
					<!-- RIGHT SIDE BAR START -->
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<!-- SINGLE SIDE BAR START -->
						<div class="single-product-right-sidebar">
							<h2 class="left-title">Sản phẩm khác</h2>
							<ul>
								<?php 
									$prodListOther = $prodSame->show_productLimit5();
									if ($prodListOther){
										while ($resultProdOther = $prodListOther->fetch_assoc()){
											if (($resultProdOther['trangThaiSanPham'] == '1') && ($resultProdOther['maSanPham'] != $resultProd['maSanPham']) ){
								//Show sản phẩm khác sản phẩm ở trang hiện tại, còn hàng					
								?>
								<li>
									<a href="single-product.php?maSanPham=<?php echo $resultProdOther['maSanPham']; ?>"><img src="admin/pages/uploads/<?php echo $resultProdOther['hinhAnhSanPham']; ?>" width='80' alt="" /></a>
									<div class="r-sidebar-pro-content">
										<h5 style="text-transform: uppercase;"><a href="single-product.php?maSanPham=<?php echo $resultProdOther['maSanPham']; ?>"><?php
                                                          echo $textShOther = $fm->textShorten($resultProdOther['tenSanPham'], 20); //Giới hạn kí tự để hiển thị
                                                       ?> </a></h5>
										<p><?php
                                                          echo $textShOther1 = $fm->textShorten($resultProdOther['mieuTaSanPham'], 50); //Giới hạn kí tự để hiển thị
                                             ?></p>
									</div>
								</li>
								<?php
									}}}
								?>
							</ul>
						</div>	
						<!-- SINGLE SIDE BAR END -->
						<!-- SINGLE SIDE BAR START -->
						<div class="single-product-right-sidebar clearfix">
							<h2 class="left-title">Tags </h2>
							<div class="category-tag">
								<a href="shop-gird.php?maLoai=1">Adidas</a>
								<a href="shop-gird.php?maLoai=2">Nike</a>
								<a href="shop-gird.php?maLoai=3">CONVERSE</a>
								<a href="shop-gird.php?maLoai=4">VANS</a>
								<a href="shop-gird.php?maLoai=11">Newbalance</a>
								<a href="shop-gird.php?maLoai=6">Asics</a>

							</div>							
						</div>	
						<!-- SINGLE SIDE BAR END -->
						<!-- SINGLE SIDE BAR START -->						
						<div class="single-product-right-sidebar">
							<div class="slider-right zoom-img">
								<a href="single-product.php?maSanPham=7"><img class="img-responsive" src="img/product/cms111.png" alt="sidebar left" /></a>
							</div>							
						</div>
					</div>
					<!-- SINGLE SIDE BAR END -->				
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