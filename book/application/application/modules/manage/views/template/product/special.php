  <div class="title"><span class="title_icon"><img src="<?php echo $baseurl;?>html/images/bullet1.gif" alt="" title=""></span>Sách đặc biệt</div>
    <?php foreach ( $data['data'] AS $el=>$le ){ ?>  
	<div class="feat_prod_box">
    
    	<div class="prod_img"><a href="<?php echo $baseurl.'san-pham/'.$le->maSanPham;?>.html"><img style="  height: 120px; width: 80px;" src="<?php echo $imgbase.$le->hinhAnh;?>" alt="" title="" border="0"></a></div>
        
        <div class="prod_det_box">
        	<span class="special_icon"><img src="<?php echo $baseurl;?>html/images/special_icon.gif" alt="" title=""/></span>
        	<div class="box_top"></div>
            <div class="box_center">
            <div class="prod_title"><?php echo $le->tenSanPham;?></div>
            <p class="details">Thông tin về sách</p>
            <a href="<?php echo $baseurl.'san-pham/'.$le->maSanPham;?>.html" class="more">- Chi tiết -</a>
            <div class="clear"></div>
            </div>
            
            <div class="box_bottom"></div>
        </div>    
    <div class="clear"></div>
    </div>	
    <?php } ?>
               
    
    <div class="pagination">
    <?php echo $this->pagination->create_links();?> 
    </div>   
             
    
<div class="clear"></div>
