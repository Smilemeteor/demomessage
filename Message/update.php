<?php
header("content-type:text/html;charset=utf-8");//设置字符编码
@mysql_connect('127.0.0.1','root','root')or die("连接失败，错误为".mysql_error());
mysql_select_db("test");
mysql_query("set names utf8");
$id = $_GET['id'];
$sql = "select * from message where id=$id";
$res = mysql_query($sql);
$data = mysql_fetch_assoc($res);
?>
<meta charset='utf-8'>
<center>
<form method="post" action="upd_do.php">
	<input type='hidden' name='id' value="<?php echo $data['id']?>" />
	<table>
	<tr>
		<td>标题：</td>
		<td><input type='text' name='title' value="<?php echo $data['title']?>"></td>
	</tr>
	<tr>
		<td>内容：</td>
		<td><input type="text" name="text" value="<?php echo $data['text'] ?>"></td>
	</tr>
	<tr>
		<td><input type='submit' value='修改分类'></td>
		<td></td>
	</tr>
	</table>
</form>
</center>