  <?php
        $open ="category";
        require_once ("../../autoload/autoload.php");
        require_once ("../../../libraries/Database.php");
        require_once("../../../libraries/Function.php");
        $db=new Database;
        
        if ($_SERVER["REQUEST_METHOD"] =="POST" )
        {
           $data =[

            "name" => postInput('name'),
            "slug" => to_slug(postInput("name"))
           ] ;
           $error=[];     
            if(postInput('name')== '')
               {
                $error ['name'] = "moi ban nhap day du thong tin";
               } 
               if (empty($error))
               {
                    $isset=$db->fetchOne("category"," name ='".$data['name']."' ");
                    if(count($isset)>0)
                    {
                        $_SESSION['error']="ten danh muc da ton tai";
                    }
                else{
                $id_insert=$db->insert("category",$data);
               if($id_insert >0)
               {
                $_SESSION['success'] = 
                "them thanh cong";
                redirectAdmin("category");
               }
               else 
               {
                $_SESSION['error']="them that bai";
               }
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
                            <a href="index.html">Dashboard</a>
                        </li>
                         <li class="breadcrumb-item">
                            <a href="">Danh muc</a>
                        </li>
                        <li class="breadcrumb-item active">Them moi</li>
                    </ol>
                   <div class="clearfix"></div>
                     <?php require_once("../../../partials/notification.php") ; ?>
                    <!-- Page Content -->
                  <div class="row">
                        <div class="col-md-12">
                            <form method="POST" class="form-horizontal" action="">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten danh muc</label>
                            <div class="col-md-7">
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ten danh muc"  name="name">
                             <?php if (isset($error['name'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['name'] ?>
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