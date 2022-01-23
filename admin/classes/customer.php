<?php  

	require_once '../lib/database.php';
	require_once '../helpers/format.php';
?>



<?php
	class customer
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_customer($data)
		{
			$hoTenKhachHang = mysqli_real_escape_string($this->db->link, $data['hoTenKhachHang']);
			$thuDienTuKH = mysqli_real_escape_string($this->db->link, $data['thuDienTuKH']);
			// $SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
			// $diaChi = mysqli_real_escape_string($this->db->link, $data['diaChi']);
			// $diaChiGiaoHang = mysqli_real_escape_string($this->db->link, $data['diaChiGiaoHang']);
			$tenDangNhap = mysqli_real_escape_string($this->db->link, $data['tenDangNhap']);
			$matKhau = mysqli_real_escape_string($this->db->link, $data['matKhau']);


			if ($hoTenKhachHang == "" || $thuDienTuKH == "" || $tenDangNhap == "" || $matKhau == "" )
			{
				$alert = "<div class= 'alert alert-danger'>Không được để trống!</div>";
				return $alert;
			}
			else
			{
				$queryTemp = "SELECT * FROM tbl_khachhang ";
				$temp = $this->db->select($queryTemp);
				$resultTemp = $temp->fetch_assoc();

				if ($resultTemp['tenDangNhap'] != $tenDangNhap) {
					$query = "INSERT INTO tbl_khachhang(hoTenKhachHang, thuDienTuKH, tenDangNhap, matKhau) VALUES('$hoTenKhachHang', '$thuDienTuKH', '$tenDangNhap', '$matKhau') ";

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
				}else{
					$alert = "<div class= 'alert alert-danger'>Tên đăng nhập đã tồn tại trong CSDL, mời nhập lại!</div>";
					return $alert;
				}
			}

		}

		public function show_customer()
		{
			$query = "SELECT * FROM tbl_khachhang ";
			$result = $this->db->select($query);
			return $result;
		}


		public function getCustomerByID($id){ //Dùng để sửa
			$query = "SELECT * FROM tbl_khachhang WHERE maKhachHang = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}

		

		public function changeStatusCustomer($id)
		{

			$queryActive = "UPDATE tbl_khachhang SET trangThai = 'Active' WHERE maKhachHang = '$id' ";
			$queryInactive = "UPDATE tbl_khachhang SET trangThai = 'Inactive' WHERE maKhachHang = '$id' ";
			$querySelect = "SELECT * FROM tbl_khachhang WHERE maKhachHang = '$id' ";

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

		public function delete_customer($id) //Xóa danh mục
		{
			$query = "DELETE FROM tbl_khachhang WHERE maKhachHang = '$id' ";
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

		public function edit_customer($data, $id) //Sửa 
		{
			$hoTenKhachHang = mysqli_real_escape_string($this->db->link, $data['hoTenKhachHang']);
			$thuDienTuKH = mysqli_real_escape_string($this->db->link, $data['thuDienTuKH']);
			// $SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
			// $diaChi = mysqli_real_escape_string($this->db->link, $data['diaChi']);
			// $diaChiGiaoHang = mysqli_real_escape_string($this->db->link, $data['diaChiGiaoHang']);
			$tenDangNhap = mysqli_real_escape_string($this->db->link, $data['tenDangNhap']);
			$matKhau = mysqli_real_escape_string($this->db->link, $data['matKhau']);
			$id = mysqli_real_escape_string($this->db->link, $id); //Connect database


			if ($hoTenKhachHang == "" || $thuDienTuKH == "" || $tenDangNhap == "" || $matKhau == "" )
			{
				$alert = "<div class= 'alert alert-danger'>Không được để trống!</div>";
				return $alert;
			}
			else //Kiểm tra việc upload ảnh
			{
				$queryTemp = "SELECT * FROM tbl_khachhang ";
				$temp = $this->db->select($queryTemp);

				$resultTemp = $temp->fetch_assoc();
				
				if ($resultTemp['tenDangNhap'] == $tenDangNhap ){
					$alert = "<div class= 'alert alert-danger'>Tên đăng nhập đã tồn tại trong CSDL, mời nhập lại!</div>";
					return $alert;
				}else{
				
					$query = "UPDATE tbl_khachhang SET 
									hoTenKhachHang = '$hoTenKhachHang', 
									thuDienTuKH = '$thuDienTuKH',
									
									tenDangNhap = '$tenDangNhap',
									matKhau = '$matKhau'
									WHERE maKhachHang = '$id' ";
						
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