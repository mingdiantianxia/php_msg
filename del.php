<?php
/*从地址栏接受id
 根据id形成delete语句
 链接数据库，删除内容  */

$conn = mysql_connect('localhost','root','root');
mysql_query('set names utf8');

$sql = 'use php';
mysql_query($sql,$conn);       //链接数据库

if(isset($_GET['id'])){ //判断地址栏是否存在id，如果使用了$_GET方法，且$_GET['id']存在
	$id = $_GET['id']+0;//1 or 1>0,加个0将其转化为整型

	if ($id==0){
		echo '参数有误</br>';//如果$id为零则GET没有获得id数据
		exit;
	}

	$sql = "delete from msg where id = $id";
	$rs = mysql_query($sql,$conn);//返回的结果是资源类型

}

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
	echo  '<h1>删除成功</h1>';
}
else{
	echo '<h1>删除失败</h1>
 		<p>错误原因：'.mysql_errno().'</p>';
}



?>	
	
</body>
</html>