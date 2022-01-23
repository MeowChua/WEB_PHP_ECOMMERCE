<?php
$pageTitle = "Kết quả tìm kiếm | GIÀY B.STORE - Hệ thống giày thể thao chính hãng";
function customPageHeader()
{ ?>
	<title>$pageTitle</title>
<?php }

include 'header.php';
?>
<?php
require_once 'classes/product.php';
require_once 'admin/helpers/format.php';
?>
<?php
$prod = new product();
$fm = new format();

if (isset($_GET['nameSearch']) && !empty($_GET['nameSearch'])) {
	$nameSearch = $_GET['nameSearch'];
} else echo "<script>window.location = '404.php'</script>";
?>

<div class="all-gategory-product" style="width: 90%;
    margin-left: 5%;
    margin-bottom: 6%;">
	<div class="row">
		<ul class="gategory-product">
			<?php
			$prodList = $prod->show_search_result($nameSearch);
			if ($prodList) {
				while ($resultProd = $prodList->fetch_assoc()) {
					if ($resultProd['trangThaiSanPham'] == '1') {

			?>

						<!-- SINGLE ITEM START -->
						<li class="gategory-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<div class="single-product-item">
								<div class="product-image">
									<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>"><img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>" alt="product-image" /></a>
									<!-- <a href="single-product.php" class="new-mark-box">mới</a> -->
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
									<a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>">
										<span style="text-transform: uppercase;">
											<?php echo $textSh = $fm->textShorten($resultProd['tenSanPham'], 30); //Giới hạn kí tự để hiển thị 
											?>
										</span>
									</a>
									<div class="price-box">
										<span class="price"><?php echo number_format($resultProd['giaSanPham']); ?> VND</span>
									</div>
								</div>
							</div>

						</li>
						<!-- SINGLE ITEM END -->
			<?php
					}
				}
			} else echo '<script>alert("Không tìm thấy dữ liệu!");history.back();</script>';

			?>

		</ul>


	</div>
	<div class="phanTrang">
		<?php
		$productAll = $prod->getAllProductSearch($nameSearch);
		//Lấy số sản phẩm
		$productCount = mysqli_num_rows($productAll); //Đếm số dòng

		$productButton = ceil($productCount / 8); //Số button sẽ hiển thị, 10 sản phẩm thì chia 10
		//$i = 1;
		

		if (!isset($_GET['trang'])) {
			$trangHienTai = 1;
		} else {
			$trangHienTai = $_GET['trang'];
		}


		//Button Prev
		if ($trangHienTai > 1 && $productButton > 1) {
			echo '<a href="?nameSearch=' . $nameSearch . '&search=Tìm+kiếm&trang=' . ($trangHienTai - 1) . ' " ><i class="fa fa-angle-double-left"></i> Trang trước</a>';
		}

		//Create Button between start
		for ($i = 1; $i <= $productButton; $i++) {
			if ($i == $trangHienTai) {
				echo '<a href="?nameSearch=' . $nameSearch . '&search=Tìm+kiếm&trang=' . $i . ' " style="background-color: grey;">' . $i . '</a>';   //echo và Active màu trang hiện tại
			} else {
				echo '<a href="?nameSearch=' . $nameSearch . '&search=Tìm+kiếm&trang=' . $i . ' ">' . $i . '</a>';
			}
		}
		//Create Button between end

		//Button Next
		if ($trangHienTai < $productButton && $productButton > 1) {
			echo '<a href="?nameSearch=' . $nameSearch . '&search=Tìm+kiếm&trang=' . ($trangHienTai + 1) . ' ">Trang sau <i class="fa fa-angle-double-right"></i></a>';
		}

		?>
	</div>
</div>



<style type="text/css">
	.phanTrang a {
		text-decoration: none;
		cursor: pointer;
		color: black;
		float: left;
		padding: 5px 15px;
		border: 1px solid #999499;
		margin: 0px 2px 5px;
	}

	.phanTrang a:hover {
		background-color: grey;
		transition: 500ms;
	}
</style>


<?php
include 'footer.php';
?>