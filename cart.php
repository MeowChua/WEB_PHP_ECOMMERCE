<?php
session_start();
	$pageTitle = "GIỎ HÀNG | GIÀY B.STORE - Hệ thống giày thể thao chính hãng";
	function customPageHeader(){?>
		<title>$pageTitle</title>
	<?php }
    include_once 'config.php';
	include 'header.php';
	//include 'add_cart.php';
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
							<span>GIỎ HÀNG CỦA BẠN</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPPING-CART SUMMARY START -->
						<h2 class="page-title">GIỎ HÀNG<span class="shop-pro-item">Giỏ hàng bao gồm:
						 <?php if(isset($_SESSION['soluong']))
						   {
							   $m=$_SESSION['soluong'];
							   echo $m;
						   }
						   else {
							   echo 0;
						   }
						?> sản phẩm</span></h2>
						<!-- SHOPPING-CART SUMMARY END -->
					</div>	
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-current first">
									<span>01. GIỎ HÀNG</span>
								</li>
								<li class="step-todo second">
									<span>02. ĐĂNG NHẬP</span>
								</li>
								<li class="step-todo third">
									<span>03. ĐỊA CHỈ</span>
								</li>
								<li class="step-todo four">
									<span>04. VẬN CHUYỂN</span>
								</li>
								<li class="step-todo last" id="step_end">
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
										<th class="cart-avail text-center">Tình trạng hàng</th>
										<th class="cart-unit text-right">Đơn giá</th>
										<th class="cart_quantity text-center">Số lượng</th>
										<th class="cart-delete">&nbsp;</th>
										<th class="cart-total text-right">Tổng</th>
									</tr>
								</thead>
								<!-- TABLE HEADER END -->
								<!--Chức năng xóa sản phẩm khỏi giỏ hàng-->
								<!--Xóa số lượng trong giỏ hàng-->			
								<?php
								$sId=session_id();
								?>
							  	<?php 
							  if(isset($_GET['id_cart']))
							  {
									   $id_cart=$_GET['id_cart'];
							  
							  $query=mysqli_query($conn,"SELECT `soLuongSanPham`,`maSanPham`,`sessionID`FROM `tbl_giohang` WHERE `sessionID`='$sId'AND `maSanPham`='$id_cart'");
									 $rows=mysqli_fetch_assoc($query);
									$xemma= $rows['maSanPham'] ;
									//$xemsoluong=$rows['soLuongSanPham'];
							  if($id_cart==$xemma){
										//$dem=$n-1;
										//$soluongsp=$dem-1;
									   // echo $soluongsp;
										$rowsp=mysqli_query($conn,"DELETE FROM `tbl_giohang` WHERE `maSanPham`='$id_cart' AND `sessionID`='$sId' ");//xóa sản phẩm trong giỏ hàng*/
										//$_SESSION['soluong']=$soluong;
									
									if($rowsp)
										{
										
										echo "<script>window.location = 'cart.php';</script>";
										}

									}
								}
								?>
								<!-- TABLE BODY START   -->
								<tbody>	
									<!-- SINGLE CART_ITEM START -->
									<!--div id="infocart"-->
									 <?php  
									   $danhsach=mysqli_query($conn,"SELECT *,sum(`soLuongSanPham`) FROM `tbl_giohang` WHERE `sessionID`='$sId' and `soLuongSanPham`>0 GROUP BY `maSanPham`");
									   $sup_total=0;
									   while($rows=mysqli_fetch_assoc($danhsach))
									   { ?>
										   
									<tr>
										<td class="cart-product">
											<a href="#"><img alt="Blouse" src="admin/pages/uploads/<?php echo $rows['hinhAnhSanPham']; ?>"></a>
										</td>
										<td class="cart-description">
											<p class="product-name"><a href="#"><?php echo $rows['tenSanPham'];?></a></p>
											
											<small><a href="#">Size : <?php echo $rows['sizeSanPham'];?></a></small>
										</td>
										<td class="cart-avail"><span class="label label-success">Còn hàng</span></td>
										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price special-price"><?php echo number_format($rows['giaSanPham']);?> VNĐ</li>
												<!--li class="price-percent-reduction small">&nbsp;-3%&nbsp;</li->
												<li class="old-price">$27.00</li-->
											</ul>
										</td>
										<td class="cart_quantity text-center">

												<input class="cart-plus-minus" type="text" name="quantybutton" value="<?php echo $rows['sum(`soLuongSanPham`)'];?>" readonly="readonly" >
												<a href="?maSPTru=<?php echo $rows['maSanPham'];?>&soluonght=<?php echo $rows['soLuongSanPham'];?>"><div class="dec qtybutton" name="dec">-</div></a>

												<?php 
												  if(isset($_GET['maSPTru']) && isset($_GET['soluonght']))
												  {
												  	$maSPTru=$_GET['maSPTru'];
													$queryTru=mysqli_query($conn,"SELECT `soLuongSanPham`,`maSanPham`,`sessionID`FROM `tbl_giohang` WHERE `sessionID`='$sId'AND `maSanPham`='$maSPTru'");
													$rows=mysqli_fetch_assoc($queryTru);
													$xemma= $rows['maSanPham'] ;
												  	$soluonght = $_GET['soluonght'];

												  	if ($soluonght <= 1){  		
													  
													  	if($maSPTru==$xemma){
															$rowsp=mysqli_query($conn,"DELETE FROM `tbl_giohang` WHERE `maSanPham`='$maSPTru' AND `sessionID`='$sId' ");

																if($rowsp)
																{
																
																echo "<script>window.location = 'cart.php';</script>";
																}else{
																	echo "That bai!";
																}

														}

													}else{			
														if($maSPTru==$xemma){
																	
															$rowsp=mysqli_query($conn,"UPDATE tbl_giohang SET soLuongSanPham = $soluonght - 1 WHERE `sessionID`='$sId'AND `maSanPham`='$maSPTru' ");
																if($rowsp){
																	echo "<script>window.location = 'cart.php';</script>";
																}else{
																	echo "That bai!";
																}

														}
														
												  	}
												}
										
												?> 
												<a href="?maSPCong=<?php echo $rows['maSanPham'];?>&soluonght=<?php echo $rows['soLuongSanPham'];?>"><div class="inc qtybutton" name="inc">+</div></a>
												<?php //Trừ sản phẩm start
												  if(isset($_GET['maSPCong']) && isset($_GET['soluonght']))
												  {
													$maSPCong=$_GET['maSPCong'];
													$soluonght = $_GET['soluonght'];

												  	$queryCong=mysqli_query($conn,"SELECT `soLuongSanPham`,`maSanPham`,`sessionID`FROM `tbl_giohang` WHERE `sessionID`='$sId'AND `maSanPham`='$maSPCong'");
													$rows=mysqli_fetch_assoc($queryCong);

													$xemma= $rows['maSanPham'] ;
													//Lấy số lượng hiện có để só sánh
													$querySLHC=mysqli_query($conn,"SELECT `soLuongSanPham` FROM `tbl_sanpham` WHERE `maSanPham`='$maSPCong'");
													$resultSLHC=mysqli_fetch_assoc($querySLHC);
													$soluonghienco = $resultSLHC['soLuongSanPham'];
													//Lấy số lượng hiện có để só sánh

													if ($soluonght > $soluonghienco){
														echo "<script>alert('Vượt quá số lượng còn lại!');
																window.location = 'cart.php';</script>";

													}else{
														if($maSPCong==$xemma){
																
														$rowsp=mysqli_query($conn,"UPDATE tbl_giohang SET soLuongSanPham = $soluonght + 1 WHERE `sessionID`='$sId'AND `maSanPham`='$maSPCong' ");
															if($rowsp){
																echo "<script>window.location = 'cart.php';</script>";
															}else{
																echo "That bai!";
															}

														}
													}
													
												}
										?> 
										</td>
										<td class="cart-delete text-center">
											<a href="?id_cart=<?php echo $rows['maSanPham'];?>"  class="cart_quantity_delete" title="Xóa"><i class="fa fa-trash-o"></i></a>	
										</td>
										<td class="cart-total">
										  <?php 
										   //$gia=(string)$rows['soLuongSanPham'];
										  $total=$rows['giaSanPham'] *$rows['sum(`soLuongSanPham`)'];?>
											<span class="price"><?php echo number_format($total);?> VNĐ</span>
										</td>
									</tr> 
									<?php $sup_total+=$total;?><!--tính tổng tiền-->
									  <?php }
									 ?>
									<!--/div-->
									<!-- SINGLE CART_ITEM END -->
									
									<!-- SINGLE CART_ITEM START -->
									
								
									<!-- SINGLE CART_ITEM END --> 
								</tbody>
								<!-- TABLE BODY END -->
								<!-- TABLE FOOTER START -->
								<tfoot>	
								<!-- Tính số lượng sản phẩm trong giỏ hàng-->	
								<!--?php $ds=mysqli_query($conn,"SELECT `id_giohang`,`sID` FROM `tbl_giohang` WHERE `sID`='$sId' ");
												$soluongsanpham=mysqli_num_rows($ds);
												//$demsoluong=count($soluongsanpham);
												$_SESSION['soluong']=$soluongsanpham;
												//echo $soluongsanpham;?-->
												<!-------------------------------------------------->									
									<tr class="cart-total-price">
										<td class="cart_voucher" colspan="3" rowspan="4"></td>
										<td class="text-right" colspan="3">Tổng thanh toán:</td>
										
										<td id="total_product" class="price" colspan="1"><?php echo number_format($sup_total);?> VNĐ</td>
									</tr>
									<!--tr>
										<td class="text-right" colspan="3">Phí vận chuyển</td>
										<td id="total_shipping" class="price" colspan="1">0 VND</td>
									</tr-->
								<tfoot>
							</table>
										<!-- CART TABLE_BLOCK END -->
					</div>
					<!--div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="first_item primari-box mycartaddress-info">
							<!- SINGLE ADDRESS START ->
							<ul class="address">
								<li>
									<h3 class="page-subheading box-subheading">
										Địa chỉ giao hàng
									</h3>
								</li>
								<li><span class="address_name">BootExperts</span></li>
								<li><span class="address_company">Web development Company</span></li>
								<li><span class="address_address1">Bonossri</span></li>
								<li><span class="address_address2">D-Block</span></li>
								<li><span class="">Rampura</span></li>
								<li><span class="">Dhaka</span></li>
								<li><span class="address_phone">+880 1735161598</span></li>
								<li><span class="address_phone_mobile">+880 1975161598</span></li>
							</ul>	
							<!- SINGLE ADDRESS END ->
						</div->						
					</div-->
					<!--div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="second_item primari-box mycartaddress-info">
							<!- SINGLE ADDRESS START ->
							<ul class="address">
								<li>
									<h3 class="page-subheading box-subheading">
										Địa chỉ hóa đơn
									</h3>
								</li>
								<li><span class="address_name">BootExperts</span></li>
								<li><span class="address_company">Web development Company</span></li>
								<li><span class="address_address1">Dhaka</span></li>
								<li><span class="address_address2">Bonossri</span></li>
								<li><span class="">Dhaka-1205</span></li>
								<li><span class="">Rampura</span></li>
								<li><span class="address_phone">+880 1735161598</span></li>
								<li><span class="address_phone_mobile">+880 1975161598</span></li>
							</ul>	
							<!- SINGLE ADDRESS END ->
						</div>
					</div-->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<!--a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua sắm</a-->
							<!--?php
							if(isset($_SESSION['soluong']))	
							{
								$so=$_SESSION['soluong'];
								if($so>0)
								{
									echo'<a  href="checkout-address.php" class="continueshoping"><input type="submit" class="procedtocheckout" value="Tiếp tục đơn hàng" ></a>';
								}
							}
							else{
								echo'<script>alert("Chưa có sản phẩm trong giỏ hàng");</script>';
							}-->
						      <?php  if( isset($_SESSION['ten']) )
						            {
										if(isset($_SESSION['soluong'])){
											$so=$_SESSION['soluong'];
											if($so>0)
											{
												echo'<a  href="checkout-address.php" class="continueshoping"><input type="submit" class="procedtocheckout" style="color: white;" value="Tiếp tục đơn hàng" ></a>';
											}
										}
										else{
											echo '<input type="submit" class="procedtocheckout" value="Tiếp tục đơn hàng" style="color: white;" onClick="alert(\'Chưa có sản phẩm trong giỏ hàng\')";>';
										}
									}
								else {
										echo'<a  href="registration.php" class="continueshoping"><input type="submit" class="procedtocheckout" value="Tiếp tục đơn hàng" style="color: white;"></a>';
									}?>
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
		<!--===============================================-->
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