<?php 
 require_once ("libraries/Database.php");
    require_once("libraries/Function.php");
require_once("autoload/autoload.php");
     $db = new Database;
     $key=intval(getInput('key'));
     $qty=intval(getInput('qty'));
     $_SESSION['cart'][$key]['qty'] =$qty;
     echo 1;
 ?>