<?php
//连接数据库

header("Content-type:text/html;charset=utf-8");//防止乱码

$conn = mysql_connect('localhost','root','root');
mysql_query('set names utf8');
if(!$conn){
	echo '连接数据库失败';
	exit;
}

//$sql = 'use php';
//mysql_query($sql,$conn);

function useDb($db_name){
	mysql_query('set names utf8');
	$sql = 'use '.strtolower($db_name);
	mysql_query($sql,$GLOBALS['conn']);
	//等价于mysql_select_db()
}
?>