  <?php
        require_once ("../libraries/Database.php");
            require_once("../libraries/Function.php");
   require_once("autoload/autoload.php");
   
     $db = new Database;
    $category =$db-> fetchAll("category");
  

?>  

 <!--Page Noi dung-->
<?php require_once ("../admin/layouts/header.php") ; ?>
           
            <div id="content-wrapper">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">xin chào admin</a>
                        </li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                  
                    <!-- Page Content -->
                    <h1>Admin Page</h1>
                    <hr>
                    <p>Welcome to Admin Pages.</p>
                </div>
                <!-- /.container-fluid -->
                <!-- Sticky Footer -->
   <?php require_once("../admin/layouts/footer.php"); ?>