<?php
    include 'header.php';
?>
<?php  include_once '../classes/donhang.php' ?>
<?php 
    $donhang = new donhang();

    if (!isset($_GET['maDonHang']) || $_GET['maDonHang'] == ''){
        echo "<script>'window.location = 'orders.php'</script>";
    }else{

        $id = $_GET['maDonHang'];
        $infoDH = $donhang->show_chitietdonhang($id);
    } 

?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" >Đơn hàng</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    CHI TIẾT ĐƠN HÀNG
                                </div>

                                
                                <!-- /.panel-heading -->
                                <div class="panel panel-default">
                        <div class="panel-body">
                            <?php 
                                $resultDH = $infoDH->fetch_assoc(); 
                             ?>
                            <form action="" method="POST" enctype="multipart/form-data" name="formUser" onsubmit="return validationForm()"> <!--enctype để có thể thêm hình ảnh -->
                                <table style="width: 100%;">
                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Mã đơn hàng:  </label>
                                    </td>
                                    <td>
                                       <h5 style="font-size: 16px;"><?php echo $resultDH['maDonHang'] ?></h5>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Mã khách hàng: </label>
                                    </td>
                                    <td>
                                        <h5 style="font-size: 16px;"><?php echo $resultDH['maKhachHang'] ?></h5>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Tên người nhận:</label>
                                    </td>
                                    <td>
                                        <h5 style="font-size: 16px;"><?php echo $resultDH['tenNguoiNhan'] ?></h5>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Số điện thoại: </label>
                                    </td>
                                    <td>
                                       <h5 style="font-size: 16px;"><?php echo $resultDH['sdtKH'] ?></h5>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Địa chỉ giao: </label>
                                    </td>
                                    <td>
                                        <h5 style="font-size: 16px;">+84<?php echo $resultDH['diachi'] ?></h5>
                                    </td>
                                </tr>

                                <tr>
                                <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>    
                                                    <th>STT</th>
                                                    <th>Ảnh</th>
                                                    <th>Mã sản phẩm</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Size</th>
                                                    
                                                    <th>Số lượng SP</th>
                                                    <th>Đơn giá</th>
                                                    <th>Thành tiền</th>
                                                     <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $infoDH2 = $donhang->show_chitietdonhang2($id);


                                                        $i = 0;
                                                        while ($resultSPDH = $infoDH2->fetch_assoc()){
                                                               $i++;

                                                            
                                                ?>
                                                <tr class="odd gradeX">
                                                    
                                                    <td><?php echo $i; ?></td>
                                                    <td><img src="uploads/<?php echo $resultSPDH['hinhAnhSP']; ?>" width="80"></td>
                                                    <td><?php echo $resultSPDH['maSanPham']; ?></td>
                                                    <td><?php echo $resultSPDH['tenSanPham']; ?></td>
                                                    <td><?php echo $resultSPDH['sizeSanPham']; ?></td>
                                                    
                                                    <td><?php echo $resultSPDH['sum(`soLuongSP`)']; ?></td>
                                                    <td><?php echo number_format($resultSPDH['giaSanPham']); ?></td>
                                                    
                                                    <?php 
                                                        $thanhtien = $resultSPDH['sum(`soLuongSP`)'] * $resultSPDH['giaSanPham'];
                                                    ?>
                                                    <td><?php echo number_format($thanhtien); ?></td>

                                                    
                                                    <?php 
                                                      
                                                    }
                                                    ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Giá trị đơn hàng: </label>
                                    </td>
                                    <td>
                                        <span style="font-size: 16px;"><?php echo number_format($resultDH['tongTienDH']) ?> VND</span>
                                    </td>
                                </tr> 
                                    <td class="tabLabel">
                                        <label class="labelAddProduct"> Trạng thái đơn hàng:  </label>
                                        <span style="font-size: 16px;"><?php echo $resultDH['trangThaiDH'] ?></span>
                                    </td>
                                
                                </tr>

                                 <tr>
                                    <td class="tabLabel">
                                        <p><label class="labelAddProduct">Ghi chú: </label></p>
                                    </td>
                                    <td>
                                        <span style="font-size: 16px;"><?php echo $resultDH['ghiChuCuaKhachhang'] ?></span>
                                    </td>
                                </tr>

                                
                                 </table>
                                 
                            </form>  
                            
                         </div> 




                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                   
                        <!-- /.col-lg-6 -->
                        
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <style type="text/css">
            .phanTrang a{
                text-decoration: none;
                cursor: pointer;
                color: black;
                float: left;
                padding: 5px 15px;
                border: 1px solid #999499;
                margin: 0px 2px 5px;
            }

            .phanTrang a:hover{
                background-color: grey;
                transition: 500ms;
            }
        </style>
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>


       
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>