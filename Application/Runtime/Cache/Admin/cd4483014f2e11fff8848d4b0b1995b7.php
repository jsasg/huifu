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
		<h4 class="title-text floatL">会员列表</h4>
		<div class="title-button floatR">
			<a href="<?php echo U('Finance/add');?>" class="btn btn-danger">
				<i class="glyphicon glyphicon-plus-sign"></i>
				添加会员
			</a>
			<a href="#" class="btn btn-danger" onClick="submit('#deleterForm')">
				<i class="glyphicon glyphicon-trash"></i>
				删除选中
			</a>
		</div>
	</div>

			
	<div class="main-content">
		<div class="warning warning-tips" role="alert">
		  	<p>1、会员可以看到，所发展的下一级会员列表</p>
		</div>
		<form action="<?php echo U('Advert/delete');?>" method="get" id="deleterForm">
		<div class="border-solid" style="padding:0">
			<table class="table margin-bottom-0">
				<thead>
					<tr class="active">
						<th><input type="checkbox" name="id_all"></th>
						<th>编号</th>
						<th>姓名</th>
						<th>手机号</th>
						<th>email</th>
						<th>账户余额</th>
						<th>募集到资金</th>
                        <th>
                            <span>注册时间</span>
                            <?php if(($_GET['sort_time'] == 'up') || ($_GET['sort_time'] == false)): ?><a href="<?php echo U('Member/index',array('sort_time'=>'down'));?>">
                            <?php else: ?>
                                <a href="<?php echo U('Member/index',array('sort_time'=>'up'));?>"><?php endif; ?>
                                <i class='<?php if($_GET['sort_time'] == 'down'): ?>glyphicon glyphicon-arrow-down<?php else: ?>glyphicon glyphicon-arrow-up<?php endif; ?> font12'></i>
                            </a>
                        </th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><input type="checkbox" name="id[]" value="<?php echo ($vo['id']); ?>"></td>
							<td><?php echo ($vo['id']); ?></td>
							<td><?php echo ($vo['real_name']); ?></td>
							<td><?php echo ($vo['mobile']); ?></td>
							<td><?php echo ($vo['email']); ?></td>
							<td><?php echo ($vo['account']); ?></td>
							<td><?php echo ($vo['raise']); ?></td>
							<td><?php echo ($vo['create_time']); ?></td>
							<td>
								<a href="<?php echo U('Member/sub',array('id'=>$vo['id']));?>">
									下一级
								</a>
								<a href="<?php echo U('Member/add',array('id'=>$vo['id']));?>">
									编辑
								</a>
								<a href="<?php echo U('Member/delete',array('id'=>$vo['id']));?>">
									删除
								</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
		</form>
	</div>
	<div class="page"><?php echo ($page); ?></div>

		</div>
	</div>
</body>
</html>