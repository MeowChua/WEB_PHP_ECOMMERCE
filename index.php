<?php
	include 'header.php';
?>

		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<!-- MAIN-SLIDER-AREA START -->
					<div class="main-slider-area">
						<!-- SLIDER-AREA START -->
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<div class="slider-area">
								<div id="wrapper">
									<div class="slider-wrapper">
										<div id="mainSlider" class="nivoSlider">
											<img src="img/slider/2.png " alt="main slider" title="#htmlcaption"/>
											<img src="img/slider/1.png" alt="main slider" title="#htmlcaption2"/>
										</div>
										<div id="htmlcaption" class="nivo-html-caption slider-caption">
											<div class="slider-progress"></div>
											<div class="slider-cap-text slider-text1">
												<div class="d-table-cell">
													<h2 class="animated bounceInDown">ADIDAS COLLECTION</h2>
												<p class="animated bounceInUp" style="font-weight: bold;color: #fff;">Bộ sưu tập Adidas mới nhất.</p>
													<a class="wow zoomInDown" data-wow-duration="0.5s" data-wow-delay="1s" href="shop-gird.php?maLoai=1">XEM NGAY <i class="fa fa-caret-right"></i></a>						
												</div>
											</div>
										</div>
										<div id="htmlcaption2" class="nivo-html-caption slider-caption">
											<div class="slider-progress"></div>
											<div class="slider-cap-text slider-text2">
												<div class="d-table-cell">
													<h2 class="animated bounceInDown">CONVERSE COLLECTION</h2>
													<p class="animated bounceInUp" style="font-weight: bold;color: #fff;">Bộ sưu tập Converse mới nhất.</p>
													<a class="wow zoomInDown" data-wow-duration="0.5s" data-wow-delay="1s" href="shop-gird.php?maLoai=3">XEM NGAY <i class="fa fa-caret-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>								
							</div>							
						</div>
						<!-- SLIDER-AREA END -->
						<!-- SLIDER-RIGHT START -->
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<div class="slider-right zoom-img m-top">
								<a href="single-product.php?maSanPham=7"><img class="img-responsive" src="img/product/cms111.png" alt="sidebar left" /></a>
							</div>
						</div>
						<!-- SLIDER-RIGHT END -->
					</div>
					<!-- MAIN-SLIDER-AREA END -->
				</div>
				<!-- TOW-COLUMN-PRODUCT START -->
				<div class="row tow-column-product">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- NEW-PRODUCT-AREA START -->
						<div class="new-product-area">
							<div class="left-title-area">
								<h2 class="left-title">Sản phẩm mới</h2>
							</div>						
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<!-- NEW-PRO-CAROUSEL START -->
										<div class="new-pro-carousel">
											<?php 
												$prodList = $prod->show_productLimit14New();
												if ($prodList){
													while ($resultProd = $prodList->fetch_assoc()){
														if ($resultProd['trangThaiSanPham'] == '1' ){

											?>
											<!-- NEW-PRODUCT-SINGLE-ITEM START -->
											<div class="item">
												<div class="new-product">
													<div class="single-product-item">
														<div class="product-image">
															<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>"><img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="product-image" width="800px" /></a>
															<a href="#" class="new-mark-box">mới</a>
															<!--div class="overlay-content">
																<ul>
																	<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
																	<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
																	<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
																	<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
																</ul>
															</div-->
														</div>
														<div class="product-info">
															<div class="customar-comments-box">
																<div class="rating-box">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-half-empty"></i>
																	<i class="fa fa-star-half-empty"></i>
																</div>
																<div class="review-box">
																	<span>2 Đánh giá</span>
																</div>
															</div>
															<div>
															<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>" ><span style="text-transform: uppercase;"><?php echo $resultProd['tenSanPham']; ?></span></a>
															</div>
															<div class="price-box" >
																<span class="price"><?php echo number_format($resultProd['giaSanPham']); ?> VNĐ</span>
															</div>
														</div>
													</div>
												</div>
											</div>

											<?php 
												}
											}
										}
										?>
											<!-- NEW-PRODUCT-SINGLE-ITEM END -->
										</div>									
										
									</div>
								</div>
							</div>
						</div>
						<!-- NEW-PRODUCT-AREA END -->
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- SALE-PRODUCTS START -->
						<div class="Sale-Products">
							<div class="left-title-area">
								<h2 class="left-title">SẢN PHẨM KHUYẾN MÃI</h2>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<!-- SALE-CAROUSEL START -->
										<div class="sale-carousel">
											<!-- SALE-PRODUCTS-SINGLE-ITEM START -->
												<?php 
														$querySPLimit8 = mysqli_query($conn, "SELECT * FROM tbl_sanpham LIMIT 8");
													
														while ($resultKM = mysqli_fetch_array($querySPLimit8)) {
														
											?>
											<div class="item">
											
												<div class="new-product">
													
													<div class="single-product-item">
														<div class="product-image">
															<a href="single-product.php?maSanPham=<?php echo $resultKM['maSanPham'] ?>"><img src="admin/pages/uploads/<?php echo $resultKM['hinhAnhSanPham'] ?>" alt="product-image" /></a>
														</div>
														<div class="product-info">
															<div class="customar-comments-box">
																<div class="rating-box">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-half-empty"></i>
																	<i class="fa fa-star-half-empty"></i>
																</div>
																<div class="review-box">
																	<span>2 Đánh giá</span>
																</div>
															</div>
															<a href="single-product.php?maSanPham=<?php echo $resultKM['maSanPham'] ?>"><?php echo $resultKM['tenSanPham'] ?></a>
															<div class="price-box">
																<span class="price"><?php echo number_format($resultKM['giaSanPham']) ?> VNĐ</span>
																
															</div>
														</div>
													</div>
													
												</div>
													
											</div>
											<!-- SALE-PRODUCTS-SINGLE-ITEM END -->
													<?php 
														}
												?>						
										</div>
										
										<!-- SALE-CAROUSEL END -->
									</div>
								</div>
							</div>
						</div>
						<!-- SALE-PRODUCTS END -->
					</div>
				</div>
				<!-- TOW-COLUMN-PRODUCT END -->
				<div class="row">
					<!-- ADD-TWO-BY-ONE-COLUMN START -->
					<div class="add-two-by-one-column">
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<div class="tow-column-add zoom-img">
								<a href="shop-gird.php?maLoai=2"><img src="img/product/shope-add11.jpg" alt="shope-add" /></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="one-column-add zoom-img">
								<a href="shop-gird.php?maLoai=4"><img src="img/product/shope-add22.png" alt="shope-add" /></a>
							</div>								
						</div>
					</div>
					<!-- ADD-TWO-BY-ONE-COLUMN END -->
				</div>
			
				
				<div class="row">	
					<!-- BESTSELLER-PRODUCTS-AREA START -->
					<div class="bestseller-products-area">
						<div class="center-title-area">
							<h2 class="center-title">SẢN PHẨM NỔI BẬT</h2>
						</div>	
						<div class="col-xs-12">
							<div class="row">
								<!-- BESTSELLER-CAROUSEL START -->
								<div class="bestseller-carousel">
									<!-- BESTSELLER-SINGLE-ITEM START -->
									<?php 
										$prodList = $prod->show_productLimit14Asc();
											if ($prodList){
												while ($resultProd = $prodList->fetch_assoc()){
													if ($resultProd['trangThaiSanPham'] == '1' ){

									?>
									<div class="item">
										<div class="single-product-item">
											<div class="product-image">
												<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>"><img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="product-image" /></a>
												<!-- <a href="#" class="new-mark-box" style="background-color: rgb(66, 139, 202);">-30%</a> -->
												<!--div class="overlay-content">
													<ul>
														<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
													</ul>
												</div-->
											</div>
											<div class="product-info">
												<div class="customar-comments-box">
													<div class="rating-box">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="review-box">
														<span>1 Đánh giá</span>
													</div>
												</div>
												<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>"><span style="text-transform: uppercase;"><?php echo $resultProd['tenSanPham']; ?></span></a>
												<div class="price-box">
													<span class="price"><?php echo number_format($resultProd['giaSanPham']); ?> VNĐ</span>
														<!-- <span class="old-price">1,400,000 VND</span> -->
												</div>
											</div>
										</div>							
									</div>
									<?php
										}}}
									?>
									<!-- BESTSELLER-SINGLE-ITEM END -->
								</div>	
								<!-- BESTSELLER-CAROUSEL END -->	
							</div>
						</div>								
					</div>
					<!-- BESTSELLER-PRODUCTS-AREA END -->
				</div>
				<!-- Adidas product start -->
				<div class="row">	

					<!-- BESTSELLER-PRODUCTS-AREA START -->
					<div class="bestseller-products-area">
						<div class="center-title-area">	
							<h2 class="center-title">SẢN PHẨM CỦA ADIDAS</h2>
							<img src="img/brand/01.png" alt="brand-client" width="80" style="float: left;" />
						</div>	
						<div class="col-xs-12">
							<div class="row">
								<!-- BESTSELLER-CAROUSEL START -->
								<div class="bestseller-carousel">
									<!-- BESTSELLER-SINGLE-ITEM START -->
									<?php
										$prodList = $prod->show_product();
											if ($prodList){
												while ($resultProd = $prodList->fetch_assoc()){
													if (($resultProd['trangThaiSanPham'] == '1') && ($resultProd['maLoai'] == '1') ){

									?>
									<div class="item">
										<div class="single-product-item">
											<div class="product-image">
												<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>"><img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="product-image" /></a>

												<!-- <a href="#" class="new-mark-box" style="background-color: rgb(66, 139, 202);">-30%</a> -->
												<!--div class="overlay-content">
													<ul>
														<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
													</ul>
												</div-->
											</div>
											<div class="product-info">
												<div class="customar-comments-box">
													<div class="rating-box">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="review-box">
														<span>1 Đánh giá</span>
													</div>
												</div>
												<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>"><span style="text-transform: uppercase;"><?php echo $resultProd['tenSanPham']; ?></span></a>
												<div class="price-box">
													<span class="price"><?php echo number_format($resultProd['giaSanPham']); ?> VNĐ</span>
														<!-- <span class="old-price">1,400,000 VND</span> -->
												</div>
											</div>
										</div>							
									</div>
									<?php
										}}}
									?>
									<!-- BESTSELLER-SINGLE-ITEM END -->
								</div>	
								<!-- BESTSELLER-CAROUSEL END -->	
							</div>
						</div>								
					</div>
					<!-- BESTSELLER-PRODUCTS-AREA END -->
					<!-- Adidas product end -->
				</div>

				<!-- Adidas product start -->
				<div class="row">	
					<!-- BESTSELLER-PRODUCTS-AREA START -->
					<div class="bestseller-products-area">
						<div class="center-title-area">
							<h2 class="center-title">SẢN PHẨM CỦA NIKE</h2>
							<img src="img/brand/02.png" alt="brand-client" width="80" style="float: left;" />
						</div>	
						<div class="col-xs-12">
							<div class="row">
								<!-- BESTSELLER-CAROUSEL START -->
								<div class="bestseller-carousel">
									<!-- BESTSELLER-SINGLE-ITEM START -->
									<?php
										$prodList = $prod->show_product();
											if ($prodList){
												while ($resultProd = $prodList->fetch_assoc()){
													if (($resultProd['trangThaiSanPham'] == '1') && ($resultProd['maLoai'] == '2') ){

									?>
									<div class="item">
										<div class="single-product-item">
											<div class="product-image">
												<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>"><img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="product-image" /></a>
												<!-- <a href="#" class="new-mark-box" style="background-color: rgb(66, 139, 202);">-30%</a> -->
												<!--div class="overlay-content">
													<ul>
														<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
													</ul>
												</div-->
											</div>
											<div class="product-info">
												<div class="customar-comments-box">
													<div class="rating-box">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="review-box">
														<span>1 Đánh giá</span>
													</div>
												</div>
												<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>"><span style="text-transform: uppercase;"><?php echo $resultProd['tenSanPham']; ?></span></a>
												<div class="price-box">
													<span class="price"><?php echo number_format($resultProd['giaSanPham']); ?> VNĐ</span>
														<!-- <span class="old-price">1,400,000 VND</span> -->
												</div>
											</div>
										</div>							
									</div>
									<?php
										}}}
									?>
									<!-- BESTSELLER-SINGLE-ITEM END -->
								</div>	
								<!-- BESTSELLER-CAROUSEL END -->	
							</div>
						</div>								
					</div>
					<!-- BESTSELLER-PRODUCTS-AREA END -->
					<!-- Adidas product end -->



				<div class="row">
					<!-- IMAGE-ADD-AREA START -->
					<div class="image-add-area">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<!-- ONEHALF-ADD START -->
							<div class="onehalf-add-shope zoom-img">
								<a href="#"><img src="img/product/one-helf11.jpg" alt="shope-add" /></a>
							</div>
							<!-- ONEHALF-ADD END -->
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<!-- ONEHALF-ADD START -->
							<div class="onehalf-add-shope zoom-img">
								<a href="#"><img src="img/product/one-helf22.jpg" alt="shope-add" /></a>
							</div>
							<!-- ONEHALF-ADD END -->
						</div>						
					</div>
					<!-- IMAGE-ADD-AREA END -->
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- LATEST-NEWS-AREA START -->
		<section class="latest-news-area">
			<div class="container">
				<div class="row">
					<div class="latest-news-row">
						<div class="center-title-area">
							<h2 class="center-title"><a href="#">TIN TỨC MỚI</a></h2>
						</div>	
						<div class="col-xs-12">
							<div class="row">
								<!-- LATEST-NEWS-CAROUSEL START -->
								<div class="latest-news-carousel">
									<!-- LATEST-NEWS-SINGLE-POST START -->
									<div class="item">
										<div class="latest-news-post">
											<div class="single-latest-post">
												<a href="#"><img src="img/latest-news/01.jpg" alt="latest-post" /></a>
												<h2><a href="#">Converse Chuck Taylor All Star Cheerful siêu đáng yêu bên họa tiết mặt cười</a></h2>
												<p>Không chỉ riêng Jack Purcell mới được áp dụng họa tiết mặt cười. Lần này Converse đã sử dụng họa tiết tương tự lên dòng Chuck Taylor All Star nhưng thiết kế theo cách riêng với sự hỗ trợ của những hình ảnh mang tính biểu tượng nhà Converse...</p>
												<div class="latest-post-info">
													<i class="fa fa-calendar"></i><span>2020-04-02 04:51:43</span>
												</div>
												<div class="read-more">
													<a href="#">Xem thêm<i class="fa fa-long-arrow-right"></i></a>
												</div>
											</div>
										</div>
									</div>
									<!-- LATEST-NEWS-SINGLE-POST END -->
									<!-- LATEST-NEWS-SINGLE-POST START -->
									<div class="item">
										<div class="latest-news-post">
											<div class="single-latest-post">
												<a href="#"><img src="img/latest-news/02.jpg" alt="latest-post" /></a>
												<h2><a href="#">Giày Converse Nam Cổ Thấp – Thiết kế nam tính cho mọi phong cách thời trang</a></h2>
												<p>Xu hướng chọn cho mình những đôi Converse có kiểu dáng cổ thấp tiện dụng cùng phối màu đơn giản sẽ giúp các chàng trai dễ dàng lên đồ mà không cần suy nghĩ!...</p>
												<div class="latest-post-info">
													<i class="fa fa-calendar"></i><span>2020-04-02 04:51:43</span>
												</div>
												<div class="read-more">
													<a href="#">Xem thêm<i class="fa fa-long-arrow-right"></i></a>
												</div>
											</div>
										</div>
									</div>
									<!-- LATEST-NEWS-SINGLE-POST END -->
									<!-- LATEST-NEWS-SINGLE-POST START -->								
									<div class="item">
										<div class="latest-news-post">
											<div class="single-latest-post">
												<a href="#"><img src="img/latest-news/03.jpg" alt="latest-post" /></a>
												<h2><a href="#">5 nguyên liệu làm sạch giày Converse tại nhà hiệu quả</a></h2>
												<p>Vệ sinh giày Converse không khó nhưng làm thế nào để chúng trở nên trắng sáng tinh tươm y như mới thì quả thật là một chuyện không hề dễ dàng. Theo những...</p>
												<div class="latest-post-info">
													<i class="fa fa-calendar"></i><span>2020-04-02 04:51:43</span>
												</div>
												<div class="read-more">
													<a href="#">Xem thêm<i class="fa fa-long-arrow-right"></i></a>
												</div>
											</div>
										</div>
									</div>
									<!-- LATEST-NEWS-SINGLE-POST END -->
									<!-- LATEST-NEWS-SINGLE-POST START -->								
									<div class="item">
										<div class="latest-news-post">
											<div class="single-latest-post">
												<a href="#"><img src="img/latest-news/04.jpg" alt="latest-post" /></a>
												<h2><a href="#">Tham khảo ngay một vài mẫu giày Vans Custom đẹp không lối thoát</a></h2>
												<p>Để có thể tăng thêm sự cá tính cũng như độ chất cho đôi giày, các bạn trẻ thường lựa chọn phương pháp custom (vẽ trên giày) nhằm mang đến cho items của mình một diện mạo mới độc đáo và lạ mắt hơn....</p>
												<div class="latest-post-info">
													<i class="fa fa-calendar"></i><span>2020-04-02 04:51:43</span>
												</div>
												<div class="read-more">
													<a href="#">Xem thêm<i class="fa fa-long-arrow-right"></i></a>
												</div>
											</div>
										</div>
									</div>
									<!-- LATEST-NEWS-SINGLE-POST END -->
									<!-- LATEST-NEWS-SINGLE-POST START -->								
									<div class="item">
										<div class="latest-news-post">
											<div class="single-latest-post">
												<a href="#"><img src="img/latest-news/05.jpg" alt="latest-post" /></a>
												<h2><a href="#">Điểm mặt ngay những bộ sưu tập Converse đẹp nhất đầu năm 2020</a></h2>
												<p>Những ngày qua thị trường giày thể thao Việt Nam có nhiều hoạt động sôi nổi khi hàng loạt những bộ sưu tập có thiết kế, kiểu dáng ấn tượng mang những nguồn cảm hứng khác nhau đến từ các “ông lớn” trên thế giới...</p>
												<div class="latest-post-info">
													<i class="fa fa-calendar"></i><span>2020-04-02 04:51:43</span>
												</div>
												<div class="read-more">
													<a href="#">Xem thêm <i class="fa fa-long-arrow-right"></i></a>
												</div>
											</div>
										</div>
									</div>
									<!-- LATEST-NEWS-SINGLE-POST END -->
									<!-- LATEST-NEWS-SINGLE-POST START -->								
									<div class="item">
										<div class="latest-news-post">
											<div class="single-latest-post">
												<a href="#"><img src="img/latest-news/06.jpg" alt="latest-post" /></a>
												<h2><a href="#">Converse chiếm Spotlight với hàng loạt những BST mang đậm chất riêng</a></h2>
												<p>Với hi vọng mang đến một kỷ nguyên mới đầy màu sắc cho làng giày thể thao, Converse luôn không ngừng cải tiến và phát triển để đáp ứng nhu cầu thời trang của giới trẻ. Như một chiếc “tên lửa”...</p>
												<div class="latest-post-info">
													<i class="fa fa-calendar"></i><span>2020-04-02 04:51:43</span>
												</div>
												<div class="read-more">
													<a href="#">Xem thêm <i class="fa fa-long-arrow-right"></i></a>
												</div>
											</div>
										</div>
									</div>
									<!-- LATEST-NEWS-SINGLE-POST END -->	
									<!-- LATEST-NEWS-SINGLE-POST START -->								
									<div class="item">
										<div class="latest-news-post">
											<div class="single-latest-post">
												<a href="#"><img src="img/latest-news/07.jpg" alt="latest-post" /></a>
												<h2><a href="#">Chuck Taylor All Star OG Color Blocking – Cá tính với lối phối màu tương phản</a></h2>
												<p>Converse Chuck Taylor All Star OG Color Blocking – Bộ sưu tập hứa hẹn mang đến những trải nghiệm đầy mới lạ dành cho những tín đồ yêu giày với kiểu dáng cổ thấp trẻ trung cùng lối phối màu tương phản đẹp mắt...</p>
												<div class="latest-post-info">
													<i class="fa fa-calendar"></i><span>2020-04-02 04:51:43</span>
												</div>
												<div class="read-more">
													<a href="#">Xem thêm <i class="fa fa-long-arrow-right"></i></a>
												</div>
											</div>
										</div>
									</div>
									<!-- LATEST-NEWS-SINGLE-POST END -->
									<!-- LATEST-NEWS-SINGLE-POST START -->								
									<div class="item">
										<div class="latest-news-post">
											<div class="single-latest-post">
												<a href="#"><img src="img/latest-news/08.jpg" alt="latest-post" /></a>
												<h2><a href="#">Trở lại với họa tiết zig zag huyền thoại cùng Converse Chuck Taylor All Star VLTG</a></h2>
												<p>Tháng 3 này, thương hiệu bóng rổ tỉ đô tiếp tục quay trở lại “trường đua” với seri bom tấn quen thuộc lấy cảm hứng từ những họa tiết zig-zag kinh điển của những năm 90 hứa hẹn sẽ mang đến phái đẹp nhiều điều bất ngờ...</p>
												<div class="latest-post-info">
													<i class="fa fa-calendar"></i><span>2020-04-02 04:51:43</span>
												</div>
												<div class="read-more">
													<a href="#">Xem thêm <i class="fa fa-long-arrow-right"></i></a>
												</div>
											</div>
										</div>
									</div>
									<!-- LATEST-NEWS-SINGLE-POST END -->									
								</div>	
								<!-- LATEST-NEWS-CAROUSEL START -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- LATEST-NEWS-AREA END -->
		<!-- BRAND-CLIENT-AREA START -->
		<section class="brand-client-area">
			<div class="container">
				<div class="row">
					<!-- BRAND-CLIENT-ROW START -->
					<div class="brand-client-row">
						<div class="center-title-area">
							<h2 class="center-title">THƯƠNG HIỆU & ĐỐI TÁC</h2>
						</div>
						<div class="col-xs-12">
							<div class="row">
								<!-- CLIENT-CAROUSEL START -->
								<div class="client-carousel">
									<!-- CLIENT-SINGLE START -->
									<div class="item">
										<div class="single-client">
											<a href="#">
												<img src="img/brand/01.png" alt="brand-client" />
											</a>
										</div>									
									</div>
									<!-- CLIENT-SINGLE END -->
									<!-- CLIENT-SINGLE START -->
									<div class="item">
										<div class="single-client">
											<a href="#">
												<img src="img/brand/02.png" alt="brand-client" />
											</a>
										</div>									
									</div>
									<!-- CLIENT-SINGLE END -->
									<!-- CLIENT-SINGLE START -->								
									<div class="item">
										<div class="single-client">
											<a href="#">
												<img src="img/brand/03.png" alt="brand-client" />
											</a>
										</div>									
									</div>
									<!-- CLIENT-SINGLE END -->
									<!-- CLIENT-SINGLE START -->								
									<div class="item">
										<div class="single-client">
											<a href="#">
												<img src="img/brand/04.png" alt="brand-client" />
											</a>
										</div>									
									</div>
									<!-- CLIENT-SINGLE END -->
									<!-- CLIENT-SINGLE START -->								
									<div class="item">
										<div class="single-client">
											<a href="#">
												<img src="img/brand/05.png" alt="brand-client" />
											</a>
										</div>									
									</div>
									<!-- CLIENT-SINGLE END -->
									<!-- CLIENT-SINGLE START -->								
									<div class="item">
										<div class="single-client">
											<a href="#">
												<img src="img/brand/06.png" alt="brand-client" />
											</a>
										</div>									
									</div>
									<!-- CLIENT-SINGLE END -->									
									<!-- CLIENT-SINGLE START -->								
									<div class="item">
										<div class="single-client">
											<a href="#">
												<img src="img/brand/07.png" alt="brand-client" />
											</a>
										</div>									
									</div>
									<!-- CLIENT-SINGLE END -->
									<!-- CLIENT-SINGLE START -->
									<div class="item">
										<div class="single-client">
											<a href="#">
												<img src="img/brand/08.png" alt="brand-client" />
											</a>
										</div>									
									</div>
									<!-- CLIENT-SINGLE END -->											
								</div>
								<!-- CLIENT-CAROUSEL END -->
							</div>
						</div>
					</div>
					<!-- BRAND-CLIENT-ROW END -->
				</div>
			</div>
		</section>
		<!-- BRAND-CLIENT-AREA END -->
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