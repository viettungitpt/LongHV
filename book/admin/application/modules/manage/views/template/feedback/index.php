<?php //echo '<pre>';die(print_r($data));?>
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
        <li class="active">Danh sách phản hồi</li>
    </ul>
</div><!--breadcrumbwidget-->
<div class="pagetitle">
	<h1>Danh sách phản hồi</h1> <span></span>
</div>
<div class="maincontent">
    <div class="contentinner">    
    
        <?php $attr = array('class' => 'stdform','id' => 'form-list'); echo form_open('', $attr);?>
		<div id="dyntable_length" class="dataTables_length  content-dashboard">
        <input type="hidden" name="check-delete" value="1" />
		
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
                    <th>Họ tên</th>
					<th>Email</th>
                    <th>Tiêu đề</th>
					<th style="width: 115px;">Ngày đăng</th>
					<th style="width: 70px;">Trạng thái</th>
                    <th class="centeralign" style="width: 10%">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!in_array($data, array(null, '', '0'))):?>
            <?php
                $i = 1;
             foreach($data['data'] AS $el=>$le):
            ?>
                <tr>
                   <td>
                       <?php echo $le->hoTen;?>
                    </td>
					<td>
                       <?php echo $le->diaChiEmail ;?>
                    </td>
					<td><?php echo $fview->printstr($le->tieuDe,20);?></td>
					<td><?php echo date('H:i d-m-Y',$le->ngayTao) ;?></td>
					<td>
                       <?php echo $fview->convertImproved($le->kichHoat);?>
                    </td>
                    <td class="centeralign">
                        <a href="<?php echo $baseurl.'danh-sach-phan-hoi/sua-phan-hoi/'.$le->maPhanHoi?>" class=""><span class="icon-edit"></span></a>
                        <a href="<?php echo $baseurl.'danh-sach-phan-hoi/xoa-phan-hoi/'.$le->maPhanHoi?>" class="delete-a"><span class="icon-trash"></span></a>   
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