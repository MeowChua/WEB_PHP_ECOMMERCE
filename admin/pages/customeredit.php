<?php include 'header.php'; ?>
<?php include_once '../classes/customer.php'; ?>
<?php 
    $customer = new customer();
    if (!isset($_GET['userid']) || $_GET['userid'] == ''){
        echo "<script>window.location = 'customerlist.php'</script>";
    }else{
        $id = $_GET['userid'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $editCustomer = $customer->edit_customer($_POST, $id);
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
                            <span class="textHeading">Sửa thông tin khách hàng</span>
                        </div>
                        <div class="panel-body">
                        <?php
                                    if (isset($editCustomer)){
                                        echo $editCustomer;
                                    }
                        ?>   
                        <?php 
                            $customerList = $customer->getCustomerByID($id);
                            if ($customerList){
                                while ($result_customer = $customerList->fetch_assoc()) {
                              
                        ?>
                            <form action="" method="POST" enctype="multipart/form-data" name="formUser" onsubmit="return validationForm()"> <!--enctype để có thể thêm hình ảnh -->
                                <table style="width: 100%;">
                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Họ tên:  </label>
                                    </td>
                                    <td>
                                        <input type="text" name="hoTenKhachHang" value="<?php echo $result_customer['hoTenKhachHang'] ?>" class="inputAddProduct" autofocus>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Email: </label>
                                    </td>
                                    <td>
                                        <input type="email" name="thuDienTuKH" value="<?php echo $result_customer['thuDienTuKH'] ?>" class="inputAddProduct" >
                                    </td>
                                </tr>

                               
                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Tên đăng nhập: </label>
                                    </td>
                                    <td>
                                        <input type="text" name="tenDangNhap" value="<?php echo $result_customer['tenDangNhap'] ?>" class="inputAddProduct" >
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Mật khẩu: </label>
                                    </td>
                                    <td>
                                        <input type="text" name="matKhau" value="<?php echo $result_customer['matKhau'] ?>" class="inputAddProduct" >
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Nhập lại mật khẩu: </label>
                                    </td>
                                    <td>
                                        <input type="text" name="matKhau2" value="<?php echo $result_customer['matKhau'] ?>" class="inputAddProduct" >
                                    </td>
                                </tr>

                                
                                 </table>
                                 <input type="submit" name="submit" value="Cập nhật" class="btn btn-success" style="margin: 10px;">
                            </form>  
                            <?php 
                                }
                            }
                            ?>
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
        <link rel="stylesheet" type="text/css" href="../css/style.css">
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
        
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                  URL.revokeObjectURL(output.src) // free memory
                    }
            };
        </script>
        <script type="text/javascript">
            function validationForm(){
                
                var matKhau=document.formUser.matKhau.value;  
                var matKhau2=document.formUser.matKhau2.value;

                if (matKhau == matKhau2){        
                        return true;
                }else{
                    alert("Mật khẩu không giống nhau! Mời nhập lại!");
                    return false;
                }
            }

        </script>

    </body>
</html>
