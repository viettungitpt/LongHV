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
        <li class="active">Cập nhật thông tin nhà xuất bản</li>
    </ul>
</div><!--breadcrumbwidget-->
<div class="pagetitle">
	<h1 style="width: 100%;">Cập nhật xuất bản </h1> <span></span>
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
    	<label>Tên nhà xuất bản (*)</label>
        <span class="field"><input type="text" value="<?php echo $data->tenNhaXuatBan?>" name="tenNhaXuatBan" class="input-xlarge" placeholder="Tên nhà xuất bản..." /></span>
    </p>

    <p>
        <label></label>
        <button class="btn btn-rounded" type="submit"> <i class="iconfa-ok"></i> &nbsp; Lưu lại</button>
        <button class="btn btn-rounded" type="button" onclick="window.location='<?php echo $baseurl.'nha-xuat-ban'?>'"> <i class="icon-arrow-right"></i> &nbsp; Hủy bỏ</button>
    </p>
    
    </form>
    </div>
</div>