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
			<a href="#" class="btn btn-danger" onClick="submit('#addMenuDesc')">
				<i class="glyphicon glyphicon-ok-sign"></i>
				提交
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
	<div class="border-dashed margin-top-10">
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
	    			<form action="<?php echo U('CustomMenu/addMenuDesc');?>" method="post" class="form-horizontal" id="addMenuDesc">
					<div class="input-group">
					  	<span class="input-group-addon" id="basic-addon1">描述</span>
					  	<input type="hidden" name="menu_id" value="<?php echo ($_GET['id']); ?>" />
					  	<input type="hidden" name="id" value="<?php echo ($menu_desc['text']['id']); ?>" />
					  	<input type="hidden" name="focus_type" value="text" />
					  	<textarea type="text" class="form-control" rows="6" name="desc"  placeholder="描述" ><?php echo ($menu_desc['text']['desc']); ?></textarea>
					</div>
					<div class="input-group margin-top-10">
					  	<span class="input-group-addon">链接</span>
					  	<input type="text" class="form-control" name="url" value="<?php echo ($menu_desc['text']['url']); ?>" aria-label="Amount (to the nearest dollar)" />
					  	<input type="hidden" name="url_desc" value="<?php echo ($menu_desc['text']['url_desc']); ?>"/>
					  	<span class="input-group-addon"><?php echo ($menu_desc['text']['url_desc']); ?></span>
					</div>
				</form>
		    	</div>
		   	<div role="tabpanel" class="tab-pane col-sm-7" id="profile">
		   		<form action="<?php echo U('CustomMenu/addMenuDesc');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
			   		<div class="input-group">
					  	<span class="input-group-addon" id="basic-addon1">标题</span>
					  	<input type="hidden" name="menu_id" value="<?php echo ($_GET['id']); ?>" />
					  	<input type="hidden" name="id" value="<?php echo ($menu_desc['picture']['id']); ?>"/>
					  	<input type="hidden" name="focus_type" value="picture"/>
					  	<input type="text" class="form-control" placeholder="标题" name="title" value="<?php echo ($menu_desc['picture']['title']); ?>" aria-describedby="basic-addon1"/>
					</div>
					<div class="input-group margin-top-10">
					  	<span class="input-group-addon">图片</span>
					  	<?php if($menu_desc['picture']['file'] == false): ?><input type="file" name="file"/>
					  	<?php else: ?>
					  		<img type="text" class="form-control" src="/huifu/Public/Uploads/images//<?php echo ($menu_desc['picture']['file']); ?>"><?php endif; ?>
					  	<a href="<?php echo U('CustomMenu/delPicture',array('id'=>$menu_desc['picture']['id']));?>" class="input-group-addon">删除图片</a>
					</div>
			   		<div class="input-group margin-top-10">
					  	<span class="input-group-addon" id="basic-addon1">描述</span>
					  	<textarea type="text" class="form-control" rows="6" name="desc" value="<?php echo ($menu_desc['desc']); ?>" placeholder="描述" >
					  		<?php echo ($menu_desc['picture']['desc']); ?>
					  	</textarea>
					</div>
					<div class="input-group margin-top-10">
					  	<span class="input-group-addon">链接</span>
					  	<input type="text" class="form-control" name="url" value="<?php echo ($menu_desc['picture']['url']); ?>" aria-label="Amount (to the nearest dollar)">
					  	<input type="hidden" name="url_desc" value="<?php echo ($menu_desc['picture']['url_desc']); ?>"/>
					  	<span class="input-group-addon"><?php echo ($menu_desc['picture']['url_desc']); ?></span>
					</div>
				</form>
		   	</div>
		    	<div role="tabpanel" class="tab-pane col-sm-12" id="messages">
		    		<form action="<?php echo U('CustomMenu/addMenuDesc');?>" method="post" class="form-horizontal">
		    			<input type="hidden" name="menu_id" value="<?php echo ($_GET['id']); ?>" />
		    			<input type="hidden" name="id" value="<?php echo ($menu_desc['id']); ?>"/>
		    			<input type="hidden" name="focus_type" value="pictures"/>
			    		<?php if(is_array($menu_desc['pictures'])): $i = 0; $__LIST__ = $menu_desc['pictures'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="dashed-box-img floatL margin-left-10 margin-top-10">
				    			<p><?php echo ($vo['title']); ?></p>
				    			<img src="/huifu/Public/Uploads/images//<?php echo ($vo['file']); ?>" alt="">
				    			<p class="color6"><?php echo ($vo['desc']); ?></p>
				    			<a href="<?php echo U('CustomMenu/delete',array('id'=>$vo['id']));?>" class="btn btn-danger btn-sm">
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
		    		<form action="<?php echo U('CustomMenu/addMenuDesc');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="input-group">
					  	<span class="input-group-addon" id="basic-addon1">标题</span>
					  	<input type="hidden" name="menu_id" value="<?php echo ($_GET['id']); ?>" />
					  	<input type="hidden" name="id" value="<?php echo ($menu_desc['media']['id']); ?>"/>
					  	<input type="hidden" name="focus_type" value="media"/>
					  	<input type="text" class="form-control" placeholder="title" name="title" value="<?php echo ($menu_desc['media']['title']); ?>" aria-describedby="basic-addon1"/>
					</div>
					<div class="input-group margin-top-10">
					  	<span class="input-group-addon">音频</span>
					  	<input type="file" name="file" />
					  	<!-- <img type="text" class="form-control" src="http://m.stcyclub.com/Uploads//2014/10/10/54374dde6fa84.jpg"> -->
					  	<a href="<?php echo U('CustomMenu/delPicture',array('id'=>$menu_desc['media']['id']));?>" class="input-group-addon">删除音频</a>
					</div>
			   		<div class="input-group margin-top-10">
					  	<span class="input-group-addon" id="basic-addon1">描述</span>
					  	<textarea type="text" class="form-control" rows="6" name="desc" placeholder="描述" ><?php echo ($menu_desc['media']['desc']); ?></textarea>
					</div>
					<div class="input-group margin-top-10">
					  	<span class="input-group-addon">链接</span>
					  	<input type="text" class="form-control" name="url" value="<?php echo ($menu_desc['media']['url']); ?>" aria-label="Amount (to the nearest dollar)"/>
					  	<input type="hidden" name="url_desc" value="<?php echo ($menu_desc['media']['url_desc']); ?>"/>
					  	<span class="input-group-addon"><?php echo ($menu_desc['media']['url_desc']); ?></span>
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
	      			<form action="<?php echo U('CustomMenu/addMenuDesc');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	      			<div class="modal-body">
					<div class="form-group">
					    	<label for="title" class="col-sm-2 control-label">标题：</label>
					    	<div class="col-sm-9">
					    		<input type="hidden" name="menu_id" value="<?php echo ($_GET['id']); ?>" />
					    		<input type="hidden" name="focus_type" value="pictures"/>
					      		<input type="text" class="form-control" id="title" name="title" value="<?php echo ($menu_desc['title']); ?>" placeholder="平台用户名">
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
					      		<textarea type="text" class="form-control" rows="6" name="desc" value="<?php echo ($menu_desc['desc']); ?>" placeholder="描述" ></textarea>
					    	</div>
					</div>
					<div class="form-group">
					    	<label for="url" class="col-sm-2 control-label">url：</label>
					    	<div class="col-sm-9">
					      		<input type="text" class="form-control" id="url" name="url" value="<?php echo ($menu_desc['url']); ?>" placeholder="url">
					      		<input type="hidden" name="url_desc" value="<?php echo ($menu_desc['url_desc']); ?>"/>
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
			$(href+'>form').attr('id','addMenuDesc');
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