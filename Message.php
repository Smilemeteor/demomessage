<?php 
include 'DB.php';
class Message
{
	public function add()
	{
		include 'Message/add.php';
	}

	public function add_do()
	{
		$db = new DB;
		$pdo =$db->pdo();
		$title = $_POST['title'];
		$text = $_POST['text'];	
		$time = time();
		$sql = "INSERT INTO message (`title`,`text`,`time`) VALUES ('$title','$text','$time')";
		$res = $pdo->query($sql);
		if ($res) {
			echo "<script>alert('留言成功');parent.location.href='http://demo.message.com/Message.php?act=show'</script>";
		}else{
			echo "<script>alert('留言失败');parent.location.href='http://demo.message.com/Message.php?act=add'</script>";
		}
	}

	public function show()
	{
		include 'Message/show.php';
	}	

	public function delete($id)
	{
		$db = new DB;
		$pdo =$db->pdo();
		$id = $_GET['id'];
		$sql = "delete from message where id='$id'";
		$res = $pdo->query($sql);
		if($res){
			echo "<script>alert('删除成功');location.href='http://demo.message.com/Message.php?act=show'</script>";
		}else{
			echo "删除失败！错误为".mysql_error();
			header("refresh:5;url=http://demo.message.com/Message.php?act=show");die;
		}		
	}

	public function update()
	{
		include 'Message/update.php';
	}
	public function update_do($id)
	{
		
	}
}
$Message = new Message;
$act = isset($_GET['act'])?$_GET['act']:'show';
$Message->$act();