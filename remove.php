<?php 
 require_once ("libraries/Database.php");
    require_once("libraries/Function.php");
require_once("autoload/autoload.php");
     $db = new Database;
     $key=intval(getInput('key'));
     unset($_SESSION['cart'][$key]);
     $_SESSION['success']="Xóa sảm phẩm giỏ hàng thành công!";
     header("location:gio-hang.php");



 ?>