<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      	<meta name="theme-color" content="#6495ED">
		<title>用户登录</title>
        <!-- CSS -->
        <link rel="stylesheet" href="/PHPAlbum/Public/manager/css/reset.css">
        <link rel="stylesheet" href="/PHPAlbum/Public/manager/css/supersized.css">
        <link rel="stylesheet" type="text/css" href="/PHPAlbum/Public/manager/css/styles.css">
        <link rel="stylesheet" href="/PHPAlbum/Public/manager/css/style2.css">
		<!-- <style type="text/css">
		body,td,th { font-family: "Source Sans Pro", sans-serif; }
		/* body { background-color: #2B2B2B; } */
		</style> -->
      	<!-- Javascript -->
        <script src="/PHPAlbum/Public/manager/js/jquery-1.8.2.min.js"></script>
      	<script src="/PHPAlbum/Public/manager/js/supersized.3.2.7.min.js"></script>
      	<script src="/PHPAlbum/Public/manager/js/scripts.js"></script>
      	<script src="/PHPAlbum/Public/js/md5.js"></script>
      	<script>
      		function doAjaxLogin() {
            	$.ajax({
                	url:'/PHPAlbum/admin.php?c=Login&a=ajaxLogin',
                	type:'post',
                	dataType: 'xml',
                	data: {
						username: $('#username').val(),
						userpwd: $('#userpwd').val()
					},
                    async: false,
                    success: function (ResponseText) {
                      	var code = '';
						$(ResponseText).find('think').each(
							function () {
								code += $(this).find('code').text();
							}
						);
                      	if (code == 200) {
                        	alert("恭喜您，用户登录成功！");
                          	document.location="/PHPAlbum/admin.php";
                        }
                      	else if (code == 401) {
                        	alert("抱歉，用户名或密码不正确。请重试！");
                        }
                      	else if (code == 403) {
                        	alert("抱歉，用户名或密码不能为空。请重试！");
                        }
                      	else if (code == 405) {
                        	alert("非法的调用方法！请使用POST方式提交相关数据。");
                        }
                      	else if (code == 500) {
                        	alert("远程服务器发生异常，无法与后端数据库建立有效连接句柄！请联系站点管理员解决此问题。");
                        }
                      	else {
                        	alert("服务器返回未知句柄编号，请检查本地网络状态是否稳定！");
                        }
					},
                    error: function(){
        				alert("与后端服务器无法取得联系，登录请求发送失败！请稍后重试。");
        			}
            	});
              	return false;
            }
      	</script>
	</head>
	<body>
        <div class="page-container">	           
			<div class="wrapper">	
				<div class="container">
					<strong><span style="font-weight: bold;font-size: 25px;">用 户 登 录</span></strong> 
					<form class="form" action="" method="post" onsubmit="return doAjaxLogin()">
						<input type="text" name="username" id="username" placeholder="键入账号" />
						<input type="password" name="userpwd" id="userpwd" placeholder="键入密码" />
						<input type="submit" id="login-button" value="立即登录" /><input type="button" id="reg-button" value="没有账号？点此注册" onclick="document.location='/PHPAlbum/admin.php?c=Regsiter';" />
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
                                 		{image : '/PHPAlbum/Public/manager/img/backgrounds/1.jpg'},
                                 		{image : '/PHPAlbum/Public/manager/img/backgrounds/2.jpg'},
                                 		{image : '/PHPAlbum/Public/manager/img/backgrounds/3.jpg'}
                   	]
                  
    			});
              
			});
      	</script>
	</body>
</html>