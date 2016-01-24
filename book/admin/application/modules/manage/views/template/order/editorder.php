<?php //echo '<pre>';die(print_r($data_orderdetail));?>
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
        <li class="active">Sửa đơn hàng</li>
    </ul>
</div><!--breadcrumbwidget-->
<div class="pagetitle">
	<h1>Sửa đơn hàng</h1> <span></span>
</div>
<div class="maincontent">
    <?php if(validation_errors()):?>
        <div class="alert alert-error" style="margin: 10px 10px 10px 40px;">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <?php echo validation_errors(); ?>
        </div>
    <?php endif;?>
    <div class="contentinner content-dashboard">    
    
    <?php 
		$attr = array('class' => 'stdform'); echo form_open('', $attr)?>
    <p>
    	<label>Họ tên</label>
        <span class="field"><input type="text" value="<?php echo $data_order->tenKH;?>" name="name" class="input-xxlarge" placeholder="Họ tên..." /></span>
    </p>
    
    <p>
    	<label>Email</label>
        <span class="field"><input type="text" value="<?php echo $data_order->emailKH;?>" name="email" class="input-xxlarge" placeholder="Tiêu đề bài viết..." /></span>
    </p>
    
     <p>
    	<label>Số điện thoại</label>
        <span class="field"><input type="text" value="<?php echo $data_order->soDienThoai;?>" name="mobile" class="input-xxlarge" placeholder="Tiêu đề bài viết..." /></span>
    </p>
    
	
    <p>
    	<label>Địa chỉ</label>
        <span class="field"><input type="text" value="<?php echo $data_order->diaChi;?>" name="address" class="input-xxlarge" placeholder="Tóm tắt..."/></span>
    </p>
    
    <p>
    	<label>Trạng thái</label>
        <span class="field">
            <?php echo $fview->selectType(array('1' => 'Đã phản hồi chưa gửi hàng','2' => 'Đã gửi hàng, hoàn thành'), $data_order->kichHoat, 'active');?>
        </span>
    </p>
	 <p>
        <label></label>
        <button class="btn btn-rounded" type="submit"> <i class="iconfa-ok"></i> &nbsp; Lưu lại</button>
        <button class="btn btn-rounded" type="button" onclick="window.location='<?php echo $baseurl.''?>'"> <i class="icon-arrow-right"></i> &nbsp; Hủy bỏ</button>
    </p>
    
    
    
    
    <!--- -->
    <table style="width: 65%;float: left;margin-left: 12%;" class="table table-bordered">
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
                
                    <th style="">Tên sản phẩm</th>
					 <th style="">Đơn giá</th>
					<th>Số lượng</th>
					<th>Thành tiền</th>
                    <th class="centeralign" style="width: 10%">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!in_array($data_orderdetail, array(null, '', '0'))):?>
            <?php
                $i = 1;
             foreach($data_orderdetail AS $el=>$le):
            ?>
                <tr>
                	
                   <td>
                       <?php echo $le->name;?>
                    </td>
                    <td><?php echo number_format($le->gia);?> </td>
					<td>
                       <?php echo $le->soLuong;?>
                    </td>
					 
                       <td>
                       <?php echo number_format($le->gia*$le->soLuong);?>
                    </td>
                  
                    <td class="centeralign">
                        <a href="<?php echo $baseurl.'danh-sach-dat-hang/xoa-chi-tiet-don-hang/'.$le->maDatHangCT?>" class="delete-a"><span class="icon-trash"></span></a>   
                    </td>
                </tr>
            <?php endforeach;?>
            <?php endif?>
             <tr>
                
                   <td>
                      
                    </td>
                    <td> </td>
					<td>
                      
                    </td>
					 
                       <td>
                      <b><?php echo number_format($data_order->total);?></b> 
                    </td>
                  
                    <td class="centeralign">
  
                    </td>
                </tr>
            </tbody>
        </table>
    
    <!-- --->
    
   
    
    
    
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