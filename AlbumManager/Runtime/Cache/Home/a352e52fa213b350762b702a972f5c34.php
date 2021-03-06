<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      	<meta name="theme-color" content="#6495ED">
		<title>用户信息编辑</title>
        <!-- CSS -->
        <link rel="stylesheet" href="/Public/manager/css/reset.css">
        <link rel="stylesheet" href="/Public/manager/css/supersized.css">
        <link rel="stylesheet" type="text/css" href="/Public/manager/css/styles.css">
        <link rel="stylesheet" href="/Public/manager/css/style2.css">
		<!-- <style type="text/css">
		body,td,th { font-family: "Source Sans Pro", sans-serif; }
		/* body { background-color: #2B2B2B; } */
		</style> -->
      	<!-- Javascript -->
        <script src="/Public/manager/js/jquery-1.8.2.min.js"></script>
      	<script src="/Public/manager/js/supersized.3.2.7.min.js"></script>
      	<script src="/Public/manager/js/scripts.js"></script>
      	<script src="/Public/js/md5.js"></script>
	</head>
	<body>
        <div class="page-container">	           
			<div class="wrapper">	
				<div class="container">
					<strong><span style="font-weight: bold;font-size: 25px;">用户信息编辑</span></strong> 
					<form class="form" action="" method="post">
                      <label for="username">密码修改：</label>
                      <input type="text" name="newpwd" id="newpwd" placeholder="键入新密码" />
                      <label for="email">邮箱修改：</label>	
                      <input type="text" name="newmail" id="newmail" placeholder="键入新邮箱" />
                      <input type="hidden" name="uid" id="uid" value="<?php echo ($_GET['uid']); ?>" />
                      <input type="submit" id="change-button" value="应用更改" />
					</form>
				</div>
			</div>
        </div>
        <div id="footer" align="center" style="filter: alpha(Opacity=80);-moz-opacity: 0.5;opacity: 0.5;position: absolute;bottom: 0;left: 0;height: 20px;width: 100%;background-color: #000000;color: #ffffff">Powered By DingStudio</div>
      	<script>
      		jQuery(function($){
              
    			$.supersized({
                  
        			// Functionality
        			slide_interval     : 4000,    // Length between transitions
        			transition         : 1,    // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
        			transition_speed   : 1000,    // Speed of transition
        			performance        : 1,    // 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
                  
        			// Size & Position
        			min_width          : 0,    // Min width allowed (in pixels)
        			min_height         : 0,    // Min height allowed (in pixels)
        			vertical_center    : 1,    // Vertically center background
        			horizontal_center  : 1,    // Horizontally center background
        			fit_always         : 0,    // Image will never exceed browser width or height (Ignores min. dimensions)
        			fit_portrait       : 1,    // Portrait images will not exceed browser height
        			fit_landscape      : 0,    // Landscape images will not exceed browser width
                  
        			// Components
        			slide_links        : 'blank',    // Individual links for each slide (Options: false, 'num', 'name', 'blank')
        			slides             : [    // Slideshow Images
                                 		{image : '/Public/manager/img/backgrounds/1.jpg'},
                                 		{image : '/Public/manager/img/backgrounds/2.jpg'},
                                 		{image : '/Public/manager/img/backgrounds/3.jpg'}
                   	]
                  
    			});
              
			});
      	</script>
	</body>
</html>