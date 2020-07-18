  <?php
        $open="transaction";
        require_once ("../../../libraries/Database.php");
        require_once("../../../libraries/Function.php");
           require_once("../../autoload/autoload.php");
        $db=new Database;
   
       
            // lenh phan trang
        if(isset($_GET['page']))
           {
            $p=$_GET['page'];
           } 
        else{
            $p=1;
        }   

        $sql="SELECT transaction.*,users.name as nameuser,users.phone as phoneuser FROM transaction LEFT JOIN users ON users.id=transaction.users_id ORDER BY ID DESC ";
             
              $transaction =$db->fetchJone('transaction',$sql,$p,4,true);

              if(isset($transaction['page']))
              {
                $sotrang= $transaction['page'];
                unset($transaction['page']);
              }

?>  
 <!--Page Noi dung-->
<?php require_once("../../layouts/header.php") ; ?>
           
            <div id="content-wrapper">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                    
                        <li class="breadcrumb-item active">danh sách đơn hàng</li>
                       
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
                 <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 301px;">Phone</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 301px;">Note</th>
                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 301px;">Tổng Tiền</th>

                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 301px;">Status</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 140px;">Action</th>
               
            </tr>
        </thead>
     
        <tbody>
            <?php $stt =1 ; foreach ($transaction as $item ) : ?>
            <tr role="row" class="odd">
                <td class="sorting_1"><?php echo $stt ?></td>
                <td><?php echo $item['nameuser'] ?></td>
                <td><?php echo $item['phoneuser'] ?></td>
                 <td><?php echo $item['note'] ?></td>
                  <td><?php echo $item['amount'] ?></td>
                <td>
                  <a href="status.php?id=<?php echo $item ['id'] ?>" class="btn btn-xs <?php echo $item['status'] == 0 ? 'btn-danger' : 'btn-info' ?>"><?php echo $item['status'] == 0 ? 'Chưa Xử Lý ' :'Đã Xử Lý' ?></a>
                </td>
                <td>
                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">Delete</a>
                </td>
               
            </tr>
        <?php $stt++ ;endforeach ?>
        </tbody>
    </table>
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