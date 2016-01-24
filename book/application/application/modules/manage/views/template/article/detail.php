<script type="text/javascript">
function PrintDocument(title) {
    title = decodeURIComponent(title);
    var leftPos = (screen.availWidth - 800) / 2;
    var topPos = (screen.availHeight - 600) / 2;
    var PopupWindow = window.open('', 'PopupWindow', 'width=800,height=600,scrollbars=yes,resizable=yes,titlebar=0,top=' + topPos + ',left=' + leftPos);
    PopupWindow.document.open();
    PopupHTML = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><html>';
    PopupHTML += '<head><title>' + title + '</title>';
    PopupHTML += '<link href="/Css/PrintStyle.css" type="text/css" rel="stylesheet" />';
    PopupHTML += '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><style>img {border:0px;}</style>';
    PopupHTML += '</head><body>';
    PopupHTML += '<div style="text-align:left;padding:5px;"><h1>' + document.domain + '</h1><hr />';
    PopupHTML += '<div class="newsdetail_wrapper" style="overflow:hidden;width:760px;">';
    PopupHTML += document.getElementById('content_document').innerHTML;
    PopupHTML += '</div>';
    PopupHTML += '<br /><div style="background:#EEE;padding:5px;"><a href="javascript:window.print();"><img border="0" alt="" src="http://static.bizwebmedia.net/images/print.png" style="cursor: pointer;"/>In bài viết này</a><hr/>';
    PopupHTML += '</div>';
    PopupHTML += '</div></body></html>';
    PopupWindow.document.write(PopupHTML);
    PopupWindow.document.close();
}
</script>
<div id="content_document" class="NewsDetailContainer DefaultModule DetailItem">
    <div class="defaultTitle newsDetail_Header">
        <h1 class="newsDetail_Title">
            <?php echo $data->tieuDe;?></h1>
        <span class="newsDetail_Date" style="display: none;">
            27-08-2014 04:03 CH</span>
    </div>
    <div class="defaultContent newsDetail-content newsList-content">
        <div class="Block newsDetail_Content Clear" style="overflow: hidden">
         <?php echo $data->noiDung;?>
        </div>
        
        <br class="Clear">

    </div>
    <div class="defaultFooter newsDetail-footer newsList-footer">
        <div>
        </div>
    </div>
</div>
