  <?php
        $open ="category";
        require_once ("../../autoload/autoload.php");
        require_once ("../../../libraries/Database.php");
        require_once("../../../libraries/Function.php");
        $db=new Database;
        //danh muc san pham
        $category=$db->fetchAll("category");
        if ($_SERVER["REQUEST_METHOD"] =="POST" )
        {
           $data =[

            "name" => postInput('name'),
            "slug" => to_slug(postInput("name")),
             "category_id" => postInput("category_id"),
             "price" =>postInput("price"),
             "number" =>postInput("number"),
              "content" => postInput("content"),
           ] ;
           $error=[];     
            if(postInput('name')== '')
               {
                $error ['name'] = "moi ban nhap day du thong tin";
               } 

               if(postInput('category_id')== '')
               {
                $error ['category_id'] = "moi ban nhap day du thong tin";
               }
                if(postInput('price')== '')
               {
                $error ['price'] = "moi ban nhap day du thong tin";
               } 
                 if(postInput('content')== '')
               {
                $error ['content'] = "moi ban nhap day du thong tin";
               }     
                if(postInput('number')== '')
               {
                $error ['number'] = "moi ban nhap day du thong tin";
               }     
               if(! isset($_FILES['thunbar']))
               {
                $error['thunbar']="mời bạn chọn hình ảnh";
               }




               //error trong co nghia co loi
               if (empty($error))
               {
                   if(isset ($_FILES['thunbar']))
                   {
                    $file_name= $_FILES['thunbar']['name'];
                    $file_tmp= $_FILES['thunbar']['tmp_name'];
                    $file_type= $_FILES['thunbar']['type'];
                    $file_erro= $_FILES['thunbar']['error'];

                    if($file_erro == 0)
                    {
                      $part=ROOT ."product/";
                      $data['thunbar']=$file_name;
                    }
                   }
                      $id_insert=$db ->insert("product",$data);
                      if($id_insert)
                      {
                        move_uploaded_file($file_tmp, $file_name);
                        $_SESSION['success']="thêm mới thành công";
                        redirectAdmin("product");
                      }   
                      else
                      {
                        $_SESSION['error']="thêm mới thất bại";
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
                            <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                         <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                            <div class="col-md-7">
                               <select class="form-control col-sm-12" name="category_id">
                                 <option value="">-Mời bạn chọn</option>
                                 <?php foreach ($category as $item):?>
                                 <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                 <?php endforeach ?>
                               </select>
                             <?php if (isset($error['category_id'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['category_id'] ?>
                                 </p>
                             <?php endif ?>
                             
                      
                            </div>
                           
                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ten san pham</label>
                            <div class="col-md-7">
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ten san pham"  name="name">
                             <?php if (isset($error['name'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['name'] ?>
                                 </p>
                             <?php endif ?>
                             
                      
                            </div>
                           
                          
                        </div>
                        <div class="form-group">
                            <label for="InputEmail1">Gia san pham</label>
                            <div class="col-md-7">
                                 <input type="number" class="form-control" id="exampleInputEmail1" placeholder="900000"  name="price">
                             <?php if (isset($error['price'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['price'] ?>
                                 </p>
                             <?php endif ?>
                             
                      
                            </div>
                           
                            <div class="form-group">
                            <label for="InputEmail1">Số lượng</label>
                            <div class="col-md-7">
                                 <input type="number" class="form-control" id="exampleInputEmail1" placeholder="5"  name="number">
                             <?php if (isset($error['number'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['number'] ?>
                                 </p>
                             <?php endif ?>
                             
                      
                            </div>
                           
                          
                        </div>
                          <div class="form-group">
                            <label for="InputEmail1">Giam gia</label>
                            <div class="col-md-7">
                                 <input type="number" class="form-control" id="exampleInputEmail1" placeholder="10%"  name="sale" value="0">
                                                 
                              </div>
                                <label for="InputEmail1">Hình ảnh</label>  
                                 <div class="col-md-7">
                                 <input type="file" class="form-control" id="exampleInputEmail1" name="thunbar">
                                     <?php if (isset($error['thunbar'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['thunbar'] ?>
                                 </p>
                             <?php endif ?>             
                              </div>

                          </div>
                         <div class="form-group">
                            <label for="InputEmail1">Nội dung</label>
                            <div class="col-md-7">
                               <textarea class="form-control" name="content" rows="4"></textarea>
                             <?php if (isset($error['content'])): ?>
                                 <p class="text-danger">
                                     <?php echo $error['content'] ?>
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