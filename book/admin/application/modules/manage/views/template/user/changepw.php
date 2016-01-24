<?php

/**
 * @author bimson
 * @copyright 2015
 */

?>
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
        <li class="active">Thay đổi mật khẩu</li>
    </ul>
</div><!--breadcrumbwidget-->
<div class="pagetitle">
	<h1 style="width: 100%;">Thay đổi mật khẩu</h1> <span></span>
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
		<label>Nhập mật khẩu cũ</label>
		<span class="field"><input type="password" value="<?php echo $this->input->post('pword');?>" name="pword" class="input-xlarge" placeholder="Nhập mật khẩu cũ..." /></span>
	</p>
    <p>
    	<label>Nhập mật khẩu mới</label>
        <span class="field"><input type="password" value="<?php echo $this->input->post('pword1');?>" name="pword1" class="input-xlarge" placeholder="Nhập mật khẩu mới..." /></span>
    </p>
    <p>
    	<label>Nhập lại mật khẩu mới</label>
        <span class="field"><input type="password" value="<?php echo $this->input->post('pword2');?>" name="pword2" class="input-xlarge" placeholder="Nhập lại mật khẩu mới..." /></span>
    </p>
    <p>
        <label></label>
        <button class="btn btn-rounded" type="submit"> <i class="iconfa-ok"></i> &nbsp; Lưu lại</button>
        <button class="btn btn-rounded" type="button" onclick="window.location='<?php echo $baseurl.''?>'"> <i class="icon-arrow-right"></i> &nbsp; Hủy bỏ</button>
    </p>
    
    </form>
    </div>
</div>