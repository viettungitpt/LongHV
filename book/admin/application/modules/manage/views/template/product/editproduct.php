<script type="text/javascript">
 $(document).ready( function() {
		$('#ckeditor_content').ckeditor();
 });
</script> 
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
        <li class="active">Sửa sản phẩm</li>
    </ul>
</div><!--breadcrumbwidget-->
<div class="pagetitle">
	<h1>Sửa sản phẩm</h1> <span></span>
</div>
<div class="maincontent">
    <?php if(validation_errors()):?>
        <div class="alert alert-error" style="margin: 10px 10px 10px 40px;">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <?php echo validation_errors(); ?>
        </div>
    <?php endif;?>
    <div class="contentinner content-dashboard ">    
		<div class="widgetcontent">
    <?php $attr = array('class' => 'stdform'); echo form_open_multipart('', $attr)?>
	 <p>
		<label>Chọn danh mục</label>
		<span class="formwrapper">
			<select name="id_MaDanhMuc">
			<?php foreach ( $getListCatParent AS $el=>$le ){ ?>			
				<option value="<?php echo $le->maDanhMuc;?>" <?php if ( $le->maDanhMuc == $getProductInfo->id_MaDanhMuc ){ echo 'selected="selected"'; }; ?>  ><?php echo $le->tenDanhMuc;?></option>
				<?php } ?>	
				</select>
		</span>
	</p>
    
    <p>
		<label>Chọn nhà xuất bản</label>
		<span class="formwrapper">
			<select name="id_MaNhaXuatBan">
			<?php foreach ( $getListCategoriesItem['listNhaXuatBan'] AS $el=>$le ){ ?>			
				<option value="<?php echo $le->maNhaXuatBan;?>" <?php if ( $le->maNhaXuatBan == $getProductInfo->id_MaNhaXuatBan ){ echo 'selected="selected"'; }; ?>  ><?php echo $le->tenNhaXuatBan;?></option>
				<?php } ?>	
				</select>
		</span>
	</p>
	
	<p>
		<label>Chọn tác giả</label>
		<span class="formwrapper">
			<select name="id_MaTacGia">
			<?php foreach ( $getListCategoriesItem['listTacGia'] AS $el=>$le ){ ?>			
				<option value="<?php echo $le->maTacGia;?>" <?php if ( $le->maTacGia == $getProductInfo->id_TacGia ){ echo 'selected="selected"'; }; ?>   ><?php echo $le->tenTacGia;?></option>
				<?php } ?>	
				</select>
		</span>
	</p>
    
    
	<p>
    	<label>Tên sản phẩm</label>
        <span class="field"><input type="text" value="<?php echo $getProductInfo->tenSanPham;?>" name="tenSanPham" class="input-xxlarge" placeholder="Tên sản phẩm..." /></span>
    </p>
  <p>
		<label>Ảnh đại diện</label>
		<span class="field">
			<img src="<?php echo $imgbase.$getProductInfo->hinhAnh;?>" id="img_incens" style="display: inline-block; vertical-align: middle;width: 100px;height: 95px;border: 1px solid #CCC;background: #CCC;" onError="this.src='<?php echo $baseurl."public/theme/manage/img/gray_jean.png";?>'" />
			<!--<input type="hidden" name="img_incens_hd_" id="img_incens_hd_" value="" />-->
			<input type="hidden" name="img_incens_verify" id="img_incens_verify" value="<?php echo $getProductInfo->hinhAnh ? $imgbase.$getProductInfo->hinhAnh : ''?>" />
			<input type="hidden" name="img_check" id="img_check" value="<?php echo $getProductInfo->hinhAnh ? $getProductInfo->hinhAnh : ''?>" />
			<input class="uniform-file" type="file" name="fileupload" id="img_incens_" onchange="convertimage('img_incens_', 'img_incens_hd_', 'img_incens', 'img_check');" value="" />
			
		</span>
		</p>
	
	<p>
		<label>Giá</label>
		<span class="field"><input type="number" value="<?php echo $getProductInfo->giaSanPham;?>" name="giaSanPham" class="input-xxlarge" placeholder="Giá..." /></span>
	</p>

	<p style="display: none;">
    	<label>Số lượng</label>
        <span class="field"><input type="number" value="<?php echo $getProductInfo->soLuong;?>" name="soLuong" class="input-xxlarge" placeholder="Số lượng..." /></span>
    </p>
	
	<p style="display: none;">
		<label>Tóm tắt</label>
		<span class="field"><textarea name="noiDungNgan" cols="80" rows="5" class="span5" placeholder="Tóm tắt..."><?php echo $getProductInfo->noiDungNgan;?></textarea></span>
	</p>
	<p>
		<label>Nội dung</label>
		<span class="field"><textarea id="ckeditor_content" name="noiDung" cols="80" rows="5" class="span5"><?php echo $getProductInfo->noiDung;?></textarea></span>
	</p>
    
    <p>
    	<label>Sách khuyến mại</label>
        <span class="field">
            <?php echo $fview->selectType(array('1' => 'Kích hoạt','0' => 'Hủy kích hoạt'), $getProductInfo->khuyenMai, 'khuyenMai');?>
        </span>
    </p>
     <p>
    	<label>Sách đặc biệt</label>
        <span class="field">
            <?php echo $fview->selectType(array('1' => 'Kích hoạt','0' => 'Hủy kích hoạt'), $getProductInfo->dacBiet, 'dacBiet');?>
        </span>
    </p>
    
    <p>
    	<label>Trạng thái</label>
        <span class="field">
            <?php echo $fview->selectType(array('1' => 'Kích hoạt','0' => 'Hủy kích hoạt'), $getProductInfo->kichHoat, 'kichHoat');?>
        </span>
    </p>
    <p>
        <label></label>
        <button class="btn btn-rounded" type="submit"> <i class="iconfa-ok"></i> &nbsp; Lưu lại</button>
        <button class="btn btn-rounded" type="button" onclick="window.location='<?php echo $baseurl.''?>'"> <i class="icon-arrow-right"></i> &nbsp; Hủy bỏ</button>
    </p>
    </form></div>
    </div>
</div>

<script>

function convertimage(id, id_parse, img_show)
{
    var id = id;
    var id_parse = id_parse;
    var img_show = img_show;
    var filesSelected = document.getElementById(id).files;
    if (filesSelected.length > 0)
    {
        var fileToLoad = filesSelected[0];

        var fileReader = new FileReader();

        fileReader.onload = function(fileLoadedEvent) 
        {
            $("#"+id_parse).attr('value', fileLoadedEvent.target.result);
            //document.getElementById('cddd').html(fileLoadedEvent.target.result);
            $("#"+img_show).attr('src', fileLoadedEvent.target.result);
        };

        fileReader.readAsDataURL(fileToLoad);
    }
}
</script>