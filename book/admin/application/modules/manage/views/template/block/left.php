<div class="leftpanel">
	<div class="logopanel">
		<h1><a href="<?php echo $baseurl;?>"><?php echo $adminConfig['title_sidebar'];?> <span><?php echo $adminConfig['ver_admin'];?></span></a></h1>
	</div><!--logopanel-->
	<div class="leftmenu">        
		<ul class="nav nav-tabs nav-stacked">
			<li class=""><a href="<?php echo $baseurl;?>"><span class="icon-align-justify"></span> Trang chủ</a></li>
			<li class="<?php if(in_array($controller, array('categoriesproduct','product'))) echo 'active'?> dropdown"><a href=""><span class="iconsweets-suitcase"></span> Quản lý sản phẩm</a>
				<ul <?php if(in_array($controller, array('categoriesproduct','product'))) echo 'style="display: block"'?>>
					<li><a href="<?php echo $baseurl.'danh-muc-san-pham'?>">Danh mục sản phẩm</a></li>
					<li><a href="<?php echo $baseurl.'danh-sach-san-pham'?>">Danh sách sản phẩm</a></li>
				</ul>
			</li>

			<li class="<?php if( in_array($controller, array('feedback'))  ) echo 'active'?>"><a href="<?php echo $baseurl;?>danh-sach-phan-hoi"><span class="icon-share"></span> Quản lý phản hồi</a>
			</li>
			<li class="<?php if( in_array($controller, array('order'))  ) echo 'active'?>"><a href="<?php echo $baseurl;?>danh-sach-dat-hang"><span class="iconsweets-cart2"></span> Quản lý đơn hàng</a>
			</li>						
			<li class="<?php if( in_array($controller, array('user'))  ) echo 'active'?>"><a href="<?php echo $baseurl;?>nguoi-dung"><span class="iconsweets-user"></span> Quản lý người dùng</a>
			</li>
			<li class="<?php if( in_array($controller, array('author'))  ) echo 'active'?>"><a href="<?php echo $baseurl;?>tac-gia"><span class="iconsweets-user"></span> Quản lý tác giả</a>
			</li>
			<li class="<?php if( in_array($controller, array('nxb'))  ) echo 'active'?>"><a href="<?php echo $baseurl;?>nha-xuat-ban"><span class="iconsweets-user"></span> Quản lý nhà xuất bản</a>
			</li>
			<li class="<?php if( in_array($controller, array('index')) && in_array($action,array('report'))  ) echo 'active'?>"><a href="<?php echo $baseurl;?>thong-ke"><span class="iconsweets-tag"></span> Thống kê</a>
			</li>
		</ul>
	</div><!--leftmenu-->
</div>