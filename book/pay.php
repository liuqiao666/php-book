<?php
error_reporting(0);
$id=$_GET['id'];
$my_arr=explode(".",$id);
//1.连接数据库
include("Connections/myconn.php");
//2.选择数据库
mysql_select_db("login",$myconn);
//3.写SQL代码
			
$sql="update borrow set pay='是' where readerid='".$my_arr[0]."' and barcode='".$my_arr[1]."'";
$result=mysql_query($sql);
if($result)
{
	echo "<script>alert('OK！');location.href='Borrowingrefer.php';</script>";

}
else
{
	echo "<script>alert('failure！');location.href='Borrowingrefer.php';</script>";	
}

?>