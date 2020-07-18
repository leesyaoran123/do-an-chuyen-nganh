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
     $db = new Database;
      $category =$db->fetchAll("category");
      
      if(isset($_SESSION['name_id']))
      {
      	echo"<script >alert('Bạn đã có tài khoản không thể vào ! ');location.href='index.php'</script>";
      }

     //xu ly dang nhap
         $error=[];  
  $data =[

            'name'=> postInput("name"),
            'email' => postInput("email"),
             'phone' => postInput("phone"),
             'address' =>postInput("address"),
             'password' =>postInput("password"),
            
           ] ;

     if($_SERVER["REQUEST_METHOD"] =="POST")
     {

     	 
    
     	if($data['name'] == '')
     	{
     		$error['name']="Tên không được để trống";
     	}
     	
     	if($data['email'] == '')
     	{
     		$error['email']="Email không được để trống";
  	}
  	else{
 				$is_check =$db->fetchOne("users"," email = '".$data['email']."' ");
 				if($is_check !=NULL)
 				{
 					$error['email']="Email đã tồn tại mời bạn nhập email khác";
 				}
	  	}
     	if($data['phone'] == '')
     	{
     		$error['phone']="Điện thoại Không được để trống";
     	}
     		
     	if($data['password'] == '')
     	{
     		$error['password']="Mật khẩu không được để trống";
     	}
     	
     	if($data['address'] == '')
     	{
     		$error['address']="Địa chỉ không được để trống";
     	}
     	
  
  
  //kiem tra mang error
   		if(empty($error))
   		{
   		$idinert=$db->insert("users",$data);
   		if($idinert > 0) {
   			$_SESSION['success'] ="Đăng ký thành công !Mời bạn đăng nhập";
   			header("location: dang-nhap.php");
   		}
   		else
   		{
 			$_SESSION['error']="đăng ký thất bại";
   		}
   		}
   	}
?>
<?php require_once ("layout/header.php"); ?>

                <div class="col-md-9 bor">
                     

                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Đăng ký thành viên</a> </h3>
                         <form action="" method="POST" role="form" class="form-horizontal formcustome" style="margin-top:20px;">
                    
                         
                         	<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Tên thành viên</label>
                        	<div class="col-md-8">
                        		<input type="text" name="name" placeholder="Ngọc Cường" class="form-control" value="<?php echo $data['name'] ?>">
                       <?php if( isset($error['name'])) : ?>
                        			<p class="text-danger"><?php echo $error['name'] ?></p>
                        		<?php endif ?>
                        	</div>
                         		</div>

													    
                         	<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Email</label>
                        	<div class="col-md-8">
                        		<input type="email" name="email" placeholder="admin@gmail.com" class="form-control" value="<?php echo $data['email'] ?>">
                        		  <?php if( isset($error['email'])) : ?>
                        			<p class="text-danger"><?php echo $error['email'] ?></p>
                        		<?php endif ?>
                        	</div>
                         		</div>
													   	<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Mật Khẩu</label>
                        	<div class="col-md-8">
                        		<input type="password" name="password" placeholder="******" class="form-control" value="<?php echo $data['password'] ?>">
                        		  <?php if( isset($error['password'])) : ?>
                        			<p class="text-danger"><?php echo $error['password'] ?></p>
                        		<?php endif ?>
                        	</div>
                         		</div>
													
													 	<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Phone</label>
                        	<div class="col-md-8">
                        		<input type="number" name="phone" placeholder="0365797021" class="form-control" value="<?php echo $data['phone'] ?>">
                        		  <?php if( isset($error['phone'])) : ?>
                        			<p class="text-danger"><?php echo $error['phone'] ?></p>
                        		<?php endif ?>
                        	</div>
                         		</div>
                         		 	<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Địa Chỉ</label>
                        	<div class="col-md-8">
                        		<input type="text" name="address" placeholder="Đà Nẵng" class="form-control" value="<?php echo $data['address'] ?>">
                        		  <?php if( isset($error['address'])) : ?>
                        			<p class="text-danger"><?php echo $error['address'] ?></p>
                        		<?php endif ?>
                        	</div>
                         		</div>
                
                         <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">Đăng ký</button>
                         	
                        
                         </form>
                         
                            </div>
                        </section>

             </div>
      <?php require_once ("layout/footer.php"); ?>

           