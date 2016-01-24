<style>
#vote{
	  padding: 10px;
}
</style>
<input type="hidden" class="product_id" value="<?php echo $data->maSanPham;?>" />

	<div class="crumb_nav">
    <a href="<?php $baseurl;?>">Trang chủ</a> &gt;&gt; <?php echo $data->tenSanPham;?>
    </div>
    <div class="title"><span class="title_icon"><img src="<?php $baseurl;?>html/images/bullet1.gif" alt="" title=""></span><?php echo $data->tenSanPham;?></div>
	<div class="feat_prod_box_details">
    	<div class="prod_img"><a><img style="width: 100px;height:150px;" src="<?php echo $imgbase.$data->hinhAnh;?>" alt="" title="" border="0"/></a>
        <br><br>
        <a href="<?php echo $imgbase.$data->hinhAnh;?>" rel="lightbox"><img src="<?php $baseurl;?>html/images/zoom.gif" alt="" title="" border="0"></a>
        </div>
        
        <div class="prod_det_box">
        	<div class="box_top"></div>
            <div class="box_center">
            <div class="prod_title">Chi tiết sách</div>
            <p class="details">Tác giả: <?php echo $data->tenTacGia;?><br></p>
			<p class="details">Nhà xuất bản: <?php echo $data->tenNhaXuatBan;?><br></p>
			<p class="details">Trạng thái sách: <?php if( $data->soLuong <= $getSoLuongDaBan ){ echo 'Hết hàng';}else{ echo 'Còn hàng';} ?><br></p>
            <div class="price"><strong>Giá:</strong> <span class="red"><?php echo number_format($data->giaSanPham);?> VNĐ</span></div>
            
            <a class="more order-book"><img src="<?php $baseurl;?>html/images/order_now.gif" alt="" title="" border="0"/></a>
            <div class="clear"></div>
            </div>
            
            <div class="box_bottom"></div>
        </div>    
    <div class="clear"></div>
    </div>	
    
	
	<div id="vote">
		<p>Kết quả bình chọn</p>
		1 sao : <?php echo $soSao['1sao'];?> lượt<br/>
		2 sao : <?php echo $soSao['2sao'];?> lượt<br/>
		3 sao : <?php echo $soSao['3sao'];?> lượt<br/>
		4 sao : <?php echo $soSao['4sao'];?> lượt<br/>
		5 sao : <?php echo $soSao['5sao'];?> lượt<br/>
		<?php if( $checkvote == 0 ){ ?> 
		<p>Bạn hãy bình chọn cho cuốn sách này</p>
		 <?php $attr = array('class' => 'stdform'); echo form_open('', $attr)?>
			<select name="vote" class="vote">
				<option value="1">1 sao</option>
				<option value="2">2 sao</option>
				<option value="3">3 sao</option>
				<option value="4">4 sao</option>
				<option value="5">5 sao</option>
			</select>
			<input type="hidden" name="pid" value="<?php echo $data->maSanPham;?>"/>
			<input type="submit" name="submit" value="Gửi"/>
		</form>
		<?php }else{ 
		  if( $checkvote == 1 && !in_array($this->session->userdata('maNguoiDung'),array('',null)) ){
		      echo '<p>Bạn đã bình chọn cho cuốn sách này rồi</p>';
		  }else{
		      echo 'Bạn vui lòng đăng nhập để bình chọn.';
		  }
          
		} ?>
	</div>
	
      
    <div id="demo" class="demolayout">

        <ul id="demo-nav" class="demolayout">
        <li><a class="active" >Thông tin về sách</a></li>
        </ul>

	
		
		
    <div class="tabs-container">
    
            <div style="display: block;  padding: 10px;" class="tab" id="tab1">
                                <p class="more_details">
                                <?php echo $data->noiDung;?>
                                  </p>                           
            </div>	
            
                   	
    
    </div>
	</div>
<div class="clear"></div>

<div class="crumb_nav">
    Sách liên quan
    </div>
<div class="new_products">
	<?php foreach ($sachLienQuan AS $el=>$le){ ?>
    <div class="new_prod_box">
        <a href="<?php echo $baseurl;?>/san-pham/<?php echo $le->maSanPham;?>.html"><?php echo $le->tenSanPham;?></a>
        <div class="new_prod_bg">
        <a href="<?php echo $baseurl;?>san-pham/<?php echo $le->maSanPham;?>.html"><img style="height: 90px;" src="<?php echo $imgbase;?><?php echo $le->hinhAnh;?>" alt="" title="" class="thumb" border="0"></a>
        </div> 
<div style="cursor: pointer;" class="" onclick="addtocart(<?php echo $le->maSanPham;?>);">
			<img src="<?php echo $baseurl;?>html/images/order_now.gif" />
		</div> 		
    </div>
      <?php } ?>   
<div class="pagination">
      
</div>  
</div>



<script>
$(".order-book").click(function(){
	  var product_id = $(".product_id").val();
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
    }) // end ajax
	  return false;
 })
 </script>

