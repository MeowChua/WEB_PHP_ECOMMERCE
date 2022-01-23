<?php  
	include_once '../lib/session.php';
	Session::checkLogin(); // Khởi tạo và checklogin nếu có "true" thì login
	require_once 'lib/database.php';
	require_once 'helpers/format.php';
?>



<?php
	class adminLogin
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}


		public function login_admin($tenDangNhap,$matKhau)
		{
			$tenDangNhap = $this->fm->validation($tenDangNhap); //Check định dạng ký tự nhập vào
			$matKhau = $this->fm->validation($matKhau);	//Check định dạng ký tự nhập vào

			$tenDangNhap = mysqli_real_escape_string($this->db->link, $tenDangNhap); //Connect database
			$matKhau = mysqli_real_escape_string($this->db->link, $matKhau); //Connect database

			if (empty($tenDangNhap) || empty($matKhau) )
			{
				$alert = "<div class= 'alert alert-danger'>Không được để trống!</div>";
				return $alert;
			}
			else
			{
				$query = "SELECT * FROM tbl_quantri WHERE tenDangNhap = '$tenDangNhap' AND matKhau = '$matKhau' LIMIT 1 ";
				$result = $this->db->select($query);

				if ($result != false )
				{		
					$value = $result->fetch_assoc(); // fetch dữ liệu từ query
					if ($value['trangThai'] === 'Active') {
						Session::set('login', true);	// Set phiên đăng nhập cho admin
						Session::set('tenDangNhap', $value['tenDangNhap']);
						Session::set('matKhau', $value['matKhau']);
						Session::set('tenNguoiQuanTri', $value['tenNguoiQuanTri']);
						Session::set('maVaiTro', $value['maVaiTro']);
						header('Location:pages/index.php');
					}
					else
					{
						$alert = "<div class= 'alert alert-danger'>Tài khoản đã bị khóa!</div>";
						return $alert;
					}
					
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Sai thông tin đăng nhập!</div>";
					return $alert;
				}
			}
		}
	}

?>