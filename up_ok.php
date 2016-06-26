<?php
/*思路：
 接收POST数据
 连接数据库
 形成update语句
 where
 使用隐藏表单将id值传过来  */
$title = $_POST['title'];
$username = $_POST['username'];
$content = $_POST['content'];
 $id = $_POST['id'];

$conn = mysql_connect('localhost','root','root');
mysql_query('set names utf8');
$sql = 'use php';
mysql_query($sql,$conn);

$sql = "update msg set title ='$title',name = '$username',content ='$content' where id=$id";

$rs = mysql_query($sql,$conn);
?>

<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<script type="text/javascript">

</script>

<style type="text/css">
</style>
</head>
<body>
	<?php 
	if($rs){
		echo  '<h1>修改成功</h1>';
	}
	else{
		echo '<h1>修改失败</h1>
 		<p>错误原因：'.mysql_errno().'</p>';
	}
	
	
	?>
	
	
</body>
</html>

