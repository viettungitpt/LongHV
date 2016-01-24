<div class="title"><span class="title_icon"><img src="<?php echo $baseurl;?>html/images/bullet1.gif" alt="" title=""></span>My account</div>
	<div class="feat_prod_box_details">
	<p class="details">
	 Đăng nhập và mua sách
	</p>
	 <?php if(validation_errors()):?>        
		  <?php echo validation_errors(); ?>
	<?php endif;?>
		<div class="contact_form">
		<div class="form_subtitle">Đăng nhập</div>
		  <?php $attr = array('class' => 'stdform'); echo form_open('', $attr)?>      
			<div class="form_row">
			<label class="contact"><strong>Tên đăng nhập:</strong></label>
			<input name="tenDangNhap" type="text" class="contact_input"/>
			</div>  
			<div class="form_row">
			<label class="contact"><strong>Mật khẩu:</strong></label>
			<input name="matKhau" type="password" class="contact_input"/>
			</div>                     
			<div class="form_row">
				<div class="terms">
				<input type="checkbox" name="terms"/>
				Lưu mật khẩu
				</div>
			</div> 
			<div class="form_row">
			<input type="submit" class="register" value="Đăng nhập"/>
			</div>   
		  </form>     
		</div>  
	</div>	
<div class="clear"></div>
