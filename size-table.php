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

 ?>
 <?php require_once ("layout/header.php"); ?>
  <div class="col-md-9 bor">
	<p  style="text-align: center;">
		<img src="public/uploads/product/shoesize_chart.png" alt="">
	</p>
  </div>	
  <?php require_once ("layout/footer.php"); ?>