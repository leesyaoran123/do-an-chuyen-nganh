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
     $user=$db->fetchID("users",intval($_SESSION['name_id']));
     if($_SERVER["REQUEST_METHOD"]=="POST")
     {
     	$data=[
     		'amount' =>$_SESSION['total'],
     		'users_id'=>$_SESSION['name_id'],
     		'note' =>postInput("note")
     	];
   		$idtran =$db->insert("transaction",$data);
   		if($idtran > 0)
   		{
   			foreach($_SESSION['cart'] as $key=> $value)
   			{
   				$data2=
   				[
   					'transaction_id' =>$idtran,
   					'product_id'=>$key,
   					'qty'=>$value['qty'],
   					'price'=>$value['price']
   				];
   				$id_insert =$db->insert("orders",$data2);
   			}
   			unset($_SESSION['total']);
   			unset($_SESSION['cart']);
   			$_SESSION['success']=" Bạn Đã Lưu Thông Tin Thành Công! Chúng Tôi Sẽ Thông Báo Đến Bạn Sớm Nhất";
   			header("location:thong-bao.php");
	   		}
     }
?>
<?php require_once ("layout/header.php"); ?>

                <div class="col-md-9 bor">
                     

                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Thanh Toán Đơn Hàng</a> </h3>
                              <form action="" method="POST" role="form" class="form-horizontal formcustome" style="margin-top:20px;">
                    
                         
                         	<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Tên thành viên</label>
                        	<div class="col-md-8">
                        		<input type="text" name="name" readonly=""  placeholder="Minh Thông" class="form-control" value="<?php echo $user['name'] ?>">
                     
                        	</div>
                         		</div>

													    
                         	<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Email</label>
                        	<div class="col-md-8">
                        		<input type="email" name="email" readonly="" placeholder="admin@gmail.com" class="form-control" value="<?php echo $user['email'] ?>">
                        		 
                        	</div>
                         		</div>
													   													
													 	<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Phone</label>
                        	<div class="col-md-8">
                        		<input type="number" name="phone" readonly="" placeholder="0986420994" class="form-control" value="<?php echo $user['phone'] ?>">
                        		 
                        	</div>
                         		</div>
                         		<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Số Tiền</label>
                        	<div class="col-md-8">
                        		<input type="text" name="total" readonly="" placeholder="" class="form-control" value="<?php echo formatPrice($_SESSION['total']) ?>">
                        		 
                        	</div>
                         		</div>
                         		 	<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Địa Chỉ</label>
                        	<div class="col-md-8">
                        		<input type="text" name="address" readonly="" placeholder="tam kỳ city" class="form-control" value="<?php echo $user['address'] ?>">
                        		 
                        	</div>
                         		</div>
                					
                						<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Ghi Chú</label>
                        	<div class="col-md-8">
                        		<input type="text" name="note" placeholder="Giao Hàng Tận Nơi" class="form-control" value="">
                        		 
                        	</div>
                         		</div>
                         <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">Xác Nhận</button>
                         	
                        
                         </form>
                         
                            </div>
                        </section>

             </div>
      <?php require_once ("layout/footer.php"); ?>

           