<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Trang Admin</title>
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url() ?> public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="<?php echo base_url() ?>public/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?php echo base_url() ?>public/admin/css/sb-admin.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
            <a class="navbar-brand mr-1" href="">Trang Admin - Xin Chào <?php echo $_SESSION['admin_name'] ?></a>
            <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
            </button>
            <!-- Navbar Search -->
        
       
          <li >
           <a href="/store/dang-xuat.php" ><i class=" "></i>Log Out</a>
           
         </li>
    
            <!-- Navbar -->
          <ul class="navbar-nav ml-auto ml-md-0">
            

          </ul>
        </nav>
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
                 <li >
                    <a class="nav-link" href="<?php echo base_url() ?>admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>TRANG CHỦ</span>
                    </a>
                </li>
                <li class="<?php echo isset($open) && $open =='category' ? 'active' : ''?>">
                    <a class="nav-link" href="<?php echo modules("category")?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>DANH MỤC SẢN PHẨM</span>
                    </a>
                </li>
                   <li class="<?php echo isset($open) && $open =='product' ? 'active' : ''?>">
                    <a class="nav-link" href="<?php echo modules("product")?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>SẢN PHẨM</span>
                    </a>
                </li>
                     <li class="<?php echo isset($open) && $open =='user' ? 'active' : ''?>">
                    <a class="nav-link" href="<?php echo modules("user")?>">
                    <i class="fas fa-user-shield"></i>
                    <span>THÀNH VIÊN</span>
                    </a>
                </li>
                 <li class="<?php echo isset($open) && $open =='admin' ? 'active' : ''?>">
                    <a class="nav-link" href="<?php echo modules("admin")?>">
                    <i class="fas fa-user-shield"></i>
                    <span>ADMIN</span>
                    </a>
                </li>
               <li class="<?php echo isset($open) && $open =='transaction' ? 'active' : ''?>">
                    <a class="nav-link" href="<?php echo modules("transaction")?>">
                    <i class="fas fa-user-shield"></i>
                    <span>QUẢN LÝ ĐƠN HÀNG</span>
                    </a>
                </li>
            
            </ul>