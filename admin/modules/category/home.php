<?php 
 			 $open ="category";
        require_once ("../../autoload/autoload.php");
        require_once ("../../../libraries/Database.php");
        require_once("../../../libraries/Function.php");
        $db=new Database;
        $id=intval(getInput('id'));


        $EditCategory =$db->fetchID("category",$id);
        if(empty($EditCategory))
        {
          $_SESSION['error'] ="du lieu khong ton tai";
          redirectAdmin("category");
        }

        $home =$EditCategory['home'] ==0 ? 1 : 0;

        $update =$db->update("category",array("home"=> $home),array("id"=> $id));
        	 if($update >0)
               {
                $_SESSION['success'] = 
                "cap nhat thanh cong";
                redirectAdmin("category");
               }
               else 
               {
                $_SESSION['error']="du lieu khong thay doi";
               }
 ?>