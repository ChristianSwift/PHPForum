<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh">
	<head>
		<title><?php echo ($myalbum_name); ?></title>
		<meta charset="utf-8" />
		<meta name="theme-color" content="#FFB6C1">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="/PHPAlbum/Public/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="/PHPAlbum/Public/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="/PHPAlbum/Public/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="/PHPAlbum/Public/css/ie8.css" /><![endif]-->
		<!-- Scripts -->
		<script src="/PHPAlbum/Public/js/jquery.min.js"></script>
		<script src="/PHPAlbum/Public/js/jquery.poptrox.min.js"></script>
		<script src="/PHPAlbum/Public/js/skel.min.js"></script>
		<script src="/PHPAlbum/Public/js/util.js"></script>
		<!--[if lte IE 8]><script src="/PHPAlbum/Public/js/ie/respond.min.js"></script><![endif]-->
		<script src="/PHPAlbum/Public/js/main.js"></script>
		<script src="/PHPAlbum/Public/js/jquery.json2html.js"></script>
		<script src="/PHPAlbum/Public/js/json2html.js"></script>
		<script>
		  function disShowDialog() {
			alert("站点管理员尚未开启此社交平台快速入口！");
		  }
		  function goTW() {
			document.location="<?php echo ($myalbum_twitter); ?>";
		  }
		  function goFC() {
			document.location="<?php echo ($myalbum_facebook); ?>";
		  }
		  function goGT() {
			document.location="<?php echo ($myalbum_github); ?>";
		  }
          function postMsg() {
          	$.ajax({
				url:'/PHPAlbum/index.php?c=ajax&a=postmsg',
				type:'post',
				dataType: 'xml',
				data: {
					name: $('#name').val(),
					ctu: $('#ctu').val(),
                  	message: $('#message').val()
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
                    	alert("恭喜您，留言投递成功！");
                      	$('#message').val("");
                    }
                  	else if (code == 403) {
                        alert("抱歉，请确保填写了所有必填项目后再次尝试提交！本次操作已被系统拒绝。");
                    }
                  	else if (code == 405) {
                       	alert("非法的调用方法！请使用POST方式提交相关数据。");
                    }
                  	else if (code == 500) {
                       	alert("远程服务器发生异常，无法与后端数据库建立有效连接句柄！请联系站点管理员解决此问题。");
                    }
                   	else {
                      	alert(code);
                    }
				},
				error: function(){
					alert("与后端服务器无法取得联系，留言投递失败！请稍后重试。");
				}
			});
            return false;
          }
		</script>
	</head>
  	<body>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header">
						<h1><a href="javascript:void(0);"><strong>Album</strong> by <?php echo ($myalbum_author); ?></a></h1>
						<nav>
							<ul>
								<li><a href="#footer" class="icon fa-info-circle">关于相册</a></li>
							</ul>
						</nav>
					</header>
				<!-- MainBox -->
					<div id="main">
					    <!--<article class="thumb">
							<a href="full.png" class="image"><img src="thumb.png" alt="" /></a>
							<h2>information</h2>
							<p>datetime</p>
						</article>-->
                      <script>
                    	$.ajax({
                    		url:'/PHPAlbum/index.php?c=ajax&a=getinfo',
                    		type:'post',
                      		dataType: 'xml',
                      		data: {
								act: 'full',
								sid: 'null'
							},
                      		async: false,
                    		success: function (ResponseText) {
                          		var response_str = ''; //设置空值，防止出现undefined或null输出
								$(ResponseText).find('item').each(
									function () {
										var furl = $(this).find('furl').text();
                                  		var turl = $(this).find('turl').text();
                                  		var dinfo = $(this).find('dinfo').text();
                                  		var mtime = $(this).find('mtime').text();
                            			response_str += '<article class="thumb"><a href="' + furl + '" class="image"><img src="' + turl + '" alt="" /></a><h2>' + dinfo + '</h2><p>' + mtime + '</p></article>';
									}
								);
								$("#main").append(response_str);
					  		},
                      		error: function(){
        						alert("与后端服务器无法取得联系，相册数据拉取失败！请稍后重试。");
        					}
                    	});
                	</script>
					</div>
              			<!-- background music -->
			<div id="bgmusic" align="center" style="display: none"><audio src="<?php echo ($myalbum_bgm); ?>" controls="controls" autoplay="autoplay" loop="loop" height="100" width="100" type="audio/mp3"><br><embed height="100" width="100" src="<?=constant('AlbumBGMUrl')?>"><br></audio></div>
			<!-- Footer -->
			<footer id="footer" class="panel">
				<div class="inner split">
					<div>
						<section>
							<h2>相册说明</h2>
							<p><?php echo ($myalbum_introduction); ?></p>
						</section>
						<section>
							<h2>Follow me on ...</h2>
							<ul class="icons">
								<li><a href="javascript:void(0);" onClick="goTW();" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="javascript:void(0);" onClick="goFC();" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="javascript:void(0);" onClick="goGT();" class="icon fa-github"><span class="label">GitHub</span></a></li>
							</ul>
						</section>
						<p class="copyright">
							&copy; <?php echo ($myalbum_copyright); ?> Software by <a href="http://www.dingstudio.cn">DingStudio.Tech</a>.
						</p>
					</div>
					<div>
						<section>
							<h2>写下您要说的话</h2>
							<form method="post" action="" onsubmit="return postMsg()">
								<div class="field half first">
									<input type="text" name="name" id="name" placeholder="您的昵称" />
								</div>
								<div class="field half">
									<input type="text" name="ctu" id="ctu" placeholder="联系方式" />
								</div>
								<div class="field">
									<textarea name="message" id="message" rows="4" placeholder="您要告诉我的话请在这里留言"></textarea>
								</div>
								<ul class="actions">
									<li><input type="submit" value="提交留言" class="special" /></li>
									<li><input type="reset" value="清空输入" /></li>
								</ul>
							</form>
						</section>
					</div>
				</div>
			</footer>
		</div>
	</body>
</html>