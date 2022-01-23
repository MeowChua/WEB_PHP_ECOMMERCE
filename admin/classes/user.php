<?php  

	require_once '../lib/database.php';
	require_once '../helpers/format.php';
?>



<?php
	class user
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_user($data)
		{
			$tenDangNhap = mysqli_real_escape_string($this->db->link, $data['tenDangNhap']);
			$matKhau = mysqli_real_escape_string($this->db->link, $data['matKhau']);
			$tenNguoiQuanTri = mysqli_real_escape_string($this->db->link, $data['tenNguoiQuanTri']);
			$thuDienTuQT = mysqli_real_escape_string($this->db->link, $data['thuDienTuQT']);
			$maVaiTro = mysqli_real_escape_string($this->db->link, $data['maVaiTro']);


			if ($tenDangNhap == "" || $matKhau == "" || $tenNguoiQuanTri == "" || $thuDienTuQT == ""|| $maVaiTro == "" )
			{
				$alert = "<div class= 'alert alert-danger'>Không được để trống!</div>";
				return $alert;
			}
			else
			{
				$queryTemp = "SELECT * FROM tbl_quantri ";
				$temp = $this->db->select($queryTemp);
				$resultTemp = $temp->fetch_assoc();
	
				if ($resultTemp['tenDangNhap'] == $tenDangNhap) {

					$alert = "<div class= 'alert alert-danger'>Tên đăng nhập đã tồn tại trong CSDL, mời nhập lại!</div>";
					return $alert;
					
				}
				else
				{
					$query = "INSERT INTO tbl_quantri(tenDangNhap, matKhau, tenNguoiQuanTri, thuDienTuQT, maVaiTro) VALUES('$tenDangNhap', '$matKhau', '$tenNguoiQuanTri', '$thuDienTuQT', '$maVaiTro') ";

					$result = $this->db->insert($query);

					if ($result)
					{
						$alert = "<div class= 'alert alert-success'>Thêm người dùng thành công!</div>";
						return $alert;
					}
					else
					{
						$alert = "<div class= 'alert alert-danger'>Thêm người dùng không thành công!</div>";
						return $alert;
					}
				}		
			}

		}

		public function show_user()
		{
			$query = "SELECT * FROM tbl_quantri, tbl_vaitro WHERE tbl_quantri.maVaiTro = tbl_vaitro.maVaiTro";
			$result = $this->db->select($query);
			return $result;
		}

		public function count_user() //Đếm cả khách hàng
		{
			$query = "SELECT ( SELECT COUNT(*) FROM tbl_quantri ) + ( SELECT COUNT(*) FROM tbl_khachhang ) AS total_rows FROM tbl_khachhang  ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getUserByName($name){ //Dùng để sửa
			$query = "SELECT * FROM tbl_quantri WHERE tenDangNhap = '$name' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function changeStatusUser($name)
		{

			$queryActive = "UPDATE tbl_quantri SET trangThai = 'Active' WHERE tenDangNhap = '$name' ";
			$queryInactive = "UPDATE tbl_quantri SET trangThai = 'Inactive' WHERE tenDangNhap = '$name' ";
			$querySelect = "SELECT * FROM tbl_quantri WHERE tenDangNhap = '$name' ";

			$resultSelect = $this->db->select($querySelect);
			$value = $resultSelect->fetch_assoc();
			// Nếu người dùng Active thì Update status inactive và ngược lại
			if ($value['trangThai'] == 'Active')
			{
				
				$resultUpdate = $this->db->update($queryInactive);

				if ($resultUpdate)
				{
					$alert = "<div class= 'alert alert-success'>Khóa người dùng thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Khóa người dùng không thành công!</div>";
					return $alert;
				}
			}
			else if ($value['trangThai'] == 'Inactive')
			{
				
				$resultUpdate = $this->db->update($queryActive);

				if ($resultUpdate)
				{
					$alert = "<div class= 'alert alert-success'>Mở khóa người dùng thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Mở khóa người dùng không thành công!</div>";
					return $alert;
				}
			}
		}

		public function delete_user($name) //Xóa danh mục
		{
			$query = "DELETE FROM tbl_quantri WHERE tenDangNhap = '$name' ";
			$result = $this->db->delete($query);

			if ($result)
				{
					$alert = "<div class= 'alert alert-success'>Xóa người dùng thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-success'>Xóa người dùng không thành công!</div>";
					return $alert;
				}
			
		}

		public function show_usertype()
		{
			$query = "SELECT * FROM tbl_vaitro";
			$result = $this->db->select($query);
			return $result;
		}


		public function edit_user($data, $name) //Sửa 
		{
			$tenDangNhap = mysqli_real_escape_string($this->db->link, $data['tenDangNhap']);
			$matKhau = mysqli_real_escape_string($this->db->link, $data['matKhau']);
			$tenNguoiQuanTri = mysqli_real_escape_string($this->db->link, $data['tenNguoiQuanTri']);
			$thuDienTuQT = mysqli_real_escape_string($this->db->link, $data['thuDienTuQT']);
			$maVaiTro = mysqli_real_escape_string($this->db->link, $data['maVaiTro']);
			$name = mysqli_real_escape_string($this->db->link, $name); //Connect database


			if ($tenNguoiQuanTri == "" || $thuDienTuQT == "" || $tenDangNhap == "" || $matKhau == ""|| $maVaiTro == "" ){
				$alert = "<div class= 'alert alert-danger'>Không được để trống!</div>";
				return $alert;
			}
			else //Kiểm tra việc upload ảnh
			{
				$queryTemp = "SELECT * FROM tbl_quantri ";
				$temp = $this->db->select($queryTemp);

				$resultTemp = $temp->fetch_assoc();
				
				if ($resultTemp['tenDangNhap'] == $tenDangNhap ){
					$alert = "<div class= 'alert alert-danger'>Tên đăng nhập đã tồn tại trong CSDL, mời nhập lại!</div>";
					return $alert;
				}else{
				
					$query = "UPDATE tbl_quantri SET 
									tenNguoiQuanTri = '$tenNguoiQuanTri', 
									thuDienTuQT = '$thuDienTuQT',
									tenDangNhap = '$tenDangNhap',
									matKhau = '$matKhau',
									maVaiTro = '$maVaiTro'
									WHERE tenDangNhap = '$name' ";
						
					$result = $this->db->update($query);

					if ($result)
					{
						$alert = "<div class= 'alert alert-success'>Sửa người dùng thành công!</div>";
						return $alert;
					}
					else
					{
						$alert = "<div class= 'alert alert-danger'>Sửa người dùng không thành công!</div>";
						return $alert;
					}
				}
			}
		}
		
	}

?>