<?php  include 'header.php'; ?>
<?php  include_once '../classes/user.php' ?>
<?php
   
    $user = new user();
    //Khóa/Mở người dùng
    if (!isset($_GET['statusname']) || $_GET['statusname'] == ''){
        echo "<script>'window.location = 'userlist.php'</script>";
    }else{

        $name = $_GET['statusname'];
        $changeStatusUser = $user->changeStatusUser($name);
    } 

    //Xóa người dùng
    if (!isset($_GET['deletename']) || $_GET['deletename'] == ''){
        echo "<script>'window.location = 'userlist.php'</script>";
    }else{

        $name = $_GET['deletename'];
        $deleteUser = $user->delete_user($name);
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
                            <span class="textHeading">Danh sách quản trị viên</span>
                        </div>
                        
                        <div class="panel-body">   
                            <input type="text" name="userName" placeholder="Nhập người dùng..." style="width: 50%;height: 34px;padding: 6px 12px;font-size: 14px;" >
                            <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-default" > 
                            <a href="useradd.php"><button type="button" class="btn btn-success" style="float: right;">Thêm quản trị viên</button></a>
                            <p></p>
                            <?php
                                    if (isset($changeStatusUser)){
                                        echo $changeStatusUser;
                                    }
                            ?>
                            <?php
                                    if (isset($deleteUser)){
                                        echo $deleteUser;
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
                                                    <th>Loại tài khoản</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                    $userList = $user->show_user();
                                                    if ($userList){
                                                        $i = 0;
                                                        while ($result = $userList->fetch_assoc()){ 
                                                            if ($result['tenDangNhap'] != 'admin'){ //Ẩn tài khoản admin mặc định
                                                                $i++;           
                                                            
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $result['tenNguoiQuanTri']; ?></td>
                                                    <td><?php echo $result['tenDangNhap']; ?></td>
                                                    <td><?php echo $result['thuDienTuQT']; ?></td>
                                                    <td class="center">
                                                    <?php 
                                                        if ($result['trangThai'] == 'Active') {
                                                            echo '<button type="button" class="btn btn-outline btn-success">Hoạt động</button>';
                                                        }else echo '<button type="button" class="btn btn-outline btn-danger">Khóa</button>';
                                                    ?>    
                                                    </td>
                                                    
                                                    <td><?php echo $result['tenVaiTro']; ?></td>

                                                    <td>
                                                        <a href="useredit.php?username=<?php echo $result['tenDangNhap'] ?>" onclick="return popitup('useredit.php?username=<?php echo $result['tenDangNhap'] ?>')"><button type="button" class="btn btn-info">Sửa</button></a>
                                                        
                                                        <!-- <a href="?deletename=<?php //echo $result['tenDangNhap'] ?>" ><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa người dùng này không?');" >Xóa</button></a> -->
                                                        <?php 
                                                            $tenDN = $result['tenDangNhap'];
                                                            if (Session::get('tenDangNhap') != $tenDN ){
                                                                echo "<a href='?statusname=$tenDN' ><button type='button' class='btn btn-warning'>Mở / Khóa</button></a>";
                                                            }

                                                        ?>
                                                       
      
                                                    </td>
                                                </tr>
                                                <?php 
                                                    }
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
