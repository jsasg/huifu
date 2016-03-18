<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>微信管理系统</title>
	<link rel="stylesheet" href="/huifu/Public/Common/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/huifu/Public/Common/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css"/>
	<link rel="stylesheet" href="/huifu/Public/Admin/css/base.css"/>
	<script src="/huifu/Public/Common/js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="/huifu/Public/Admin/js/base.js" type="text/javascript"></script>
	<script src="/huifu/Public/Common/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/huifu/Public/Common/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript" charset="UTF-8"></script>
	<script 'type'="javascript">
		$(document).ready(function(){
			resizeScroll();
			$(window).resize(function(){
				resizeScroll();
			})
			function resizeScroll(){
				var winHeight = $(window).height()-55;
				var winWidth = $(window).width();
				$('div.base-left').height(winHeight)
				$('div.base-main').height(winHeight).width(winWidth-$('div.base-left').width());
			}

			$('.menu-item').click(function(){
				$(this).next('.left-menu-sub').slideToggle();
			})
		})
	</script>
</head>
<body>
	<div class="base-top background-blue">
		<div class="lineHeight-55 font24 floatL">
			<a href="<?php echo U('Index/index');?>" class="colorF ">
                <img src="/huifu/Public/Admin/image/logo.png" alt="">
            </a>
		</div>
		<div class="lineHeight-55 font14 colorF floatR">
			<?php if(is_array($top_menu)): $i = 0; $__LIST__ = $top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tm): $mod = ($i % 2 );++$i;?><a href="<?php echo ($tm['url']); ?>" class="nav-item floatL">
                    <span><i class="<?php echo ($tm['icon']); ?>"></i>&nbsp;<?php echo ($tm['title']); ?></span>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
			<a href="<?php echo U('BasicSetup/index');?>" class="nav-item floatL">
				<span><i class="glyphicon glyphicon-cog"></i>&nbsp;基本设置</span>
			</a>
            <a href="<?php echo U('Index/index');?>" class="nav-item floatL">
				<span><i class="glyphicon glyphicon-home"></i>&nbsp;回到首页</span>
			</a>
			<a href="<?php echo U('Public/logout');?>" class="nav-item floatL">
				<span><i class="glyphicon glyphicon-off"></i>&nbsp;退出</span>
			</a>
		</div>
	</div>
	<div class="base-left background-black">
		<ul class="left-menu">
			<?php if(is_array($left_menu)): $i = 0; $__LIST__ = $left_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$me): $mod = ($i % 2 );++$i;?><li class="menu-item lineHeight-55 colorF font16">
                    <i class="<?php echo ($me['icon']); ?>"></i>
                    <span><?php echo ($me['title']); ?></span>
                </li>
                <ol class="left-menu-sub display-none">
                    <?php if(is_array($me[sub])): $i = 0; $__LIST__ = $me[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$su): $mod = ($i % 2 );++$i;?><li class="menu-sub-item lineHeight-45">
                            <a href="<?php echo ($su['url']); ?>" class="colorF display-block">
                                <i class="glyphicon glyphicon-menu-right font10"></i>
                                <span><?php echo ($su['title']); ?></span>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ol><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<div class="base-main">
		<div class="main-box box-sizing">
			
	<div class="main-title">
		<h4 class="title-text floatL">接口绑定</h4>
		<div class="title-button floatR">
			<a href="#" class="btn btn-danger" onClick="submit('#bindForm')">
				<i class="glyphicon glyphicon-ok-sign"></i>
				提交
			</a>
		</div>
	</div>

			
	<div class="main-content">
		<div class="warning warning-tips" role="alert">
		  	<p>1、请正确填写账号密码</p>
		  	<p>2、appid和secret,只有申请了服务号或微信认证后才有</p>
		  	<p>3、url（绑定之后生成）：<?php echo ($wechat['url']); ?></p>
		  	<p>3、token（绑定之后生成）：<?php echo ($wechat['token']); ?></p>
		</div>
	</div>
	<form action="<?php echo U('Bind/bindWechat');?>" method="post" class="form-horizontal" id="bindForm">
		<div class="form-group">
		    	<label for="wechat_account" class="col-sm-2 control-label">公众平台用户名：</label>
		    	<div class="col-sm-4">
		      		<input type="text" class="form-control" id="wechat_account" name="wechat_account" value="<?php echo ($wechat['wechat_account']); ?>" placeholder="平台用户名">
		    	</div>
		</div>
		<div class="form-group">
		    	<label for="wechat_password" class="col-sm-2 control-label">公众平台密码：</label>
		    	<div class="col-sm-4">
		      		<input type="text" class="form-control" id="wechat_password" name="wechat_password" value="<?php echo ($wechat['wechat_password']); ?>" placeholder="平台密码">
		    	</div>
		</div>
		<div class="form-group">
		    	<label for="init_id" class="col-sm-2 control-label">公众平台原始ID：</label>
		    	<div class="col-sm-4">
		      		<input type="text" class="form-control" id="init_id" name="init_id" value="<?php echo ($wechat['init_id']); ?>" placeholder="平台密码">
		    	</div>
		</div>
		<div class="form-group">
		    	<label for="appid" class="col-sm-2 control-label">APPID：</label>
		    	<div class="col-sm-4">
		      		<input type="text" class="form-control" id="appid" name="appid" value="<?php echo ($wechat['appid']); ?>" placeholder="appid">
		    	</div>
		</div>
		<div class="form-group">
		    	<label for="secret" class="col-sm-2 control-label">SECRET：</label>
		    	<div class="col-sm-4">
		      		<input type="text" class="form-control" id="secret" name="secret" value="<?php echo ($wechat['secret']); ?>" placeholder="secret">
		    	</div>
		</div>
	</form>

		</div>
	</div>
</body>
</html>