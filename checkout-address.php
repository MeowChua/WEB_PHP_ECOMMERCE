<?php
	$pageTitle = "KIỂM TRA ĐỊA CHỈ | GIÀY B.STORE - Hệ thống giày thể thao chính hãng";
	function customPageHeader(){?>
		<title>$pageTitle</title>
	<?php }

	include 'header.php';
	include 'config.php';
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
							<span>Sổ địa chỉ</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Sổ địa chỉ</h2>
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
								<li class="step-current third">
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
					</div>
					<!-- ADDRESS AREA START --> 
					
					<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
						<div class="form-group primary-form-group p-info-group deli-address-group">
						<?php $db=mysqli_query($conn,"SELECT * FROM `donvihanhchinh`.`devvn_tinhthanhpho`"); ?>
						<form class="primari-box personal-info-box" id="personalinfo" name="Formaddress" onsubmit="return validateAdress()" method="post" action="address.php" >
						  <center >ĐỊA CHỈ</center>
						<label>Chọn tỉnh/thành phố:</label>
							<div class="birth-day delivery-address">
								<select id="address_tinh" name="address_tinh" style="width: 100%;" onchange="document.getElementById('diaChiTinh').value = this.options[this.selectedIndex].text;" >
								<?php  while($row=mysqli_fetch_array($db)) { ?>
										<option value="<?php echo $row['matp'];?>"><?php echo $row['name'];?></option>

								<?php	}?> 
								</select>	
								<input id="diaChiTinh" type = "hidden" name = "diaChiTinh" value = "" />					
							</div>
							
			
							<label>Chọn Quận/Huyện:</label>
							<div class="birth-day delivery-address" >
								<select id= "address1" name="address1" style="width: 100%;"  onchange="document.getElementById('diaChiHuyen').value = this.options[this.selectedIndex].text;">
								
								</select>
								<input id="diaChiHuyen" type = "hidden" name = "diaChiHuyen" value = "" />											
							</div>
							
							<label>Chọn Xã</label>
							<div class="birth-day delivery-address">
								<select id="deli-address" name="deli-address" >
									
								</select>													
							</div>
							
							<label for="diachinh">Địa chỉ nhận hàng<sup>*</sup></label>
							<input type="text" value="" name="diachinh" id="diachinh" class="form-control input-feild">
							
							<div class="form-group primary-form-group p-info-group">
										<label for="firstname">Tên người nhận<sup>*</sup></label>
										<input type="text" value="" name="firstname" id="firstname" class="form-control input-feild">
							</div>
							<div class="form-group primary-form-group p-info-group">
										<label for="lastname">Số điện thoại <sup>*</sup></label>
										<input type="text" value="" name="phone" id="phone" class="form-control input-feild">
							</div>
									<!--div class="form-group primary-form-group p-info-group">
										<label for="email">Địa chỉ giao hàng<sup>*</sup></label>
										<input type="text" value="" name="address" id="address" class="form-control input-feild">
								   </div-->
								   

							<!--div class="form-group primary-form-group p-info-group chose-address">
								<label class="cheker">
									<input type="checkbox" name="checkbox">
									<span></span>
								</label>
								<a href="#">Dùng địa chỉ giao hàng làm địa chỉ trên hóa đơn.</a>
								<div class="form-group primary-form-group p-info-group chose-address">
								<label class="cheker">
									<input type="checkbox" name="checkbox">
									<span></span>
								</label>
								<a href="#">Dùng địa chỉ giao hàng làm địa chỉ trên hóa đơn.</a>
						</div-->
	                   </div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="add-new-address">
								<!--a href="my-cart-step-2-info.php" class="new-address-link"><i class="fa fa-chevron-right"></i></a-->
								<div class="form-group p-info-group type-address-group">
									<label>Ghi chú cho đơn hàng (nếu có)</label>
									<textarea class="form-control input-feild " name="addcomment"></textarea>
								</div>							
							</div>
							<!-- ADDRESS AREA START --> 
							<!-- RETURNE-CONTINUE-SHOP START -->
							<div class="returne-continue-shop ship-address">
								<!--a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua sắm</a-->
								<input type="submit" value="TIẾN HÀNH ĐẶT HÀNG" style="color: white;"  > 
							</div>	
							<!-- RETURNE-CONTINUE-SHOP END -->		
					   </div>
			  </form>
			  <script type="text/javascript">
					    // function truyenbien()
						// {
						// 	var d=document.getElementById("address_tinh");
						// 	var show=d.options[d.selectedIndex].value;
						// 	var showstr=JSON.stringify(show);
						// 	$.ajax=({
						// 		url:'checkout-address.php',
						// 		type:'post',
						// 		data:{show:showstr}
						// 	});
						// 	//gobal(document.getElementById("name").value=show);
						// }
						$(document).ready(function(){
							$('#address_tinh').change(function(){
								var id=$('#address_tinh').val();
								$.ajax({
									url:"check_out.php",
									method:"POST",
									data:{id:id},
									success:function(data){
										$('#address1').html(data);
									}
								});

								document.getElementById('deli-address').value='';

							});
						});
						$(document).ready(function()
						{
							$('#address1').change(function(){
								var mahuyen=$('#address1').val();
								$.ajax({
									url:"check_out.php",
									method:"POST",
									data:{mahuyen:mahuyen},
									success:function (data) {
										$('#deli-address').html(data);
									}
								});
							});
						});

					</script>	
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