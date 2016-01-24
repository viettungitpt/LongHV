    <div class="title"><span class="title_icon"><img src="<?php echo $baseurl;?>html/images/bullet1.gif" alt="" title=""></span>Thông tin cá nhân</div>

	<div class="feat_prod_box_details">
    <p class="details">
     Cập nhật thông tin cá nhân
    </p>
    
      	<div class="contact_form">
        <div class="form_subtitle">Thông tin của bạn</div>
        
        <?php if(validation_errors()):?>        
                      <?php echo validation_errors(); ?>
                <?php endif;?>
        
          <?php $attr = array('class' => 'stdform'); echo form_open('', $attr)?>     

            <div class="form_row">
            <label class="contact"><strong>Mật khẩu mới :</strong></label>
            <input type="password" class="contact_input" name="matKhau" />
            </div> 

            <div class="form_row">
            <label class="contact"><strong>Số điện thoại:</strong></label>
            <input type="text" class="contact_input" name="soDienThoai" value="<?php echo $data->soDienThoai;?>" />
            </div>
            
            <div class="form_row">
            <label class="contact"><strong>Công ty:</strong></label>
            <input type="text" class="contact_input" name="tenCongTy" value="<?php echo $data->tenCongTy;?>"  />
            </div>
            
            <div class="form_row">
            <label class="contact"><strong>Địa chỉ:</strong></label>
            <input type="text" class="contact_input" name="diaChi" value="<?php echo $data->diaChi;?>"  />
            </div>                    

            <div class="form_row">
            <input type="submit" class="register" value="Cập nhật"/>
            </div>   
          </form>     
        </div>  
    
  </div>	
<div class="clear"></div>
