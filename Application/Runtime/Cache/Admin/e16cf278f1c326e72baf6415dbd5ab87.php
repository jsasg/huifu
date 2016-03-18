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
		<h4 class="title-text floatL">添加文章</h4>
		<div class="title-button floatR">
			<a href="#" class="btn btn-danger" onClick="submit('#artitlceForm')">
				<i class=" glyphicon glyphicon-ok-sign"></i>
				保存
			</a>
			<a href="<?php echo U('Article/index');?>" class="btn btn-danger">
				<i class="glyphicon glyphicon-share-alt"></i>
				返回列表
			</a>
		</div>
	</div>

			
	<div class="main-content margin-bottom-10">
		<div class="warning warning-tips" role="alert">
		  	<p>1、请按照1：1的宽高比上传图片</p>
		</div>
		<form action="<?php echo U('Article/add');?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="artitlceForm">
			<input type="hidden" name="id" value="<?php echo ($article['id']); ?>">
			<div class="border-dashed">
				<div class="form-group">
				    	<label for="article_column" class="col-sm-2 control-label">文章所属栏目：</label>
				    	<div class="col-sm-4">
				      		<select name="article_column" id="article_column">
				      			<option value="">≡ 作为一级菜单 ≡</option>
				      			<?php if(is_array($article_column)): $i = 0; $__LIST__ = $article_column;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pa): $mod = ($i % 2 );++$i;?><option value="<?php echo ($pa['id']); ?>" <?php if($article['column_id'] == $pa['id']): ?>selected="selected"<?php endif; ?>><?php echo ($pa['column_name']); ?></option>
				      				<?php if(is_array($pa['subNode'])): $i = 0; $__LIST__ = $pa['subNode'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><option value="<?php echo ($sub['id']); ?>" <?php if($article['column_id'] == $sub['id']): ?>selected="selected"<?php endif; ?>>&emsp;&emsp;|—<?php echo ($sub['column_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
				      		</select>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="article_title" class="col-sm-2 control-label">文章标题：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="article_title" name="article_title" value="<?php echo ($article['article_title']); ?>" placeholder="文章标题">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="article_key" class="col-sm-2 control-label">文章关键词：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="article_key" name="article_key" value="<?php echo ($article['article_key']); ?>" placeholder="关键词">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="article_source" class="col-sm-2 control-label">来源：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" id="article_source" name="article_source" value="<?php echo ($article['article_source']); ?>" placeholder="来源">
				    	</div>
				    	<div class="floatL height34 padding-top-10">
				    		<span class="colorR font24">*</span>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="article_source" class="col-sm-2 control-label">是否显示标栏：</label>
				    	<div class="col-sm-4">
				      		<label class="radio-inline">
							  	<input type="radio" name="show_title" id="article_source0" value="0" <?php if($article['show_title'] == 0): ?>checked="checked"<?php endif; ?>> 否
							</label>
							<label class="radio-inline">
							  	<input type="radio" name="show_title" id="article_source" value="1" <?php if($article['show_title'] == 1): ?>checked="checked"<?php endif; ?>> 是
							</label>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="article_sort" class="col-sm-2 control-label">排序：</label>
				    	<div class="col-sm-4">
				      		<input type="text" class="form-control" name="article_sort" id="article_sort" value="<?php echo ($article['article_sort']); ?>" placeholder="排序">
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="article_picture" class="col-sm-2 control-label">缩略图：</label>
				    	<div class="col-sm-4">
				      		<?php if($article['article_picture'] == false): ?><input type="file" class="" id="article_picture" name="article_picture" placeholder="上传图片">
						<?php else: ?>
							<img src="/huifu/Public/Uploads/images//<?php echo ($article['article_picture']); ?>" class="height100" alt="">
							<a href="<?php echo U('Article/delPicture',array('id'=>$article['id']));?>" >删除</a><?php endif; ?>
				    	</div>
				</div>
				<div class="form-group">
				    	<label for="url" class="col-sm-2 control-label">文章内容：</label>
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
				      		<script id="container" name="content" type="text/plain"><?php echo (html_entity_decode($article['article_content'])); ?></script>
				    	</div>
				</div>
			</div>
		</form>
	</div>

		</div>
	</div>
</body>
</html>