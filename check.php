<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
include_once 'config.php';
// khởi tạo giá trị 
$firstname = '';
$password = '';
//$sex='';
$mail = '';
//$birthday='';
//lấy dữ liệu từ form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   if (
      isset($_POST['hoTen_input']) && isset($_POST['email_input']) && isset($_POST['ngaySinh_input']) &&
      isset($_POST['tenDangNhap_input']) && isset($_POST['matKhau_input'])
   ) {

      $hoTen = $_POST['hoTen_input'];
      $email = $_POST['email_input'];
      $ngaySinh = $_POST['ngaySinh_input'];
      $tenDangNhap = $_POST['tenDangNhap_input'];
      $matKhau = md5($_POST['matKhau_input']); 

      $date = getdate();
      $yearDate = $date['year'];
      
      // $namSinh = substr($ngaySinh, -4);

      //check trùng tên đăng nhập
      $check = mysqli_num_rows(mysqli_query($conn, "SELECT `tenDangNhap` FROM `web2`.`tbl_khachhang` WHERE (`tenDangNhap`='$tenDangNhap' )")) > 0;
      if ($check) {
         $resultCheck = "<span style='color: red' >Tên đăng nhập đã tồn tại vui lòng nhập lại</span>";
         $_SESSION['resultCheck'] = $resultCheck;
         header('location: checkout-registration.php?resultCheck=tdn');
      }

      //check trùng mail
      if ($check1 = mysqli_num_rows(mysqli_query($conn, "SELECT `thuDienTuKH` FROM `web2`.`tbl_khachhang` WHERE (`thuDienTuKH`='$email' )")) > 0) {
         $resultCheck = "<span style='color: red' >Email đã tồn tại vui lòng nhập lại</span>";
         $_SESSION['resultCheck'] = $resultCheck;
         header('location: checkout-registration.php?resultCheck=email');
      }

      // //check tuổi > 15
      // if ( (intval($date['year']) - intval($namSinh) ) < 15  ) {
      //    $resultCheck = "<span style='color: red' >Email đã tồn tại vui lòng nhập lại</span>";
      //    $_SESSION['resultCheck'] = $resultCheck;
      //    header('location: checkout-registration.php?resultCheck=age');
      // }

         if (!$check && !$check1) {
         //lưu thông tin vào csdl
         $sqlquery = "INSERT INTO `web2`.`tbl_khachhang`(`maKhachHang`,`tenDangNhap`,`hoTenKhachHang`,`thuDienTuKH`,`matKhau`, `ngaySinh`)
         VALUES(NULL,'$tenDangNhap','$hoTen','$email','$matKhau', '$ngaySinh')";
         echo $sqlquery;

         $addmember = mysqli_query($conn, $sqlquery);
            if ($addmember) {
               $_SESSION['ten'] = $tenDangNhap;
               header('location:index.php');
            } else {
               echo "thất bại";
            }
      }
   }
}

mysqli_close($conn);

?>
