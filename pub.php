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
// 定义变量初始值为空
include 'inc/test_input.php';//自定义输入检查函数

$title = $username = $content = "";
$titleErr = $usernameErr = $contentErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") { //检查表单请求方法为POST
	
	if(empty($_POST['title'])){//检查表单值是否为空
		$titleErr = "标题是必填的";
		
	}else {
   $title = test_input($_POST['title']);
}


   if (empty($_POST['content'])){//检查表单值是否为空
   	$contentErr ="内容是必填的";
   }else {
     $content=test_input($_POST['content']); 
}
   

   if (empty($_POST['username'])){//检查表单值是否为空
	$usernameErr = "留言者是必填的";
}else {
   $username=test_input($_POST['username']);
}


}

//不是POST方法就用GET方法
else {
	
	if ($_SERVER["REQUEST_METHOD"] == "GET"){
	if(empty($_GET['title'])){//检查表单值是否为空
	$titleErr = "标题是必填的";

}else {
	$title = test_input($_GET['title']);
}


if (empty($_GET['content'])){//检查表单值是否为空
	$contentErr ="内容是必填的";
}else {
	$content=test_input($_GET['content']);
}
 

if (empty($_GET['username'])){//检查表单值是否为空
	$usernameErr = "留言者是必填的";
}else {
	$username=test_input($_GET['username']);
}
}
}

?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<!-- htmlspecialchars() 函数把特殊字符转换为 HTML 实体。防止被攻击 -->

<p>留言标题：<input type="text" name="title"/> <span class="error">*<?php echo $titleErr;?></span></p>
<p>留言者：<input type="text" name="username"/> <span class="error">*<?php echo $usernameErr;?></span></p>
<p>留言内容：<br/>
<textarea name="content" rows="10" cols="50"></textarea><span class="error">*<?php echo $contentErr;?></span></p>

<p><input type="submit" value="提交留言"/></p>

</form>



<?php 
//显示中文
header("Content-type:text/html;charset=utf-8");

//超全局变量$_GET得到地址栏传输过来的数据
//$_GET是一个数组
//用法$_GET['name'] -->name是指表单里的name的值

/* echo $_GET['title'],'<br/>';
echo $_GET['username'],'<br/>';
echo $_GET['content'],'<br/>';
 */

//POST读取过来的和GET一样
//也有一个超全局数
//用法一样，只是地址栏上不会显示输入内容
/* echo $_POST['title'],'<br/>';
echo $_POST['username'],'<br/>';
echo $_POST['content'],'<br/>';
 */

//PHP $_REQUEST 用于收集 HTML 表单提交的数据,不管是GET还是POST的数据都能收集到。
/* echo $_REQUEST['title'].'<br/>';
echo $_REQUEST['username'].'<br/>';
echo $_REQUEST['content'].'<br/>';
 */


/*$_POST()一般用于表单的传值，提高数据安全，便于将可靠数据存入数据库
 * $_GET()一般用于向数据库请求数据，在地址栏上向数据库发送请求，操作方便*/





echo "<h2>验证过后您的输入：</h2>";
echo $title;
echo "<br>";
echo $username;
echo "<br>";
echo $content;
echo "<br>";



//======连接数据库======
include 'inc/conn.php';
include 'inc/lib.php';//应用文件替换那些注释的代码
include 'inc/judgeDb.php';//自定义函数判断数据库和数据表是否存在



/* $conn =mysql_connect('localhost','root','root');
mysql_query('set names utf8'); */
$db_list = array();
//$db_name = 'php';                 //要判定的数据库名
$table_name = 'msg';              //要判定的数据表名
/* $sql ='show databases';
$rs= mysql_query($sql,$conn);
while (($db_row = mysql_fetch_assoc($rs))!==false){
	$db_list[] = $db_row;
}
unset($db_row);                 //销毁变量
  */


/* if ((in_array(strtolower($db_name), $db_list))==false ){
	//in_array()在数组中查询指定值，strtolower()转化为小写字母
	$sql = 'create database '.strtolower($db_name);//判定数据库不存在则创建该数据库
	mysql_query($sql,$conn);
	$sql = 'use '.strtolower($db_name);
	mysql_query($sql,$conn);
	$sql ='create table '.strtolower($table_name).'(
			id serial,             
			title varchar(10),
			name varchar(10),
			content varchar(20))';//创建该数据库下对应的表，serial序号类型，自动连续分配序号
	mysql_query($sql,$conn);

}
else{ unset($db_list);             //清空整个数组
$sql = 'use '.strtolower($db_name);
mysql_query($sql,$conn);
$sql = 'show tables';              //查询所有数据表
$rs = mysql_query($sql,$conn);
while (($tb_row = mysql_fetch_assoc($rs))!==false){
	$db_list[] = $tb_row;
}
unset($tb_row);                  //销毁变量

if ((in_array(strtolower($table_name), $db_list))==false){
$sql ='create table '.strtolower($table_name).'(
			id serial,             
			title varchar(10),
			name varchar(10),
			content varchar(20))';//判定数据表不存在则创建该数据表
	mysql_query($sql,$conn);
}
}

 */


