<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <title>相册管理中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="相册管理系统|相册管理中心">
    <meta name="author" content="DingStudio">

    <!-- Le styles -->
    <link href="/PHPAlbum/Public/manager/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="/PHPAlbum/Public/manager/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/PHPAlbum/Public/manager/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/PHPAlbum/Public/manager/img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/PHPAlbum/Public/manager/img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/PHPAlbum/Public/manager/img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/PHPAlbum/Public/manager/img/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/PHPAlbum/Public/manager/img/favicon.png">

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/PHPAlbum/Public/manager/js/jquery.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-transition.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-alert.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-modal.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-dropdown.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-scrollspy.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-tab.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-tooltip.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-popover.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-button.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-collapse.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-carousel.js"></script>
    <script src="/PHPAlbum/Public/manager/js/bootstrap-typeahead.js"></script>
    <script>
        function doAjaxLogout() {
            $.ajax({
              url:'/PHPAlbum/admin.php?c=Login&a=ajaxLogout',
              type:'get',
              dataType: 'xml',
              async: false,
              success: function (ResponseText) {
                var code = '';
                $(ResponseText).find('think').each(
                  function () {
                    code += $(this).find('code').text();
                  }
                );
                if (code == 200) {
                  alert("恭喜您，用户注销成功！");
                  document.location="/PHPAlbum/admin.php?c=Login";
                }
                else if (code == 403) {
                  alert("抱歉，当前没有有效的登录会话，无需再次注销！");
                  document.location="/PHPAlbum/admin.php?c=Login";
                }
                else {
                  alert("服务器返回未知句柄编号，请检查本地网络状态是否稳定！");
                }
              },
              error: function(){
                alert("与后端服务器无法取得联系，注销请求发送失败！请稍后重试。");
              }
            });
        }
    </script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">相册管理中心</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="/PHPAlbum/admin.php">最新动态</a></li>
              <li><a href="/PHPAlbum/admin.php?a=picmgr">相册管理</a></li>
              <li><a href="/PHPAlbum/admin.php?a=comments">留言管理</a></li>
              <li class="active"><a href="/PHPAlbum/admin.php?a=usercenter">用户中心</a></li>
              <li><a href="/PHPAlbum/admin.php?a=settings">相册设置</a></li>
              <li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">退出登录</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
        <!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					会话操作确认
				</h4>
			</div>
			<div class="modal-body">
				您确认要退出本次会话吗？请确认没有正在进行且尚未保存的工作哦～
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-warning" onclick="return doAjaxLogout()">仍要注销</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
<!-- 模态框结束 -->

    <div class="container">

      <h1>相册最新动态</h1>
      <p>
      Latest album status
      </p>

    </div> <!-- /container -->

  </body>
</html>