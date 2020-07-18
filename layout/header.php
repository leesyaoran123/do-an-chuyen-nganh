
<!DOCTYPE html>
<html>
    <head>
        <title>Store</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href=" <?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/dest/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" title="style" href="<?php echo base_url() ?>public/assets/dest/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="<?php echo base_url() ?>public/assets/dest/css/huong-style.css">
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src=" <?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
            $("#header-search".keyup(function() {
              $.ajax({
                type:"get",
                url:"store/tim-kiem.php",
                data:'keyword='+$(this).val(),
                beforeSend: function(){
                    $("#header-search").css("background ","#FFF url(LoaderIcon.gif) no-repeat 165px ");
                },
                success :function(data){
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html('').append(data);
                    $("#header-search").css("background","#FFF");
                }
              });
            });
            $('#header-search').blur(function(){

            })
            });
            function selectCountry(val){
                $("#header-search").val(val);
                $("#suggesstion-box").hide();
            }

        </script>
        <script src="<?php echo base_url() ?>public/assets/dest/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>public/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/dest/vendors/animo/Animo.js"></script>
    <script src="<?php echo base_url() ?>public/assets/dest/vendors/dug/dug.js"></script>
    <script src="<?php echo base_url() ?>public/assets/dest/js/scripts.min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/dest/js/jquery.countTo.js"></script>
    <script src="<?php echo base_url() ?>public/assets/dest/js/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/dest/js/wow.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?> public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href=" public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href=" public/frontend/css/style.css">
        
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                              
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                    	<?php if(isset($_SESSION['name_user'])) : ?>
                                        <li>Xin chào : <?php echo $_SESSION['name_user'] ?></li>
                                        <li>
                                            <a href="#"><i class="fa fa-user "></i> My Account <i class="fa fa-caret-down"></i></a>
                                            <ul id="header-submenu" >
                                                <li ><a href="contact.php">Contact</a></li>
                                                <li><a href="gio-hang.php">Cart</a></li>
                                                <li><a href="thoat.php"><i class="fa fa-share-square-o"></i>Thoát</a></li>
                                            </ul>
                                        </li>
                                    
                                        <?php else : ?>
                                        	 <li>
                                            <a href="dang-nhap.php"><i class="fa fa-unlock"></i> Login</a>
                                        </li>
                                          <li>
                                            <a href="dang-ky.php"><i class="fa fa-user"></i> Đăng ký</a>
                                        </li>
                                        <?php endif ; ?>	
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline">
                               
                            </form>
                        </div>

                         <!-- logo -->
                        <div class="col-md-4">
                            <a href="index.php" >
                                <img  src="public/uploads/product/logo.jpg">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0365797021</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="../../store/index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="">Shop</a>
                            </li>
                          
                            <li>
                                <a href="../../store/contact.php">Contact</a>
                            </li>
                            <!-- <li>
                                <a href="../../store/size-table.php"></a>
                            </li> -->
                            <li>
                                <a href="../../store/about.php">About us</a>
                            </li>
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio-hang.php"><i class="fa fa-shopping-basket"></i> My Cart </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                    
                            <ul>
                                <?php foreach($category as $item) : ?>
                               <li> <a href="danh-muc-sp.php?id=<?php echo $item['id'] ?>" title=""><?php echo $item['name']  ?></a></li>
                                <?php endforeach; ?>
                           </ul>
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                     
                            <ul>
                                <?php foreach ($productNew as $item): ?>
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name']?></p >
                                               <?php if($item['sale'] > 0) : ?>
                                             <b class="sale">Giá gốc: <?php echo formatPrice($item['price']) ?> đ</b><br>
                                            <b class="price">Giảm giá: <?php echo formatpricesale($item['price'],$item['sale']) ?> đ</b><br> <?php else : ?>
                                         <p>Giá gốc:<?php echo formatPrice($item['price']) ?></p>
                                           <?php endif ?>
                                            <span class="view"><i class="fa fa-eye"></i> 500 <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach ?>
                               
                               
                            </ul>
                            <!-- </marquee> -->
                        </div>
                    
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm bán chạy </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach ($productPay as $item): ?>
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name']?></p >
                                               <?php if($item['sale'] > 0) : ?>
                                             <b class="sale">Giá gốc: <?php echo formatPrice($item['price']) ?> đ</b><br>
                                            <b class="price">Giảm giá: <?php echo formatpricesale($item['price'],$item['sale']) ?> đ</b><br> <?php else : ?>
                                         <p>Giá gốc:<?php echo formatPrice($item['price']) ?></p>
                                           <?php endif ?>
                                            <span class="view"><i class="fa fa-eye"></i> 1000 <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach ?>
                               
                               
                            </ul>
                            <!-- </marquee> -->
                        </div>

                      
                    </div>