judDb('php', $table_name);//自定义函数判断数据库和数据表是否存在




/* $sql ='use '.strtolower($db_name);
 mysql_query($sql,$conn); */
useDb('php');// 自定义函数，可以直接传递字符参数给函数变量


 
 $sql ="insert into ".strtolower($table_name)."(title,name,content)values('$title','$username','$content')";
 //echo $sql;
 
 if (empty($content) or empty($title) or empty($username)){
       echo '留言失败</br>';

}else {
 $rs = mysql_query($sql,$conn);
 //输入到数据库,成功返回布尔值True，并通过SELECT查询语句返回查询结果数组，失败返回false
 var_dump($rs);
 if($rs){
        echo '留言成功</br>';
      } 
  else {
   echo '留言失败</br>';
   echo mysql_error();//检测错误原因
       }
    
    
}


 
 



//留言具体页面

/*思路：
 从地址栏接收$_GET参数，获取id值
根据id拼接sql语句
发送sql语句，并取出数据，再打印出来  */

/* $conn = mysql_connect('localhost','root','root');

$sql = 'use php';
mysql_query($sql,$conn);       //链接数据库
 */
useDb('php');


$sql = "select * from msg ";    
/* $rs = mysql_query($sql,$conn);  //查询msg表，并将表数据赋值给$rs




$list = array();
if ($rs){         //判断$rs数据是否为空，因为mysql_fetch_assoc()参数不能为空
while (($msg = mysql_fetch_assoc($rs))!==false){
     //将表达式传递的结果变为布尔值，可以避免警告
	//echo "又取成功了<br/>";
	$list[] = $msg;
	//把$msg装到数组，并且不指定索引,即msg表的所有数据都存储在$list[]数组中，
	//可以通过$list[$i]['title']提取标题数据

	
}
// print_r($list);
//显示关于一个变量的易于理解的信息。
//如果给出的是 string、integer 或 float，将打印变量值本身。如果给出的是 array，将会按照一定格式显示键和元素。
 
// var_dump($list);
//显示关于一个或多个表达式的结构信息，包括表达式的类型与值。数组将递归展开值，通过缩进显示其结构。 　　
  
 }
else{
	echo '数据库没有数据！';
}  */
$list = selAll($sql, $conn);




if(isset($_POST['id'])){
	$id = $$_POST['id']+0;
	if ($id==0){
		echo '参数有误</br>';
		exit;	}
		
		$sql = "select * from msg where id = $id";
		//$rs = mysql_query($sql,$conn);//返回的结果是资源类型
		//$msg = mysql_fetch_assoc($rs);
		$msg = selRow($sql, $conn);

		
		
		if (!$msg){//如果指定的$msg行数据不存在或等于0
			echo '参数有误</br>';
			exit;//php页面不再往下执行
		}
		
		
		print_r($msg);
}



if(isset($_GET['id'])){ //判断地址栏是否存在id，如果使用了$_GET方法，且$_GET['id']存在
	$id = $_GET['id']+0;//1 or 1>0,加个0将其转化为整型
	
	if ($id==0){
		echo '参数有误</br>';//如果$id为零则GET没有获得id数据
		exit;
	}
	
	$sql = "select * from msg where id = $id";
	//$rs = mysql_query($sql,$conn);//返回的结果是资源类型
	//$msg = mysql_fetch_assoc($rs);
	$msg = selRow($sql, $conn);
	
	
if (!$msg){//如果指定的$msg行数据不存在或等于0
	echo '参数有误</br>';
	exit;//php页面不再往下执行
}
		
	var_dump($msg);
	print_r($msg);
	
}
else {//没有接收到来自GET的指定要输出的数据，则直接循环输出整个msg表
?>

   
      <table><tr>
		<td>标题</td>
		<td>姓名</td>
		<td>详细</td>
		<td>修改</td>
		<td>删除</td></tr>
	<?php 
      if(selAll($sql, $conn)!== false){
   for ($i =0,$len = count($list);$i < $len;$i++ ){//控制循环次数 
?>   
     <tr><td><?php echo $list[$i]['title']?></td>
     <td><?php echo $list[$i]['name']?></td>
     <td><a href=pub.php?id=<?php echo $list[$i]['id']?>>查看</a> </td>
 	 <td><a href=up.php?id=<?php echo $list[$i]['id']?>>修改</a></td>
 	 <td><a href=del.php?id=<?php echo $list[$i]['id']?>>删除</a></td>
     </tr>
     
     <?php 
      }	
      }?>
      
  </table>
 
<?php } ?>




</body>
</html>