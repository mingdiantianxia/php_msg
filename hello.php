<?php
//显示中文
header("Content-type:text/html; charset=utf-8");
// 文本注释
/* 文本注释 */
// 文本注释




// 下面是引用文件的几种方法

// 特点，require引用出错，脚本停止运行
require "yy.php";
require ("yy.php");

// 特点，include引用错误，脚本会警告，但继续运行
include 'yy.php';

// 创建变量
$yy = "yy.php";
require ($yy);

// 只引用执行一次,如果已经被引用包含则不会再执行
require_once 'yy.php';
include_once 'text.php';
?>
<font color=blue>========引用文件结束=======</font><br/>
<!--当PHP碰到结束标记?>时，就简单地将其后的内容原样输出( 除非其后紧接着一个新行)直到碰到下一个开始标记为止。-->





<!-- 字符串连接 -->
<br/><font color=red>========字符串=======</font><br/>
<?php 
$txt = "我爱你！";
$txt2 = "你知道吗？";
echo $txt . "亲爱的 " . $txt2 . "<br/>", "\n";

// 字符长度
echo strlen ( $txt ) . "<br>", "\n";

// 字符检索
echo strpos ( "我爱你爱的深沉", "深" ) . "<br/>", "\n";
?>




<br/><font color=red>========选择结构=======</font><br/>
<?php 
// 选择结构
$d = date ( "D" );
if ($d == "Fri")
	echo "周末快乐！";
else
	echo "$d"."快乐！" . "<br/>", "\n";
	
?>




<!-- 数组的三种形式
数值数组 自动分配下标 -->
<br/><font color=red>========数组=======</font><br/>
<?php 
$hello = array (
		"hi",
		"hello",
		"早上好！",
		"Good Moning!" 
);
// 人工分配
$hello [0] = "hi";
$hello [1] = "hello";
$hello [2] = "早上好！";
$hello [3] = "Good Moning!";
echo $hello [0] . "<br/>", "\n" . $hello [1] . "<br/>", "\n" . $hello [2] . "<br/>", "\n" . $hello [3] . "<br/>", "\n";

// 关联数组
$ages = array (
		"Carl" => 23,
		"Linda" => 20,
		"Sala" => 19 
);
// 等价于
$ages ['Carl'] = "23";
$ages ['Linda'] = "20";
$ages ['Sala'] = "19";

echo $ages ['Carl'] . "<br/>", "\n" . $ages ['Linda'] . "<br/>", "\n" . $ages ['Sala'] . "<br/>", "\n";

// 多维数组
$families = array (
		"A" => $hello,
		"B" => $ages 
);
echo $families ["A"] [0], "<br/>", "\n", $ages ['Carl'], "<br/>", "\n";

?>



<font color=green>===数组的修改与使用===</font><br/>
<?php 
// 数组的修改与使用
// 使用方括号修改
$hello [0] = "问候你妈！";
if ($hello [0] == $families ["A"] [0])
	echo "true<br/>\n";
	/*
 * 创建多维数组时， 指向的hello数组被重新复制了一份储存在families["A"]中, 不再是同一个hello数组， 一个改变另一个不改变
 */
else
	echo "false<br/>\n";

echo "<h1>", $families ["A"] [0], "<br/>\n", $hello [0], "</h1>\n";

// 统计数组条数
echo count ( $hello ) . "<br/>\n", count ( $ages ) . "<br/>\n", count ( $families ["A"] ) . "<br/>\n";

// var_dump() 会返回变量的数据类型和值
echo var_dump ( $families ), "<br/>\n";

// 判断数组，是则返回1,否则不返回任何值
echo is_array ( $ages ) . "<br/>\n";

// gettype()获取数据类型
echo gettype ( $txt ), "<br/>\n", gettype ( $ages ), "<br/>\n";

// 定义常量define(名字，值，大小写忽略true)，与判断defined(名字)
define ( "man", "有钱" ); // 注意分号
echo man . "<br/>\n";
echo defined ( "man" ) . "<br/>\n"; // 有定义则返回1，否则不返回值





// 获取所有系统预定义常量
//$N = get_defined_constants ( true ); // 该函数以数组形式返回系统常量，包括自定义常量
echo "<pre>"; // 输出预格式
/* echo $N; // 输出了数组类型，不能输出数组内容。 */
//print_r ( $N ); // 输出数组内容。
                
// 使用系统常量实例
echo "当前所使用的操作系统为：" . PHP_OS, "\n";

echo "</pre>", "\n";
?>




<br/><font color=red>=====数组遍历=====</font><br/>
<?php 
// 数组遍历,循环函数foreach($数组名 as $key => $value){}
//从数组的第一个单元开始
//逐个取出他们的值，将索引赋给$x，值赋给$x_value,因为$ages为关联数组，所以$x为索引，$x_value为值
foreach ( $ages as $x => $x_value ) {//$x为键，$x_value为值
	echo $x . " " . $x_value; 
	echo "<br/>", "\n";
}
 foreach ($ages as $value){//没有设置将索引赋给变量，只将值赋给$value
	echo $value;
	echo "<br/>";
}
?>
<br/>









<font color=red>-----单双引用-----</font><br/>
<?php 
$money = 10000;
$credit = $money;
$credit = 5000;
echo "$credit ---- $money <br/>", "\n"; // 双引号内解析输出
echo '$credit ---- $money <br/>', "\n"; // 单引号内原样输出，但速度更快

