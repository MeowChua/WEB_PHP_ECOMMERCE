<?php 
    include '../../lib/session.php';
    Session::checkSession(); //Check phiên đăng nhập hiện tại, nếu có giữ nguyên
?>
<?php 
  if (isset($_GET['action']) && $_GET['action'] == 'logout')
  {
     Session::destroy(); //Logout phiên đăng nhâp
  }
?>
<?php 
    include_once '../classes/product.php';
    include_once '../classes/user.php';
    include_once '../classes/customer.php';
    include_once '../classes/donhang.php';
    include_once '../classes/hoadon.php';

    $prod = new product();
    $user = new user();
    $customer = new customer();
    $donhang = new donhang();
    $hoadon = new hoadon();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php  
            if (Session::get('maVaiTro') == '1'){
                echo 'ADMIN B.STORE';
            }else echo 'MANAGER B.STORE';

        ?></title>
        
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="shortcut icon" type="image/x-icon" href="../unnamed.png">

        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><?php echo Session::get('tenNguoiQuanTri'); ?></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="../../index.php"><i class="fa fa-home fa-fw"></i> Trang chủ B.STORE</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i>2 Bình luận mới
                                        <span class="pull-right text-muted small">4 phút trước</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i>3 Đơn hàng mới
                                        <span class="pull-right text-muted small">10 phút trước</span>
                                    </div>
                                </a>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Xem tất cả thông báo</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>
                                <?php echo Session::get('tenNguoiQuanTri'); ?>
                                <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Thông tin nguời dùng</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                            </li>
                            <li class="divider"></li>
                             
                            <li>   
                                <a href="?action=logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                            </li>       
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
                            </li>
                            
                            <?php 
                                if (Session::get('maVaiTro') == '1'){
                                        echo '<li>
                                                <a href="#"><i class="fa fa-users"></i> Quản lý người dùng<span class="fa arrow"></span></a>

                                                <ul class="nav nav-second-level">
                                                    <li>
                                                        <a href="userlist.php"><span class="fa fa-caret-right"></span> Danh sách quản trị viên</a>
                                                    </li>
                                                    <li>
                                                        <a href="customerlist.php"><span class="fa fa-caret-right"></span> Danh sách khách hàng</a>
                                                    </li>
                                                </ul>
                                            </li>';
                                    }
                            ?>
                        
                            <li>
                                <a href="#"><i class="fa fa-product-hunt"></i> Quản lý sản phẩm <span class="fa arrow"></span> </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="category.php"><span class="fa fa-caret-right"></span> Danh mục sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="fa fa-caret-right"></span> Sản phẩm<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="product.php"><span class="fa fa-caret-right"></span>  Danh sách sản phẩm</a>
                                            </li>
                                            <li>
                                                <a href="productadd.php"><span class="fa fa-caret-right"></span>  Thêm sản phẩm</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-archive"></i> Quản lý hóa đơn <span class="fa arrow"></span> </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="orders.php"><span class="fa fa-caret-right"></span><span class="fa fa-cart-plus"></span> Quản lý đơn hàng</a>
                                    </li>
                                    <li>
                                        <a href="hoadonlist.php"><span class="fa fa-caret-right"></span><span class="fa fa-archive"></span> Quản lý hóa đơn</a>
                                    </li>
                                </ul>
                            </li>
                           
                           <li>
                                <!--a href="forms.php"><i class="fa fa-area-chart"></i> Thống kê doanh thu</a-->
                                <a href="#"><i class="fa fa-pie-chart"></i> Thống kê doanh thu <span class="fa arrow"></span> </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="statistical_product.php"><span class="fa fa-caret-right"></span> Thống kê theo sản phẩm</a>
                                       
                                    </li>
                                    <li>
                                        <a href="statistical_months.php"><span class="fa fa-caret-right"></span> Thống kê doanh thu theo tháng<span ></span></a>
                                    </li>
                                    
                                </ul>
                            </li>

                             <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="panels-wells.php">Panels and Wells</a>
                                    </li>
                                    <li>
                                        <a href="buttons.php">Buttons</a>
                                    </li>
                                    <li>
                                        <a href="notifications.php">Notifications</a>
                                    </li>
                                    <li>
                                        <a href="typography.php">Typography</a>
                                    </li>
                                    <li>
                                        <a href="icons.php"> Icons</a>
                                    </li>
                                    <li>
                                        <a href="grid.php">Grid</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>