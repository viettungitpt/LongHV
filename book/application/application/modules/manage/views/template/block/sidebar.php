  <div class="cart">
      <div class="title"><span class="title_icon"><img src="<?php $baseurl;?>html/images/cart.gif" alt="" title=""></span>Giỏ hàng</div>
      <div class="home_cart_content">
      <?php echo $GioHangSoSanPham;?> x Cuốn <br/> <span class="red">Tổng tiền: <?php echo $GioHangTongSoTien;?> VNĐ</span>
      </div>
     <a href="<?php echo $baseurl;?>gio-hang.html" class="view_cart">Xem chi tiết giỏ hàng</a>
  
  </div>
             <div class="right_box">
             	<div class="title"><span class="title_icon"><img src="<?php $baseurl;?>html/images/bullet4.gif" alt="" title="" /></span>Khuyến mãi</div> 
                 <?php foreach ( $getSachKhuyenMai AS $el=>$le ){ ?>   
                    <div class="new_prod_box">
                        <a href="<?php echo $baseurl.'san-pham/'.$le->maSanPham;?>.html"><?php echo $le->tenSanPham;?></a>
                        <div class="new_prod_bg">
                        <span class="new_icon"><img src="<?php $baseurl;?>html/images/promo_icon.gif" alt="" title="" /></span>
                        <a href="<?php echo $baseurl.'san-pham/'.$le->maSanPham;?>.html"><img style="height: 90px;" src="<?php echo $imgbase.$le->hinhAnh;?>" alt="" title="" class="thumb" border="0" /></a>
						<span style="text-decoration: line-through;"><?php echo number_format($le->giaSanPham);?></span>
                        <span><?php echo number_format($le->giaSanPham*0.9);?> đ</span>
						</div>           
                    </div>
                <?php } ?>     
             </div>
             <div class="right_box" style="display: none;">
             
             	<div class="title"><span class="title_icon"><img src="<?php $baseurl;?>html/images/bullet5.gif" alt="" title="" /></span>Danh mục</div> 
                
                <ul class="list">
                <?php foreach ( $getDanhMucSanPham AS $el=>$le ){ ?>
                <li><a href="<?php echo $baseurl.'danh-muc/'.$le->maDanhMuc;?>.html"><?php echo $le->tenDanhMuc;?></a></li>
               	 <?php } ?>			
                </ul>
                
             	<div class="title"><span class="title_icon"><img src="<?php $baseurl;?>html/images/bullet6.gif" alt="" title="" /></span>Tác giả</div> 
                
                <ul class="list">
               <?php foreach ( $getDanhSachTacGia AS $el=>$le ){ ?> 
                    <li><a href="<?php echo $baseurl.'tac-gia/'.$le->maTacGia;?>.html"><?php echo $le->tenTacGia;?></a></li>
              <?php } ?> 			
                </ul>      
             
             </div>  
  