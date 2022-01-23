<?php
session_start();
  include 'config.php';
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
      $sId=session_id();
      if(isset($_POST['firstname'])) $firstname=$_POST['firstname']; //Tên 
      if(isset($_POST['phone'])) $phone=$_POST['phone']; //SDT
      if(isset($_POST['diaChiTinh'])) $address_tinh=$_POST['diaChiTinh']; //Tỉnh/ thành phố
      if(isset($_POST['diaChiHuyen'])) $address1=$_POST['diaChiHuyen']; //địa chỉ huyện
      if(isset($_POST['deli-address'])) $deli_address=$_POST['deli-address']; //địa chỉ xã
      if(isset($_POST['diachinh'])) $diachinh=$_POST['diachinh']; //địa chỉ xã
      if(isset($_POST['addcomment'])) $Ghichu=$_POST['addcomment'];  //Ghi chú

      $diachigh = $diachinh.", ".$deli_address.", ".$address1.", ".$address_tinh;
      $makhachhang=$_SESSION['maKhachHang'];
      //echo $diachi;
      //lưu vào csdl
      /*$addthongtin=mysqli_query($conn,"INSERT INTO `tbl_thongtingiaohang` (`maDonHang`,`maKhachHang`,`tenKhachHang`,
      `soDienThoai`,`diaChi`,`trangThai`) VALUES(1,'$makhachhang','$firstname','$phone','$address_tinh',1 ");*/
      $addthongtin=mysqli_query($conn,"
      INSERT INTO `web2`.`tbl_thongtingiaohang1`(`maKhachHang`,`tenNguoiNhan`,`soDienThoai`,`diachi`, `ghiChuKH`, `sessionID`)
      VALUES('$makhachhang','$firstname','$phone','$diachigh','$Ghichu','$sId') ");
      echo'n';
        //  if($addthongtin)
        //  {
          header("location:checkout-shipping.php");
         //} 
  }?>