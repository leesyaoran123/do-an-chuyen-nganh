<?php 
 require_once ("libraries/Database.php");
    require_once("libraries/Function.php");
require_once("autoload/autoload.php");
     $db = new Database;
     $category =$db->fetchAll("category");
     $sqlNew ="SELECT * FROM product where 1 ORDER BY ID DESC LIMIT 3";
     $productNew=$db->fetchsql($sqlNew);
     $sqlHomecate="SELECT * FROM category Where home = 1 ORDER BY updated_at";
     $CategoryHome=$db->fetchsql($sqlHomecate);
     $sqlPay="SELECT * FROM product Where 1 ORDER BY PAY DESC LIMIT 3";
     $productPay= $db->fetchsql($sqlPay);

  

     $data = [];
     foreach ($CategoryHome as $item) {
        $cateId =intval($item['id']);
     
        $sql="SELECT * FROM product Where category_id = $cateId";
        $ProductHome=$db->fetchsql($sql);
        $data[$item['name']]=$ProductHome;
     }

?>
<?php require_once ("layout/header.php"); ?>

                <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                           <div id="myCarousel" class="carousel slide" data-ride="carousel">
                               <ol class="carousel-indicators">
                                   <li  data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                   <li  data-target="#myCarousel" data-slide-to="1"></li>
                                   <li  data-target="#myCarousel" data-slide-to="2"></li>
                                   <li  data-target="#myCarousel" data-slide-to="3"></li>
                               </ol>
                                <!--slide -->
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <img src="public/frontend/images/slide/anh-bia1.jpg" class="img-thumbnail">
                                   </div>
                                     <div class="item">
                                       <img src="public/frontend/images/slide/anh-bia2.jpg" alt="">
                                   </div>
                                     <div class="item">
                                       <img src="public/frontend/images/slide/anh-bia3.jpg" alt="">
                                   </div>
                                     <div class="item">
                                       <img src="public/frontend/images/slide/anh-bia4.jpg" alt="">
                                   </div>
                               </div>

                               <!--left right control -->
                               <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Next</span>
                               </a>
                           </div>
                        </section>

                        <section class="box-main1">
                          <?php foreach ($data as $key => $value) :  ?>
                              <h3 class="title-main"><a href=""><?php echo $key ?></a> </h3>
                            
                            <div class="showitem clearfix">
                              <?php foreach ($value as $item): ?>
                                  <div class="col-md-3 item-product bor">
                                    <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                                    </a>
                                    <div class="info-item">
                                        <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                      <?php if($item['sale'] > 0) : ?>
                                          <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?> </b></p> <?php else : ?>
                                         <p><?php echo formatPrice($item['price']) ?> </p>
                                  
                                        <?php endif ?>

                                    </div>
                            
                              
                                    <div class="hidenitem">
                                        <p><a href=""><i class="fa fa-search"></i></a></p>
                                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                                        <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                           
                                </div>
                           <?php endforeach ?>
                            </div>
                      <?php endforeach ?>
                        </section>
                              <section class="box-main1" style="...">
                       
                              <h3 class="title-main"><a href="javascript:void(0)">Sản Phẩm Mới</a> </h3>
                            
                            <div class="showitem clearfix">
                              <?php foreach ($productNew as $item): ?>
                                  <div class="col-md-3 item-product bor clearfix">
                                    <a href="chi-tiet-sp.php?id=<? $item['id'] ?>">
                                        <img src="public/uploads/product/<?=  $item['thunbar'] ?>" class="" width="100%" height="180">
                                    </a>
                                    <div class="info-item">
                                        <a href="chi-tiet-sp.php?id=<?= $item['id'] ?>"><?= $item['name'] ?></a>
                                      <?php if($item['sale'] ) : ?>
                                          <p><strike class="sale"><?= formatPrice($item['price']) ?></strike> <b class="price"><?= formatpricesale($item['price'],$item['sale']) ?> </b></p> <?php else : ?>
                                         <p><?= formatPrice($item['price']) ?> </p>
                                  
                                        <?php endif ?>

                                    </div>
                            
                              
                                    <div class="hidenitem">
                                        <p><a href="chi-tiet-sp.php?id=<?= $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                        <p><a href=""  class="addFavorite"data-id="<?= $item['id'] ?>"><i class="fa fa-heart"></i></a></p>
                                        <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                           
                                </div>
                           <?php endforeach ?>
                            </div>
           
                        </section>

             </div>

      <?php require_once ("layout/footer.php"); ?>

           