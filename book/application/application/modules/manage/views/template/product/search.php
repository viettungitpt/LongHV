<div class="crumb_nav" style="border:none;">
<a href="<?php echo $baseurl;?>">Trang chủ</a>
</div>
<div class="crumb_nav">
Kết quả tìm kiếm từ khóa : <?php echo $txtsearch ? $txtsearch : '';?>
</div>
<div class="new_products">
<?php foreach ( $data AS $el=>$le ){ ?> 
    <div class="new_prod_box" style="width: 22.1%;">
        <a href="<?php echo $baseurl.'san-pham/'.$le->maSanPham;?>.html"><?php echo $le->tenSanPham;?></a>
        <div class="new_prod_bg">
        <a href="<?php echo $baseurl.'san-pham/'.$le->maSanPham;?>.html"><img style="height: 90px;" src="<?php echo $imgbase.$le->hinhAnh;?>" alt="" title="" class="thumb" border="0"></a>
        </div> 
<div style="cursor: pointer;" class="" onclick="addtocart(<?php echo $le->maSanPham;?>);">
			<img src="<?php echo $baseurl;?>html/images/order_now.gif" />
		</div> 		
    </div>
<?php } ?>                
 </div>  
<div class="clear"></div>