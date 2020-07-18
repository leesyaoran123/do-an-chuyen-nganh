  </div>
   
                <div class="container-pluid">
                <section id="footer">
                    <div class="container">
                        <div class="col-md-3" id="shareicon">
                            <ul>
                                <li>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8" id="title-block">
                            <div class="pull-left">
                                
                            </div>
                            <div class="pull-right">
                                
                            </div>
                        </div>
                       
                    </div>
                </section>
                <section id="footer-button">
                    <div class="container-pluid">
                        <div class="container">
                            <div class="col-md-3" id="ft-about">
                                
                                <p>Book Education là cửa hàng bán sách học ngoại ngữ được mở vào năm 2020 do Hoàng Ngọc Cường làm ra</p>
                            </div>
                            <div class="col-md-3 box-footer" >
                                <h3 class="tittle-footer">GET HELP</h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Order Status</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Liên hệ </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i>  Contact </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Retturns </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Giới thiệu</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 box-footer">
                                <h3 class="tittle-footer">ABOUT SHOP</h3>
                               <ul>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> News</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Careers</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i>  Sustainability </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Investors</a>
                                    </li>
                                  
                                </ul>
                            </div>
                            <div class="col-md-3" id="footer-support">
                                <h3 class="tittle-footer"> Liên hệ</h3>
                                <ul>
                                    <li>
                                        
                                        <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> 123 Nguyễn Lương Bằng, Đà Nẵng </p>
                                        <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 012345678</p>
                                        <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> support@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="ft-bottom">
                    <p class="text-center">2020 </p>
                </section>
            </div>
        </div>      
    </div>
            </div>      
        </div>
   </div>
    <script  src="<?php echo base_url() ?> frontend/js/slick.min.js"></script>

    </body>
        
</html>

<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })


    $(function(){
        $updatecart=$(".updatecart");
        $updatecart.click(function(e) {
          e.preventDefault();
          $qty=$(this).parents("tr").find("#qty").val();

          $key=$(this).attr("data-key");
          $.ajax({
            url: 'cap-nhat-gio-hang.php',
            type: 'GET',
            data: {'qty':$qty,'key':$key},
            success:function(data)
            {
                if(data==1)
                {
                    alert("Cập nhật giỏ hang thành công");
                    location.href="gio-hang.php";
                }
            }

          });
        })
    })

</script>
  