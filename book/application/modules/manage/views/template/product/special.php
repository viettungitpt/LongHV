<div class="crumb_nav">
<a href="<?php echo $baseurl;?>">Trang chủ</a> &gt;&gt; Sách đặc biệt
</div>
<div class="new_products">
<?php foreach ( $data['data'] AS $el=>$le ){ ?> 
    <div class="new_prod_box" style="width: 22.1%;">
        <a href="<?php echo $baseurl.'san-pham/'.$le->maSanPham;?>.html"><?php echo $le->tenSanPham;?></a>
        <div class="new_prod_bg">
        <a href="<?php echo $baseurl.'san-pham/'.$le->maSanPham;?>.html"><img style="height: 90px;" src="<?php echo $imgbase.$le->hinhAnh;?>" alt="" title="" class="thumb" border="0"></a>
        </div>
		<div><span><?php echo number_format($le->giaSanPham);?> đ</span></div>
<div style="cursor: pointer;" class="" onclick="addtocart(<?php echo $le->maSanPham;?>);">
			<img src="<?php echo $baseurl;?>html/images/order_now.gif" />
		</div> 		
    </div>
<?php } ?>                
<div class="pagination">
     <?php echo $this->pagination->create_links();?> 
</div>  
</div>  
<div class="clear"></div>

