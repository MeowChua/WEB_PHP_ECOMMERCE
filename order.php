<?php
 session_start();
 include_once 'config.php';
   if(isset($_SERVER['REQUEST_METHOD'])=="POST")
   {
    $makhachhang=$_SESSION['maKhachHang'];
    
    if(isset($_POST['price']))
    {
        $price=$_POST['price'];
        
    }
    $sId=session_id();
    $today=date("Y/m/d");
    

      //Lấy mã đơn hàng mới start
      $queryMDH = mysqli_query($conn, "SELECT MAX(maDonHang) FROM tbl_donhang ");
      $fetchMDH = mysqli_fetch_assoc($queryMDH);

      if ($fetchMDH['MAX(maDonHang)'] != NULL ){
        $dataMDHNew = $fetchMDH['MAX(maDonHang)'] + 1;
      }else{
        $dataMDHNew = 1;
      }
      
      //Lấy mã đơn hàng mới end

      //Lấy IDTTGH MAX của tbl_thongtingiaohang1 start
      // $queryIDTTGH = mysqli_query($conn, " ");
      // $fetchIDTTGH = mysqli_fetch_assoc($queryIDTTGH);
      // $maxIDTTGH = $fetchIDTTGH['MAX(IDTTGH)'];
      //Lấy IDTTGH MAX của tbl_thongtingiaohang1 end

      //Lấy tbl_thongtingiaohang1 start
      $queryIDTTGH = mysqli_query($conn, "SELECT * FROM tbl_thongtingiaohang1 WHERE IDTTGH = (SELECT MAX(IDTTGH) FROM tbl_thongtingiaohang1 WHERE sessionID = '$sId') AND sessionID = '$sId' ");
      $dataTTGH = mysqli_fetch_assoc($queryIDTTGH);

      $tenNN = $dataTTGH['tenNguoiNhan'];
      $SDTKH = $dataTTGH['soDienThoai'];
      $diachiNN = $dataTTGH['diachi'];
      $ghiChu = $dataTTGH['ghiChuKH'];
      //Lấy tbl_thongtingiaohang1 end

      //Lấy tbl_giohang start
      $queryGH = mysqli_query($conn, "SELECT * FROM tbl_giohang WHERE sessionID = '$sId' ");
      

      //Lấy tbl_giohang end

      //Thêm tbl_donhang start
      $donhang=mysqli_query($conn," 
      INSERT INTO `web2`.`tbl_donhang` (`maDonHang`, `maKhachHang`,`ngayLapDH`,`tongTienDH`,`trangThaiDH`)
      VALUES('$dataMDHNew','$makhachhang','$today','$price','Chưa giao')");
      //Thêm tbl_donhang end

      $chieuDaiGH = mysqli_num_rows($queryGH); //Lấy số dòng sản phẩm
      echo "<script>alert($chieuDaiGH);</script>";

      //for ($i = 0; $i < $chieuDaiGH; $i++ ){

      while ($dataGH = mysqli_fetch_array($queryGH)){
            $maSP = $dataGH['maSanPham']; 
            $tenSP = $dataGH['tenSanPham'];
            $SLSP = $dataGH['soLuongSanPham'];
            $sizeSP = $dataGH['sizeSanPham'];
            $giaSP = $dataGH['giaSanPham'];
            $mieutaSP = $dataGH['mieuTaSanPham'];
            $hinhanhSP = $dataGH['hinhAnhSanPham'];

               $chitietdonhang=mysqli_query($conn," INSERT INTO `web2`.`tbl_chitietdonhang` (`maDonHang` ,`tenNguoiNhan`, `sdtKH`, `ghiChuCuaKhachhang`, `maSanPham`, `tenSanPham`, `soLuongSP`, `sizeSanPham`, `giaSanPham`, `mieuTaSP`, `hinhAnhSP`, `diachi`)
              VALUES('$dataMDHNew','$tenNN','$SDTKH', '$ghiChu','$maSP', '$tenSP','$SLSP','$sizeSP','$giaSP','$mieutaSP', '$hinhanhSP', '$diachiNN') ");

               
               $capnhatSL = mysqli_query($conn, "UPDATE tbl_sanpham SET soLuongSanPham = soLuongSanPham - $SLSP WHERE maSanPham = '$maSP' ");
           
      }
          
      $xoaGioHang = mysqli_query($conn, "DELETE FROM tbl_giohang WHERE sessionID = '$sId' ");
      $_SESSION['soluong'] = 0;
      //}
 
    //}
     header("location:order_status.php");
   }
?>