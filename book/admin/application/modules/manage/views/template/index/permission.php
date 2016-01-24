<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Chọn quyền đăng nhập</title>
<script type="text/javascript" src="<?php echo $baseurl?>public/theme/manage/select/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl?>public/theme/manage/select/select2-1.0.js"></script>
<link href="<?php echo $baseurl?>public/theme/manage/select/select2.css" rel="stylesheet"/>
<link rel="stylesheet" href="<?php echo $baseurl?>public/theme/manage/style_add.css" type="text/css" />
<script id="script_e1">
$(document).ready(function() {
$("#permission").select2();
$("#user").select2();
});
</script>
<link rel="stylesheet" href="<?php echo $baseurl?>public/babybean/admin/css/style_add.css" type="text/css" />
</head>
<div class="permission">
<?php echo form_open('');?>
    <h2>Lựa chọn quyền</h2>
    <select id="permission" name="permission" style="width: 100%">
    <option value="">Vui lòng chọn nhóm quyền</option>
        <?php echo $selectPer;?>
    </select>
    <input type="submit" class="sendSelectPer" name="sendSelectPer" value="Gửi đi" />
</form>
</div>