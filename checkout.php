<?php
session_start();
	$pageTitle = "THANH TOÁN | GIÀY B.STORE - Hệ thống giày thể thao chính hãng";
	function customPageHeader(){?>
		<title>$pageTitle</title>
	<?php }

	include 'header.php';
?>
	
		<!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
			<form action="order.php" method="post">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.php">TRANG CHỦ</a>
							<span><i class="fa fa-caret-right"></i></span>
							<span>Phương thức thanh toán</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Chọn một phương thức thanh toán <span class="shop-pro-item">Giỏ hàng bao gồm: 
						<?php if(isset($_SESSION['soluong']))
						   {
							   $m=$_SESSION['soluong'];
							   echo $m;
						   }
						?>
						 sản phẩm </span></h2>
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
								<li class="step-todo four step-done">
									<span><a href="checkout-shipping.php">04. VẬN CHUYỂN</a></span>
								</li>
								<li class="step-current last" id="step_end">
									<span>05. THANH TOÁN</span>
								</li>
							</ul>									
						</div>
						<!-- SHOPING-CART-MENU END -->
						<!-- CART TABLE_BLOCK START -->
						<div class="table-responsive">
							<!-- TABLE START -->
							<table class="table table-bordered" id="cart-summary">
								<!-- TABLE HEADER START -->
								<thead>
									<tr>
										<th class="cart-product">Sản phẩm</th>
										<th class="cart-description">Miêu tả sản phẩm</th>
										<th class="cart-availability text-center">Tình trạng hàng</th>
										<th class="cart-unit text-right">Đơn giá</th>
										<th class="cart_quantity text-center">Số lượng</th>
										<th class="cart-total text-right">Tổng</th>
									</tr>
								</thead>
								<!-- TABLE HEADER END -->
								<!-- TABLE BODY START -->
								<tbody>
									<!-- SINGLE CART_ITEM START -->
									<?php 
									 $sId=session_id();
									   $danhsach=mysqli_query($conn,"SELECT *,sum(`soLuongSanPham`) FROM `tbl_giohang` WHERE `sessionID`='$sId' GROUP BY `maSanPham` ");
									   $sup_total=0;
									   while($rows=mysqli_fetch_assoc($danhsach))
									   { ?>
									<tr>
										<td class="cart-product">
											<a href="#">
												<img alt="Faded" src="admin/pages/uploads/<?php echo $rows['hinhAnhSanPham']; ?>">
											</a>
										</td>
										<td class="cart-description">
											<p class="product-name"><a href="#"><?php echo $rows['tenSanPham']?></a></p>
											<small name="ma">Mã sản phẩm: <?php echo $rows['maSanPham'];?></small>
											<small><a href="#">Size : <?php echo $rows['sizeSanPham'];?></a></small>
										</td>
										<td class="cart-avail">
											<span class="label label-success">Còn hàng</span>
										</td>
										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price"><?php echo number_format($rows['giaSanPham']);?> VNĐ</li>
											</ul>
										</td>
										<td class="cart_quantity text-center">
											<span><?php echo $rows['sum(`soLuongSanPham`)'];?></span>
										</td>
										<td class="cart-total">
										<?php 
										   //$gia=(string)$rows['soLuongSanPham'];
										  $total=$rows['giaSanPham'] *$rows['sum(`soLuongSanPham`)'];?>
										<span class="price" ><?php echo number_format($total);?> VNĐ</span>
										
										</td>
									</tr>
									<?php $sup_total+=$total;?><!--tính tổng tiền-->
									<?php }?>
									<!-- SINGLE CART_ITEM END -->
								</tbody>
								<!-- TABLE BODY END -->
								<!-- TABLE FOOTER START -->
								<tfoot>
									<tr>
										<td class="text-right" colspan="4">Tạm tính</td>
										<td class="price" colspan="2"><?php echo number_format($sup_total);?>VNĐ</td>
									</tr>
									<tr>
										<td class="text-right" colspan="4">Chi phí gói quà</td>
										<td class="price" colspan="2">0 VNĐ</td>
									</tr>
									<tr>
										<td class="text-right" colspan="4">Phí vận chuyển</td>
										<td class="price" colspan="2">0 VNĐ</td>
									</tr>
									<tr>
										<td class="text-right" colspan="4">Khuyến mãi</td>
										<td class="price" colspan="2">0 VNĐ</td>
									</tr>
									<tr>
										<td class="total-price-container text-right" colspan="4">
											<span>Tổng thanh toán</span>
										</td>
										<td id="total-price-container" class="price" colspan="2">
											<span id="total-price"><?php echo number_format($sup_total);?> VNĐ</span>
											<input type='hidden' name="price" value="<?php echo ($sup_total);?>">
										</td>
									</tr>
									<?php
									$makhachhang=$_SESSION['maKhachHang'];//lấy mã khách hàng
									$sessionid = session_id();
									$idthongtin =mysqli_query($conn,"SELECT IDTTGH FROM tbl_thongtingiaohang1 ORDER BY IDTTGH DESC LIMIT 1");
									$dataTT = mysqli_fetch_assoc($idthongtin);
									$idTTGH =  $dataTT['IDTTGH'];

									$khach_hang=mysqli_query($conn,"SELECT * FROM `tbl_thongtingiaohang1` WHERE `maKhachHang`='$makhachhang' AND `IDTTGH` = '$idTTGH' ");
									$thong_tin=mysqli_fetch_assoc($khach_hang);
									?>
									<tr>
										<td class="text-right" colspan="4">Địa chỉ giao hàng</td>
										<td class="price" colspan="2"><?php echo $thong_tin['diachi'];?></td>
									</tr>
									<tr>
										<td class="text-right" colspan="4">Số điện thoại</td>
										<td class="price" colspan="2"><?php echo "+84".$thong_tin['soDienThoai'];?> </td>
									</tr>
									<tr>
										<td class="text-right" colspan="4">Người nhận</td>
										<td class="price" colspan="2"><?php echo $thong_tin['tenNguoiNhan'];?></td>
									</tr>
								</tfoot>
								<!-- TABLE FOOTER END -->								
							</table>
							<!-- TABLE END -->
						</div>
						<!-- CART TABLE_BLOCK END -->
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- FOUR-PAYMENT-METHOD START -->
						<div class="four-payment-method">
							<!-- SINGLE-PAYMENT-METHOD START -->
							<div class="single-payment-method payment-method-one">
								<a href="#" style="pointer-events:none;">CHUYỂN KHOẢN NGÂN HÀNG <span style="color: #7b8696">(ĐANG PHÁT TRIỂN)</span><i class="fa fa-chevron-right"></i></a>
							</div>
							<!-- SINGLE-PAYMENT-METHOD END -->
							<!-- SINGLE-PAYMENT-METHOD START -->							
							<div class="single-payment-method payment-method-three">
								<a href="#" style="pointer-events:none;">THANH TOÁN BẰNG PAYPAL <span style="color: #7b8696">(ĐANG PHÁT TRIỂN)</span><span></span><i class="fa fa-chevron-right"></i></a>
							</div>
							<!-- SINGLE-PAYMENT-METHOD END -->
							<!-- SINGLE-PAYMENT-METHOD START -->							
							<div class="single-payment-method payment-method-four">
								<a href="#" style="pointer-events:none;">THANH TOÁN BẰNG MASTERCARD <span style="color: #7b8696">(ĐANG PHÁT TRIỂN)</span><span></span><i class="fa fa-chevron-right"></i></a>
							</div>	
							<!-- SINGLE-PAYMENT-METHOD END -->		
							<!-- SINGLE-PAYMENT-METHOD START -->							
							<div class="single-payment-method payment-method-two" style="background: rgba(0, 0, 0, 0) url('img/cod1.png') no-repeat scroll 12px 15px;">
								<a href="#" style="background: rgba(51, 46, 46, 0.05);">THANH TOÁN KHI NHẬN HÀNG (COD)<span></span><i class="fa fa-chevron-right"></i></a>
							</div>	
							<!-- SINGLE-PAYMENT-METHOD END -->						
						</div>
						<!-- FOUR-PAYMENT-METHOD END -->
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<input type="submit" value="ĐẶT HÀNG" onClick="alert('Đặt hàng thành công'); " style="color: white;"><a href="" class="continueshoping" ><!--i class="fa fa-chevron-left"-></i--></a>
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->								
					</div>
				</div>
			</form>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
<?php
	include 'footer.php';
?>
		<!-- JS 
		===============================================-->
		<script type="text/javascript">
			function clickDatHang(){
				//alert('Đã đặt hàng thành công');
				
			}
		</script>
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