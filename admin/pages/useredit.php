<?php include 'header.php'; ?>
<?php include_once '../classes/user.php'; ?>
<?php 
    $user = new user();
    if (!isset($_GET['username']) || $_GET['username'] == ''){
        echo "<script>window.location = 'userlist.php'</script>";
    }else{
        $name = $_GET['username'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $editUser = $user->edit_user($_POST, $name);
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
                            <span class="textHeading">Sửa thông tin quản trị viên</span>
                        </div>
                        <div class="panel-body">
                        <?php
                                    if (isset($editUser)){
                                        echo $editUser;
                                    }
                        ?>   
                        <?php 
                            $userList = $user->getUserByName($name);
                            if ($userList){
                                while ($result_user = $userList->fetch_assoc()) {
                              
                        ?>
                            <form action="" method="POST" enctype="multipart/form-data" name="formUser" onsubmit="return validationForm()"> <!--enctype để có thể thêm hình ảnh -->
                                <table style="width: 100%;">
                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Họ tên:  </label>
                                    </td>
                                    <td>
                                        <input type="text" name="tenNguoiQuanTri" value="<?php echo $result_user['tenNguoiQuanTri'] ?>" class="inputAddProduct" autofocus>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Email: </label>
                                    </td>
                                    <td>
                                        <input type="email" name="thuDienTuQT" value="<?php echo $result_user['thuDienTuQT'] ?>" class="inputAddProduct" >
                                    </td>
                                </tr>

                                  <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Tên đăng nhập: </label>
                                    </td>
                                    <td>
                                        <input type="text" name="tenDangNhap" value="<?php echo $result_user['tenDangNhap'] ?>" class="inputAddProduct" >
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Mật khẩu: </label>
                                    </td>
                                    <td>
                                        <input type="text" name="matKhau" value="<?php echo $result_user['matKhau'] ?>" class="inputAddProduct" >
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Nhập lại mật khẩu: </label>
                                    </td>
                                    <td>
                                        <input type="text" name="matKhau2" value="<?php echo $result_user['matKhau'] ?>" class="inputAddProduct" >
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="tabLabel">
                                        <label class="labelAddProduct">Loại tài khoản: </label>
                                    </td>
                                    <td>
                                        <select class="inputAddProduct" name="maVaiTro" required>
                                            <option value="0">----Chọn loại tài khoản----</option>
            
                                            <?php       
                                                $userTypeList = $user->show_usertype();
                                                if ($userTypeList){
                                                    while ($result_type = $userTypeList->fetch_assoc()) {
 
                                            ?>
                                            <option 
                                            <?php 
                                                if ($result_type['maVaiTro'] == $result_user['maVaiTro'] ){ echo 'selected'; }
                                            ?>

                                            value="<?php echo $result_type['maVaiTro']; ?>"><?php echo $result_type['tenVaiTro']; ?>
                                                
                                            </option>
                                            <?php 
                                                }
                                            }
                                            ?>

                                        </select>
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
                var maVaiTro=document.formUser.maVaiTro.value; 
                var matKhau=document.formUser.matKhau.value;  
                var matKhau2=document.formUser.matKhau2.value;

                if (matKhau == matKhau2){
                    if (maVaiTro == '0'){
                        alert("Chưa chọn loại tài khoản!");
                        return false;
                    }else{
                        return true;
                    }
                    
                }else{
                    alert("Mật khẩu không giống nhau! Mời nhập lại!");
                    return false;
                }
            }

        </script>

    </body>
</html>
