<?php  

	include_once 'admin/lib/database.php';
	include_once 'admin/helpers/format.php';
?>



<?php
	class product
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}


		public function show_product()
		{
			$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai ORDER BY maSanPham ASC"; //DESC: mới nhất lên đầu
			$result = $this->db->select($query);
			return $result;
		}

		public function show_productbyCat($idLoai)
		{
			$sanPhamTungTrang = 8; //Sản phẩm từng trang

			if (!isset($_GET['trang'])){
				$trang = 1;
			}else{
				$trang = $_GET['trang'];
			}
			$tungTrang = ($trang - 1) * $sanPhamTungTrang; //Vị trí bắt đầu $trang

			$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' ORDER BY maSanPham ASC LIMIT $tungTrang, $sanPhamTungTrang "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách

			if (isset($_GET['size'])){
				$sizeSP = $_GET['size'];
				$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' AND sizeSanPham = '$sizeSP' ORDER BY maSanPham ASC LIMIT $tungTrang, $sanPhamTungTrang";
			}

			//Sắp xếp theo giá thấp cao start
			if (isset($_POST['sortby']) && !empty($_POST['sortby'])){
				$sortby = $_POST['sortby'];

				if (isset($_GET['size'])){
					$sizeSP = $_GET['size'];

					if ($sortby == 'Cao thấp'){
						$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' AND sizeSanPham = '$sizeSP' ORDER BY giaSanPham DESC LIMIT $tungTrang, $sanPhamTungTrang";
					}else if ($sortby == 'Thấp cao'){
						$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' AND sizeSanPham = '$sizeSP' ORDER BY giaSanPham ASC LIMIT $tungTrang, $sanPhamTungTrang";
					}
				
				}else{
					if ($sortby == 'Cao thấp'){
						$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' ORDER BY giaSanPham DESC LIMIT $tungTrang, $sanPhamTungTrang ";
					}else if ($sortby == 'Thấp cao'){
						$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' ORDER BY giaSanPham ASC LIMIT $tungTrang, $sanPhamTungTrang ";
					}
				}

			}

			if (isset($_POST['sortby']) && empty($_POST['sortby'])){
				echo "<script>alert('Vui lòng chọn loại sắp xếp!');</script>";
			}
			//Sắp xếp theo giá thấp cao end


			$result = $this->db->select($query);
			return $result;

			
		}

		public function getAllProductbyCat($idLoai) //Dùng cho phân trang
		{
			$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' ORDER BY maSanPham ASC "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách

			if (isset($_GET['size'])){
				$sizeSP = $_GET['size'];
				$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' AND sizeSanPham = '$sizeSP' ORDER BY maSanPham ASC ";
			}

			

			$result = $this->db->select($query);
			return $result;
		}

		public function show_productLimit14New()
		{
			$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai ORDER BY maSanPham DESC LIMIT 14"; //DESC: mới nhất lên đầu
			$result = $this->db->select($query);
			return $result;
		}

		public function show_productLimit14Asc()
		{
			$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai ORDER BY maSanPham ASC LIMIT 14"; //DESC: mới nhất lên đầu
			$result = $this->db->select($query);
			return $result;
		}

		public function show_productLimit5() //FRONT-END
		{
			$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai ORDER BY maSanPham DESC LIMIT 5";
			$result = $this->db->select($query);
			return $result;
		}

		public function count_product()
		{
			$query = "SELECT SUM(soLuongSanPham) AS soluongprod FROM tbl_sanpham";
			$result = $this->db->select($query);
			return $result;
		}


		public function getproductbyId($id){ //Dùng để sửa
			$query = "SELECT * FROM tbl_sanpham WHERE maSanPham = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_search_result($nameSearch)// Show product ,có tìm kiếm theo tên, kết quả tìm kiếm phân trang
		{
			//Phân trang
			$sanPhamTungTrang = 8; //Sản phẩm từng trang

			if (!isset($_GET['trang'])){
					$trang = 1;
			}else{
					$trang = $_GET['trang'];
			}
			$tungTrang = ($trang - 1) * $sanPhamTungTrang; //Vị trí bắt đầu $trang

			//Search và show
			    
				$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.trangThaiSanPham = '1' 
					AND tbl_sanpham.tenSanPham LIKE '%$nameSearch%'

					ORDER BY maSanPham DESC LIMIT $tungTrang, $sanPhamTungTrang "; // Khác biệt với getAllProduct
			
				 
			$result = $this->db->select($query);
			return $result;
		}

		public function getAllProductSearch($nameSearch) //Dùng cho phân trang,...
		{
			    
				$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.trangThaiSanPham = '1' 
					AND tbl_sanpham.tenSanPham LIKE '%$nameSearch%' ORDER BY maSanPham DESC ";
			

			$result = $this->db->select($query);
			return $result;
		}
		// public function edit_product($data, $files, $id) //Sửa 
		// {
		// 	$tenSanPham = mysqli_real_escape_string($this->db->link, $data['tenSanPham']); //Connect database
		// 	$maLoai = mysqli_real_escape_string($this->db->link, $data['maLoai']);
		// 	$sizeSanPham = mysqli_real_escape_string($this->db->link, $data['sizeSanPham']);
		// 	$mieuTaSanPham = mysqli_real_escape_string($this->db->link, $data['mieuTaSanPham']);
		// 	$soLuongSanPham = mysqli_real_escape_string($this->db->link, $data['soLuongSanPham']);
		// 	$giaSanPham = mysqli_real_escape_string($this->db->link, $data['giaSanPham']);
		// 	$id = mysqli_real_escape_string($this->db->link, $id); //Connect database

		// 	//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
		// 	$permited = array('jpg','jpeg','png','gif');
		// 	$file_name = $_FILES['image']['name'];
		// 	$file_size = $_FILES['image']['size'];
		// 	$file_temp = $_FILES['image']['tmp_name'];

		// 	$div = explode('.', $file_name); //Phân tách 2 phần giữa dấu chấm
		// 	$file_ext = strtolower(end($div)); //end: lấy đuôi file, chuyển về string lower
		// 	$unique_image = substr((time()), 0, 10).'.'.$file_ext ; //Random số từ 0-10 tạo tên mới
		// 	$uploaded_image  = 'uploads/'.$unique_image; 
		// 	//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads

		// 	if ($tenSanPham == "" || $maLoai == "" || $sizeSanPham == "" || $mieuTaSanPham == ""|| $giaSanPham == "" || $soLuongSanPham == ""){
		// 		$alert = "<div class= 'alert alert-danger'>Không được để trống!</div>";
		// 		return $alert;
		// 	}
		// 	else //Kiểm tra việc upload ảnh
		// 	{
		// 		if (!empty($file_name)){
		// 			//Nếu người dùng chọn ảnh

		// 			//Check file
		// 			if ($file_name > 10240){
		// 					$alert = "<div class= 'alert alert-danger'>Chỉ được upload ảnh có dung lượng dưới 10MB!</div>";
		// 					return $alert;
		// 			}
		// 			else if (in_array($file_ext, $permited) == false) //Chỉ được upload đuôi ảnh trong $permited
		// 			{
		// 					$alert = "<div class= 'alert alert-danger' >Chỉ được upload:-".implode('.', $permited)."</div>";
		// 					return $alert;
		// 			}
		// 			//Check file

		// 			move_uploaded_file($file_temp, $uploaded_image);

		// 			$query = "UPDATE tbl_sanpham SET 
		// 						tenSanPham = '$tenSanPham', 
		// 						maLoai = '$maLoai',
		// 						sizeSanPham = '$sizeSanPham',
		// 						mieuTaSanPham = '$mieuTaSanPham',
		// 						giaSanPham = '$giaSanPham',
		// 						hinhAnhSanPham = '$unique_image', 
		// 						soLuongSanPham = '$soLuongSanPham'

		// 						WHERE maSanPham = '$id' ";

		// 			//$query2 = "UPDATE tbl_category SET catNumberProducts = $productAmount  WHERE catID = '$cate' " ; //Tăng số lượng vào catNumberProduct của danh mục tương ứng
		// 			//$result2 = $this->db->update($query2);

		// 		}else{
		// 			//Nếu người dùng không chọn ảnh
		// 			$query = "UPDATE tbl_sanpham SET 
		// 						tenSanPham = '$tenSanPham', 
		// 						maLoai = '$maLoai',
		// 						sizeSanPham = '$sizeSanPham',
		// 						mieuTaSanPham = '$mieuTaSanPham',
		// 						giaSanPham = '$giaSanPham',
		// 						soLuongSanPham = '$soLuongSanPham'							

		// 						WHERE maSanPham = '$id' "; //Không có productImage

		// 			//$query2 = "UPDATE tbl_category SET catNumberProducts = $productAmount  WHERE catID = '$cate' " ; //Tăng số lượng vào catNumberProduct của danh mục tương ứng
		// 			//$result2 = $this->db->update($query2);

		// 		}

				
		// 		$result = $this->db->update($query);

		// 		if ($result)
		// 		{
		// 			$alert = "<div class= 'alert alert-success'>Sửa sản phẩm thành công!</div>";
		// 			return $alert;
		// 		}
		// 		else
		// 		{
		// 			$alert = "<div class= 'alert alert-danger'>Thêm sản phẩm không thành công!</div>";
		// 			return $alert;
		// 		}
		// 	}
		// }
		

		// public function hide_product($id) //Xóa danh mục
		// {
		// 	$query = "UPDATE tbl_sanpham SET trangThaiSanPham = 0 WHERE maSanPham = '$id' ";
		// 	$result = $this->db->update($query);
			

		// 	if ($result)
		// 		{
		// 			$alert = "<div class= 'alert alert-success'>Ẩn sản phẩm thành công!</div>";
		// 			return $alert;
		// 		}
		// 		else
		// 		{
		// 			$alert = "<div class= 'alert alert-danger'>Ẩn sản phẩm không thành công!</div>";
		// 			return $alert;
		// 		}
			
		// }
		//END ADMIN
		
		
	}

?>