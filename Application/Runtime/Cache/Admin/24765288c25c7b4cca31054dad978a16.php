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
		<h4 class="title-text floatL">编辑节点</h4>
		<div class="title-button floatR">
			<a href="javascript:void(0)" class="btn btn-danger" onClick="submit('#insertForm')">
				<i class=" glyphicon glyphicon-ok-sign"></i>
				保存
			</a>
			<a href="<?php echo U('Node/index');?>" class="btn btn-danger">
				<i class="glyphicon glyphicon-share-alt"></i>
				返回列表
			</a>
		</div>
	</div>

			
    <div class="main-content margin-bottom-10">
		<div class="warning warning-tips" role="alert">
            <p>1、"上级节点"不能为本身或下级角色</p>
            <p>2、"排序"如果不填默认为100</p>
		</div>
		<form action="<?php echo U('Node/insert');?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="insertForm">
			<input type="hidden" name="node_id" value="<?php echo ($node['id']); ?>">
			<div class="border-dashed">
                <div class="form-group">
                    <label for="parent" class="col-sm-2 control-label">上级节点：</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="parent_id" id="parent">
                            <option value="0" class="padding-left-10">顶级节点......</option>
                            <?php if(is_array($parent)): $i = 0; $__LIST__ = $parent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pid): $mod = ($i % 2 );++$i;?><option value="<?php echo ($pid['id']); ?>" class="padding-left-10" <?php if($pid['id'] == $node['parent_id']): ?>selected="selected"<?php endif; ?>><?php echo ($pid['title']); ?></option>
                                <?php if(is_array($pid[sub])): $i = 0; $__LIST__ = $pid[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$su): $mod = ($i % 2 );++$i;?><option value="<?php echo ($su['id']); ?>" class="padding-left-10" <?php if($su['id'] == $node['parent_id']): ?>selected="selected"<?php endif; ?>>&emsp;|-<?php echo ($su['title']); ?></option>
                                    <?php if(is_array($su[sub])): $i = 0; $__LIST__ = $su[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ssu): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ssu['id']); ?>" class="padding-left-10" <?php if($ssu['id'] == $node['parent_id']): ?>selected="selected"<?php endif; ?>>&emsp;&emsp;|-<?php echo ($ssu['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
				</div>
				<div class="form-group">
                    <label for="title" class="col-sm-2 control-label">节点名称：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo ($node['title']); ?>" placeholder="请输入节点名称">
                    </div>
                    <div class="floatL height34 padding-top-10">
                        <span class="colorR font24">*</span>
                    </div>
				</div>
                <div class="form-group">
                    <label for="module" class="col-sm-2 control-label">模块名：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="module" name="module" value="<?php echo ($node['module']); ?>" placeholder="请输入模块名称">
                    </div>
                    <div class="floatL height34 padding-top-10">
                        <span class="colorR font24">*</span>
                    </div>
				</div>
                <div class="form-group">
                    <label for="controller" class="col-sm-2 control-label">控制器：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="controller" name="controller" value="<?php echo ($node['controller']); ?>" placeholder="请输入控制器名称">
                    </div>
                    <div class="floatL height34 padding-top-10">
                        <span class="colorR font24">*</span>
                    </div>
				</div>
                <div class="form-group">
                    <label for="action" class="col-sm-2 control-label">方法名：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="action" name="action" value="<?php echo ($node['action']); ?>" placeholder="请输入方法名称">
                    </div>
                    <div class="floatL height34 padding-top-10">
                        <span class="colorR font24">*</span>
                    </div>
				</div>
                <div class="form-group">
                    <label for="sort" class="col-sm-2 control-label">排序：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="sort" name="sort" value="<?php echo ($node['sort']); ?>" placeholder="请为节点排序">
                    </div>
				</div>
                <div class="form-group">
                    <label for="display" class="col-sm-2 control-label">是否显示：</label>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="display" id="display1" value="0" <?php if($node['display'] == 0): ?>checked="checked"<?php endif; ?>> 否
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="display" id="display2" value="1" <?php if($node['display'] == 1): ?>checked="checked"<?php endif; ?>> 是
                        </label>
                    </div>
				</div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">是否控制：</label>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="status" id="status1" value="0" <?php if($node['status'] == 0): ?>checked="checked"<?php endif; ?>> 否
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="status2" value="1" <?php if($node['status'] == 1): ?>checked="checked"<?php endif; ?>> 是
                        </label>
                    </div>
				</div>
			</div>
		</form>
	</div>
<script type="text/javascript">
    $(document).ready(function(){
        if(!"<?php echo ($node['controller']); ?>"){
            $('[name="controller"]').parents('.form-group').hide();
        }
        if(!"<?php echo ($node['action']); ?>"){
            $('[name="action"]').parents('.form-group').hide();
        }
        $('[name="parent_id"]').change(function(){
            if(0 == $(this).val()){
                $('[name="controller"]').parents('.form-group').hide();
                $('[name="action"]').parents('.form-group').hide();
            }else{
                $('[name="controller"]').parents('.form-group').show();
                $('[name="action"]').parents('.form-group').show();
            }
        })
    })
</script>

		</div>
	</div>
</body>
</html>