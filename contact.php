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
     	$data =[
     				"email"=>postInput("email"),
            "name" => postInput('name'),
           "content" => postInput("content"),
           ] ;
      if($_SERVER["REQUEST_METHOD"]=="POST")
     {
     
     			
           $error=[];     
            if(postInput('name')== '')
               {
                $error ['name'] = "moi ban nhap day du thong tin";
               } 
                 if(postInput('email')== '')
               {
                $error ['email'] = "moi ban nhap day du thong tin";
               } 
                 if(postInput('content')== '')
               {
                $error ['content'] = "moi ban nhap day du thong tin";
               } 
               if (empty($error))
               {
                   
                $id_insert=$db->insert("user_contact",$data);
               if($id_insert >0)
               {
                $_SESSION['success'] = 
                "Cảm ơn bạn đã quan tâm ! Chúng tôi sẽ sớm liên hệ  và phản hồi lại bạn";
                header("location:index.php");
               }
              
               }
      
        }

 
 ?>
 <?php require_once ("layout/header.php"); ?>
     <div class="col-md-9 ">
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3843.6210642220776!2d108.48747871467708!3d15.558431789198302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3169dd561e0ff2ed%3A0x1c350362b2572cd7!2zMzk4IEjDuW5nIFbGsMahbmcsIFBoxrDhu51uZyBBbiBTxqFuLCBUYW0gS-G7sywgUXXhuqNuZyBOYW0sIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1576594877725!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Contact Form</h2>
					<div class="space20">&nbsp;</div>
					
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="name" type="text" placeholder="Your Name (required)" value="<?php  echo $data['name'] ?>">
							 <?php if (isset($error['name'])): ?>
             		<span class="color-red"><i class="fa fa-bug">   <?php echo $error['name'] ?></i></span>
                <?php endif  ?>
                             
						</div>
						<div class="form-block">
							<input name="email" type="email" placeholder="Your Email (required)" value="<?php  echo $data['email'] ?>">
							 <?php if (isset($error['email'])): ?>
             		<span class="color-red"><i class="fa fa-bug">   <?php echo $error['email'] ?></i></span>
                <?php endif  ?>
						</div>
					
						<div class="form-block">
							<textarea name="content" placeholder="Your Message"><?php echo $data['content'] ?></textarea>
								 <?php if (isset($error['content'])): ?>
             		<span class="color-red"><i class="fa fa-bug">   <?php echo $error['content'] ?></i></span>
                <?php endif  ?>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>

			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
</div>
  <?php require_once ("layout/footer.php"); ?>
