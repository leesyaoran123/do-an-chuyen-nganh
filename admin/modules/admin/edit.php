  <?php
        $open ="admin";
        require_once ("../../autoload/autoload.php");
        require_once ("../../../libraries/Database.php");
        require_once("../../../libraries/Function.php");
        $db=new Database;
           $id=intval(getInput('id'));

        $EditAdmin =$db->fetchID("admin",$id);
        if(empty($EditAdmin))
        {
          $_SESSION['error'] ="du lieu khong ton tai";
          redirectAdmin("admin");
        }
        
          $data =[

            "name" => postInput('name'),
         
             "address" => postInput("address"),
             "email" =>postInput("email"),
           	"password" =>postInput("password"),
            
              "phone" => postInput("phone"),
               "level" => postInput('name'),
           ] ;
        if ($_SERVER["REQUEST_METHOD"] =="POST" )
        {
         
           $error=[];     
            if(postInput('name')== '')
               {
                $error ['name'] = "moi ban nhap day du thong tin";
               } 
                   if(postInput('address')== '')
               {
                $error ['address'] = "moi ban nhap day du thong tin";
               }   

            
                if(postInput('email')== '')
               {
                $error ['email'] = "moi ban nhap day du thong tin";
               } 
                   
                if(postInput('phone')== '')
               {
                $error ['phone'] = "moi ban nhap day du thong tin";
               } 
               else{
                if(postInput("email") != $EditAdmin['email'])
               {
                 $is_check=$db->fetchOne("admin","email = '".$data['email']."'");
                if($is_check !=NULL)
                {
                     $error ['email'] = "Email đã  tồn tại";

                }
               }
               }    
               if(postInput('password')!= NULL &&("re_password") != NULL )
               {
                if(postInput('password') !=postInput('re_password'))
                {
                  $error['password']="Mật khẩu không khớp";
                }
                else
                {
                  $data['password'] = postInput("password");
                }
               }
            
               //error trong co nghia co loi
               if (empty($error))
               {
                   
                      $id_update=$db ->update("admin",$data,array("id"=>$id));
                      if($id_update > 0)
                      {
                      
                        $_SESSION['success']="Cập nhật thành công";
                        redirectAdmin("admin");
                      }   
                      else
                      {
                        $_SESSION['error']="Cập nhật thất bại";
                          redirectAdmin("admin");
                      }
                }
        }
 

?>    

 <!--Page Noi dung-->
<?php require_once ("../../layouts/header.php") ; ?>
           
            <div id="content-wrapper">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href=" ">Dashboard</a>
                        </li>
                         <li class="breadcrumb-item">
                            <a href="index.php">Admin</a>
                        </li>
                        <li class="breadcrumb-item active">Them moi</li>
                    </ol>
                   <div class="clearfix"></div>
                     <?php require_once("../../../partials/notification.php") ; ?>
                    <!-- Page Content -->
                  <div class="row">
                        <div class="col-md-12">
                            <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                                                
                          
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và tên</label>
                            <div class="col-md-7">
                                 <input type="text" class="form-control" id="exampleInputEmail1"   name="name" value="<?php echo $EditAdmin['name'] ?>">
                             <?php if (isset($error['name'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['name'] ?>
                                 </p>
                             <?php endif ?>
                             
                      
                            </div>
                           
                          
                        </div>
                        <div class="form-group">
                            <label for="InputEmail1">Email</label>
                            <div class="col-md-7">
                                 <input type="email" class="form-control" id="exampleInputEmail1"   name="email" value="<?php echo $EditAdmin['email'] ?>">
                             <?php if (isset($error['email'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['email'] ?>
                                 </p>
                             <?php endif ?>
                             
                      
                            </div>
                           
                            <div class="form-group">
                            <label for="InputEmail1">Phone</label>
                            <div class="col-md-7">
                                 <input type="number" class="form-control" id="exampleInputEmail1" placeholder="0585233385"  name="phone" value="<?php echo $EditAdmin['phone'] ?>">
                             <?php if (isset($error['phone'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['phone'] ?>
                                 </p>
                             <?php endif ?>
                             
                      
                            </div>
                           
                          
                        </div>
                           <div class="form-group">
                            <label for="InputEmail1">Password</label>
                            <div class="col-md-7">
                                 <input type="password" class="form-control" id="exampleInputEmail1" placeholder="********"  name="password">
                             <?php if (isset($error['password'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['password'] ?>
                                 </p>
                             <?php endif ?>
                             
                      
                            </div>
                           
                          
                        </div>
                             <div class="form-group">
                            <label for="InputEmail1">ConfigPassword</label>
                            <div class="col-md-7">
                                 <input type="password" class="form-control" id="exampleInputEmail1" placeholder="********"  name="re_password">
                             <?php if (isset($error['re_password'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['re_password'] ?>
                                 </p>
                             <?php endif ?>
                             
                      
                            </div>
                           
                            <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <div class="col-md-7">
                                 <input type="text" class="form-control" id="exampleInputEmail1"   name="address" value="<?php echo $EditAdmin['address'] ?>">
                             <?php if (isset($error['name'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['address'] ?>
                                 </p>
                             <?php endif ?>
                             
                      
                            </div>
                           
                          
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Level</label>
                            <div class="col-md-7">
                               <select class="form-control">
                                 <option value="1" <?php echo isset($EditAdmin['level'] )&& $EditAdmin['level'] ==1 ? "selected ='selected'" : '' ?>>CTV</option>
                                 <option value="2" <?php echo isset($EditAdmin['level'] )&& $EditAdmin['level'] ==2 ? "selected ='selected'" : '' ?>>Admin</option>

                                 
                               </select>
                             <?php if (isset($error['level'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['level'] ?>
                                 </p>
                             <?php endif ?>
                             
                      
                            </div>
                           
                          
                        </div>
                      
                      
                       
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                   </div>
                </div>
                <!-- /.container-fluid -->
                <!-- Sticky Footer -->
   <?php require_once ("../../layouts/footer.php"); ?>