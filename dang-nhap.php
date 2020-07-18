<?php 
 require_once ("libraries/Database.php");
    require_once("libraries/Function.php");
require_once("autoload/autoload.php");
     $db = new Database;
      $category =$db->fetchAll("category");
        $sqlNew ="SELECT * FROM product where 1 ORDER BY ID DESC LIMIT 3";
     $productNew=$db->fetchsql($sqlNew);

      $data =[

           
            'email' => postInput("email"),
            'password' =>postInput("password")
            
           ] ;
       $error=[];  
       if($_SERVER["REQUEST_METHOD"]=="POST")
       {
			      if($data['email'] == '')
			     	{
			     		$error['email']="Email không được để trống";
			 		 	}
			     	if($data['password'] == '')
			     	{
			     		$error['password']="Mật khẩu Không được để trống";
			     	}    

   				  	if(empty($error))
				    	 	{
				     		$is_check =$db->fetchOne("users"," email = '".$data['email']."' AND password = '".($data['password'])."'");
				     	if($is_check!= NULL)
				     		{
				     			$_SESSION['name_user'] =$is_check['name'];
				     			$_SESSION['name_id'] =$is_check['id'];
				     			echo"<script >alert('Đăng nhập thành công ');location.href='index.php'</script>";
				     		}	
				     		else
				     		{
				     		$_SESSION['error']=" dang nhap that bai ";
				     		}
				     	} 
   	  }

?>
<?php require_once ("layout/header.php"); ?>

                <div class="col-md-9 bor">
                     

                        <section class="box-main1">
                            <h3 class="title-main"><a href="">Đăng nhập</a> </h3>
                            <?php if (isset($_SESSION['success'])): ?>
                            	<div class="alert alert-success" role="alert">
  															<STRONG style="color:#3c763d">Success!</STRONG>
  															<?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
															</div>
                            <?php endif ?>
                              <?php if (isset($_SESSION['error'])): ?>
                            	<div class="alert alert-danger" role="alert">
  															<STRONG style="">Error!</STRONG>
  															<?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
															</div>
                            <?php endif ?>
                               <form action="" method="POST" role="form" class="form-horizontal formcustome" style="margin-top:20px;">
                    
                         
                       

													    
                         	<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Email</label>
                        	<div class="col-md-8">
                        		<input type="email" name="email" placeholder="admin@gmail.com" class="form-control">
                        		  <?php if( isset($error['email'])) : ?>
                        			<p class="text-danger"><?php echo $error['email'] ?></p>
                        		<?php endif ?>
                        	</div>
                         		</div>
													   	<div class="form-group">
                         	
                         			 <label class="col-md-2 col-md-offset-1"> Mật Khẩu</label>
                        	<div class="col-md-8">
                        		<input type="number" name="password" placeholder="******" class="form-control">
                        		  <?php if( isset($error['password'])) : ?>
                        			<p class="text-danger"><?php echo $error['password'] ?></p>
                        		<?php endif ?>
                        	</div>
                         		</div>
													
												
                
                         <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">Đăng nhập</button>
                         	
                        
                         </form>
                         
                            </div>
                        </section>

             </div>
      <?php require_once ("layout/footer.php"); ?>

           