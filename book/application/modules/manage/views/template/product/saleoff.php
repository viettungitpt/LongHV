
     <div id="wrapper">
        <!-- Sidebar -->
         <?php $this->load->view('template/block/sidebar');?>
       
        <!-- Page content -->
        <div id="page-content">
            <div class="navbar-header navbar-default" style="background:#111;" id="content-right">
                <table style="width:100%;">
                    <tbody><tr>
                        <td class="content-logo">
                             <button type="button" class="navbar-toggle" id="menu-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="logo-img" href="/"><img src="/Content/Css/images/logomwcshoppng.png" alt="logo-changeshop.vn" style="height: auto;"></a>
                        </td>
                        <td class="form-search-left">
                            <form action="<?php echo $baseurl;?>tim-kiem.html" method="get" enctype="multipart/form-data">
                                <input type="text" name="txtsearch" class="txtsearch-left" placeholder="Tìm kiếm">
                                <input type="submit" class="btnsearch-left" value="">
                            </form>
                        </td>
                        <td class="giohang">
                            <a href="<?php echo $baseurl;?>gio-hang.html"><i class="glyphicon glyphicon-shopping-cart"></i><span>Giỏ hàng</span></a>
                        </td>
                    </tr>
                </tbody></table>
            </div>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                
<div class="pagecontent">
    <div class="row-fluid bgtrang">
     
       
    </div>
    <!--productcollection-->

            <div class="top-product row">
            <div class="row tab-hot-view-item-title">Hàng giảm giá</div>
            <div class="row">
                 <?php foreach ( $data['data'] AS $el=>$le ){ ?>
				<div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="content-wrap">
                       <a href="<?php echo $baseurl;?>san-pham/<?php echo str_replace(" ","-",$le->name_ascii); ?>.html"><img src="<?php echo $imgbase.$le->image; ?>" alt="<?php echo $le->name;?>" title="<?php echo $le->name;?>" /></a>
                        <div class="">
                            <div>
                           <?php if( !in_array($le->old_price,array('',null)) && $le->old_price > 0 ){ ?>
							<span class="price-product-khuyenmai"><?php echo number_format($le->old_price);?></span>
						   <?php } ?>
                            <span class="price-product"><?php echo number_format($le->price);?> đ</span>
                            </div>
                            <div class="product-name"><a href="<?php echo $baseurl;?>san-pham/<?php echo str_replace(" ","-",$le->name_ascii); ?>.html"><?php echo $le->name;?> </a></div>
                        </div>
                    </div>
                </div>
				 <?php } ?>
            </div>
</div>
 <div class="row">
        <div class="pagination">
            <div class="pagination PagedList-pager"><?php echo $this->pagination->create_links();?> </div>
        </div>
    </div>
            </div>
        </div>
    </div>    
    