<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery-1.9.1.min.js"></script>
<h2>Danh sách <?php echo sizeof($data)?> thành viên đăng ký đầu tiên</h2>
<div class="box-bxh">

<table id="report">

    <thead>
        <tr>
            <th>STT</th>
            <th>Tài khoản</th>
            <th>Họ tên</th>
            <!-- <th>Email</th> -->
            <th>Số điện thoại</th>
            <th>Ngày đăng ký</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data AS $el=>$le):?>
        <tr>
            <td><?php echo $el+1?></td>
            <td><?php echo $le->username;?></td>
            <td><?php echo $le->fullname;?></td>
            <!-- <td><?php echo $le->email;?></td> -->
            <td><?php echo $le->mobile;?></td>
            <td><?php echo $le->time;?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>


<span style="position: absolute;bottom: 0px;left: 0px;right: 0px;display: block;margin: 0 auto;text-align: center;padding: 10px 0px;border-top: 1px #ccc solid;">
    <button onclick="exportReport()" class="btn-export" title="Xuất báo cáo top 10">Xuất báo cáo</button>
    <button onclick="closepopup()" class="btn-export" title="Tắt popup này" style="background-color: rgb(195, 182, 182);">Đóng lại</button>
</span>
</div>

<script>

function ClosePop() {
    var layer = document.getElementById("layer");
    var iframe = document.getElementById("popup");
    document.body.removeChild(layer); // remove layer
    document.body.removeChild(iframe); // remove div
}
function closeIframe() {
    window.parent.ClosePop();
}

function exportReport()
{
    var data='<table border="1"><thead><tr><td colspan="5" style="background: #9E9E9E;height: 50px;text-align: center;color: #FFF;font-size: 20px;">Danh sách <?php echo sizeof($data)?> thành viên đăng ký đầu tiên</td></tr></thead>'+$("#report").html().replace(/<a\/?[^>]+>/gi, '')+'</table>';
    
    $('body').prepend("<form method='post' action="+'<?php echo $baseurl.'exportfile.php'?>'+" style='display:none' id='Categroriess'><input type='text' name='tableData' value='"+data+"' ></form>");
    
    $('#Categroriess').submit().remove();
    setTimeout(function(){closeIframe();}, 15000);
    return false;
}

function closepopup()
{
    closeIframe();
}
</script>

<style>
body{
    background: #fdfdfd;margin: 0px
}
.box-bxh{
    float: left;
    width: 99%;
    margin: 5px;
    box-sizing: border-box;
}
h2{
border: 1px solid #B9BD30;padding: 10px 0px;float: left;width: 100%;background: #F9FFDF;font-family: arial;color: #E04E4E;font-size: 20px;text-align: center;box-sizing: border-box;text-transform: capitalize;margin: 10px 0px 10px 0px;border-left: none !important;border-right: none !important;
}

table{
    float: left;width: 100%;font-family: arial;color: #666
}

table thead{
    background: #EDEDED;width: 100%;font-weight: bolder
}
table thead tr td{
    padding: 8px;font-family: sans-serif;border: none
}

table tbody{
    width: 100%;
}

table tbody tr:nth-child(odd){
    background: #fff;
}

table tbody tr:nth-child(even){
    background: #F4F4F4;
}
table tbody tr td{
    padding: 5px;
}
table tbody tr td:nth-child(1){
    width: 10%;padding: 5px;text-align: center;
}

.btn-export {
    display: inline-block;border: 0;outline: 0;color: #fff;background-color: rgb(3, 187, 3);text-transform: uppercase;padding: 10px 28px;cursor: pointer;
}
</style>

<?php

function convertDeltatime($dttime){
 $miligiay = $dttime % 1000;
 
 $giay = (($dttime - $miligiay)/1000)%60;
 $phut =  ($dttime - $giay*1000 - $miligiay)/1000/60;
 return   $phut."p, ".$giay."s, ".$miligiay;
}
?>