<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统</title>
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
				$('div.base-left-1').height(winHeight);
				$('div.base-main-1').height(winHeight).width(winWidth-$('div.base-left-1').width());
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
			<!--<a href="<?php echo U('Index/index');?>" class="colorF "><span>&emsp;微信系统</span></a>-->
		</div>
		<div class="lineHeight-55 font14 colorF floatR">
			<a href="<?php echo U('Feedback/index');?>" class="nav-item floatL">
				<span><i class="glyphicon glyphicon-comment"></i>&nbsp;消息</span>
			</a>
            <a href="<?php echo U('Node/index');?>" class="nav-item floatL">
				<span><i class="glyphicon glyphicon-object-align-horizontal"></i>&nbsp;节点管理</span>
			</a>
            <a href="<?php echo U('Role/index');?>" class="nav-item floatL">
				<span><i class="glyphicon glyphicon-road"></i>&nbsp;角色管理</span>
			</a>
            <a href="<?php echo U('User/index');?>" class="nav-item floatL">
				<span><i class="glyphicon glyphicon-menu-hamburger"></i>&nbsp;分销管理</span>
			</a>
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
	<div class="base-left-1 background-black">
		<ul class="left-menu">
			<li class="menu-item lineHeight-45 colorF font16">
				<i class="glyphicon glyphicon-play font10"></i>
				<span>账号配置</span>
			</li>
			<ol class="left-menu-sub display-none">
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Bind/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>接口绑定</span>
					</a>
				</li>
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('FirstFocus/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>首次关注</span>
					</a>
				</li>
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('CustomMenu/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>菜单管理</span>
					</a>
				</li>
			</ol>
			<li class="menu-item lineHeight-45 colorF font16">
				<i class="glyphicon glyphicon-play font10"></i>
				<span>栏目管理</span>
			</li>
			<ol class="left-menu-sub display-none">
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Column/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>栏目列表</span>
					</a>
				</li>
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Column/add');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>添加栏目</span>
					</a>
				</li>
			</ol>
			<li class="menu-item lineHeight-45 colorF font16">
				<i class="glyphicon glyphicon-play font10"></i>
				<span>广告管理</span>
			</li>
			<ol class="left-menu-sub display-none">
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Advert/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>广告列表</span>
					</a>
				</li>
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Advert/add');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>添加广告</span>
					</a>
				</li>
			</ol>
			<li class="menu-item lineHeight-45 colorF font16">
				<i class="glyphicon glyphicon-play font10"></i>
				<span>文章管理</span>
			</li>
			<ol class="left-menu-sub display-none">
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Article/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>文章列表</span>
					</a>
				</li>
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Article/add');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>添加文章</span>
					</a>
				</li>
			</ol>
			<li class="menu-item lineHeight-45 colorF font16">
				<i class="glyphicon glyphicon-play font10"></i>
				<span>活动管理</span>
			</li>
			<ol class="left-menu-sub display-none">
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Activity/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>活动列表</span>
					</a>
				</li>
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Activity/add');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>添加活动</span>
					</a>
				</li>
			</ol>
			<li class="menu-item lineHeight-45 colorF font16">
				<i class="glyphicon glyphicon-play font10"></i>
				<span>产品管理</span>
			</li>
			<ol class="left-menu-sub display-none">
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Finance/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>产品列表</span>
					</a>
				</li>
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('FinanceOrder/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>产品订单</span>
					</a>
				</li>
			</ol>
			<li class="menu-item lineHeight-45 colorF font16">
				<i class="glyphicon glyphicon-play font10"></i>
				<span>促销模块</span>
			</li>
			<ol class="left-menu-sub display-none">
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Raise/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>帮他募集 </span>
					</a>
				</li>
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('RealTimeNews/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>实时消息</span>
					</a>
				</li>
			</ol>
			<li class="menu-item lineHeight-45 colorF font16">
				<i class="glyphicon glyphicon-play font10"></i>
				<span>会员管理</span>
			</li>
			<ol class="left-menu-sub display-none">
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Member/index');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>会员列表</span>
					</a>
				</li>
				<li class="menu-sub-item lineHeight-45">
					<a href="<?php echo U('Member/add');?>" class="colorF display-block">
						<i class="glyphicon glyphicon-play font10"></i>
						<span>会员注册</span>
					</a>
				</li>
			</ol>
		</ul>
	</div>
	<div class="base-main-1">
		<div class="main-box box-sizing">
			
	<div class="main-title">
		<h4 class="title-text floatL">会员注册</h4>
		<div class="title-button floatR">
			<a href="javascript:void(0)" class="btn btn-danger"  onClick="submit('#memberForm')">
				<i class="glyphicon glyphicon-ok-sign"></i>
				保存
			</a>
			<a href="<?php echo U('Member/index');?>" class="btn btn-danger">
				<i class="glyphicon glyphicon-share-alt"></i>
				返回列表
			</a>
		</div>
	</div>

			
	<div class="main-content margin-bottom-10">
		<div class="warning warning-tips" role="alert">
		  	<p>1、后台注册的会员，为顶级会员</p>
		</div>
		<form action="<?php echo U('Member/add');?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="memberForm">
			<input type="hidden" name="id" value="<?php echo ($member['id']); ?>">
			<div class="border-dashed">
				<div class="form-group">
				    	<label for="login_name" class="col-sm-2 control-label">用户名：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="login_name" name="login_name" value="<?php echo ($member['login_name']); ?>" placeholder="login_name">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="password" class="col-sm-2 control-label">密&emsp;码：</label>
				    	<div class="col-sm-4">
				      		<input type="password" class="form-control" id="password" name="password" value="<?php echo ($member['password']); ?>" placeholder="password">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="real_name" class="col-sm-2 control-label">姓&emsp;名：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="real_name" name="real_name" value="<?php echo ($member['real_name']); ?>" placeholder="real_name">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="mobile" class="col-sm-2 control-label">手机号：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo ($member['mobile']); ?>" placeholder="mobile">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="email" class="col-sm-2 control-label">邮箱号：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="email" name="email" value="<?php echo ($member['email']); ?>" placeholder="email">
				    	</div>
				</div>
			</div>
		</form>
	</div>

		</div>
	</div>
</body>
</html>