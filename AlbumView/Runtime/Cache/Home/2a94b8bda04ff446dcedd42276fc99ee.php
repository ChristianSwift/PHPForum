<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh">
	<head>
		<title>test</title>
		<meta charset="utf-8" />
		<meta name="theme-color" content="#ff8c00">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="/album/Public/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="/album/Public/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="/album/Public/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="/album/Public/css/ie8.css" /><![endif]-->
		<!-- Scripts -->
		<script src="/album/Public/js/jquery.min.js"></script>
		<script src="/album/Public/js/jquery.poptrox.min.js"></script>
		<script src="/album/Public/js/skel.min.js"></script>
		<script src="/album/Public/js/util.js"></script>
		<!--[if lte IE 8]><script src="/album/Public/js/ie/respond.min.js"></script><![endif]-->
		<script src="/album/Public/js/main.js"></script>
		<script src="/album/Public/js/jquery.json2html.js"></script>
		<script src="/album/Public/js/json2html.js"></script>
		<script src="/album/Public/js/init.js"></script>
		<script>
		  function disShowDialog() {
			alert("test");
		  }
		  function goTW() {
			document.location="http://test.dingstudio.cn";
		  }
		  function goFC() {
			document.location="http://test.dingstudio.cn";
		  }
		  function goGT() {
			document.location="http://test.dingstudio.cn";
		  }
		</script>
	</head>
  	<body>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header">
						<h1><a href="javascript:void(0);"><strong>Album</strong> by test</a></h1>
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
					</div>
              			<!-- background music -->
			<div id="bgmusic" align="center" style="display: none"><audio src="" controls="controls" autoplay="autoplay" loop="loop" height="100" width="100" type="audio/mp3"><br><embed height="100" width="100" src="<?=constant('AlbumBGMUrl')?>"><br></audio></div>
			<!-- Footer -->
			<footer id="footer" class="panel">
				<div class="inner split">
					<div>
						<section>
							<h2>相册说明</h2>
							<p>test</p>
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
							&copy; 2017 <a href="http://www.dingstudio.cn">DingStudio.Tech</a>.
						</p>
					</div>
					<div>
						<section>
							<h2>写下您要说的话</h2>
							<form method="post" action="./index.php?m=postmsg">
								<div class="field half first">
									<input type="text" name="name" id="name" placeholder="您的昵称" />
								</div>
								<div class="field half">
									<input type="text" name="ctu" id="ctu" placeholder="Email" />
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