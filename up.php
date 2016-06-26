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
table{                               /* 加上样式 */
	border:solid 2px orange;
	border-collapse:collapse;
}
tr,td{
	border:solid 2px orange;text-align:center;
}

.error{color:red;}


</style>
</head>
<body>
<?php
//显示中文
header("Content-type:text/html;charset=utf-8");



//留言具体页面

/*思路：
 从地址栏接收$_GET参数，获取id值
根据id拼接sql语句
发送sql语句，并取出数据，再打印出来  */

$conn = mysql_connect('localhost','root','root');
mysql_query('set names utf8');

$sql = 'use php';
mysql_query($sql,$conn);       //链接数据库

if(isset($_POST['id'])){
	$id = $_POST['id']+0;
	if ($id==0){
		echo '参数有误</br>';
		exit;	}
		
		$sql = "select * from msg where id = $id";
		$rs = mysql_query($sql,$conn);//返回的结果是资源类型
		$msg = mysql_fetch_assoc($rs);
		
		
		if (!$msg){//如果指定的$msg行数据不存在或等于0
			echo '参数有误</br>';
			exit;//php页面不再往下执行
		}
		
}



if(isset($_GET['id'])){ //判断地址栏是否存在id，如果使用了$_GET方法，且$_GET['id']存在
	$id = $_GET['id']+0;//1 or 1>0,加个0将其转化为整型
	
	if ($id==0){
		echo '参数有误</br>';//如果$id为零则GET没有获得id数据
		exit;
	}
	
	$sql = "select * from msg where id = $id";
	$rs = mysql_query($sql,$conn);//返回的结果是资源类型
	$msg = mysql_fetch_assoc($rs);
	
if (!$msg){//如果指定的$msg行数据不存在或等于0
	echo '参数有误</br>';
	exit;//php页面不再往下执行
}
		
	
}else {
echo '参数有误';
exit;
}

?>

<form action="up_ok.php" method="post">

<p>留言标题：<input type="text" name="title" value="<?php echo $msg['title']; ?>"/> <span class="error">*</span></p>
<p>留言者：<input type="text" name="username" value="<?php echo $msg['name']; ?>"/> <span class="error">*</span></p>
<p>留言内容：<br/>
<textarea name="content" rows="10" cols="50" ><?php echo $msg['content']; ?></textarea><span class="error">*</span></p>
<p><input type="hidden" name="id" value="<?php echo $msg['id'];?>"/></p>
<!-- 设置隐藏表单接受id值 -->
<p><input type="submit" value="提交留言"/></p>

</form>





</body>
</html>