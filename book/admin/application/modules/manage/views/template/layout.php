<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Quản trị hệ thống website</title>
<link rel="icon" type="image/png" href="<?php echo $baseurl.'public/theme/manage/img/star.png';?>" />
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/excanvas.min.js"></script><![endif]-->

<link rel="stylesheet" href="<?php echo $baseurl.'public/theme/manage/'?>css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseurl.'public/theme/manage/'?>prettify/prettify.css" type="text/css" />
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>prettify/prettify.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/uniform.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/custom.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery.alerts.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/slider.js"></script>
<link rel="stylesheet" href="<?php echo $baseurl.'public/theme/manage/'?>css/bootstrap-timepicker.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/bootstrap-timepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo $baseurl.'public/theme/manage/'?>css/bootstrap-fileupload.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery.autogrow-textarea.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/charCount.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/ui.spinner.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/forms.js"></script>
<link rel="stylesheet" href="<?php echo $baseurl.'public/theme/manage/'?>css/toast.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseurl.'public/theme/manage/'?>css/custom.css" type="text/css" />
<script src="<?php echo $baseurl?>public/ckeditor/ckeditor.js"></script>
<script src="<?php echo $baseurl?>public/ckfinder/ckfinder.js"></script>
<script src="<?php echo $baseurl?>public/ckeditor/adapters/jquery.js"></script>
 

<script>
    var $ = jQuery.noConflict();
    var baseUrl  = '<?php echo $baseurl?>';
    var __gift   = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
</head>
<body>
<div class="mainwrapper">
    <!-- START OF LEFT PANEL -->
    <?php $this->load->view('template/block/left');?>
    <!--mainleft-->
    <!-- END OF LEFT PANEL -->
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<?php $this->load->view('template/block/header');?>
        <!--headerpanel-->
        <?php $this->load->view("template/".($controller ? $controller : 'index')."/".($action ? $action : 'index'),'');?>
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    <div class="clearfix"></div>

</div><!--mainwrapper-->
<script>
    var checkpopup = 1;
    $('.address').keyup(function()
    {
        var txt = $(this).val();
        $(".show_msg").show();
        if(checkpopup == 1)
        {
            console.log('checkpopup', checkpopup);
            $("#box-map").attr('style', 'display: block');    
        }
        checkpopup = 2;
        setTimeout(function()
        {
            load();
            setTimeout(function()
            {
                showAddress(txt);  
            }, 1000);  
        }, 1000);
    });
</script>
<script src="http://maps.google.com/maps?file=api&amp;v=3&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA"
      type="text/javascript"></script>
    <script type="text/javascript">
	function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(48.89364,  	2.33739);
        map.setCenter(center, 15);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
        document.getElementById("lat").value = center.lat().toFixed(5);
        document.getElementById("lng").value = center.lng().toFixed(5);

	  GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
	      map.panTo(point);
       document.getElementById("lat").value = point.lat().toFixed(5);
       document.getElementById("lng").value = point.lng().toFixed(5);
        });
	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("lat").value = center.lat().toFixed(5);
	   document.getElementById("lng").value = center.lng().toFixed(5);
	 GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
	     map.panTo(point);
      document.getElementById("lat").value = point.lat().toFixed(5);
	     document.getElementById("lng").value = point.lng().toFixed(5);
        });
        });
      }
    }
    function showAddress(address) {
	   var map = new GMap2(document.getElementById("map"));
       map.addControl(new GSmallMapControl());
       map.addControl(new GMapTypeControl());
       if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
            } else {
                    $(".show_msg").hide();
                    document.getElementById("lat").value = point.lat().toFixed(5);
                    document.getElementById("lng").value = point.lng().toFixed(5);
                    map.clearOverlays()
                    map.setCenter(point, 14);
                    var marker = new GMarker(point, {draggable: true});  
                    map.addOverlay(marker);
                    
                    GEvent.addListener(marker, "dragend", function() {
                        var pt = marker.getPoint();
                        map.panTo(pt);
                        document.getElementById("lat").value = pt.lat().toFixed(5);
                        document.getElementById("lng").value = pt.lng().toFixed(5);
                    });
                    GEvent.addListener(map, "moveend", function() {
                        map.clearOverlays();
                        var center = map.getCenter();
                        var marker = new GMarker(center, {draggable: true});
                        map.addOverlay(marker);
                        document.getElementById("lat").value = center.lat().toFixed(5);
                        document.getElementById("lng").value = center.lng().toFixed(5);
                        
                        GEvent.addListener(marker, "dragend", function() {
                            var pt = marker.getPoint();
                            map.panTo(pt);
                            document.getElementById("lat").value = pt.lat().toFixed(5);
                            document.getElementById("lng").value = pt.lng().toFixed(5);
                        });
                    });
                }
            });
        }
    }
    </script>
<script type="text/javascript">
//<![CDATA[
if (typeof _gstat != "undefined") _gstat.audience('','pagesperso-orange.fr');
//]]>
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
								
		// basic chart
		var flash = [[0, 2], [1, 6], [2,3], [3, 8], [4, 5], [5, 13], [6, 8]];
		var html5 = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
			
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
		var plot = jQuery.plot(jQuery("#chartplace2"),
			   [ { data: flash, label: "Flash(x)", color: "#fb6409"}, { data: html5, label: "HTML5(x)", color: "#096afb"} ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#ccc', borderWidth: 1, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		var previousPoint = null;
		jQuery("#chartplace2").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		});
		jQuery("#chartplace2").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
		// bar graph
		var d2 = [];
		for (var i = 0; i <= 10; i += 1)
			d2.push([i, parseInt(Math.random() * 30)]);
		var stack = 0, bars = true, lines = false, steps = false;
		jQuery.plot(jQuery("#bargraph2"), [ d2 ], {
			series: {
				stack: stack,
				lines: { show: lines, fill: true, steps: steps },
				bars: { show: bars, barWidth: 0.6 }
			},
			grid: { hoverable: true, clickable: true, borderColor: '#bbb', borderWidth: 1, labelMargin: 10 },
			colors: ["#06c"]
		});
		
		// calendar
		jQuery('#calendar').datepicker();
});
</script>
<style>
.pagination{
    width: 100%;
}
.pagination strong{
    float: left;padding: 5px 10px;border: 1px solid #CCC;background: #FFF;color: #666;margin: 5px;font-weight: bold
}
.pagination a:hover{
    float: left;padding: 5px 10px;border: 1px solid #CCC;background: #FFF;color: #666;margin: 5px;
}
.pagination a{
    float: left;padding: 5px 10px;border: 1px solid #CCC;background: #ccc;color: #FFF;margin: 5px;
}
</style>
</body>
</html>
