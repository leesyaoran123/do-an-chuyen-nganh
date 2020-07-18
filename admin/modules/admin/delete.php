 <?php
        $open ="admin";
        require_once ("../../autoload/autoload.php");
        require_once ("../../../libraries/Database.php");
        require_once("../../../libraries/Function.php");
        $db=new Database;
        $id=intval(getInput('id'));

        $DeleteAdmin =$db->fetchID("admin",$id);
        if(empty($DeleteAdmin))
        {
          $_SESSION['error'] ="du lieu khong ton tai";
          redirectAdmin("admin");
        }
        
        $num =$db->delete("admin",$id);
        if($num > 0)
        {
          $_SESSION['success']="xoa thanh cong";
          redirectAdmin("admin");
        }
        else
        {
          $_SESSION['error']="xoa that bai";
          redirectAdmin("admin");
        }
      
 

?> 