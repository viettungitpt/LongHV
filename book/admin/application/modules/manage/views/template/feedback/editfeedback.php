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
        <li class="active">Xem phản hồi</li>
    </ul>
</div><!--breadcrumbwidget-->
<div class="pagetitle">
	<h1>Xem phản hồi</h1> <span></span>
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
    	<label>Họ tên</label>
        <span class="field"><input type="text" value="<?php echo $getFeedbackInfo->hoTen;?>" name="name" class="input-xxlarge" placeholder="Họ tên..." /></span>
    </p>
    
    <p>
    	<label>Số điện thoại</label>
        <span class="field"><input type="text" value="<?php echo $getFeedbackInfo->soDienThoai;?>" name="mobile" class="input-xxlarge" placeholder="Số điện thoại..." /></span>
    </p>
    
	<p>
    	<label>Email</label>
        <span class="field"><input type="text" value="<?php echo $getFeedbackInfo->diaChiEmail;?>" name="email" class="input-xxlarge" placeholder="Email..." /></span>
    </p>
	
	<p>
    	<label>Địa chỉ</label>
        <span class="field"><input type="text" value="<?php echo $getFeedbackInfo->diaChi;?>" name="address" class="input-xxlarge" placeholder="Địa chỉ..." /></span>
    </p>
	
	<p>
    	<label>Tiêu đề</label>
        <span class="field"><input type="text" value="<?php echo $getFeedbackInfo->tieuDe;?>" name="title" class="input-xxlarge" placeholder="Tiêu đề..." /></span>
    </p>
	
    <p>
		<label>Nội dung</label>
		<span class="field"><textarea name="content" cols="80" rows="5" class="span5"><?php echo $getFeedbackInfo->noiDung;?></textarea></span>
	</p>
    
    <p>
    	<label>Trạng thái</label>
        <span class="field">
            <?php echo $fview->selectType(array('1' => 'Chưa trả lời','2' => 'Xác nhận đã trả lời'), $getFeedbackInfo->kichHoat, 'active');?>
        </span>
    </p>
    <p>
        <label></label>
        <button class="btn btn-rounded" type="submit"><i class="iconfa-ok"></i> &nbsp; Lưu lại</button>
        <button class="btn btn-rounded" type="button" onclick="window.location='<?php echo $baseurl.''?>'">    <i class="icon-arrow-right"></i> &nbsp; Hủy bỏ</button>
    </p>
    
    </form>
    </div>
</div>