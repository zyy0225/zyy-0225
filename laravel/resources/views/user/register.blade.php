<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('miui/css/login.css') }}">
	</head>
	<body>
		<form method="post" action="/user/registerDo">
			<!-- {{csrf_field()}} -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="regist">
				<div class="regist_center">

					<div class="regist_top">
						<div class="left fl">会员注册</div>
						<div class="right fr"><a href="/frontend/index" target="_self">小米商城</a></div>
						<div class="clear"></div>
						<div class="xian center"></div>
					</div>

					<div class="regist_main center">
						<div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;
						<input class="shurukuang" type="text" name="username" id="username" placeholder="请输入你的用户名"/><span id="usernames"></span></div>
						<!-- required -->
						<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;
						<input class="shurukuang" type="password" name="password" id="password" placeholder="请输入你的密码"/><span id="passwords"></span></div>
						
						<div class="username">确认密码:&nbsp;&nbsp;
						<input class="shurukuang" type="password" name="repassword" id="repassword" placeholder="请确认你的密码"/><span id="repasswords"></span></div>

						<div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;
						<input class="shurukuang" type="text" name="mobile" id="mobile" placeholder="请填写正确的手机号"/><span id="mobiles"></span></div>

						<div class="username">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱:&nbsp;&nbsp;
						<input class="shurukuang" type="text" name="email" id="email" placeholder="请填写正确的邮箱"/><span id="emails"></span></div>

						<div class="username">
							<div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;&nbsp;<input class="yanzhengma" type="text" name="vierfy" id="vierfy" placeholder="请输入验证码"/></div>
							<div class="right fl"><img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()"><span id="vierfys"></span></div>
							<div class="clear"></div>
						</div>
						
					</div>

					<div class="regist_submit">
						<input class="submit" type="submit" id="submit" value="立即注册" >
					</div>
					
				</div>
			</div>
		</form>
	</body>
</html>
<script src="{{ URL::asset('js/jquery-1.7.2.min.js') }}"></script>
<script>
	$(function(){
		var checkName = '';
		var checkPassword = '';
		var checkRepassword = '';
		var checkMobile = '';
		var checkEmail = '';
		var checkVierfy = '';
		//验证用户名
		$("#username").on('blur',function(){
			var username = $(this).val();
			var reg = /^[a-z_]\w*$/i;
			if(username == ''){
				$('#usernames').html("<font color='red'>请输入您的用户名</font>");
				checkName = false;
			}else if(reg.test(username)){
				$('#usernames').html("<font color='green'>√</font>");
				checkName = true;
			}else{
				$('#usernames').html("<font color='red'>请不要输入汉字，要以字母或下划线开头哦</font>");
				checkName = false;
			}
		});

		//验证密码
		$("#password").on('blur',function(){
			var password = $(this).val();
			var reg = /^[a-z0-9_-]{5,}$/i;
			if(password == ''){
				$('#passwords').html("<font color='red'>请输入您的密码</font>");
				checkPassword = false;
			}else if(reg.test(password)){
				$('#passwords').html("<font color='green'>√</font>");
				checkPassword = true;
			}else{
				$('#passwords').html("<font color='red'>请输入6位以上字符</font>");
				checkPassword = false;
			}
		});

		//确认密码
		$("#repassword").on('blur',function(){
			var password = $(this).val();
			var repassword = $(this).val();
			if(repassword == ''){
				$('#repasswords').html("<font color='red'>请您再次确认密码</font>");
				checkRepassword = false;
			}else if(repassword == password){
				$('#repasswords').html("<font color='green'>√</font>");
				checkRepassword = true;
			}else{
				$('#repasswords').html("<font color='red'>两次密码要输入一致哦</font>");
				checkRepassword = false;
			}
		});

		//验证手机号
		$("#mobile").on('blur',function(){
			var mobile = $(this).val();
			var reg = /^1[356789]\d{9}$/;
			if(mobile == ''){
				$('#mobiles').html("<font color='red'>请输入您的手机号</font>");
				checkMobile = false;
			}else if(reg.test(mobile)){
				$('#mobiles').html("<font color='green'>√</font>");
				checkMobile = true;
			}else{
				$('#mobiles').html("<font color='red'>填写下手机号吧，方便我们联系您！</font>");
				checkMobile = false;
			}
		});

		//验证邮箱
		$("#email").on('blur',function(){
			var email = $(this).val();
			var reg = /^[a-z0-9_]+@[a-z0-9]+\.[a-z]+$/i;
			if(email == ''){
				$('#emails').html("<font color='red'>请输入您的邮箱</font>");
				checkEmail = false;
			}else if(reg.test(email)){
				$('#emails').html("<font color='green'>√</font>");
				checkEmail = true;
			}else{
				$('#emails').html("<font color='red'>填写下邮箱吧，方便我们联系您！</font>");
				checkEmail = false;
			}
		});
		
		//验证验证码
		$("#vierfy").on('blur',function(){
			var vierfy = $(this).val();
			if(vierfy.length == ''){
				$('#vierfys').html("<font color='red'>请输入验证码</font>");
				checkVierfy = false;
			}else if(vierfy){
				$('#vierfys').html("<font color='green'>√</font>");
				checkVierfy = true;
			}
		});

		//验证信息是否填写完整
		$("#submit").on('click',function(){
			if(checkName && checkPassword && checkRepassword && checkMobile && checkEmail && checkVierfy){
				$('form').submit();
			}else{
				return false;
			}
		});



    });
</script>