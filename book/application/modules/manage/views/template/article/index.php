<?php //echo '<pre>';die(print_r($getDanhSachTinTuc));?>
<div class="NewsListContainer DefaultModule ListItems">
    <div class="newsCategory defaultTitle">
        <h1>
            Tin tức</h1>
    </div>
    <div class="defaultContent newsList">
        <?php foreach ( $getDanhSachTinTuc AS $el=>$le ){ ?> 
                <table cellpadding="0" cellspacing="0" class="newsList_Item">
                    <tbody><tr>
                        <td class="newsList_Image">
                            <a href="<?php $baseurl;?>bai-viet/<?php echo $le->maBaiViet;?>">
                                <img height="100px;" width="100px;" src="<?php echo $imgbase;?><?php echo $le->hinhAnh;?>" alt="<?php echo $le->tieuDe;?>" onerror="this.src='<?php echo  $baseurl; ?>upload/noimage.png';" />
                            </a>
                        </td>
                        <td class="newsList_Content">
                            <div>
                                <a href="<?php $baseurl;?>bai-viet/<?php echo $le->maBaiViet;?>" class="newsList_Title">
                                    <?php echo $le->tieuDe;?>
                                </a> 
                                <span class="newsList_Date" style="display: none;">
                                    (27/08/2014 4:03:00 CH)</span>
                            </div>
                            <div>
                                <span class="newsList_Summary">
                                    <?php echo $le->tomTatNgan;?> </span> <span class="newsList_LinkDetail"></span>
                            </div>
                        </td>
                    </tr>
                </tbody></table>
                <hr class="newsList_Seperator">
         <?php } ?>   
    </div>
    <div class="clear defaultFooter newsList-footer">
        <div>
        </div>
    </div>
    <div class="clear">
    </div>
</div>
