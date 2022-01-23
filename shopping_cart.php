<?php
  //  session_start(); 
   //include 'admin/config/config.php';
   if(isset($_GET['value'])){
    $id=$_GET['value'];
    //$_SESSION['cart'] = $id; 
   //$ds=mysqli_query($conn,"SELECT `maSanPham` FROM `web2`.`tbl_sanpham`WHERE `maSanPham`IN ('$id')"); 
   //if($ds)
   //{
    if(isset($_SESSION['cart'][$id]))//kiểm tra có trong giỏ hàng chưa
    {
       $add=$_SESSION['cart'][$id]+1;//nếu có trong giỏ hàng rồi thì tăng thêm
      //echo $add;
    }
    else {
      $add=1;
      //echo $add;//nếu không có thì sẽ bằng 1
    }
   // header("location: cart.php");
   $_SESSION['cart'][$id]=$add;
   //unset($_SESSION['cart'][$id]);
     //lưu số lượng sản phẩm  
// }
// echo $_SESSION['cart'][$id];
 /*else {
 echo '0';//cái này nè,chạy thử đi,bị sao á,tự nhiên bấm qua mỗi trang là tăng lên,bấm vô sản phẩm thì ko tăng
     
 }*/
   }
   
   ?>