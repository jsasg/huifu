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
		<h4 class="title-text floatL">添加自定义菜单</h4>
		<div class="title-button floatR">
			<a href="#" class="btn btn-danger" onClick="submit('#customMenuForm')">
				<i class="glyphicon glyphicon-ok-sign"></i>
				保存
			</a>
			<a href="<?php echo U('CustomMenu/index');?>" class="btn btn-danger">
				<i class="glyphicon glyphicon-share-alt"></i>
				返回列表
			</a>
		</div>
	</div>

			
	<div class="main-content">
		<div class="warning warning-tips" role="alert">
		  	<p>1、自定义菜单需要申请公众平台服务号并绑定申请到的appid和secret.服务号可申请此接口权限</p>
		  	<p>2、每个账号一级菜单最多1-3个,二级菜单最多2-5个,最多支持两层</p>
		  	<p>3、自定义菜单每天最多可以同步到微信200次 </p>
		</div>
	</div>
	<form action="<?php echo U('CustomMenu/addCustomMenu');?>" method="post" class="form-horizontal" id="customMenuForm">
		<div class="border-dashed">
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
			    	<label for="parent-menu" class="col-sm-2 control-label">上级菜单：</label>
			    	<div class="col-sm-4">
			      		<select name="parent_menu" id="parent-menu">
			      			<option value="">≡ 作为一级菜单 ≡</option>
			      			<?php if(is_array($parent_menu)): $i = 0; $__LIST__ = $parent_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pa): $mod = ($i % 2 );++$i;?><option value="<?php echo ($pa['id']); ?>" <?php if($menu['parent_id'] == $pa['id']): ?>selected="selected"<?php endif; ?>>&nbsp;<?php echo ($pa['menu_name']); ?></option>
			      				<?php if(is_array($pa['subNode'])): $i = 0; $__LIST__ = $pa['subNode'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><option value="<?php echo ($sub['id']); ?>" <?php if($menu['parent_id'] == $sub['id']): ?>selected="selected"<?php endif; ?>>&emsp;|—<?php echo ($sub['menu_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
			      		</select>
			    	</div>
			</div>
			<div class="form-group">
			    	<label for="menu-type" class="col-sm-2 control-label">点击类型：</label>
			    	<div class="col-sm-4">
			      		<select name="menu_type" id="menu-type">
			      			<option value="click" <?php if($menu['click_type'] == 'click'): ?>selected="selected"<?php endif; ?>>≡ 使用回复方式 ≡</option>
			      			<option value="view" <?php if($menu['click_type'] == 'view'): ?>selected="selected"<?php endif; ?>>≡ 使用网页链接方式 ≡</option>
			      		</select>
			    	</div>
			</div>
			<div class="form-group">
			    	<label for="menu-name" class="col-sm-2 control-label">菜单名称：</label>
			    	<div class="col-sm-4">
			      		<input type="text" class="form-control" id="menu-name" name="menu_name" value="<?php echo ($menu['menu_name']); ?>" placeholder="菜单名称">
			    	</div>
			</div>
			<div class="form-group">
			    	<label for="menu-sort" class="col-sm-2 control-label">排序值：</label>
			    	<div class="col-sm-4">
			      		<input type="text" class="form-control" id="menu-sort" name="menu_sort" value="<?php echo ($menu['menu_sort']); ?>"} value="100">
			    	</div>
			</div>
		</div>
	</form>

		</div>
	</div>
</body>
</html>