<?php //echo '<pre>';die(print_r($data['data']));?>
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
        <li class="active">Danh mục sản phẩm</li>
    </ul>
</div><!--breadcrumbwidget-->
<div class="pagetitle">
	<h1>Danh mục sản phẩm</h1> <span></span>
</div>
<div class="maincontent">
    <div class="contentinner">    
        <?php $attr = array('class' => 'stdform','id' => 'form-list'); echo form_open('', $attr);?>
		<div id="dyntable_length" class="dataTables_length  content-dashboard">
        <input type="hidden" name="check-delete" value="1" />
            <a href="<?php echo $baseurl.'danh-muc-san-pham/them-danh-muc'?>" class="btn"><i class="icon-plus"></i> Thêm mới</a>
			<!--<button type="submit" class="btn"><i class="icon-remove"></i> Xóa</button>-->
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
                    <th>Tên danh mục</th>
					<th>Thứ tự</th>
					<th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th class="centeralign" style="width: 10%">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
            <?php if( !in_array($data, array(null, '', '0')) ) :?>
            <?php
                $i = 1;
             foreach($data['data'] AS $el=>$le):
            ?>
                <tr>
                   <td>
                       <?php echo $le->tenDanhMuc;?>
                    </td>
					<td><?php echo $le->thuTu?></td>
					<td>
                      <?php echo $le->ngayTao;?>
                    </td>
					<td>
                       <?php echo $fview->convertActive($le->kichHoat);?>
                    </td>
                    <td class="centeralign">
                        <a href="<?php echo $baseurl.'danh-muc-san-pham/sua-danh-muc/'.$le->maDanhMuc?>" class=""><span class="icon-edit"></span></a>
                        <a href="<?php echo $baseurl.'danh-muc-san-pham/xoa-danh-muc/'.$le->maDanhMuc?>" class="delete-a"><span class="icon-trash"></span></a>   
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