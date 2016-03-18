<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>跳转提示</title>
	<style type="text/css">
	*{ padding: 0; margin: 0; }
	body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 14px; }
	.system-message{border: 1px solid #1e64c8;zoom: 1;width: 450px;height: 172px;position: absolute;top: 44%;left: 50%;margin: -87px 0 0 -225px;}
	.system-message h5{background:#3278db;width:150px;height:30px;line-height:30px;text-indent:30px;border-radius:0px 0px 30px 0px;color:#fff;}
	.system-message p#success{position:relative;display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline;height:64px;padding:10px 20px 0px 60px;margin-top:30px;background:url(/huifu/Public/Common/images/msg_bg.png) no-repeat 20px -598px;}
	.system-message p#error{position:relative;display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline;height:64px;padding:10px 20px 0px 60px;margin-top:30px;background:url(/huifu/Public/Common/images/msg_bg.png) no-repeat 20px -495px;}
	.system-message .jump{ position:absolute;bottom:0px;width:450px;text-align:center;height:28px;line-height:28px;background:#e4ecf7;}
	.system-message .jump a{ color: #333;}
	.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
	</style>
</head>
<body>
	<div class="system-message">
		<h5>信息提醒</h5>
		<?php if(isset($message)) {?>
		<p id="success"><?php echo($message); ?></p>
		<?php }else{?>
		<p id="error"><?php echo($error); ?></p>
		<?php }?>
		<p class="detail"></p>
		<p class="jump">
		页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
		</p>
	</div>
	<script type="text/javascript">
	(function(){
		var success=document.getElementById('success');
		if(success){
			if(success.offsetWidth<(450)){
				success.style.left=(450-success.offsetWidth)/2+"px";
			}
		}
		var error=document.getElementById('error');
		if(error){
			if(error.offsetWidth<(450)){
				error.style.left=(450-error.offsetWidth)/2+"px";
			}
		}
			
		var wait = document.getElementById('wait'),href = document.getElementById('href').href;
		var interval = setInterval(function(){
			var time = --wait.innerHTML;
			if(time <= 0) {
				location.href = href;
				clearInterval(interval);
			};
		}, 1000); 
	})();
	</script>
</body>
</html>