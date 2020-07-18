<?php 

       $open="transaction";
        require_once ("../../autoload/autoload.php");
        require_once ("../../../libraries/Database.php");
        require_once("../../../libraries/Function.php");
        $db=new Database;
        $id=intval(getInput('id'));

        $DeleteAdmin =$db->fetchID("transaction",$id);
        if(empty($DeleteAdmin))
        {
          $_SESSION['error'] ="du lieu khong ton tai";
          redirectAdmin("transaction");
        }
        
        $num =$db->delete("transaction",$id);
        if($num > 0)
        {
          $_SESSION['success']="xoa thanh cong";
          redirectAdmin("transaction");
        }
        else
        {
          $_SESSION['error']="xoa that bai";
          redirectAdmin("transaction");
        }
 ?>