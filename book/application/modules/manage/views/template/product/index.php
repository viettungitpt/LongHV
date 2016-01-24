<div id="HomeFeaturedProducts" class="Block FeaturedProducts DefaultModule CustomProduct-1190315">
    <div class="defaultTitle TitleContent">
        <span>Tất cả sản phẩm</span>
    </div>
    <div class="defaultContent BlockContent">
        <ul class="ProductList First">
            <?php foreach ( $getSanPhamTrangChu AS $el=>$le ){ ?> 
                <li class="Odd">
                    <div id="ProductImage" class="ProductImage ProductImageTooltip po_1190315">
                        <a href="<?php echo $baseurl ?>san-pham/<?php echo $le->maSanPham; ?>" rel="3561092" class="#tooltip3561092"
                            productname='<?php echo $le->tenSanPham; ?>' description='<?php echo $le->tenSanPham; ?>' thumbnail='<?php echo $imgbase;?><?php echo $le->hinhAnh ;?>' thumbnailerror='<?php echo $imgbase;?><?php echo $le->hinhAnh ;?>&width=350&height=300' promotion='' >
                            <img alt="<?php echo $le->tenSanPham; ?>" title="<?php echo $le->tenSanPham; ?>" 
                                    src="<?php echo $imgbase;?><?php echo $le->hinhAnh ;?>" onerror="this.src='<?php echo  $baseurl; ?>upload/noimage.png';" />
                        </a>
                    </div>
                    <div class="saleFlag iconSprite disable">
                        </div>
                    <div class="ProductDetails">
                        <strong><a href='<?php echo $baseurl ?>/san-pham/<?php echo $le->maSanPham ;?>'>
                            <?php echo $le->tenSanPham; ?></a>
                        </strong>
                    </div>
                    <div class="ProductPrice">
                        <div class="retail-price disable">
                            <span class="price-label"></span><span class="price"><strike class="RetailPriceValue">
                                </strike>
                            </span>
                        </div>
                        <div class="special-price">
                            <span class="price-label"></span><span class="price"><em>
                                <?php echo number_format($le->giaSanPham); ?> đ<span></span></em>
                            </span>
                        </div>
                    </div>
                    <div class="ProductRating Rating-1" style="display: ;">
                        <div class="RatingImage">
                        </div>
                    </div>
                    <div class='ProductActionAdd'><a onclick='addToCart(<?php echo $le->maSanPham ;?>);'><span>Mua hàng</span></a></div>
                </li>
            <?php } ?>
            <br class="Clear" />
        </ul>
<div class="Clear"></div>
    </div>
    <div class="defaultFooter FooterContent">
        <div></div>
    </div>
    <div class="Clear"></div>
</div>
<div id="productReviewPopup1190315" class="hidden"></div>
<div id="productReviewPopup1190248" class="hidden"></div>