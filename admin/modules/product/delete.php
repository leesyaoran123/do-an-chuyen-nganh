 <?php
        $open ="category";
        require_once ("../../autoload/autoload.php");
        require_once ("../../../libraries/Database.php");
        require_once("../../../libraries/Function.php");
        $db=new Database;
        $id=intval(getInput('id'));

        $EditProduct =$db->fetchID("product",$id);
        if(empty($EditProduct))
        {
          $_SESSION['error'] ="du lieu khong ton tai";
          redirectAdmin("product");
        }
        
        $num =$db->delete("product",$id);
        if($num > 0)
        {
          $_SESSION['success']="xoa thanh cong";
          redirectAdmin("product");
        }
        else
        {
          $_SESSION['error']="xoa that bai";
          redirectAdmin("product");
        }
      
 

?> 