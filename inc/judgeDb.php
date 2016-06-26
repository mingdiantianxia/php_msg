<?php
//判断数据库是否存在

function judDb($db_name,$table_name){
	$conn = mysql_connect('localhost','root','root');
$sql ='show databases';
$rs= mysql_query($sql,$conn);
$list = array();
while (($db_row = mysql_fetch_assoc($rs))!==false){
	$db_list[] = $db_row;
}
unset($db_row);                 //销毁变量

if ((in_array(strtolower($db_name), $db_list))==false ){
	//in_array()在数组中查询指定值，strtolower()转化为小写字母
	$sql = 'create database '.strtolower($db_name);//判定数据库不存在则创建该数据库
	mysql_query($sql,$conn);
	
	$sql = 'use '.strtolower($db_name);//选择数据库还可以用mysql_select_db()函数
	mysql_query($sql,$conn);



	$sql ='create table '.strtolower($table_name).'(
			id  tinyint(10) primary key not null auto_increment,
			title varchar(32),
			name varchar(20),
			content text(20))';//创建该数据库下对应的表，serial序号类型，自动连续分配序号
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


//serial是bigint unsigned not null AUTO_INCREMENT unique的一个别名
if ((in_array(strtolower($table_name), $db_list))==false){
	$sql ='create table '.strtolower($table_name).'(
			id  tinyint(10)  primary key not null auto_increment,
			title varchar(32),
			name varchar(20),
			content text(20))';//判定数据表不存在则创建该数据表
	mysql_query($sql,$conn);
}
}
}

?>