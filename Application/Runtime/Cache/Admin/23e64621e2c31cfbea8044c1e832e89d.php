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
		<!--<div class="logo-box floatL">
			<a href="<?php echo U('Index/index');?>" class="colorF "><span>&emsp;微信系统</span></a>
		</div>-->
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
	<div class="base-left">
		<ul class="left-menu">
			<li class="menu-item colorF">
				<i class="glyphicon glyphicon-wrench font-1-5"></i><br>
				<span class="font16">配置</span>
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
			<li class="menu-item colorF">
				<i class="glyphicon glyphicon-th-list font-1-5"></i><br>
				<span class="font16">栏目</span>
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
			<li class="menu-item colorF">
				<i class="glyphicon glyphicon-picture font-1-5"></i><br>
				<span class="font16">广告</span>
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
			<li class="menu-item colorF">
				<i class="glyphicon glyphicon-file font-1-5"></i><br>
				<span class="font16">文章</span>
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
			<li class="menu-item colorF">
				<i class="glyphicon glyphicon-tags font-1-5"></i><br>
				<span class="font16">活动</span>
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
			<li class="menu-item colorF">
				<i class="glyphicon glyphicon-inbox font-1-5"></i><br>
				<span class="font16">产品</span>
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
			<li class="menu-item colorF">
				<i class="glyphicon glyphicon-gift font-1-5"></i><br>
				<span class="font16">促销</span>
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
            <li class="menu-item colorF">
				<i class="glyphicon glyphicon-list-alt font-1-5"></i><br>
				<span class="font16">订单</span>
			</li>
			<li class="menu-item colorF">
				<i class="glyphicon glyphicon-credit-card font-1-5"></i><br>
				<span class="font16">会员</span>
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
	<div class="base-main">
		<div class="main-box box-sizing">
			
	<div class="main-title">
		<h4 class="title-text floatL">添加栏目</h4>
		<div class="title-button floatR">
			<a href="#" class="btn btn-danger" onClick="submit('#columnForm')">
				<i class="glyphicon glyphicon-ok-sign"></i>
				保存
			</a>
			<a href="<?php echo U('Column/index');?>" class="btn btn-danger">
				<i class="glyphicon glyphicon-share-alt"></i>
				返回列表
			</a>
		</div>
	</div>

			
	<div class="main-content">
		<div class="warning warning-tips" role="alert">
		  	<p>1、如设为底部导航显示，页面不会再显示</p>
		  	<p>2、如果上传了自定义图标，则以自定义图标优先</p>
		  	<p>3、自定义图标个传比例为1：1</p>
		  	<p>4、显示为底部，只能有4个</p>
		</div>
		<form action="<?php echo U('Column/add');?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="columnForm">
			<input type="hidden" name="id" value="<?php echo ($column['id']); ?>">
			<div class="border-dashed">
				<div class="form-group">
				    	<label for="parent_column" class="col-sm-2 control-label">上级栏目：</label>
				    	<div class="col-sm-4">
				      		<select name="parent_column" id="parent_column">
				      			<option value="">≡ 作为一级菜单 ≡</option>
				      			<?php if(is_array($parent_column)): $i = 0; $__LIST__ = $parent_column;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pa): $mod = ($i % 2 );++$i;?><option value="<?php echo ($pa['id']); ?>" <?php if($column['parent_id'] == $pa['id']): ?>selected="selected"<?php endif; ?>><?php echo ($pa['column_name']); ?></option>
				      				<?php if(is_array($pa['subNode'])): $i = 0; $__LIST__ = $pa['subNode'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><option value="<?php echo ($sub['id']); ?>" <?php if($column['parent_id'] == $sub['id']): ?>selected="selected"<?php endif; ?>>&emsp;|—<?php echo ($sub['column_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
				      		</select>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="column_name" class="col-sm-2 control-label">栏目名称：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="column_name" name="column_name" value="<?php echo ($column['column_name']); ?>" placeholder="栏目名称">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="column_title" class="col-sm-2 control-label">头部导航标题：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="column_title" name="column_title" value="<?php echo ($column['column_title']); ?>" placeholder="头部导航标题">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="column_sort" class="col-sm-2 control-label">排序：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" name="column_sort" id="column_sort" value="<?php echo ($column['column_sort']); ?>" placeholder="排序">
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="column_icon" class="col-sm-2 control-label">icon图标：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" name="column_icon" value="<?php echo ($column['column_icon']); ?>" id="column_icon" placeholder="icon图标">
				    	</div>
				    	<div class="col-sm-1">
				    		<input class="btn btn-default" type="button" value="选择icon"  onClick="clickIcon('#icon')">
				    	</div>
				</div>
				<div id="icon" class="display-none">
					<ul class="col-sm-12 left-menu colorF border-radius-3 padding-top-10 padding-bottom-10" id="icon-list">
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-asterisk"></i>
		<span> glyphicon glyphicon-asterisk</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-euro"></i>
		<span> glyphicon glyphicon-euro</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-cloud"></i>
		<span> glyphicon glyphicon-cloud</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-envelope"></i>
		<span> glyphicon glyphicon-envelope</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-pencil"></i>
		<span> glyphicon glyphicon-pencil</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-user"></i>
		<span> glyphicon glyphicon-user</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-th-list"></i>
		<span> glyphicon glyphicon-th-list</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-th"></i>
		<span> glyphicon glyphicon-th</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-heart"></i>
		<span> glyphicon glyphicon-heart</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-star"></i>
		<span> glyphicon glyphicon-star</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-star-empty"></i>
		<span> glyphicon glyphicon-star-empty</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-music"></i>
		<span> glyphicon glyphicon-music</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-signal"></i>
		<span> glyphicon glyphicon-signal</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-list-alt"></i>
		<span> glyphicon glyphicon-list-alt</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-qrcode"></i>
		<span> glyphicon glyphicon-qrcode</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-tag"></i>
		<span> glyphicon glyphicon-tag</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-headphones"></i>
		<span> glyphicon glyphicon-headphones</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-flag"></i>
		<span> glyphicon glyphicon-flag</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-bookmark"></i>
		<span> glyphicon glyphicon-bookmark</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-camera"></i>
		<span> glyphicon glyphicon-camera</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-tags"></i>
		<span> glyphicon glyphicon-tags</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-book"></i>
		<span> glyphicon glyphicon-book</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-picture"></i>
		<span> glyphicon glyphicon-picture</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class=" glyphicon glyphicon-facetime-video"></i>
		<span>  glyphicon glyphicon-facetime-video</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class=" glyphicon glyphicon-map-marker"></i>
		<span>  glyphicon glyphicon-map-marker</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-tint"></i>
		<span> glyphicon glyphicon-tint</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-tint"></i>
		<span> glyphicon glyphicon-tint</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-edit"></i>
		<span> glyphicon glyphicon-edit</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-move"></i>
		<span> glyphicon glyphicon-move</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-fire"></i>
		<span> glyphicon glyphicon-fire</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-gift"></i>
		<span>  glyphicon glyphicon-gift</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-leaf"></i>
		<span> glyphicon glyphicon-leaf</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-comment"></i>
		<span>  glyphicon glyphicon-comment</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-shopping-cart"></i>
		<span>  glyphicon glyphicon-shopping-cart</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-folder-open"></i>
		<span>  glyphicon glyphicon-folder-open</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-thumbs-up"></i>
		<span>  glyphicon glyphicon-thumbs-up</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-bell"></i>
		<span> glyphicon glyphicon-bellt</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-bullhorn"></i>
		<span> glyphicon glyphicon-bullhorn</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-globe"></i>
		<span> glyphicon glyphicon-globe</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-briefcase"></i>
		<span> glyphicon glyphicon-briefcase</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-link"></i>
		<span> glyphicon glyphicon-link</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-phone"></i>
		<span> glyphicon glyphicon-phone</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-pushpin"></i>
		<span> glyphicon glyphicon-pushpin</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-usd"></i>
		<span> glyphicon glyphicon-usd</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-gbp"></i>
		<span> glyphicon glyphicon-gbp</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-unchecked"></i>
		<span> glyphicon glyphicon-unchecked</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-paperclip"></i>
		<span> glyphicon glyphicon-paperclip</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-flash"></i>
		<span> glyphicon glyphicon-flash</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-send"></i>
		<span> glyphicon glyphicon-send</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-credit-card"></i>
		<span> glyphicon glyphicon-credit-card</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class=" glyphicon glyphicon-cutlery"></i>
		<span>  glyphicon glyphicon-cutlery</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-earphone"></i>
		<span> glyphicon glyphicon-earphone</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-phone-alt"></i>
		<span> glyphicon glyphicon-phone-alt</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-tree-conifer"></i>
		<span> glyphicon glyphicon-tree-conifer</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class=" glyphicon glyphicon-tree-deciduous"></i>
		<span>  glyphicon glyphicon-tree-deciduous</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-cd"></i>
		<span> glyphicon glyphicon-cd</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-equalizer"></i>
		<span>  glyphicon glyphicon-equalizer</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-king"></i>
		<span>  glyphicon glyphicon-king</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-blackboard"></i>
		<span>  glyphicon glyphicon-blackboard</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-bed"></i>
		<span> glyphicon glyphicon-bed</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-apple"></i>
		<span> glyphicon glyphicon-apple</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-erase"></i>
		<span> glyphicon glyphicon-erase</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-hourglass"></i>
		<span> glyphicon glyphicon-hourglass</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-lamp"></i>
		<span> glyphicon glyphicon-lamp</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-piggy-bank"></i>
		<span> glyphicon glyphicon-piggy-bank</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-scissors"></i>
		<span> glyphicon glyphicon-scissors</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-yen"></i>
		<span> glyphicon glyphicon-yen</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-education"></i>
		<span> glyphicon glyphicon-education</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-grain"></i>
		<span> glyphicon glyphicon-grain</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class="glyphicon glyphicon-sunglasses"></i>
		<span> glyphicon glyphicon-sunglasses</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class=" lyphicon glyphicon-oil"></i>
		<span> glyphicon glyphicon-oil</span>
	</li>
	<li class="col-sm-4 cursor-pointer">
		<i class=" glyphicon glyphicon-home"></i>
		<span>glyphicon glyphicon-home</span>
	</li>
</ul>
				</div>
				<div class="form-group">
				    	<label for="custom_picture" class="col-sm-2 control-label">自定义图标：</label>
				    	<div class="col-sm-4">
				    		<?php if($column['column_custom'] != false): ?><img src="/huifu/Public/Uploads/images//<?php echo ($column['column_custom']); ?>" class="custom_picture" alt="">
								<a href="<?php echo U('Column/delPicture',array('id'=>$column['id']));?>" >删除</a>
				    		<?php else: ?>
								<input type="file" class="" id="custom_picture" name="custom_picture" placeholder="自定义图标"><?php endif; ?>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="column_bgcolor" class="col-sm-2 control-label">栏目背景色：</label>
				    	<div class="col-sm-4">
				      		<input type="color" class="form-control" name="column_bgcolor" value="<?php echo ($column['column_bgcolor']); ?>" id="column_bgcolor" placeholder="栏目背景色">
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="is_open" class="col-sm-2 control-label">是否开启：</label>
				    	<div class="col-sm-4">
				      		<label class="radio-inline">
						  	<input type="radio" name="is_open" id="is_open" value="1" <?php if($column['is_open'] == 1): ?>checked="checked"<?php endif; ?>> 是
						</label>
						<label class="radio-inline">
						  	<input type="radio" name="is_open" id="is_open" value="0" <?php if($column['is_open'] == 0): ?>checked="checked"<?php endif; ?>> 否
						</label>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="is_footer" class="col-sm-2 control-label">是否做为底部导航：</label>
				    	<div class="col-sm-4">
				      		<label class="radio-inline">
						  	<input type="radio" name="is_footer" id="is_footer" value="1" <?php if($column['is_footer'] == 1): ?>checked="checked"<?php endif; ?>> 是
						</label>
						<label class="radio-inline">
						  	<input type="radio" name="is_footer" id="is_footer" value="0" <?php if($column['is_footer'] == 0): ?>checked="checked"<?php endif; ?>> 否
						</label>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="column_desc" class="col-sm-2 control-label">栏目描述：</label>
				    	<div class="col-sm-4">
				      		<input type="url" class="form-control" name="column_desc" value="<?php echo ($column['column_desc']); ?>" id="column_desc" placeholder="栏目描述">
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="url" class="col-sm-2 control-label">自定义url：</label>
				    	<div class="col-sm-4">
				      		<input type="url" class="form-control" name="column_url" value="<?php echo ($column['column_url']); ?>" id="url" placeholder="自定义url">
				    	</div>
				</div>
			</div>
			<div class="border-dashed margin-top-10 margin-bottom-10">
				<span>请使用链接生成助手生成站内URL链接：</span>
				<select name="helper_url" id="helper_url">
					<option value="">≡ 请选择要生成链接的栏目 ≡</option>
					<?php if(is_array($help)): $i = 0; $__LIST__ = $help;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=""><?php echo ($vo['url_type']); ?></option>
						<?php if(is_array($vo['url'])): $i = 0; $__LIST__ = $vo['url'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ur): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ur['column_url']); ?>">&emsp;|—<?php echo ($ur['url_desc']); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
		</form>
	</div>
	<script type="text/javascript" >
		$(document).ready(function(){
			$('body').delegate('#helper_url','change',function(){
				$('#url').val($(this).val());
			})
		})
	</script>

		</div>
	</div>
</body>
</html>