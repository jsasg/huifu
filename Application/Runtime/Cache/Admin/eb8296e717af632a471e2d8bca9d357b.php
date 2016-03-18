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
	<div class="base-left background-black">
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
	<div class="base-main">
		<div class="main-box box-sizing">
			
	<div class="main-title">
		<h4 class="title-text floatL">募集活动添加</h4>
		<div class="title-button floatR">
			<a href="javascript:void(0)" class="btn btn-danger"  onClick="submit('#raiseForm')">
				<i class="glyphicon glyphicon-ok-sign"></i>
				保存
			</a>
			<a href="<?php echo U('Raise/index');?>" class="btn btn-danger">
				<i class="glyphicon glyphicon-share-alt"></i>
				返回列表
			</a>
		</div>
	</div>

			
	<div class="main-content margin-bottom-10">
		<div class="warning warning-tips" role="alert">
		  	<p>1、募集次数表示，需要多少次点击才能满上限</p>
		</div>
		<form action="<?php echo U('Raise/add');?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="raiseForm">
			<input type="hidden" name="id" value="<?php echo ($raise['id']); ?>">
			<div class="border-dashed">
				<div class="form-group">
				    	<label for="raise_top" class="col-sm-2 control-label">募集上限：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="raise_top" name="raise_top" value="<?php echo ($raise['raise_top']); ?>" placeholder="募集上限">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="raise_count" class="col-sm-2 control-label">募集次数：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="raise_count" name="raise_count" value="<?php echo ($raise['raise_count']); ?>" placeholder="募集次数">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="start_time" class="col-sm-2 control-label">开始时间：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="start_time" name="start_time" value="<?php echo ((isset($raise['start_time']) && ($raise['start_time'] !== ""))?($raise['start_time']):''); ?>" placeholder="活动开始时间">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="end_time" class="col-sm-2 control-label">结束时间：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="end_time" name="end_time" value="<?php echo ((isset($raise['end_time']) && ($raise['end_time'] !== ""))?($raise['end_time']):''); ?>" placeholder="活动结束时间">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="raise_picture" class="col-sm-2 control-label">缩略图：</label>
				    	<div class="col-sm-4">
				      		<?php if($raise['raise_picture'] == false): ?><input type="file" id="raise_picture" name="raise_picture" />
				      		<?php else: ?>
				      			<img src="/huifu/Public/Uploads/images//<?php echo ($raise['raise_picture']); ?>"  class="height100" alt="">
				      			<a href="<?php echo U('Raise/delPicture',array('raise_id'=>$raise['id']));?>" >删除图片</a><?php endif; ?>
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="is_open" class="col-sm-2 control-label">是否开启：</label>
				    	<div class="col-sm-4">
				      		<label class="radio-inline">
						  	<input type="radio" name="is_open" id="is_open" value="1" <?php if($raise['is_open'] == 1): ?>checked="checked"<?php endif; ?>> 是
						</label>
						<label class="radio-inline">
						  	<input type="radio" name="is_open" id="is_open" value="0" <?php if($raise['is_open'] == 0): ?>checked="checked"<?php endif; ?>> 否
						</label>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="url" class="col-sm-2 control-label">活动说明：</label>
				    	<div class="col-sm-8">
						<script type="text/javascript" src="/huifu/Public/Admin/ueditor/ueditor.config.js"></script>
						<script type="text/javascript" src="/huifu/Public/Admin/ueditor/ueditor.all.min.js"></script>
    						<script>
    							$(function(){
        								var ue = UE.getEditor('container',{
            								serverUrl :'<?php echo U('Admin/Article/ueditor');?>'
       	 							});
    							})
    						</script>
				      		<script id="container" name="content" type="text/plain"><?php echo (html_entity_decode($raise['content'])); ?></script>
				    	</div>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
   		 $("#sign_up_end,#start_time,#end_time").datetimepicker({
       			 format: "yyyy-mm-dd",
       			 autoclose: true,
        			 pickerPosition: "bottom-left",
        			 maxView: "year",
        			 minView: "month",
        			 language: "zh",
   		 });
	</script>     

		</div>
	</div>
</body>
</html>