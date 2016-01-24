<?php //echo '<pre>';die(print_r($data));?>
<div style="font-weight:bold;">Xin chào <?php echo $this->session->userdata('hoTen');?><br/><br/>
Bạn đang có <span style="color: rgb(25, 25, 242);"><?php echo number_format($this->session->userdata('coin'));?> VNĐ </span> trong tài khoản &nbsp; <a href="<?php echo $baseurl.'thoat.html';?>">Đăng xuất</a></div>
<br/><br/><br/>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
<table style="width:100%">
  <caption style="  margin-bottom: 10px;font-size: 13px;font-weight: bold;">Danh sách đơn hàng của bạn</caption>
  <tr>
    <th>STT</th>
    <th>Nội dung</th>
	<th>Ngày đặt hàng</th>
	<th>Trạng thái</th>
    <th>Tác vụ</th>
  </tr>
  <?php $i = 1; foreach ( $data AS $el=>$le ){ ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $le->noiDung;?></td>
	<td><?php echo date('H:i:s d/m/Y', strtotime($le->ngayTao));?></td>
	<td><?php echo $fview->getStatusOrder($le->kichHoat);?></td>
    <td><?php if($le->kichHoat == 0){ ?>
        <span style="cursor: pointer;" class="huy-don-hang" id="<?php echo $le->maDatHang;?>">Hủy đơn hàng</span>
     <?php }else{ ?>
		Đã hoàn thành
	 <?php } ?></td>
  </tr>
  <?php 
$i++; }
?>
</table>
<script>
$('.huy-don-hang').click(function(){
    var r = confirm('Bạn có chắc chắn xóa đơn hàng này không?');
    if (r == true) {
        window.location = '<?php echo $baseurl;?>xoa-don-hang?don_hang_id='+this.id;
    }else{
        return false;
    }
});
</script>