$credit = &$money; // credit的指针（地址）指向money的储存空间
$credit = 5000;
echo $credit, '----', $money, '<br/>', "\n";

// php中的源码会输出到html源码中，然后通过html显示在网页中
// 所以php中的转义字符产生的效果会先在html源代码中体现
echo "今天\n是个好日子<br/>", "\n";
echo '今天\n是个好日子<br/>', "\n";







/*
 * 界定符表示字符串 EOF为自定义的标记，要求不在正文中出现， 并且结束标记要有分号且前面不能有空格，变量不需要用连接符, 原样输出,但能解析转义字符
 */
echo <<<EOF
<br/><font color=red>==================heredoc界定符技术=================</font><br/>\n
$txt<br/>
$txt2<br/>
$money<br/>
$credit<br/>\n
EOF;
function outputhtml() {
	echo <<<EOF
<html>
<HEAD></HEAD>
<body>
<font color=red>这里是html区<br/></font>
	
</body>
</html>
EOF;
}
outputhtml (); // 调用函数
?>
<font color=blue>
========界定符结束=======</font><br/>





<br/><font color=red>
========变量=======</font><br/>
<?php 
unset($credit);//销毁变量


//可变的变量名
$talk='hello';
$talk_value=print_r($$talk,true);
//从右边开始解析，即输出的是$hello数组
//第二参数为true，即将信息作为返回值，而不直接输出
echo $talk_value,"<br/>\n";
print_r("$txt$txt2<br/>\n");

//变化常量名
//constant把变量的值当成常量的名字，引用常量
echo constant('man'),"<br/>\n";
?>







<br/><font color=red>
========循环跳转=======</font><br/>
<?php 
for($m =10000,$num = 0;$m >=500;$num++){
if ($m>5000){
	$m -=550;
}
else if ($num==10){
	echo '跳过第',$num+1,'次过桥后剩下',$m,'元<br/>';
	continue;//后面可跟数字，表示跳过多重嵌套循环，如1跳过本次循环，进入下一次循环
}
else if ($num==11){
	echo '跳过第',$num+1,'次及以后过桥后剩下',$m,'元<br/>';
	break 1;//后面可跟数字，表示跳出多重嵌套循环，如1跳出本次循环，循环结束
}
	else {
	$m -=500;
}
echo '第',$num+1,'次过桥后剩下',$m,'元<br/>';
}
echo $num,'<br/>' ;
?>





<br/><font color=red>
========数组的排序=======</font><br/>
<?php 
//sort()升序，rsort()降序
//asort()根据值升序，arsort()据值降序
//ksort()根据键升序，krsort()根据键降序
echo '未排序：','<br/>';
foreach ($hello as $value){
	echo $value;
	echo '<br/>';
	
}
echo '<br/>','已排序：','<br/>';
sort($hello);
foreach ($hello as $value){
	echo $value;
	echo '<br/>';}
/* for ($x=0;$x<$count=count($hello);$x++){
	echo $hello[$x];
	echo '<br/>';
}	 */
?>
	
	

<br/><font color=red>
========超全局变量应用，留言本=======</font><br/>
<?php 
//跟常量一样，何时何地都能访问到

//表单验证，内容在pub.php中
include 'msg.php';

/* function t(){
	echo $num;}
t();
//因为函数内部没有定义，所以访问不到$num 
会显示null
不会像JS一样沿着作用域往外寻找
*/



//$GLOBALS — 引用 全局作用域中可用的全部变量

function t(){	
	$GLOBALS['z']=$GLOBALS['d'].$GLOBALS['txt'].$GLOBALS['txt2'];
}
t();
echo $z ,'<br/>';
//$z没有定义，但因为是$GLOBALS数组的变量，函数之外也可以访问,但严谨的代码应该定义



//$_SERVER 超全局变量保存关于报头、路径和脚本位置的信息。
echo $_SERVER['PHP_SELF'],'<br/>';//返回当前执行脚本的文件名。
echo $_SERVER['SERVER_ADDR'],'<br/>';//返回当前运行脚本所在的服务器的 IP 地址。
echo $_SERVER['REMOTE_ADDR'],'<br/>';//返回浏览当前页面的用户的 IP 地址。		
echo $_SERVER['SCRIPT_FILENAME'],'<br/>';//返回当前执行脚本的绝对路径。
echo $_SERVER['SCRIPT_NAME'],'<br/>';//返回当前脚本的路径。
echo $_SERVER['REQUEST_METHOD'],'<br/>';//返回访问页面使用的请求方法（例如 POST）。
?>

<br/><font color=red>
========超全局变量end=======</font><br/>




<br/><font color=red>
========php连接Mysql数据库=======</font><br/>

<?php 
$host ='localhost';
$user ='root';
$pwd ='root';
$conn =mysql_connect($host,$user,$pwd);//打开通道：地址，用户，密码
mysql_query("SET NAMES UTF8");
//此时数据库的编码是GBK，页面是UTF-8编码，用：mysql_query("SET NAMES UTF8")转换编码;


var_dump($conn);
$sql ='use php';
$rs =mysql_query($sql,$conn);
var_dump($rs);

/* $sql="insert into msg (id,title,name,content)values(6,'标题6','赵云','青虹剑')";
$rs=mysql_query($sql,$conn);
var_dump($rs);
 */
?>


<br/><font color=red>
========php读取Mysql数据库数据=======</font><br/>
<!-- 在list.php页 -->

