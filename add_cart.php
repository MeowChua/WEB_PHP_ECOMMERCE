/<?php
session_start();
include_once 'config.php';
if($_SERVER['REQUEST_METHOD']==="POST")
{
  if(isset($_GET['id'])) $id=$_GET['id'];
  if(isset($_POST['qtybutton'])) $qty=$_POST['qtybutton'];
  $sId=session_id();
  $product=mysqli_query($conn,"SELECT * FROM `tbl_sanpham` WHERE `maSanPham`='$id' ");
   $row=mysqli_fetch_assoc($product);
   $maLoai=$row['maLoai'];
   $tenSanPham=$row['tenSanPham'];
   $size=$row['sizeSanPham'];
   $mieuTaSanPham=$row['mieuTaSanPham'];
   $giaSanPham=$row['giaSanPham'];
   $hinhAnhSanPham=$row['hinhAnhSanPham'];
   $slspHienCo = $row['soLuongSanPham'];

   //Check mã tồn tại hay chưa start 
   //$giohangcheck=mysqli_query($conn,"SELECT maSanPham FROM `tbl_giohang` ");
   
   //Check mã tồn tại hay chưa start 


    //$insert=mysqli_query($conn," INSERT INTO `tbl_giaohang`(`id_giohang`,`maSanPham`) VALUES(NULL,'$id')");
    if( ($qty>0) && ($qty < $slspHienCo) ){
          $insert=mysqli_query($conn,"
          INSERT INTO `web2`.`tbl_giohang`(`id_giohang`,`maSanPham`,`soLuongSanPham`,`sessionID`,`maLoai`,`tenSanPham`,`sizeSanPham`,`mieuTaSanPham`,`giaSanPham`,`hinhAnhSanPham`)
          VALUES(NULL,'$id','$qty','$sId','$maLoai','$tenSanPham','$size','$mieuTaSanPham','$giaSanPham','$hinhAnhSanPham') ");


    }else{
      echo "<script>alert('Số lượng không hợp lệ!');
                                window.location = 'single-product.php?maSanPham=$id';</script>";
    }

    if($insert)
            {
              //<!-- Tính số lượng sản phẩm trong giỏ hàng--> 
               
              //echo $soluongsanpham;
              //<!-------------------------------------------------->


             header("location:single-product.php?maSanPham=$id ");
            }
             else {
              echo "<script>alert('Số lượng không hợp lệ!');
                                window.location = 'single-product.php?maSanPham=$id';</script>";
               //header("location:404.php");
             }

    


}
mysqli_close($conn);
?>