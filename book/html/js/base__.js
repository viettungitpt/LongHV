setTimeout(function(){
	   var html_cate ='<ul class="list">';
        $.ajax({
            url:"api/api.php?action=category",
            type:"GET",
            data:{},
            success:function(data){
				var newdata = JSON.parse(data);		
				
				$.each(newdata,function(index_,item){
					$.each(item,function(index1,item2){
						html_cate += '<li><a href="#" id="cate_'+item2.Macd+'">'+item2.Tenchude+'</a></li>';
					});
				});
				html_cate += '</ul>'; 
				$("#category").html(html_cate);
            },
            error:function(){
                console.log("Error load login");
            }
        });
    },300);
	
setTimeout(function(){
	   var html_author ='<ul class="list">';
        $.ajax({
            url:"api/api.php?action=author",
            type:"GET",
            data:{},
            success:function(data){           
				var newdata = JSON.parse(data);	
			
				$.each(newdata,function(index_,item){
					$.each(item,function(index1,item2){
						
						html_author += '<li><a href="#" id="author_'+item2.Matacgia+'">'+item2.Tentacgia+'</a></li>';

					});
				});
				html_author += '</ul>'; 
				
				$("#author").html(html_author);
            },
            error:function(){
                console.log("Error load login");
            }
        });
    },300);
	