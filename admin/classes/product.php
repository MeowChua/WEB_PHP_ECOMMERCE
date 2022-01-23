<?php  

	include_once '../lib/database.php';
	include_once '../helpers/format.php';
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

		//START ADMIN
		public function insert_product($data, $files)
		{

			$tenSanPham = mysqli_real_escape_string($this->db->link, $data['tenSanPham']); //Connect database
			$maLoai = mysqli_real_escape_string($this->db->link, $data['maLoai']);
			$sizeSanPham = mysqli_real_escape_string($this->db->link, $data['sizeSanPham']);
			$mieuTaSanPham = mysqli_real_escape_string($this->db->link, $data['mieuTaSanPham']);
			$soLuongSanPham = mysqli_real_escape_string($this->db->link, $data['soLuongSanPham']);
			$giaSanPham = mysqli_real_escape_string($this->db->link, $data['giaSanPham']);

			

			//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr((time()), 0, 10).'.'.$file_ext ;
			$uploaded_image  = 'uploads/'.$unique_image;
			//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads

			if ($tenSanPham == "" || $maLoai == "" || $sizeSanPham == "" || $mieuTaSanPham == ""|| $giaSanPham == "" || $soLuongSanPham == "" || $file_name == "")
			{
				$alert = "<div class= 'alert alert-danger'>Không được để trống!</div>";
				return $alert;
			}
			else
			{
				move_uploaded_file($file_temp, $uploaded_image);

				$query = "INSERT INTO tbl_sanpham(tenSanPham, maLoai, sizeSanPham, mieuTaSanPham, giaSanPham, hinhAnhSanPham, soLuongSanPham) VALUES('$tenSanPham','$maLoai', '$sizeSanPham', '$mieuTaSanPham', '$giaSanPham', '$unique_image','$soLuongSanPham') ";

				
				//$query2 = "UPDATE tbl_category SET catNumberProducts = $productAmount + (SELECT catNumberProducts FROM tbl_category WHERE catID = '$category')  WHERE catID = '$category' " ; //Tăng số lượng vào catNumberProduct của danh mục tương ứng
				//$result2 = $this->db->update($query2);



				$result = $this->db->insert($query);

				if ($result)
				{
					$alert = "<div class= 'alert alert-success'>Thêm sản phẩm thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Thêm sản phẩm không thành công!</div>";
					return $alert;
				}
				
			}
		}


		public function show_product()// Show product ,có tìm kiếm theo tên, kết quả tìm kiếm phân trang
		{
			//Phân trang
			$sanPhamTungTrang = 5; //Sản phẩm từng trang

			if (!isset($_GET['trang'])){
					$trang = 1;
			}else{
					$trang = $_GET['trang'];
			}
			$tungTrang = ($trang - 1) * $sanPhamTungTrang; //Vị trí bắt đầu $trang

			//Search và show
			if (isset($_GET['nameSearch']) && !empty($_GET['nameSearch']) ){

			    $nameSearch = $_GET['nameSearch'];
			    
				$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.trangThaiSanPham = '1' 
					AND tbl_sanpham.tenSanPham LIKE '%$nameSearch%'

					ORDER BY maSanPham DESC LIMIT $tungTrang, $sanPhamTungTrang "; // Khác biệt với getAllProduct
			}else{

			    $query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.trangThaiSanPham = '1' ORDER BY maSanPham DESC LIMIT $tungTrang, $sanPhamTungTrang "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách
			} 
				 
			$result = $this->db->select($query);
			return $result;
		}



		public function getAllProduct() //Dùng cho phân trang,...
		{

			if (isset($_GET['nameSearch']) && !empty($_GET['nameSearch']) ){
				$nameSearch = $_GET['nameSearch'];
			    
				$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.trangThaiSanPham = '1' 
					AND tbl_sanpham.tenSanPham LIKE '%$nameSearch%'

					ORDER BY maSanPham DESC ";
			}else{
					$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.trangThaiSanPham = '1' ORDER BY maSanPham DESC "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách
			}

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


		public function edit_product($data, $files, $id) //Sửa 
		{
			$tenSanPham = mysqli_real_escape_string($this->db->link, $data['tenSanPham']); //Connect database
			$maLoai = mysqli_real_escape_string($this->db->link, $data['maLoai']);
			$sizeSanPham = mysqli_real_escape_string($this->db->link, $data['sizeSanPham']);
			$mieuTaSanPham = mysqli_real_escape_string($this->db->link, $data['mieuTaSanPham']);
			$soLuongSanPham = mysqli_real_escape_string($this->db->link, $data['soLuongSanPham']);
			$giaSanPham = mysqli_real_escape_string($this->db->link, $data['giaSanPham']);
			$id = mysqli_real_escape_string($this->db->link, $id); //Connect database

			//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name); //Phân tách 2 phần giữa dấu chấm
			$file_ext = strtolower(end($div)); //end: lấy đuôi file, chuyển về string lower
			$unique_image = substr((time()), 0, 10).'.'.$file_ext ; //Random số từ 0-10 tạo tên mới
			$uploaded_image  = 'uploads/'.$unique_image; 
			//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads

			if ($tenSanPham == "" || $maLoai == "" || $sizeSanPham == "" || $mieuTaSanPham == ""|| $giaSanPham == "" || $soLuongSanPham == ""){
				$alert = "<div class= 'alert alert-danger'>Không được để trống!</div>";
				return $alert;
			}
			else //Kiểm tra việc upload ảnh
			{
				if (!empty($file_name)){
					//Nếu người dùng chọn ảnh

					//Check file
					if ($file_name > 10240){
							$alert = "<div class= 'alert alert-danger'>Chỉ được upload ảnh có dung lượng dưới 10MB!</div>";
							return $alert;
					}
					else if (in_array($file_ext, $permited) == false) //Chỉ được upload đuôi ảnh trong $permited
					{
							$alert = "<div class= 'alert alert-danger' >Chỉ được upload:-".implode('.', $permited)."</div>";
							return $alert;
					}
					//Check file

					move_uploaded_file($file_temp, $uploaded_image);

					$query = "UPDATE tbl_sanpham SET 
								tenSanPham = '$tenSanPham', 
								maLoai = '$maLoai',
								sizeSanPham = '$sizeSanPham',
								mieuTaSanPham = '$mieuTaSanPham',
								giaSanPham = '$giaSanPham',
								hinhAnhSanPham = '$unique_image', 
								soLuongSanPham = '$soLuongSanPham'

								WHERE maSanPham = '$id' ";

					//$query2 = "UPDATE tbl_category SET catNumberProducts = $productAmount  WHERE catID = '$cate' " ; //Tăng số lượng vào catNumberProduct của danh mục tương ứng
					//$result2 = $this->db->update($query2);

				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE tbl_sanpham SET 
								tenSanPham = '$tenSanPham', 
								maLoai = '$maLoai',
								sizeSanPham = '$sizeSanPham',
								mieuTaSanPham = '$mieuTaSanPham',
								giaSanPham = '$giaSanPham',
								soLuongSanPham = '$soLuongSanPham'							

								WHERE maSanPham = '$id' "; //Không có productImage

					//$query2 = "UPDATE tbl_category SET catNumberProducts = $productAmount  WHERE catID = '$cate' " ; //Tăng số lượng vào catNumberProduct của danh mục tương ứng
					//$result2 = $this->db->update($query2);

				}

				
				$result = $this->db->update($query);

				if ($result)
				{
					$alert = "<div class= 'alert alert-success'>Sửa sản phẩm thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Thêm sản phẩm không thành công!</div>";
					return $alert;
				}
			}
		}
		

		public function hide_product($id) //Xóa danh mục
		{
			$query = "UPDATE tbl_sanpham SET trangThaiSanPham = 0 WHERE maSanPham = '$id' ";
			$result = $this->db->update($query);
			

			if ($result)
				{
					$alert = "<div class= 'alert alert-success'>Ẩn sản phẩm thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Ẩn sản phẩm không thành công!</div>";
					return $alert;
				}
			
		}
		

		
		//END ADMIN
		
		//START FRONT-END






		//END FRONT-END
	}

?>