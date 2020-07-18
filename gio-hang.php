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
$sum=0;
      if(! isset($_SESSION['cart']) | count ($_SESSION['cart'])==0)
      {
          echo"<script >alert('Không Có Sản Phẩm Trong Giỏ Hàng');location.href='index.php'</script>";
      }

  
?>
<?php require_once ("layout/header.php"); ?>

                <div class="col-md-9 bor">
                 

                        <section class="box-main1">
                                  <?php if (isset($_SESSION['success'])): ?>
                              <div class="alert alert-success" role="alert">
                                <STRONG style="color:#3c763d">Success!</STRONG>
                                <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                              </div>
                            <?php endif ?>
                            <h3 class="title-main"><a href=""> Giỏ Hàng</a> </h3>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>STT</th>
                                  <th>Tên Sản Phẩm</th>
                                  <th>Hình ảnh</th> 
                                  <th>Số Lượng</th>
                                  <th>Giá</th>
                                  <th>Tổng Tiền</th>
                                  <th>Thao Tác</th>
                                </tr>
                              </thead>
                              <tbody >
                                <?php $stt =1 ; foreach ($_SESSION['cart'] as $key => $value): ?>
                                
                                <tr>
                                  <td><?php echo $stt ?></td>
                                  <td><?php echo $value['name'] ?></td>
                                  <td>
                                    <img src="<?php echo uploads() ?>product/<?php echo $value['thunbar'] ?>" width="80px" height="80px">
                                  </td>
                                  <td>
                                    <input type="number" name="qty" value="<?php echo $value['qty'] ?>" class="form-control qty" id="qty" min=0 >
                                  </td>
                                  <td><?php echo formatPrice( $value['price']) ?></td>
                                  <td><?php echo formatPrice($value['price']* $value['qty']) ?></td>
                                  <td>
                                    <a href="remove.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger" ><i class="fa fa-remove"></i>remove</a>
                                    <a href="" class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?>><i class="fa fa-refresh"></i>update</a>
                                  </td>
                                </tr>
                                <?php $sum += $value['price']*$value['qty'];$_SESSION['tongtien']=$sum; ?>
                                <?php $stt ++; endforeach ?>
                            
                              </tbody>
                            </table>
                         <div class="col-md-4 pull-right">
                           <ul class="list-group">
                             <li class="list-group-item">
                               <h3>Thông Tin Đơn Hàng</h3>
                             </li>
                             <li class="list-group-item">
                               <span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>Số Tiền
                             </li>
                             <li class="list-group-item">
                               <span class="badge">10%</span>Thuế VAT
                             </li>
                             <li class="list-group-item"><span class="badge"><?php echo sale($_SESSION['tongtien']) ?>%</span>
                             Giảm Giá</li>
                             <li class="list-group-item">
                               <span class="badge"><?php $_SESSION['total']=$_SESSION['tongtien'] *110/100; echo formatPrice($_SESSION['total']) ?></span>Tổng Tiền Thanh Toán
                             </li>
                               <li class="list-group-item">
                                <a href="index.php" class="btn btn-info">Tiếp Tục Mua Hàng</a>
                                <a href="thanh-toan.php" class="btn btn-success">Thanh Toán</a>
                             </li>
                           </ul>
                         </div>
                            </div>
                        </section>

             </div>
      <?php require_once ("layout/footer.php"); ?>

           