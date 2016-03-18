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
			<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$me): $mod = ($i % 2 );++$i;?><li class="menu-item lineHeight-55 colorF font16">
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
		<h4 class="title-text floatL">编辑权限</h4>
		<div class="title-button floatR">
			<a href="#" class="btn btn-danger" onClick="submit('#insertForm')">
				<i class=" glyphicon glyphicon-ok-sign"></i>
				保存
			</a>
			<a href="<?php echo U('Role/index');?>" class="btn btn-danger">
				<i class="glyphicon glyphicon-share-alt"></i>
				返回列表
			</a>
		</div>
	</div>

			
    <div class="main-content margin-bottom-10">
		<div class="warning warning-tips" role="alert">
            <p>1、打“&radic;”表示赋予权限</p>
		</div>
		<form action="<?php echo U('Role/auth');?>" method="post" enctype="multipart/form-data" class="form-inline" id="insertForm">
			<input type="hidden" name="role_id" value="<?php echo ($_GET['id']); ?>">
			<div class="border-dashed">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="checkbox-wrap">
                        <div class="checkbox-item first">
                            <label class="checkbox-inline">
                                
                                <input type="checkbox" name="node[]" class="parent" value="<?php echo ($vo['id']); ?>" <?php if(in_array($vo['id'],$role_node) != false): ?>checked="checked"<?php endif; ?>> <span class="fontB"><?php echo ($vo['title']); ?></span>
                            </label>
                        </div>
                        <div class="checkbox-item last">
                            <?php if(judgmentArrayDimension($vo['sub']) == 1): if(is_array($vo[sub])): $i = 0; $__LIST__ = $vo[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$su): $mod = ($i % 2 );++$i;?><span class="checkbox-sub-item">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="node[]" class="sub" value="<?php echo ($su['id']); ?>" <?php if(in_array($su['id'],$role_node) != false): ?>checked="checked"<?php endif; ?>> <?php echo ($su['title']); ?>
                                        </label>
                                    </span><?php endforeach; endif; else: echo "" ;endif; ?>
                            <?php else: ?>
                                <?php if(is_array($vo[sub])): $i = 0; $__LIST__ = $vo[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$su): $mod = ($i % 2 );++$i;?><div class="checkbox-item sub-first">
                                        <span class="checkbox-sub-item">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="node[]" class="sub-parent" value="<?php echo ($su['id']); ?>" <?php if(in_array($su['id'],$role_node) != false): ?>checked="checked"<?php endif; ?>> <?php echo ($su['title']); ?>
                                            </label>
                                        </span>
                                    </div>
                                    <div class="checkbox-item sub-last">
                                        <?php if($su[sub] != false): if(is_array($su[sub])): $i = 0; $__LIST__ = $su[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ssu): $mod = ($i % 2 );++$i;?><span class="checkbox-sub-item">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="node[]" class="sub" value="<?php echo ($ssu['id']); ?>" <?php if(in_array($ssu['id'],$role_node) != false): ?>checked="checked"<?php endif; ?>> <?php echo ($ssu['title']); ?>
                                                    </label>
                                                </span><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="clear"></div>
			</div>
		</form>
	</div>

		</div>
	</div>
</body>
</html>