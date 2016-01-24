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
        <li class="active">Thêm danh mục sản phẩm</li>
    </ul>
</div><!--breadcrumbwidget-->
<div class="pagetitle">
	<h1>Thêm danh mục sản phẩm</h1> <span></span>
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
    	<label>Tên danh mục</label>
        <span class="field"><input type="text" value="<?php echo $this->input->post('tenDanhMuc');?>" name="tenDanhMuc" class="input-xlarge" placeholder="Tên danh mục..." /></span>
    </p>

    <p>
    	<label>Thứ tự</label>
        <span class="field"><input type="number" value="<?php echo $this->input->post('thuTu');?>" name="thuTu" class="input-xlarge" placeholder="Thứ tự..." value="0" /></span>
    </p>
    <p>
    	<label>Trạng thái</label>
        <span class="field">
            <?php echo $fview->selectType(array('1' => 'Kích hoạt','0' => 'Hủy kích hoạt'), '1', 'kichHoat');?>
        </span>
    </p>
    <p>
        <label></label>
        <button class="btn btn-rounded" type="submit"> <i class="iconfa-ok"></i> &nbsp; Lưu lại</button>
        <button class="btn btn-rounded" type="button" onclick="window.location='<?php echo $baseurl.''?>'"> <i class="icon-arrow-right"></i> &nbsp; Hủy bỏ</button>
    </p>
    </form>
    </div>
</div>