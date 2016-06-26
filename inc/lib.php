<?php
//查询库
//写两个函数
//专门负责，给我select语句，我给你结果。
//取所有行
function selAll($sql,$conn){
	$rs =mysql_query($sql,$conn);
//返回布尔值True，并通过SELECT查询语句返回查询结果数组，失败返回false
	

$list = array();
if ($rs){         //判断$rs数据是否为空，因为mysql_fetch_assoc()参数不能为空
while (($msg = mysql_fetch_assoc($rs)) !==false ){
	//echo "又取成功了<br/>";
	$list[] = $msg;//把$row装到数组，并且不指定索引,可以通过$list[$i]['title']提取标题数据

}
	return $list;
	
}else{
	echo '查询语句错误！';
	echo mysql_error();
	return false;
	exit();
} 

}





//取单独一行
function selRow($sql,$conn){	
	$rs =mysql_query($sql,$conn);
	//返回布尔值True，并通过SELECT查询语句返回查询结果数组，失败返回false	
	
if ($rs){
	
	return mysql_fetch_assoc($rs);
	
}else{
	echo '查询语句错误！';
	echo mysql_error();
	return false;
	exit();
} 
	
}


?>