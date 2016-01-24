<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>SIÊU THỊ SÁCH ONLINE</title>
	<base href="<?php echo $baseurl;?>" />
	<link rel="icon" href="<?php echo $baseurl;?>html/images/icon-book.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php $baseurl;?>html/style.css" />
	<script type="text/javascript" src="<?php echo $baseurl;?>html/js/jquery-1.7.2.min.js"></script> 
</head>
<body>
<div id="wrap">
	<div class="header">
		<?php $this->load->view('template/block/header');?>
	<div class="center_content">
	<div class="left_content">
		  <?php $this->load->view("template/".($controller ? $controller : 'index')."/".($action ? $action : 'index'),'');?>
	</div><!--end of left content-->
	 <div class="right_content">
		  <?php $this->load->view('template/block/sidebar');?>             
	</div><!--end of right content-->
	<div class="clear"></div>
	</div><!--end of center content-->

	<div class="footer">
		<?php $this->load->view('template/block/footer');?>  
	</div>
</div>
</div>
</body>
</html>
<script>
function addtocart(product_id){
	$.ajax({
            type:"GET",
            url: '<?php $baseurl;?>ajax-add-to-cart',
            data:{   
                product_id : product_id,
                quantity : 1
			},
            success:function(data){
                if(data == '200'){
                    alert('Thêm vào giỏ hàng thành công');
					//window.location = '<?php echo $baseurl;?>gio-hang.html';
                }else{
                   alert('Lỗi thêm vào giỏ hàng');
                }
			}
		});
}
	    

 </script>
 <script>
function DelCartItem(product_id){
	  $.ajax({
            type:"GET",
            url: '<?php $baseurl;?>ajax-del-cart-item',
            data:{   
                product_id : product_id
			},
            success:function(data){
                if(data == '200'){
                    alert('Xóa sản phẩm thành công');
					window.location = '<?php $baseurl;?>gio-hang.html';
					return false;    
                }else{
                   alert('Lỗi xóa giỏ hàng');
                }
			}
    });
}
</script>
