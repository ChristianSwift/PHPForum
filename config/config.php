<?php

    $commonconf = array(

		'DB_TYPE'   => 'mysqli', // 数据库类型：本系统支持mysql和mysqli两种连接方式，php5.0以上版本均支持全新的mysqli方式
		'DB_HOST'   => 'localhost', // 服务器地址
		'DB_USER'   => 'tp3', // 用户名
		'DB_PWD'    => 'tp3tp3tp3', // 密码
		'DB_PORT'   => 3306, // 端口		
		'DB_NAME'   => 'tp3', // 数据库名
		'DB_PREFIX' => '', // 数据库表前缀
      
      	//'GEETEST_AK' => 'fbbc37ecbab479cc41a0076606ddd695', //极验验证应用公钥
      	//'GEETEST_SK' => '4195cbb0741c7529e2d7ab8a2f487f4b', //极验验证应用私钥
      
      	//'DEFAULT_TIMEZONE' => 'PRC', //系统时区配置
      
      	'myalbum_name' => '纪录人生|浅忆个人相册', //相册名称与标题配置
      	'myalbum_introduction' => '这是小丁工作室创始人浅忆的个人相册，欢迎您的访问。如果您对我有什么建议，请通过右侧的留言板给我留言！', //相册详细介绍配置
      	'myalbum_twitter' => 'http://twitter.com/2LAS8xv58sV2BlS', //相册社交-推特配置
      	'myalbum_facebook' => 'http://www.facebook.com/dingstudio2016', //相册社交-脸书配置
      	'myalbum_github' => 'http://github.com/ddawx123', //相册社交-github配置
      	'myalbum_author' => 'David Ding', //相册作者信息配置
      	'myalbum_bgm' => 'http://mycache-1253438845.cossh.myqcloud.com/musics/Talent-Flute.mp3', //相册背景音乐配置
      	'myalbum_copyright' => 'David Ding', //相册版权信息配置
      
      	'myalbum_ssosrv' => 'false', //单点登录支持模式，如果为false则说明关闭sso。此功能为私有功能，需要配合小丁工作室SSO服务端！
	    
	    'URL_CASE_INSENSITIVE'  =>  true //URL不区分大小写
	
	);

?>