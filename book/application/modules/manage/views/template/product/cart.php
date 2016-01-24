  <?php 
if( !in_array($_SESSION['gio_hang'],array('',null)) ){
?>
            <div class="title"><span class="title_icon"><img src="<?php echo $baseurl;?>html/images/bullet1.gif" alt="" title=""></span>Giỏ hàng</div>
                  
        	<div class="feat_prod_box_details">

            <table class="cart_table">
            	<tbody><tr class="cart_title">
                	<td>Ảnh</td>
                	<td>Tên sách</td>
                    <td>Giá</td>
                    <td>Số lượng</td>
                    <td>Thành tiền</td>
					<td>Tác vụ</td>					
                </tr>
               
                <?php
					$i = 1 ;
					$tongtien = 0; $content_cart = '';
				    foreach( $_SESSION['gio_hang'] AS $el=>$le ){
					?> 
            	<tr>
                	<td><a href="<?php echo $baseurl;?>san-pham/<?php echo $le['product_id'];?>"><img style="height: 50px;width: 35px;" src="<?php echo $imgbase.$le['image'];?>" alt="" title="" border="0" class="cart_thumb"></a></td>
                	<td><?php echo $le['name'];?></td>
                    <td><?php echo number_format($le['price']);?> VNĐ</td>
                    <td><?php echo $le['qty'];?></td>
                    <td><?php echo number_format($le['price']*$le['qty']);?> VNĐ</td>
					<td onclick="DelCartItem(<?php echo $le['product_id'];?>)" class="delete-item">Xóa</td>					
                </tr>   
                <?php
                $content_cart .= 'Tên sản phẩm : '.$le['name'].' - Số lượng : '.$le['qty'].' - Số tiền : '.number_format($le['price']).' đ <br/>';
                
                 $i++; $tongtien += ($le['price']*$le['qty']);  } ?>
                <tr>
                <td colspan="4" class="cart_total"><span class="red">Tổng tiền:</span></td>
                <td> <?php echo number_format($tongtien);?> VNĐ</td>                
                </tr>  
            </tbody></table>
    
    <?php if ( !in_array($this->session->userdata('maNguoiDung'),array('',null)) ){ ?>
           
            <div class="contact_form">
        <div class="form_subtitle">Gửi đơn hàng</div>
        <?php $content_cart .= 'Tổng tiền thanh toán :'.number_format($tongtien).' đ'; ?>
        <?php if(validation_errors()):?>        
                      <?php echo validation_errors(); ?>
                <?php endif;?>
            
          <?php $attr = array('class' => 'stdform'); echo form_open('', $attr)?>     
          <input type="hidden" name="Cart" value="<?php echo $content_cart;?>" /> 
          
            <div class="form_row">
            <label class="contact"><strong>Tên khách hàng:</strong></label>
            <input type="text" class="contact_input" name="tenKH" value="<?php echo $this->session->userdata('hoTen') ? $this->session->userdata('hoTen') : '';?>" />
            </div>  


            <div class="form_row">
            <label class="contact"><strong>Số điện thoại:</strong></label>
            <input type="text" class="contact_input" name="soDienThoai" value="<?php echo $this->session->userdata('soDienThoai') ? $this->session->userdata('soDienThoai') : '';?>" />
            </div> 

            <div class="form_row">
            <label class="contact"><strong>Email:</strong></label>
            <input type="text" class="contact_input" name="emailKH" value="<?php echo $this->session->userdata('diaChiEmail') ? $this->session->userdata('diaChiEmail') : '';?>" />
            </div>


            <div class="form_row">
            <label class="contact"><strong>Địa chỉ nhận hàng:</strong></label>
            <input type="text" class="contact_input" name="diaChi" />
            </div>
            
            <div class="form_row">
            <label class="contact"><strong>Ghi chú:</strong></label>
            <input type="text" class="contact_input" name="ghiChu" />
            </div>
            
			<div class="form_row">
				<label class="contact"><strong>Kiểu thanh toán:</strong></label>
				<select name="type" class="type" style="width: 201px;">
					<option value="1">Tiền trong tài khoản</option>
					<option value="2">Sau khi chuyển hàng</option>
				</select>
            </div>
			
            <div class="form_row">
            <input type="submit" class="register" value="Gửi "/>
            </div>   
          </form>     
        </div> 
        <?php }else{ ?>
        <div style="margin-top: 10px;">
            Bạn cần đăng nhập để đặt hàng <a href="<?php $baseurl;?>dang-nhap.html">Đăng nhập tại đây</a>
        </div>
        
        <?php 
        } ?>
         
    
            
            </div>	
 
        <div class="clear"></div>


<?php } else{ 
    ?>
 <script>
	alert('Bạn chưa có sản phẩm nào trong giỏ hàng');
	window.location = '<?php echo $baseurl;?>';
 </script>
    <?php
 }
?> 

