<style>
ul#menus, ul#menus ul#sub {
    padding:0;
    margin: 0;
}
ul#menus li {
     list-style-type: none;    /* code này để bỏ các dấu chấm tròn*/
     float: left;    /* code này để menu dàn hàng ngang*/
     margin-right: 10px;    /* tạo lề cho các menu*/
}
ul#menus li a {
 text-decoration: none;
 color: white;
}
ul#menus li {
 positon: relative;
   margin-top: 10px;
} 
ul#menus li ul#sub {
	display: none;
	position: absolute;
	background-color: gray;
	width: 200px;
	margin-top: 25px;
	z-index:999;
	color: #fff;
}
ul#menus li ul#sub li {
 margin-top: 10px;
 margin-bottom: 5px;
}
ul#menus li:hover ul#sub {
 display: block;
#sub .selected1 a !important{
	color: #fff;
 }
.tk{
	position: absolute;
	right: 330px;
	top: 120px;
	color: #fff;
 }
.dk{
	position: absolute;
	right: 330px;
	top: 120px;
	color: #fff;
 }
 
</style>

<div class="logo"><a href="<?php echo $baseurl;?>"><img src="<?php $baseurl;?>html/images/logo.gif" alt="" title="" border="0" /></a></div>            
<div id="menu">
    <ul id="menus">                                                                       
    <li <?php if( $controller == 'index' && $action == 'index' ){ echo 'class="selected"';} ?> ><a href="<?php echo $baseurl;?>">Trang chủ</a></li>
    <li <?php if( $controller == 'index' && $action == 'intro' ){ echo 'class="selected"';} ?> ><a href="<?php echo $baseurl;?>gioi-thieu.html">Giới thiệu</a></li>
   
    
	<li <?php if( $controller == 'product' && $action == 'categories' ){ echo 'class="selected"';} ?> ><a>Danh mục</a>
		<ul id="sub">
		 <?php foreach ( $getDanhMucSanPham AS $el=>$le ){ ?>
               <li class="selected1"><a href="<?php echo $baseurl.'danh-muc/'.$le->maDanhMuc;?>.html"><?php echo $le->tenDanhMuc;?></a></li>
               	 <?php } ?>		
          </ul>
	</li>
	
	<li style="display:none;" <?php if( $controller == 'product' && $action == 'categoriesauthor' ){ echo 'class="selected"';} ?> ><a>Tác giả</a>
		<ul id="sub">
		 <?php foreach ( $getDanhSachTacGia AS $el=>$le ){ ?>
               <li class="selected1"><a href="<?php echo $baseurl.'tac-gia/'.$le->maTacGia;?>.html"><?php echo $le->tenTacGia;?></a></li>
               	 <?php } ?>		
          </ul>
	</li>
	
	 <li style="" <?php if( $controller == 'product' && $action == 'special' ){ echo 'class="selected"';} ?> ><a href="<?php echo $baseurl;?>sach-dac-biet.html">Sách đặc biệt </a></li>
	
	<li style="display:none;" <?php if( $controller == 'user' && $action == 'index' ){ echo 'class="selected"';} ?> ><a href="<?php echo $baseurl;?>tai-khoan.html">Tài khoản</a></li>
    <li style="display:none;" <?php if( $controller == 'user' && $action == 'register' ){ echo 'class="selected"';} ?> ><a href="<?php echo $baseurl;?>dang-ki.html">Đăng ký</a></li>
    
	<li <?php if( $controller == 'index' && $action == 'contact' ){ echo 'class="selected"';} ?> ><a href="<?php echo $baseurl;?>lien-he.html">Liên hệ</a></li>
    </ul>
</div>
<div id="search">
	<form action="<?php echo $baseurl;?>tim-kiem.html" method="get">
		<input type="text" name="txtSearch" value="" placeholder="Gõ từ khóa tìm kiếm"/>
		<button>Tìm kiếm</button>
	</form>
</div>
<div id="account">
<?php if( !in_array($this->session->userdata('maNguoiDung'),array('',null)) ){ ?>
	<span style="position: absolute;right: 410px;top: 120px;color: #fff;"><a style="color: #fff;" href="<?php echo $baseurl;?>thong-tin-tai-khoan.html">Thông tin tài khoản</a></span>
	<span style="position: absolute;right: 287px;top: 120px;color: #fff;"><a style="color: #fff;" href="<?php echo $baseurl;?>tai-khoan.html">Thông tin đơn hàng</a></span>
	<span style="position: absolute;right: 240px;top: 120px;color: #fff;"><a style="color: #fff;" href="<?php echo $baseurl;?>thoat.html">Thoát</a></span>
<?php }else{ ?>

<span style="position: absolute;right: 297px;top: 120px;color: #fff;"><a style="color: #fff;" href="<?php echo $baseurl;?>dang-nhap.html">Đăng nhập</a></span>
	<span style="position: absolute;right: 240px;top: 120px;color: #fff;"><a style="color: #fff;" href="<?php echo $baseurl;?>dang-ki.html">Đăng kí</a></span>
<?php } ?>
</div>
