<div class="headerpanel">
	<a href="" class="showmenu"></a>
	<div class="headerright">
		<div class="dropdown userinfo">
			<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">Xin chào <?php echo $this->session->userdata('hoTen');?>! <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo $baseurl.'doi-mat-khau'?>"><span class="iconsweets-locked2"></span> Đổi mật khẩu</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo $baseurl.'cap-nhat-thong-tin'?>"><span class="icon-wrench"></span> Cập nhật thông tin</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo $baseurl.'dang-xuat'?>"><span class="icon-off"></span> Đăng xuất</a></li>
			</ul>
		</div><!--dropdown-->
	</div><!--headerright-->
</div>