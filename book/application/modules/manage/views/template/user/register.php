    <div class="title"><span class="title_icon"><img src="<?php echo $baseurl;?>html/images/bullet1.gif" alt="" title=""></span>Đăng ký thành viên</div>

	<div class="feat_prod_box_details">
    <p class="details">
     Đăng ký để làm thành viên
    </p>
    
      	<div class="contact_form">
        <div class="form_subtitle">Tạo tài khoản mới</div>
        
        <?php if(validation_errors()):?>        
                      <?php echo validation_errors(); ?>
                <?php endif;?>
        
          <?php $attr = array('class' => 'stdform'); echo form_open('', $attr)?>     
            <div class="form_row">
            <label class="contact"><strong>Tên đăng nhập:</strong></label>
            <input type="text" class="contact_input" name="tenDangNhap" />
            </div>  


            <div class="form_row">
            <label class="contact"><strong>Mật khẩu:</strong></label>
            <input type="password" class="contact_input" name="matKhau" />
            </div> 

            <div class="form_row">
            <label class="contact"><strong>Email:</strong></label>
            <input type="text" class="contact_input" name="diaChiEmail" />
            </div>


            <div class="form_row">
            <label class="contact"><strong>Số điện thoại:</strong></label>
            <input type="text" class="contact_input" name="soDienThoai" />
            </div>
            
            <div class="form_row">
            <label class="contact"><strong>Công ty:</strong></label>
            <input type="text" class="contact_input" name="tenCongTy" />
            </div>
            
            <div class="form_row">
            <label class="contact"><strong>Địa chỉ:</strong></label>
            <input type="text" class="contact_input" name="diaChi" />
            </div>                    

            <div class="form_row">
                <div class="terms">
                <input type="checkbox" name="terms"/>
                Tôi chấp nhận với các <a href="#">quy định</a>của website</div>
            </div> 

            
            <div class="form_row">
            <input type="submit" class="register" value="Đăng ký"/>
            </div>   
          </form>     
        </div>  
    
  </div>	
<div class="clear"></div>
