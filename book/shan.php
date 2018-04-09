<?php
error_reporting(0);
$id=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除图书信息</title>
</head>

<body>
</body>
</html>
<?php
//1.连接数据库
	include("Connections/myconn.php");
//2.选择数据库
	mysql_select_db("login");
	$sql="delete from bookinfo where barcode='".$id."'";
	$result=mysql_query($sql);
	if($result)
	{
		echo "<script>";
		echo "alert('删除成功');";
		echo "location.href='lookbook.php'"; 
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('错误');";
		echo "location.href='lookbook.php'"; 
		echo "</script>";
	}
?>