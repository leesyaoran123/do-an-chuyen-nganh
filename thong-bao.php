<?php 
 require_once ("libraries/Database.php");
    require_once("libraries/Function.php");
require_once("autoload/autoload.php");
     $db = new Database;
      $category =$db->fetchAll("category");
        $sqlNew ="SELECT * FROM product where 1 ORDER BY ID DESC LIMIT 3";
     $productNew=$db->fetchsql($sqlNew);
       $sqlPay="SELECT * FROM product Where 1 ORDER BY PAY DESC LIMIT 3";
     $productPay= $db->fetchsql($sqlPay);
?>
<?php require_once ("layout/header.php"); ?>

                <div class="col-md-9 ">
                     

                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Thông Báo Thanh Toán</a> </h3>
                              <?php if (isset($_SESSION['success'])): ?>
                            	<div class="alert alert-success" role="alert">
  															<STRONG style="color:#3c763d">Success!</STRONG>
  															<?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
															</div>
                            <?php endif ?>
                         	
                         <a href="index.php" >Trở Về Trang Chủ</a>
                        </section>

             </div>
      <?php require_once ("layout/footer.php"); ?>

           