<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Insert title here</title>
<link rel="stylesheet" href="common/css/bootstrap.css">
<link rel="stylesheet" href="common/css/bootstrap-theme.css">
<link rel="stylesheet" href="login/css/login.css">
</head>
<body>

<div>

</div>
<div id="container">
	<div style="height:50px"></div>
	<div id="headImg" align="center" style="width:300px">
		<div id="hb">
		<img src="common/image/cat.jpg" alt="..." class="img-circle" width="200px" height="200px">
		</div>
	</div>
	<div style="height:30px"></div>
	<div style="width:280px" id='formm'>
		<form role="form" id="userLogin" action="enter" method="post">
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input	type="email" class="form-control" id="InputEmail" name="email"  placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1"/>Password</label> 
					<input	type="password" class="form-control" id="InputPassword" name="password"	placeholder="Password">
				</div>
				<div align="center">
				<button type='submit' class="btn  btn-lg" onclick="checkValidate()">&nbsp;登录&nbsp;</button>
				</div>
				<hr/>
		</form>
    </div>
</div>
{{ HTML::script('common/js/jquery-1.6.min.js') }}
{{ HTML::script('common/js/bootstrap.min.js') }}
{{ HTML::script('login/js/login.js') }}
</body>
</html>

