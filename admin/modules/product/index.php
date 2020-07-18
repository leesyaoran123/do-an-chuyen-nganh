  <?php
        $open="product";
        require_once ("../../../libraries/Database.php");
        require_once("../../../libraries/Function.php");
           require_once("../../autoload/autoload.php");
        $db=new Database;
   
        $product =$db-> fetchAll("product");
            // lenh phan trang
        if(isset($_GET['page']))
           {
            $p=$_GET['page'];
           } 
        else{
            $p=1;
        }   

        $sql="SELECT product.*,category.name as namecate FROM product
              LEFT JOIN category on category.id = product.category_id";
              $product =$db->fetchJone('product',$sql,$p,5,true);

              if(isset($product['page']))
              {
                $sotrang= $product['page'];
                unset($product['page']);
              }

?>  
 <!--Page Noi dung-->
<?php require_once("../../layouts/header.php") ; ?>
           
            <div id="content-wrapper">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">xin chào admin</a>
                        </li>
                        <li class="breadcrumb-item active">danh muc</li>
                        <li class="breadcrumb-item  ">
                            <a href="add.php">them moi</a>
                        </li>
                    </ol>
                   <div class="clearfix"></div>
                        <?php require_once("../../../partials/notification.php") ; ?>
                    <!-- Page Content -->
                  
                    
                </div>
                <div class="col-sm-12">
    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 197px;">STT</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 301px;">Name</th>
                 <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 144px;">Danh mục</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 144px;">Slug</th>
                 <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 144px;">Thunbar</th>
                 <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 144px;">Thông tin</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 71px;">Created</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 140px;">Action</th>
               
            </tr>
        </thead>
     
        <tbody>
            <?php $stt =1 ; foreach ($product as $item ) : ?>
            <tr role="row" class="odd">
                <td class="sorting_1"><?php echo $stt ?></td>
                <td><?php echo $item['name'] ?></td>
                 <td><?php echo $item['category_id'] ?></td>
                <td><?php echo $item['slug'] ?></td>
                <<td>
                    <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" width="80px" height="80px" alt="">
                </td>
                <td>
                    <ul>
                        <li> Giá :<?php echo $item['price'] ?></li>
                         <li> Số lượng :<?php echo $item['number'] ?></li>
                    </ul>
                </td>
              <td><?php echo $item['created_at'] ?></td>
                <td><a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?> ">Edit</a>
                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">Delete</a>
                </td>
               
            </tr>
        <?php $stt++ ;endforeach ?>
        </tbody>
    </table>
  </div>
    <div class="pull-right" style="float: right;">
        <nav aria-label="Page navigation example">
  <ul class="pagination" class="clearfix">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
         <?php for ($i =1;$i <= $sotrang; $i++) : ?>
            <?php
                if(isset($_GET['page']))
                {
                    $p=$_GET['page'];
                }
                else
                {
                    $p=1;
                }
            ?>
            <li class="<?php echo($i== $p) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?php echo $i ; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor ; ?>
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
    </div>
</div>
                <!-- /.container-fluid -->
                <!-- Sticky Footer -->
   <?php require_once("../../layouts/header.php"); ?>*