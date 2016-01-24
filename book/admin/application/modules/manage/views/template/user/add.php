<div class="breadcrumbwidget">
	<ul class="skins">
        <li><a href="default" class="skin-color default"></a></li>
        <li><a href="orange" class="skin-color orange"></a></li>
        <li>&nbsp;</li>
        <li class="fixed"><a href="" class="skin-layout fixed"></a></li>
        <li class="wide"><a href="" class="skin-layout wide"></a></li>
    </ul><!--skins-->
	<ul class="breadcrumb">
        <li><a href="<?php echo $baseurl?>">Trang chủ</a> <span class="divider">/</span></li>
        <li class="active">Thêm thành viên</li>
    </ul>
</div><!--breadcrumbwidget-->
<div class="pagetitle">
	<h1>Thêm thành viên</h1> <span></span>
</div>
<div class="maincontent">
    <?php if(validation_errors()):?>
        <div class="alert alert-error" style="margin: 10px 10px 10px 40px;">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <?php echo validation_errors(); ?>
        </div>
    <?php endif;?>
    <div class="contentinner content-dashboard">    
    
    <?php $attr = array('class' => 'stdform'); echo form_open('', $attr)?>
    
	<p>
    	<label>Tên đăng nhập ( * )</label>
        <span class="field"><input type="text" value="<?php echo $this->input->post('tenDangNhap');?>" name="tenDangNhap" class="input-xlarge" placeholder="Tên đăng nhập" /></span>
    </p>
	
	<p>
    	<label>Mật khẩu ( * )</label>
        <span class="field"><input type="text" value="<?php echo $this->input->post('matKhau');?>" name="matKhau" class="input-xlarge" placeholder="Mật khẩu" /></span>
    </p>
	
    <p>
    	<label>Email ( * )</label>
        <span class="field"><input type="text" value="<?php echo $this->input->post('diaChiEmail');?>" name="diaChiEmail" class="input-xlarge" placeholder="Nhập email" /></span>
    </p>
    
    <p>
    	<label>Mobile ( * )</label>
        <span class="field"><input type="text" value="<?php echo $this->input->post('soDienThoai');?>" name="soDienThoai" class="input-xlarge" placeholder="Nhập số điện thoại" /></span>
    </p>
    <p>
    	<label>Họ tên ( * )</label>
        <span class="field"><input type="text" value="<?php echo $this->input->post('hoTen');?>" name="hoTen" class="input-xlarge" placeholder="Nhập họ tên" /></span>
    </p>

    <p>
    	<label>Địa chỉ</label>
        <span class="field"><input type="text" value="<?php echo $this->input->post('diaChi');?>" name="diaChi" class="input-xlarge" placeholder="Nhập địa chỉ" /></span>
    </p>
	
	<p>
    	<label>Số tiền</label>
        <span class="field"><input type="text" value="<?php echo $this->input->post('coin');?>" name="coin" class="input-xlarge" placeholder="Số tiền" /></span>
    </p>
	
    <p>
    	<label>Trạng thái ( * )</label>
        <span class="field">
            <?php echo $fview->selectType(array('Chưa kích hoạt', 'Kích hoạt', 'Tạm khóa'), '', 'kichHoat');?>
        </span>
    </p>
    <p>
        <label></label>
        <button class="btn btn-rounded" type="submit"> <i class="iconfa-ok"></i> &nbsp; Lưu lại</button>
        <button class="btn btn-rounded" type="button" onclick="window.location='<?php echo $baseurl.'nguoi-dung'?>'"> <i class="icon-arrow-right"></i> &nbsp; Hủy bỏ</button>
    </p>
    
    </form>
    </div>
</div>