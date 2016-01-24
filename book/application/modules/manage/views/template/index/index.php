
<div class="crumb_nav">
<a href="<?php echo $baseurl;?>sach-moi-nhat.html">Sách mới nhất</a>
</div>
<div class="new_products">
<?php foreach ( $data['moinhat'] AS $el=>$le ){ ?> 
    <div class="new_prod_box" style="width: 22.1%;">
        <a href="<?php echo $baseurl.'san-pham/'.$le->maSanPham;?>.html"><?php echo $le->tenSanPham;?></a>
        <div class="new_prod_bg">
        <a alt="<?php echo $le->tenSanPham.','.$le->tenTacGia;?>" href="<?php echo $baseurl.'san-pham/'.$le->maSanPham;?>.html"><img style="height: 90px;" src="<?php echo $imgbase.$le->hinhAnh;?>" alt="" title="" class="thumb" border="0"></a>
        </div>
		<div><span><?php echo number_format($le->giaSanPham);?> đ</span></div>
		<div style="cursor: pointer;" class="" onclick="addtocart(<?php echo $le->maSanPham;?>);">
			<img src="<?php echo $baseurl;?>html/images/order_now.gif" />
		</div> 
    </div>
<?php } ?>                
 </div>  
<div class="clear"></div>
<div class="crumb_nav">
<a href="<?php echo $baseurl;?>sach-khuyen-mai.html">Sách khuyến mại</a>
</div>
<div class="new_products">
<?php foreach ( $data['khuyenmai'] AS $el=>$le ){ ?> 
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
 </div>  
<div class="clear"></div>
<div class="crumb_nav">
<a href="<?php echo $baseurl;?>sach-dac-biet.html">Sách đặc biệt</a>
</div>
<div class="new_products">
<?php foreach ( $data['dacbiet'] AS $el=>$le ){ ?> 
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
 </div>  
<div class="clear"></div>