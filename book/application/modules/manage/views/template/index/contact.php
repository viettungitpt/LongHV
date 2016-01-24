    <div class="title"><span class="title_icon"><img src="<?php echo $baseurl;?>html/images/bullet1.gif" alt="" title=""/></span>Liên hệ</div>

	<div class="feat_prod_box_details">
    <p class="details">
    Liên hệ với chúng tôi
    </p>
     <?php if(validation_errors()):?>        
          <?php echo validation_errors(); ?>
    <?php endif;?>
      	<div class="contact_form">
        <div class="form_subtitle">Thông tin</div>          
         <?php $attr = array('class' => 'stdform'); echo form_open('', $attr)?>
            <div class="form_row">
            <label class="contact"><strong>Tên của bạn:</strong></label>
            <input type="text" class="contact_input" name="HoTen" />
            </div>  

            <div class="form_row">
            <label class="contact"><strong>Email:</strong></label>
            <input type="text" class="contact_input" name="Email" />
            </div>


            <div class="form_row">
            <label class="contact"><strong>Số điện thoại:</strong></label>
            <input type="text" class="contact_input" name="DienThoai" />
            </div>
            
            <div class="form_row">
            <label class="contact"><strong>Địa chỉ:</strong></label>
            <input type="text" class="contact_input" name="DiaChi" />
            </div>

            <div class="form_row">
            <label class="contact"><strong>Tiêu đề:</strong></label>
            <input type="text" class="contact_input" name="TieuDe" />
            </div>
                
            <div class="form_row">
            <label class="contact"><strong>Tin nhắn:</strong></label>
			
            <textarea class="contact_textarea" name="NoiDungLienHe"></textarea>
            </div>
            <div class="form_row" style="margin-left: 80px;">
            <input style="margin-left: 20px;" type="submit" class="register" value="Gửi"/>                   
            </div>
            </form>      
        </div>  
  </div>	           
<div class="clear"></div>


