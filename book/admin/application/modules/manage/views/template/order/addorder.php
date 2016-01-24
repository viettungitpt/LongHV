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
        <li class="active">Thêm bài viết</li>
    </ul>
</div><!--breadcrumbwidget-->
<div class="pagetitle">
	<h1>Thêm bài viết</h1> <span></span>
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
    	<label>Tiêu đề bài viết</label>
        <span class="field"><input type="text" value="<?php echo $this->input->post('title');?>" name="title" class="input-xxlarge" placeholder="Tiêu đề bài viết..." /></span>
    </p>
    <p>
    	<label>Chọn chuyên mục</label>
        <span class="field"><select name="categories_id"><?php echo $getCatParent;?></select></span>
    </p>
   <p>
		<label>Ảnh đại diện</label>
		<span class="field">
			<img src="" id="img_incens_show_" style="display: inline-block; vertical-align: middle;width: 69px;height: 69px;border: 1px solid #CCC;background: #CCC;" />
			<input type="hidden" name="img_incens_hd_" id="img_incens_hd_" value="" />
			<input class="uniform-file" type="file" name="fileupload" id="img_incens_" onchange="convertimage('img_incens_', 'img_incens_hd_', 'img_incens_show_');" value="" />
		</span>
	</p>
	<p>
		<label>Tóm tắt</label>
		<span class="field"><textarea name="summary" cols="80" rows="5" class="span5"><?php echo $this->input->post('summary');?></textarea></span>
	</p>
	<p>
		<label>Nội dung</label>
		<span class="field"><textarea id="ckeditor_content" name="content" cols="80" rows="5" class="span5"><?php echo $this->input->post('content');?></textarea></span>
	</p>
    <p>
    	<label>Trạng thái</label>
        <span class="field">
            <?php echo $fview->selectType(array('1' => 'Kích hoạt','0' => 'Hủy kích hoạt'), '1', 'active');?>
        </span>
    </p>
    <p>
        <label></label>
        <button class="btn btn-rounded" type="submit"> <i class="iconfa-ok"></i> &nbsp; Lưu lại</button>
        <button class="btn btn-rounded" type="button" onclick="window.location='<?php echo $baseurl.'manage/article/index'?>'"> <i class="icon-arrow-right"></i> &nbsp; Hủy bỏ</button>
    </p>
    </form>
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