<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Đăng nhập quản lý <?php echo $adminConfig['website_url'];?></title>
<link rel="icon" type="image/png" href="<?php echo $baseurl.'public/theme/manage/img/star.png';?>" />
<link rel="stylesheet" href="<?php echo $baseurl.'public/theme/manage/'?>css/style.default.css" type="text/css" />
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo $baseurl.'public/theme/manage/'?>js/jquery-migrate-1.1.1.min.js"></script>
</head>
<body class="loginbody">
<div class="loginwrapper">
	<div class="loginwrap zindex100 animate2 bounceInDown">
	<h1 class="logintitle"><span class="iconfa-lock"></span> Đăng nhập <span class="subtitle">Xin chào! Bạn hãy điền thông tin để bắt đầu</span></h1>
        <div class="loginwrapperinner">
            <?php echo form_open();?>
                 <?php if(isset($result) || validation_errors()):?>
                 <p class="animate7 fadeIn" style="text-align: center;color: #FF4F53;font-weight: bold;font-size: 16px;" id="show_msg_error">
                     <?php if(isset($result)){echo $result;}?>
                     <?php echo validation_errors(); ?>
                 </p>
                 <?php endif;?>
                <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Tên đăng nhập" /></p>
                <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Mật khẩu" /></p>
                <p class="animate6 bounceIn"><button class="btn btn-default btn-block">Đăng nhập</button></p>
                
            </form>
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow animate3 fadeInUp"></div>
</div><!--loginwrapper-->
</body>
</html>
