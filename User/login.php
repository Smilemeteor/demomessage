<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
<style>
*{list-style: none}
</style>
</head>
<body>
	<form action="http://demo.message.com/user.php?act=login_do" method="post">
	<ul>
		<li>用户名：</li>
		<li><input type="text" name="username"></li>
	</ul>
	<ul>
		<li>密码：</li>
		<li><input type="password" name="password"></li>
	</ul>
	<ul>
	<button>登录</button><a href="http://demo.message.com/User.php?act=register">注册</a>
	</ul>
	</form>
</body>
</html>