setTimeout(function(){
	   var html_cate ='';
        $.ajax({
            url:"api/api.php?action=listsach",
            type:"GET",
            data:{},
            success:function(data){
				var newdata = JSON.parse(data);		
				
				$.each(newdata,function(index_,item){
					$.each(item,function(index1,item2){
						html_cate += '<div class="feat_prod_box">';
						html_cate +='<div class="prod_img"><a href="details.html?id='+item2.Masach+'"><img src="'+item2.Hinhminhhoa+'" alt="" title="" border="0" /></a></div>';
						html_cate +='<div class="prod_det_box">';
						html_cate +='<div class="box_top"></div>';
						html_cate +='<div class="box_center">';
						html_cate +='<div class="prod_title">'+item2.Tensach+'</div>';
						html_cate +=' <p class="details">'+item2.Mota+'</p>';
						html_cate +=' <a href="details.html?id='+item2.Masach+'" class="more">- Chi tiết -</a>'
                   
						html_cate +='<div class="clear"></div>';
						html_cate +='</div>';
						 	html_cate +='<div class="box_bottom"></div></div><div class="clear"></div>            </div>	';
					});
				});
				html_cate +='        <div class="clear"></div>';
				$("#left_content").html(html_cate);
            },
            error:function(){
                console.log("Error load login");
            }
        });
    },300);