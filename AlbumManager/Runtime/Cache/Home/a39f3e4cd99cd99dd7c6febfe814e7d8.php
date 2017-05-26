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
          return false;
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
              <li class="active"><a href="/PHPAlbum/admin.php?a=picmgr">相册管理</a></li>
              <li><a href="/PHPAlbum/admin.php?a=comments">留言管理</a></li>
              <li><a href="/PHPAlbum/admin.php?a=usercenter">用户中心</a></li>
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
      <div id="uploader">
        <h2>相片上传</h2>
        <form method="post" action="">
        
        	<table class="table table-bordered table-condensed">
        		<thead>
        			<tr class="active">
        				<th class="col-md-3">
        					原图URL：
        				</th>
        				<th class="col-md-3">
        					缩略图URL：
        				</th>
        				<th class="col-md-3">
        					相片简介：
        				</th>
        				<th class="col-md-2">
        					上传时间：
        				</th>
        				<th class="col-md-1">
        					提交本图片:
        				</th>
        			</tr>
        		</thead>
				<tbody>
					<tr>
						<td class="col-md-3 text-center">
							<input type="text" name="full_url" id="full-url" placeholder="在此输入相册的原图URL"/>
						</td>
						<td class="col-md-3 text-center">
							<input type="text" name="thumb_url" id="thumb_url" placeholder="在此键入相片缩略图URL" />
						</td>
						<td class="col-md-3 text-center">
							<input type="text" name="img_description" id="img_description" placeholder="在此键入相片简介" />
						</td>
						<td class="col-md-2 text-center">
							<input type="text" name="upload_time" id="upload_time" placeholder="在此键入相片上传时间" value="<?php echo ($upload_srvtime); ?>" />
						</td>
						<td class="col-md-1 text-center">
							<input type="submit" name="btnUpload" id="btnUpload" value="添加" class="btn btn-default" />
						</td>
					</tr>
				</tbody>
        	</table>
        </form>
      </div>
      <br><hr><br>
      <h2>相片管理</h2>
      <br>
      <div id="box"></div>
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
				var response_str = "<table class='table table-bordered table-hover table-striped table-condensed' style='margin-top:-15px'><tr><td>本地输出序号</td><td>远程资源ID</td><td>资源完整URL</td><td>资源缩略图URL</td><td>资源信息简介</td><td>资源上传时间</td></tr>";
                var i = 1;
				$(ResponseText).find('item').each(
					function () {
            	   		var id = $(this).find('id').text();
						var furl = $(this).find('furl').text();
                       	var turl = $(this).find('turl').text();
                       	var dinfo = $(this).find('dinfo').text();
                       	var mtime = $(this).find('mtime').text();
                       	response_str += "<tr><td>" + i + "</td><td>" + id + "</td><td><a href='" + furl + "'>" + furl.substr(0,50) + "</a></td><td><a href='" + turl + "'>" + turl.substr(0,50) + "</a></td><td>" + dinfo + "</td><td>" + mtime + "</td></tr>";
                       	i=i+1;
					}
				);
				response_str += "</table>";
				$("#box").append(response_str);
			},
            error: function(){
        		alert("获取失败");
        	}
        });
    </script>
      
    </div> <!-- /container -->

  </body>
</html>