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
		<h4 class="title-text floatL">添加产品</h4>
		<div class="title-button floatR">
			<a href="#" class="btn btn-danger" onClick="submit('#financeForm')">
				<i class=" glyphicon glyphicon-ok-sign"></i>
				保存
			</a>
			<a href="<?php echo U('Finance/index');?>" class="btn btn-danger">
				<i class="glyphicon glyphicon-share-alt"></i>
				返回列表
			</a>
		</div>
	</div>

			
	<div class="main-content margin-bottom-10">
		<div class="warning warning-tips" role="alert">
		  	<p>1、关键词以','区分</p>
			<p>2、投资期限需要填写单位，如：10天，3个月，1年等</p>
		</div>
		<form action="<?php echo U('Finance/add');?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="financeForm">
			<input type="hidden" name="id" value="<?php echo ($finance['id']); ?>">
			<div class="border-dashed">
				<div class="form-group">
				    	<label for="finance_name" class="col-sm-2 control-label">产品名称：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="finance_name" name="finance_name" value="<?php echo ($finance['goods_name']); ?>" placeholder="产品名称">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="finance_key" class="col-sm-2 control-label">关键词：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="finance_key" name="finance_key" value="<?php echo ($finance['finance_key']); ?>" placeholder="关键词">
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="product_properties" class="col-sm-2 control-label">产品性质：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="product_properties" name="product_properties" value="<?php echo ($finance['product_properties']); ?>" placeholder="产品性质">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="invest_timelimit" class="col-sm-2 control-label">投资期限：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="invest_timelimit" name="invest_timelimit" value="<?php echo ((isset($finance['invest_timelimit']) && ($finance['invest_timelimit'] !== ""))?($finance['invest_timelimit']):''); ?>" placeholder="发行规模">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="issuing_scale" class="col-sm-2 control-label">发行规模：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="issuing_scale" name="issuing_scale" value="<?php echo ((isset($finance['issuing_scale']) && ($finance['issuing_scale'] !== ""))?($finance['issuing_scale']):''); ?>" placeholder="发行规模">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="operation_scale" class="col-sm-2 control-label">运行规模：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="operation_scale" name="operation_scale" value="<?php echo ((isset($finance['operation_scale']) && ($finance['operation_scale'] !== ""))?($finance['operation_scale']):''); ?>" placeholder="运行规模">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="product_level" class="col-sm-2 control-label">产品分级：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="product_level" name="product_level" value="<?php echo ((isset($finance['product_level']) && ($finance['product_level'] !== ""))?($finance['product_level']):''); ?>" placeholder="产品分级">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="matching" class="col-sm-2 control-label">投资标配比：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="matching" name="matching" value="<?php echo ((isset($finance['matching']) && ($finance['matching'] !== ""))?($finance['matching']):''); ?>" placeholder="投资标配比">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="allot_ratio" class="col-sm-2 control-label">投顾分红比例：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="allot_ratio" name="allot_ratio" value="<?php echo ((isset($finance['allot_ratio']) && ($finance['allot_ratio'] !== ""))?($finance['allot_ratio']):''); ?>" placeholder="投顾分红比例">
				    	</div>
				    	<div class="floatL height34">
				    		<span class="font24">％</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="tranche" class="col-sm-2 control-label">发行份额：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="tranche" name="tranche" value="<?php echo ((isset($finance['tranche']) && ($finance['tranche'] !== ""))?($finance['tranche']):''); ?>" placeholder="发行份额">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="cost" class="col-sm-2 control-label">费用：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="cost" name="cost" value="<?php echo ((isset($finance['cost']) && ($finance['cost'] !== ""))?($finance['cost']):''); ?>" placeholder="费用">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="start_time" class="col-sm-2 control-label">申购：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="start_time" name="start_time" value="<?php echo ((isset($finance['start_time']) && ($finance['start_time'] !== ""))?($finance['start_time']):''); ?>" placeholder="申购">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="end_time" class="col-sm-2 control-label">赎回：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="end_time" name="end_time" value="<?php echo ((isset($finance['end_time']) && ($finance['end_time'] !== ""))?($finance['end_time']):''); ?>" placeholder="费用">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="end_time" class="col-sm-2 control-label">是否新手专享：</label>
				    	<div class="col-sm-4">
				      		<div class="radio">
							  	<label>
							    	<input type="radio" name="is_novice" id="is_novice1" value="1" <?php if($finance['is_novice'] == 1): ?>checked<?php endif; ?>>
							    	是
							  	</label>
							</div>
							<div class="radio">
							  	<label>
							    	<input type="radio" name="is_novice" id="is_novice0" value="0" <?php if($finance['is_novice'] == 0): ?>checked<?php endif; ?>>
							    	否
							  	</label>
							</div>
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
			</div>
			<script type="text/javascript" src="/huifu/Public/Admin/ueditor/ueditor.config.js"></script>
			<script type="text/javascript" src="/huifu/Public/Admin/ueditor/ueditor.all.min.js"></script>
    			<script>
    					$(function(){
        						var overview = UE.getEditor('project_overview',{
            						serverUrl :'<?php echo U('Admin/Article/ueditor');?>'
       	 					});
       	 					var desc = UE.getEditor('project_desc',{
            						serverUrl :'<?php echo U('Admin/Article/ueditor');?>'
            					});
       	 					var safe = UE.getEditor('funds_safe',{
            						serverUrl :'<?php echo U('Admin/Article/ueditor');?>'
            					});
    				})
    			</script>
			<div class="border-dashed margin-top-10">
				<div class="form-group">
				    	<label for="url" class="col-sm-2 control-label">项目概况：</label>
				    	<div class="col-sm-8">
				      		<script id="project_overview" name="project_overview" type="text/plain"><?php echo (html_entity_decode($finance['project_overview'])); ?></script>
				    	</div>
				</div>			
			</div>
			<div class="border-dashed margin-top-10">
				<div class="form-group">
				    	<label for="url" class="col-sm-2 control-label">项目描述：</label>
				    	<div class="col-sm-8">
				      		<script id="project_desc" name="project_desc" type="text/plain"><?php echo (html_entity_decode($finance['project_desc'])); ?></script>
				    	</div>
				</div>			
			</div>
			<div class="border-dashed margin-top-10">
				<div class="form-group">
				    	<label for="url" class="col-sm-2 control-label">资金保障：</label>
				    	<div class="col-sm-8">
				      		<script id="funds_safe" name="funds_safe" type="text/plain"><?php echo (html_entity_decode($finance['funds_safe'])); ?></script>
				    	</div>
				</div>			
			</div>
		</form>
	</div>
	<script type="text/javascript">
   		 $("#start_time,#end_time,#to_account_time_start,#to_account_time_end").datetimepicker({
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