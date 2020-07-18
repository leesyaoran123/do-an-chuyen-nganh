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
        //kiem tra danh muc có sản phẩm tồn tại k
        //
        
        $is_product =$db->fetchOne("product","category_id=$id ");

        if($is_product == NULL)
        {
            $num =$db->delete("category",$id);
        if($num > 0)
        {
          $_SESSION['success']="xoa thanh cong";
          redirectAdmin("category");
        }
        else
        {
          $_SESSION['error']="xoa that bai";
          redirectAdmin("category");
        }
        }
        else
        {
          $_SESSION['error']="Danh mục có sản phẩm";
          redirectAdmin("category");
        }

      
      
 

?> 