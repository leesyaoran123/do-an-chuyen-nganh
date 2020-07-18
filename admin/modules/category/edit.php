  <?php
        $open ="category";
        require_once ("../../autoload/autoload.php");
        require_once ("../../../libraries/Database.php");
        require_once("../../../libraries/Function.php");
        $db=new Database;
        $id=intval(getInput('id'));

        $EditCategory =$db->fetchID("category",$id);
        if(empty($EditCategory))
        {
          $_SESSION['error'] ="du lieu khong ton tai";
          redirectAdmin("category");
        }
        
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

               //error trong co nghia k co loi
               
               if (empty($error))
               {
                if($EditCategory['name'] !=$data['name'])
                {

                

                    $isset=$db->fetchOne("category"," name ='".$data['name']."' ");
                    if(count($isset)>0)
                    {
                        $_SESSION['error']="ten danh muc da ton tai";
                    }
                else{
                $id_update=$db->update("category",$data,array("id"=>$id));
               if($id_update >0)
               {
                $_SESSION['success'] = 
                "cap nhat thanh cong";
                redirectAdmin("category");
               }
               else 
               {
                $_SESSION['error']="du lieu khong thay doi";
               }
              }
          }
          else
           {
              $id_update=$db->update("category",$data,array("id"=>$id));
               if($id_update >0)
               {
                $_SESSION['success'] = 
                "cap nhat thanh cong";
                redirectAdmin("category");
               }
               else 
               {
                $_SESSION['error']="du lieu khong thay doi";
                  redirectAdmin("category");
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
                        <li class="breadcrumb-item active">them moi</li>
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
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ten danh muc"  name="name" value="<?php echo $EditCategory['name']?>">
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