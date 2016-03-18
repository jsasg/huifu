<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title><?php echo ($title); ?></title>
	<link rel="stylesheet" href="/huifu/Public/Home/css/base.css" />
	<link rel="stylesheet" href="/huifu/Public/Common/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/huifu/Public/Home/flexslider/css/flexslider.css" />
	<script src="/huifu/Public/Common/js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="/huifu/Public/Common/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/huifu/Public/Home/flexslider/js/jquery.flexslider-min.js"></script>
</head>
<body>
<div class="flexslider">
	<ul class="slides">
		<?php if(is_array($advert)): $i = 0; $__LIST__ = $advert;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?><li style="display:none;">
                			<a href="<?php echo ($ad['advert_url']); ?>">
                				<img src="/huifu/Public/Uploads/images//<?php echo ($ad['advert_picture']); ?>" alt=""/>
                			</a>
          		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
<script type="text/javascript">
    	$(document).ready(function(){
        		$('.flexslider').flexslider({
           		 animation: "slide",
            		slideDirection: "horizontal",
            		slideshowSpeed: 3000
        		});
   	 });
</script>
<div class="content-box bg-black">
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="index-list-box <?php if($i%2 != 0): ?>padding-left-index<?php else: ?>padding-right-index<?php endif; ?>">
			<?php if($vo['column_url'] != false): ?><a class="index-list-item" href="<?php echo ($vo['column_url']); ?>">
			<?php else: ?>
				<a class="index-list-item" href="<?php echo U('Article/index',array('user_id'=>$_GET['user_id'],'column_id'=>$vo['id']));?>"><?php endif; ?>
				<img src="/huifu/Public/Uploads/images//<?php echo ($vo['column_custom']); ?>" alt=""  class="index-list-icon"/>
				<span class="index-list-tag"><?php echo ($vo['column_name']); ?></span>	
			</a>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<nav class="nav-bar nav-bar-tab">
  	<?php if(is_array($footer)): $i = 0; $__LIST__ = $footer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fo): $mod = ($i % 2 );++$i;?><a class="nav-tab-item nav-active" href="<?php echo ($fo['column_url']); ?>">
			<span class="nav-icon <?php echo ($fo['column_icon']); ?>"></span>
			<span class="nav-tab-label"><?php echo ($fo['column_name']); ?></span>
		</a><?php endforeach; endif; else: echo "" ;endif; ?>
</nav>
</body>
</html>