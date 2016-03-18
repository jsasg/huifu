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
		<h4 class="title-text floatL">编辑分销商</h4>
		<div class="title-button floatR">
			<a href="#" class="btn btn-danger" onClick="submit('#memberForm')">
				<i class=" glyphicon glyphicon-ok-sign"></i>
				保存
			</a>
			<a href="<?php echo U('User/index');?>" class="btn btn-danger">
				<i class="glyphicon glyphicon-share-alt"></i>
				返回列表
			</a>
		</div>
	</div>

			
    <div class="main-content margin-bottom-10">
		<div class="warning warning-tips" role="alert">
            <p>1、"协议"为前端注册确认时需确认协议</p>
		</div>
		<form action="<?php echo U('User/insert',array('id'=>$_GET['id']));?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="memberForm">
			<input type="hidden" name="id" value="<?php echo ($member['id']); ?>">
			<div class="border-dashed">
				<div class="form-group">
                    <label for="login_name" class="col-sm-2 control-label">用户名：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="login_name" name="login_name" value="<?php echo ($user['login_name']); ?>" placeholder="login_name">
                    </div>
                    <div class="floatL height34 padding-top-10">
                        <span class="colorR font24">*</span>
                    </div>
				</div>
				<div class="form-group">
                    <label for="password" class="col-sm-2 control-label">密码：</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="password">
                    </div>
                    <div class="floatL height34 padding-top-10">
                        <span class="colorR font24">*</span>
                    </div>
				</div>
                <div class="form-group">
                    <label for="user_name" class="col-sm-2 control-label">昵称：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo ($user['user_name']); ?>" placeholder="user_name">
                    </div>
                    <div class="floatL height34 padding-top-10">
                        <span class="colorR font24">*</span>
                    </div>
				</div>
				<div class="form-group">
                    <label for="mobile" class="col-sm-2 control-label">电话：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo ($user['contact']); ?>" placeholder="mobile">
                    </div>
                    <div class="floatL height34 padding-top-10">
                        <span class="colorR font24">*</span>
                    </div>
				</div>
                <div class="form-group">
                    <label for="role" class="col-sm-2 control-label">角色：</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="role_id" id="role">
                            <option class="padding-left-10" value="0">请选择......</option>
                            <?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ro['id']); ?>" class="padding-left-10" <?php if($ro['id'] == $user['role_id']): ?>selected="selected"<?php endif; ?>><?php echo ($ro['role_name']); ?></option>
                                <?php if(is_array($ro[sub])): $i = 0; $__LIST__ = $ro[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$su): $mod = ($i % 2 );++$i;?><option value="<?php echo ($su['id']); ?>" class="padding-left-10" <?php if($su['id'] == $user['role_id']): ?>selected="selected"<?php endif; ?>>&emsp;|-<?php echo ($su['role_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
				</div>
                <div class="form-group">
                    <label for="province" class="col-sm-2 control-label">省份：</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="province" id="province">
                            <option value="">请选择......</option>
                            <?php if(is_array($adr_province)): $i = 0; $__LIST__ = $adr_province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><option value="<?php echo ($pro['code']); ?>" <?php if($pro['code'] == $user['province']): ?>selected="selected"<?php endif; ?>><?php echo ($pro['adr_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
				</div>
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">城市：</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="city" id="city">
                            <option value="">请选择......</option>
                            <?php if(is_array($adr_city)): $i = 0; $__LIST__ = $adr_city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ci): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ci['code']); ?>" <?php if($ci['code'] == $user['city']): ?>selected="selected"<?php endif; ?>><?php echo ($ci['adr_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
				</div>
                <div class="form-group">
                    <label for="area" class="col-sm-2 control-label">区域：</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="area" id="area">
                            <option value="">请选择......</option>
                            <?php if(is_array($adr_area)): $i = 0; $__LIST__ = $adr_area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ar): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ar['code']); ?>" <?php if($ar['code'] == $user['area']): ?>selected="selected"<?php endif; ?>><?php echo ($ar['adr_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
				</div>
				<div class="form-group">
                    <label for="address" class="col-sm-2 control-label">地址：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo ($user['address']); ?>" placeholder="email">
                    </div>
				</div>
                <div class="form-group">
                    <label for="url" class="col-sm-2 control-label">简介：</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" name="content" rows="3"><?php echo ($user['user_desc']); ?></textarea>
                    </div>
				</div> 
				<div class="form-group">
				    	<label for="url" class="col-sm-2 control-label">协议：</label>
				    	<div class="col-sm-8">
				    		<script type="text/javascript" src="/huifu/Public/Admin/ueditor/ueditor.config.js"></script>
							<script type="text/javascript" src="/huifu/Public/Admin/ueditor/ueditor.all.min.js"></script>
    						<script>
    							$(function(){
        								var ue = UE.getEditor('agreement',{
            								serverUrl :'<?php echo U('Admin/Article/ueditor');?>'
       	 							});
    							})
    						</script>
				      		<script id="agreement" name="agreement" type="text/plain"><?php echo (html_entity_decode($user['agreement'])); ?></script>
				    	</div>
				</div>
			</div>
		</form>
	</div>

		</div>
	</div>
</body>
</html>