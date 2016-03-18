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
	<div class="base-left">
		<ul class="left-menu">
			<li class="menu-item colorF">
				<i class="glyphicon glyphicon-wrench font-1-5"></i><br>
				<span class="font16">账号</span>
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
				<i class="glyphicon glyphicon-user font-1-5"></i><br>
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
		<h4 class="title-text floatL">首次关注</h4>
		<div class="title-button floatR">
			<a href="#" class="btn btn-danger" onClick="submit('#FirstFocusForm')">
				<i class="glyphicon glyphicon-ok-sign"></i>
				提交
			</a>
		</div>
	</div>

			
	<div class="main-content">
		<div class="warning warning-tips" role="alert">
		  	<p>1、请使用链接生成助手生成站内URL链接,指向目标页面</p>
		  	<p>2、默认回复内容是文本方式无URL链接, 默认回复内容是: 欢迎您的第一次关注!</p>
		</div>
	</div>
	<div class="border-dashed">
		 <!-- Nav tabs -->
		 <ul class="nav nav-tabs" role="tablist" id="myTabs">
			<li role="presentation" class="active">
				<a href="#home" aria-controls="home" role="tab" data-toggle="tab">文字信息</a>
			</li>
			<li role="presentation">
				<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">单图文信息</a>
			</li>
			 <li role="presentation">
			 	<a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">多图文信息</a>
			 </li>
			 <li role="presentation">
			 	<a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">语音信息</a>
			 </li>
		 </ul>

		  <!-- Tab panes -->
		 <div class="tab-content margin-top-10 row">
	    		<div role="tabpanel" class="tab-pane active col-sm-7" id="home">
	    			<form action="<?php echo U('FirstFocus/insert');?>" method="post" class="form-horizontal" id="FirstFocusForm">
					<div class="input-group">
					  	<span class="input-group-addon" id="basic-addon1">描述</span>
					  	<input type="hidden" name="id" value="<?php echo ($first['text']['id']); ?>" />
					  	<input type="hidden" name="focus_type" value="text" />
					  	<textarea type="text" class="form-control" rows="6" name="desc" placeholder="描述" ><?php echo ($first['text']['desc']); ?></textarea>
					</div>
					<div class="input-group margin-top-10">
					  	<span class="input-group-addon">链接</span>
					  	<input type="text" class="form-control" name="url" value="<?php echo ($first['text']['url']); ?>" aria-label="Amount (to the nearest dollar)" />
					  	<span class="input-group-addon"><?php echo ($first['text']['url_desc']); ?></span>
					</div>
				</form>
		    	</div>
		   	<div role="tabpanel" class="tab-pane col-sm-7" id="profile">
		   		<form action="<?php echo U('FirstFocus/insert');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
			   		<div class="input-group">
					  	<span class="input-group-addon" id="basic-addon1">标题</span>
					  	<input type="hidden" name="id" value="<?php echo ($first['picture']['id']); ?>"/>
					  	<input type="hidden" name="focus_type" value="picture"/>
					  	<input type="text" class="form-control" placeholder="标题" name="title" value="<?php echo ($first['picture']['title']); ?>" aria-describedby="basic-addon1"/>
					</div>
					<div class="input-group margin-top-10">
					  	<span class="input-group-addon">图片</span>
					  	<?php if($first['picture']['file'] == false): ?><input type="file" name="file"/>
					  	<?php else: ?>
					  		<img type="text" class="form-control" src="/huifu/Public/Uploads/images//<?php echo ($first['picture']['file']); ?>"><?php endif; ?>
					  	<a href="<?php echo U('FirstFocus/delPicture',array('id'=>$first['picture']['id']));?>" class="input-group-addon">删除图片</a>
					</div>
			   		<div class="input-group margin-top-10">
					  	<span class="input-group-addon" id="basic-addon1">描述</span>
					  	<textarea type="text" class="form-control" rows="6" name="desc" value="<?php echo ($first['desc']); ?>" placeholder="描述" ><?php echo ($first['picture']['desc']); ?></textarea>
					</div>
					<div class="input-group margin-top-10">
					  	<span class="input-group-addon">链接</span>
					  	<input type="text" class="form-control" name="url" value="<?php echo ($first['picture']['url']); ?>" aria-label="Amount (to the nearest dollar)">
					  	<span class="input-group-addon"><?php echo ($first['picture']['url_desc']); ?></span>
					</div>
				</form>
		   	</div>
		    	<div role="tabpanel" class="tab-pane col-sm-12" id="messages">
		    		<form action="<?php echo U('FirstFocus/insert');?>" method="post" class="form-horizontal">
		    			<input type="hidden" name="id" value="<?php echo ($first['id']); ?>"/>
		    			<input type="hidden" name="focus_type" value="pictures"/>
			    		<?php if(is_array($first['pictures'])): $i = 0; $__LIST__ = $first['pictures'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="dashed-box-img floatL margin-left-10 margin-top-10">
				    			<p><?php echo ($vo['title']); ?></p>
				    			<img src="/huifu/Public/Uploads/images//<?php echo ($vo['file']); ?>" alt="">
				    			<p class="color6"><?php echo ($vo['desc']); ?></p>
				    			<a href="<?php echo U('FirstFocus/delete',array('id'=>$vo['id']));?>" class="btn btn-danger btn-sm">
								<i class="glyphicon glyphicon-trash"></i>
								删除
							</a>
				    		</div><?php endforeach; endif; else: echo "" ;endif; ?>
			    		<div class="dashed-box-img floatL margin-left-10 margin-top-10 text-center cursor-pointer" data-toggle="modal" data-target="#myModal">
			    			<i class="glyphicon glyphicon-plus font150 color6 margin-top-10"></i>	
			    			<p class="color6">新增一条信息</p>
			    		</div>
		    		</form>
		    	</div>
		    	<div role="tabpanel" class="tab-pane col-sm-7" id="settings">
		    		<form action="<?php echo U('FirstFocus/insert');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="input-group">
					  	<span class="input-group-addon" id="basic-addon1">标题</span>
					  	<input type="hidden" name="id" value="<?php echo ($first['media']['id']); ?>"/>
					  	<input type="hidden" name="focus_type" value="media"/>
					  	<input type="text" class="form-control" placeholder="title" name="title" value="<?php echo ($first['media']['title']); ?>" aria-describedby="basic-addon1"/>
					</div>
					<div class="input-group margin-top-10">
					  	<span class="input-group-addon">音频</span>
					  	<input type="file" name="file" />
					  	<!-- <img type="text" class="form-control" src="http://m.stcyclub.com/Uploads//2014/10/10/54374dde6fa84.jpg"> -->
					  	<a href="<?php echo U('FirstFocus/delPicture',array('id'=>$first['media']['id']));?>" class="input-group-addon">删除音频</a>
					</div>
			   		<div class="input-group margin-top-10">
					  	<span class="input-group-addon" id="basic-addon1">描述</span>
					  	<textarea type="text" class="form-control" rows="6" name="desc" placeholder="描述" ><?php echo ($first['media']['desc']); ?></textarea>
					</div>
					<div class="input-group margin-top-10">
					  	<span class="input-group-addon">链接</span>
					  	<input type="text" class="form-control" name="url" value="<?php echo ($first['media']['url']); ?>" aria-label="Amount (to the nearest dollar)"/>
					  	<span class="input-group-addon"><?php echo ($first['media']['url_desc']); ?></span>
					</div>
				</form>
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
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	    		<div class="modal-content">
	      			<div class="modal-header">
	        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        					<span aria-hidden="true">&times;</span>
	        				</button>
	        				<h4 class="modal-title" id="myModalLabel">多图文信息编辑</h4>
	      			</div>
	      			<form action="<?php echo U('FirstFocus/insert');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	      			<div class="modal-body">
					<div class="form-group">
					    	<label for="title" class="col-sm-2 control-label">标题：</label>
					    	<div class="col-sm-9">
					    		<input type="hidden" name="focus_type" value="pictures"/>
					      		<input type="text" class="form-control" id="title" name="title" value="<?php echo ($wechat['title']); ?>" placeholder="平台用户名">
					    	</div>
					</div>
					<div class="form-group">
					    	<label for="file" class="col-sm-2 control-label">图片：</label>
					    	<div class="col-sm-9">
					      		<input type="file" id="file" name="file" placeholder="图片">
					    	</div>
					</div>
					<div class="form-group">
					    	<label for="desc" class="col-sm-2 control-label">描述：</label>
					    	<div class="col-sm-9">
					      		<textarea type="text" class="form-control" rows="6" name="desc" value="<?php echo ($first['desc']); ?>" placeholder="描述" ></textarea>
					    	</div>
					</div>
					<div class="form-group">
					    	<label for="url" class="col-sm-2 control-label">url：</label>
					    	<div class="col-sm-9">
					      		<input type="text" class="form-control" id="url" name="url" value="<?php echo ($wechat['url']); ?>" placeholder="url">
					    	</div>
					</div>
				</div>
			      	<div class="modal-footer">
			        		<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			        		<button type="submit" class="btn btn-primary">确认</button>
			      	</div>
			      	</form>
	    		</div>
	  	</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('a[data-toggle="tab"]').click(function(){
			var href = $(this).attr('href');
			$('form').removeAttr('id');
			$(href+'>form').attr('id','FirstFocusForm');
		})
		$('body').delegate('#helper_url','change',function(){
			switch($('[aria-expanded="true"]').attr('href')) {
				case '#home':
					$('#home input[name="url"]').val($(this).val());
					break;
				case '#profile':
					$('#profile input[name="url"]').val($(this).val());
					break;
				case '#messages':
					$('#messages input[name="url"]').val($(this).val());
					break;
				case '#settings':
					$('#settings input[name="url"]').val($(this).val());
					break;
				default:
					$('#home input[name="url"]').val($(this).val());
					break;
			}
		})
	})
</script>

		</div>
	</div>
</body>
</html>