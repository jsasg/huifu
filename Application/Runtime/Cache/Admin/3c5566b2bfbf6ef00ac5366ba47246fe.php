<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<link rel="stylesheet" href="/huifu/Public/Admin/css/base.css"/>
	<link rel="stylesheet" href="/huifu/Public/Common/bootstrap/css/bootstrap.min.css"/>
	 <script src="/huifu/Public/Common/js/jquery-1.10.2.min.js" type="text/javascript"></script>
</head>
<body class="background-black">
	<form action="<?php echo U('Public/login');?>" method="post" class="form-horizontal">
		<div class="login-outbox">
			<div class="login-box border-radius-3">
				<div class="login-title padding-left-10 font24">登录系统</div>
				<div class="login-input padding-left-10 padding-right-10">
					<div class="form-group">
					    	<label for="login_name" class="col-sm-3 control-label">用户名：</label>
					    	<div class="col-sm-8">
					      		<input type="text" class="form-control" id="login_name" name="login_name" placeholder="Account">
					    	</div>
					</div>
					<div class="form-group">
					    	<label for="password" class="col-sm-3 control-label">密码： </label>
					    	<div class="col-sm-8">
					      		<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					    	</div>
					</div>
				</div>
				<div class="login-button padding-right-10">
					<button class="btn btn-default" type="submit">登录</button>
				</div>
			</div>
		</div>
	</form>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		var wHeight = $(window).height();
		var height = $('.login-outbox').height();
		$('.login-outbox').css('top',(wHeight-height)/2);
	})
</script>
</html>