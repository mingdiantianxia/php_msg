<?php


/* $conn = mysql_connect('localhost','root','root');
$sql = 'use php';
mysql_query($sql,$conn);  */
include 'inc/conn.php';//上面的连接数据库代码被包含在conn.php文件中
include 'inc/lib.php';//select查询语句库

$sql = 'select * from msg';
//$rs =mysql_query($sql,$conn);
//返回布尔值True，并通过SELECT查询语句返回查询结果数组，失败返回false

/* print_r(mysql_fetch_assoc($rs));// 取出数据，输出数组内容。
 echo '<br/>';
print_r(mysql_fetch_assoc($rs));
echo '<br/>';
print_r(mysql_fetch_assoc($rs));
echo '<br/>';
*/

/* $list = array();
while (($row = mysql_fetch_assoc($rs)) !==false ){
	//echo "又取成功了<br/>";
	$list[] = $row;//把$row装到数组，并且不指定索引,可以通过$list[$i]['title']提取标题数据

} */



$list = selAll($sql,$conn);//调用lib.php中的自定义函数，并将返回值赋给一个变量
print_r($list);



?>