<?php 
 require_once ("libraries/Database.php");
    require_once("libraries/Function.php");
require_once("autoload/autoload.php");
     $db = new Database;
         $category =$db->fetchAll("category");
            $sqlNew ="SELECT * FROM product where 1 ORDER BY ID DESC LIMIT 3";
     $productNew=$db->fetchsql($sqlNew);

        $id=intval(getInput('id'));
  $sqlPay="SELECT * FROM product Where 1 ORDER BY PAY DESC LIMIT 3";
     $productPay= $db->fetchsql($sqlPay);



         $product =$db->fetchID("product",$id);

         $cateid= $product['category_id'];

         $sql="SELECT  * FROM product WHERE category_id= $cateid order by ID DESC LIMIT 4";
         $sanphamkemtheo=$db->fetchsql($sql);
?>

<?php require_once ("layout/header.php"); ?>

                <div class="col-md-9 bor">
                     

                       <section class="box-main1" >
                            <div class="col-md-6 text-center">
                                <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                                
                                <ul class="text-center bor clearfix" id="imgdetail">
                                    <li>
                                        <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                   
                                </ul>
                            </div>
                            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                               <ul id="right">
                                    <li><h3> <?php echo $product['name'] ?> </h3></li>
                                    
                                   <?php if($product['sale'] > 0) : ?>
																		 <li><p><strike class="sale"><?php echo formatPrice($product['price']) ?></strike> <b class="price"><?php echo formatpricesale($product['price'],$product['sale']) ?></b></li>
                                  	<?php else : ?>
                                  	<li>	<p><?php echo formatPrice($product['price']) ?> </p></li>
                                   <?php endif ?>
                                    <li><a href="addcart.php?id=<?php echo $product['id'] ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Add TO Cart</a></li>
                               </ul>
                            </div>

                      </section>
                      <div class="col-md-12" id="tabdetail">
                            <div class="row">
                                    
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
                                    <li><a data-toggle="tab" href="#menu1">Thông tin khác </a></li>
                                    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                                    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <h3>Nội dung</h3>
                                        <p><?php echo $product['content'] ?></p>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <h3> Thông tin khác </h3>
                                        <p> </p>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <h3>Menu 2</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    </div>
                                    <div id="menu3" class="tab-pane fade">
                                        <h3>Menu 3</h3>
                                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                   <div class="col-md-12">
                   	    <div class="showitem">
                              <?php foreach ($sanphamkemtheo as $item): ?>
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
                                        <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                           
                                </div>
                           <?php endforeach ?>
                            </div>
                   </div>
										
          		   </div>
      <?php require_once ("layout/footer.php"); ?>

           