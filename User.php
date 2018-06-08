<?php 
include 'DB.php';
class User
{
	public function login()
	{
		include 'User/login.php';
	}

	public function login_do()
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		$db = new DB;
		$pdo =$db->pdo();
        $sql = "select username,password from user where username = '$_POST[username]' and password = '$_POST[password]'";
        $result = $pdo->query($sql);
        if ($result) {
        	echo "<script>alert('登陆成功！');parent.location.href='http://demo.message.com/Message.php?act=show'</script>";
        }else{
        	echo "<script>alert('登陆失败');parent.location.href='http://demo.message.com/User.php?act=login'</script>";
        }
	}
	public function register()
	{
		include 'User/register.php';
	}
	public function register_do()
	{ 
		$db = new DB;
		$pdo =$db->pdo();
		$username = $_POST['username'];
		$password = $_POST['password'];	
		$sql = "INSERT INTO user (`username`,`password`) VALUES ('$username','$password')";
		$res = $pdo->query($sql);
		if ($res) {
			echo "<script>alert('注册成功');parent.location.href='http://demo.message.com/User.php?act=login'</script>";
		}else{
			echo "<script>alert('注册失败');parent.location.href='http://demo.message.com/User.php?act=register'</script>";
		}
	}
}
$user = new User;
$act = isset($_GET['act'])?$_GET['act']:'login';
$user->$act();