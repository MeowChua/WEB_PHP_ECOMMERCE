<?php  

	require_once 'admin/lib/database.php';
	require_once 'admin/helpers/format.php';
?>



<?php
	class category
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}


		public function show_category()
		{
			$query = "SELECT * FROM tbl_loaisanpham ORDER BY maLoai ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_categoryLimit5()
		{
			$query = "SELECT * FROM tbl_loaisanpham ORDER BY maLoai ASC LIMIT 5";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_categoryOthers()
		{
			$query = "SELECT * FROM tbl_loaisanpham ORDER BY maLoai ASC LIMIT 5,20 ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getcatbyId($id){
			$query = "SELECT * FROM tbl_loaisanpham WHERE maLoai = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function count_product_withcategoryID($id){
			$query = "SELECT COUNT(*) AS soluongprod FROM tbl_sanpham WHERE maLoai = '$id' ";
			$result = $this->db->select($query);
			return $result;

		}

		// public function insert_category($tenLoai)
		// {
		// 	$tenLoai = $this->fm->validation($tenLoai); //Check định dạng ký tự nhập vào

		// 	$tenLoai = mysqli_real_escape_string($this->db->link, $tenLoai); //Connect database


		// 	if (empty($tenLoai))
		// 	{
		// 		$alert = "<div class= 'alert alert-danger'>Không được để trống!</div>";
		// 		return $alert;
		// 	}
		// 	else
		// 	{
		// 		$query = "INSERT INTO tbl_loaisanpham(tenLoai) VALUES('$tenLoai') ";
		// 		$result = $this->db->insert($query);

		// 		if ($result)
		// 		{
		// 			$alert = "<div class= 'alert alert-success'>Thêm danh mục thành công!</div>";
		// 			return $alert;
		// 		}
		// 		else
		// 		{
		// 			$alert = "<div class= 'alert alert-danger'>Thêm danh mục không thành công!</div>";
		// 			return $alert;
		// 		}
		// 	}
		// }

		

		// public function edit_category($tenLoai, $id) //Sửa danh mục
		// {
		// 	$tenLoai = $this->fm->validation($tenLoai); //Check định dạng ký tự nhập vào

		// 	$tenLoai = mysqli_real_escape_string($this->db->link, $tenLoai);
		// 	$id = mysqli_real_escape_string($this->db->link, $id); //Connect database


		// 	if (empty($tenLoai))
		// 	{
		// 		$alert = "<div class= 'alert alert-danger'>Không được để trống!</div>";
		// 		return $alert;
		// 	}
		// 	else
		// 	{
		// 		$query = "UPDATE tbl_loaisanpham SET tenLoai = '$tenLoai' WHERE maLoai = '$id' ";
		// 		$result = $this->db->update($query);

		// 		if ($result)
		// 		{
		// 			$alert = "<div class= 'alert alert-success'>Sửa danh mục thành công!</div>";
		// 			return $alert;
		// 		}
		// 		else
		// 		{
		// 			$alert = "<div class= 'alert alert-danger'>Sửa danh mục không thành công!</div>";
		// 			return $alert;
		// 		}
		// 	}
		// }

		// public function delete_category($id) //Xóa danh mục
		// {
		// 	$query = "DELETE FROM tbl_loaisanpham WHERE maLoai = '$id' ";
		// 	$result = $this->db->delete($query);

		// 	if ($result)
		// 		{
		// 			$alert = "<div class= 'alert alert-success'>Xóa danh mục thành công!</div>";
		// 			return $alert;
		// 		}
		// 		else
		// 		{
		// 			$alert = "<div class= 'alert alert-danger'>Xóa danh mục không thành công!</div>";
		// 			return $alert;
		// 		}
			
		// }
	}

?>