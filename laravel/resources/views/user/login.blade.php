<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>会员登录</title>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('miui/css/login.css') }}">
		
	</head>
	<body>
		<!-- login -->
		<div class="top center">
			<div class="logo center">
				<a href="/frontend/index" target="_blank"><img src="/miui/image/mistore_logo.png" alt=""></a>
			</div>
		</div>
		<form  method="post" action="/user/loginDo" class="form center">
		<!-- {{csrf_field()}} -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="login">
			<div class="login_center">
				<div class="login_top">
					<div class="left fl">会员登录</div>
					<div class="right fr">您还不是我们的会员？<a href="/user/register" target="_self">立即注册</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="login_main center">
					<div class="username">用&nbsp;&nbsp;&nbsp;&nbsp;户:&nbsp;<input class="shurukuang" type="text" name="account" id="account" placeholder="请输入你的手机号或邮箱"/><span id="accounts"></span></div>
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;<input class="shurukuang" type="password" name="password" id="password" placeholder="请输入你的密码"/><span id="passwords"></span></div>
					<div class="username">
						<div class="left fl">验证码:&nbsp;<input class="yanzhengma" type="text" name="vierfy" id="vierfy" placeholder="请输入验证码"/></div>
						<div class="right fl"><img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()"><span id="vierfys"></span></div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="login_submit">
					<input class="submit" type="submit" id="submit" value="立即登录" >
				</div>
				
			</div>
		</div>
		</form>
		<footer>
			<div class="copyright">简体 | 繁体 | English | 常见问题</div>
			<div class="copyright">小米公司版权所有-京ICP备10046444-<img src="/miui/image/ghs.png" alt="">京公网安备11010802020134号-京ICP证110507号</div>

		</footer>
	</body>
</html>
<script src="{{ URL::asset('js/jquery-1.7.2.min.js') }}"></script>
<script>
	$(function(){
		var checkAccount = '';
		var checkPassword = '';
		var checkVierfy = '';

		//验证是否填写手机号或邮箱
		$("#account").on('blur',function(){
			var account = $(this).val();
			if(account == ''){
				$('#accounts').html("<font color='red'>×</font>");
				checkAccount = false;
			}else if(account){
				$('#accounts').html("<font color='green'>√</font>");
				checkAccount = true;
			}
		});

		//验证密码
		$("#password").on('blur',function(){
			var password = $(this).val();
			var reg = /^[a-z0-9_-]{5,}$/i;
			if(password == ''){
				$('#passwords').html("<font color='red'>×</font>");
				checkPassword = false;
			}else if(reg.test(password)){
				$('#passwords').html("<font color='green'>√</font>");
				checkPassword = true;
			}
		});

		//验证验证码
		$("#vierfy").on('blur',function(){
			var vierfy = $(this).val();
			if(vierfy.length == ''){
				$('#vierfys').html("<font color='red'>×</font>");
				checkVierfy = false;
			}else if(vierfy){
				$('#vierfys').html("<font color='green'>√</font>");
				checkVierfy = true;
			}
		});

		//验证信息是否填写完整
		$("#submit").on('click',function(){
			if(checkAccount && checkPassword && checkVierfy){
				$('form').submit();
			}else{
				return false;
			}
		});



    });
</script>