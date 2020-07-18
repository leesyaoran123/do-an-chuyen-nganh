<?php 

	require_once ("libraries/Database.php");
   require_once("libraries/Function.php");
		require_once("autoload/autoload.php");

     $db = new Database;
      $category =$db->fetchAll("category");
      
      if(!isset($_SESSION['name_id']))
      {
      	echo"<script >alert('Bạn phải đăng nhập mới thực hiện được chức năng này! ');location.href='index.php'</script>";
      }

          $id=intval(getInput('id'));
         $product =$db->fetchID("product",$id);

     			//kiem tra neu ton tai gio hang thi cap nhat lai gio hang
     			//nguoc lai thi tao moi
     			if(! isset($_SESSION['cart'][$id]))
     			{
     				//tao moi gio hang
     				$_SESSION['cart'][$id]['name'] = $product['name'];
     				$_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
     			//	$_SESSION['cart'][$id]['price'] = $product['price'];
     				$_SESSION['cart'][$id]['qty'] = 1;
     				$_SESSION['cart'][$id]['price']  =((100 - $product['sale'] )* $product['price'])/100;
     				
     				
     			}
     			else
     			{
     					$_SESSION['cart'][$id]['qty'] += 1;
     			}
     				echo "<script >alert('Thêm sản phẩm thành công! ');location.href='gio-hang.php'</script>";
 ?>