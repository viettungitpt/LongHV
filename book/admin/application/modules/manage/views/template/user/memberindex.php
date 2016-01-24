<?php //echo '<pre>';die(print_r($data));?>
<div class="pagetitle">
	<h1>Quản lý danh sách thành viên</h1> <span></span>
</div>
<div class="maincontent">
    <div class="contentinner">    
    
        <?php $attr = array('class' => 'stdform','id' => 'form-list'); echo form_open('', $attr);?>
        <div id="dyntable_length" class="dataTables_length  content-dashboard">
        <input type="hidden" name="check-delete" value="1" />
        
            <a href="<?php echo $baseurl.'manage/member/add-member'?>" class="btn"><i class="icon-plus"></i> Thêm mới</a>
            <a href="javascript: void(popups());" class="btn"><i class="icon-file"></i> Xuất báo cáo</a>
            <button class="btn" type="button" onclick="deleteall()"><i class="icon-remove"></i> Xóa đã chọn</button>
        </div>
    	<table class="table table-bordered">
            <colgroup>
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
            </colgroup>
            <thead>
                <tr>
                	<th class="centeralign" style="width: 5%;"><input type="checkbox" class="checkall" /></th>
                    <!-- <th style="width: 8%;">STT</th> -->
                    <th style="width: 120px">Tài khoản</th>
                    <th>Họ tên</th>
                    <th>Di động</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th class="centeralign" style="width: 10%">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!in_array(@$data, array(null, '', '0'))):?>
            <?php foreach($data AS $el=>$le):?>
                <tr>
                	<td class="centeralign"><input name="checkboxs[]" id="<?php echo $le->id?>" type="checkbox" value="<?php echo $le->id?>" /></td>
                    <!-- <td>1</td> -->
                    <td style="text-align: center;"><?php echo $le->username?></td>
                    <td><?php echo $le->fullname?></td>
                    <td><?php echo $le->mobile?> </td>
                    <td><?php echo ($le->active == 1) ? '<small style="color: #46a73e;font-size: 12px">Hoạt động</small>' : ($le->active == 0 ? '<small style="color: ccc;font-size: 12px">Chưa kích hoạt</small>' : '<small style="color: #FF0000;font-size: 12px">Tạm khóa</small>') ;?></td>
                    <td><?php echo $le->created;?></td>
                    <td class="centeralign">
                        <a href="<?php echo $baseurl.'manage/member/edit-member/'.$le->id?>" class=""><span class="icon-edit"></span></a>
                        <a href="<?php echo $baseurl.'manage/member/delete-member/'.$le->id?>" class="delete-a"><span class="icon-trash"></span></a>   
                    </td>
                </tr>
            <?php endforeach;?>
            <?php endif?>
            </tbody>
        </table>
        <div class="dataTables_info" id="dyntable_info">
            <div class="pagination">
                <?php echo $this->pagination->create_links();?> 
            </div>
        </div>
        </form>
    </div>
</div>
<style>
.table th, .table td {
vertical-align: middle !important;
}
</style>

<script>
function popups()
{
    var url = '<?php echo $baseurl.'manage/export-user';?>';
    OpenPop(url, 600, 600);
}

$(document).keyup(function(e) 
{
  if (e.keyCode == 27) { closeIframe(); }
});

function selectTime()
        {
            var month = $("#monthselect").val();
            var year = $("#yearselect").val();
            
            if(month == '')
            {
                window.location = '<?php echo $baseurl?>'+'member.html?year='+year;
            }else{
                window.location = '<?php echo $baseurl?>'+'member.html?year='+year+'&month='+month;
            }
        }
</script>
