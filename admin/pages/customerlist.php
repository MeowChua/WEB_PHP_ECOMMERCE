<?php  include 'header.php'; ?>
<?php  include_once '../classes/customer.php' ?>
<?php
   
    $customer = new customer();
    //Khóa/Mở người dùng
    if (!isset($_GET['statusid']) || $_GET['statusid'] == ''){
        echo "<script>'window.location = 'customerlist.php'</script>";
    }else{

        $id = $_GET['statusid'];
        $changeStatusCustomer = $customer->changeStatusCustomer($id);
    } 

    //Xóa người dùng
    if (!isset($_GET['deleteid']) || $_GET['deleteid'] == ''){
        echo "<script>'window.location = 'customerlist.php'</script>";
    }else{

        $id = $_GET['deleteid'];
        $deleteCustomer = $customer->delete_customer($id);
    } 
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Quản lý người dùng</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="textHeading">Danh sách khách hàng</span>
                        </div>
                        
                        <div class="panel-body">   
                            <input type="text" name="userName" placeholder="Nhập người dùng..." style="width: 50%;height: 34px;padding: 6px 12px;font-size: 14px;" >
                            <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-default" > 
                            <a href="customeradd.php"><button type="button" class="btn btn-success" style="float: right;">Thêm khách hàng</button></a>
                            <p></p>
                            <?php
                                    if (isset($changeStatusCustomer)){
                                        echo $changeStatusCustomer;
                                    }
                            ?>
                            <?php
                                    if (isset($deleteCustomer)){
                                        echo $deleteCustomer;
                                    }
                            ?>
                                    <div class="table-responsive" style="margin-top: 2%">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Họ tên</th>
                                                    <th>Tên đăng nhập</th>
                                                    <th>Email</th>
                                                  
                                                    <th>Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                    $customerList = $customer->show_customer();
                                                    if ($customerList){
                                                        $i = 0;
                                                        while ($result = $customerList->fetch_assoc()){
                                                                $i++;           
                                                            
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $result['hoTenKhachHang']; ?></td>
                                                    <td><?php echo $result['tenDangNhap']; ?></td>
                                                    <td><?php echo $result['thuDienTuKH']; ?></td>
                                                
                                                    <td class="center">
                                                    <?php 
                                                        if ($result['trangThai'] == 'Active') {
                                                            echo '<button type="button" class="btn btn-outline btn-success">Hoạt động</button>';
                                                        }else echo '<button type="button" class="btn btn-outline btn-danger">Khóa</button>';
                                                    ?>    
                                                    </td>
                                         
                                                    <td>
                                                        <a href="customeredit.php?userid=<?php echo $result['maKhachHang'] ?>" onclick="return popitup('customeredit.php?userid=<?php echo $result['maKhachHang'] ?>')"><button type="button" class="btn btn-info">Sửa</button></a>
                                                        
                                                        <!-- <a href="?deleteid=<?php //echo $result['maKhachHang'] ?>" ><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa người dùng này không?');" >Xóa</button></a> -->

                                                        <a href="?statusid=<?php echo $result['maKhachHang'] ?>" ><button type="button" class="btn btn-warning">Mở / Khóa</button></a>
      
                                                    </td>
                                                </tr>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                        </div>
                    </div>
                    <!-- /.row -->


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
        <script language="javascript" type="text/javascript"> 

            function popitup(url) { //Popup cửa sổ
                newwindow=window.open(url,'name','height=580,width=700');
                if (window.focus) {
                    newwindow.focus()
                    }
                return false;
            }

        </script>

    </body>

</html>
