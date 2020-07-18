<?php 
			 require_once ("../../autoload/autoload.php");
        require_once ("../../../libraries/Database.php");
        require_once("../../../libraries/Function.php");
        $db=new Database;
           $id=intval(getInput('id'));

        $EditTransaction =$db->fetchID("transaction",$id);
        if(empty($EditTransaction))
        {
          $_SESSION['error'] ="du lieu khong ton tai";
          redirectAdmin("transaction");
        }
        if($EditTransaction['status'] == 1)
        {
        	  $_SESSION['error'] ="Đơn hàng đã được xử lý !";
          redirectAdmin("transaction");
        
        }
        $status=1;
        $update =$db->update("transaction",array("status"=> $status),array("id"=> $id));
        	 if($update >0)
               {
                $_SESSION['success'] = 
                "cap nhat thanh cong";

                $sql="SELECT product_id,qty FROM orders Where transaction_id =$id";
                $Order=$db->fetchsql($sql);
                foreach($Order as $item){
                	$idproduct=intval($item['product_id']);
                	$product=$db->fetchID("product",$idproduct);
                	$number=$product['number'] - $item['qty'];
                	$up_pro=$db->update("product",array("number"=>$number,"pay"=>$product['pay']+1),array("id"=>$idproduct));
                }
   

                redirectAdmin("transaction");
               }
               else 
               {
                $_SESSION['error']="du lieu khong thay doi";
               }




 ?>