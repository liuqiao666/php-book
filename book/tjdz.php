<?php
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加读者</title>
<style type="text/css">
input {
	font-family: "宋体";
	font-size: 9pt;
	color: #333333;
	border: 1px solid #999999;
	width:300px;
	height:20px;
}
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>
<body> 
  <table width="922" border="1" bordercolor="#000000" height="500" bgcolor="#ffffff" align="center" >
  <tr align="center"  height="5">
      <td>
        <form id="form1" name="form1" method="post" action="">
          <label>
            用户名：<input type="text" name="yhm" id="yhm" /><br />
          </label>
           <label>
           密码：&nbsp; <input type="text" name="mm" id="mm" style="margin-top:50px" />
          </label><br />
          <input type="submit" name="tj" id="search" class="btn_grey" style="margin-left:330px; margin-top:60px" value="添 加"/></td>
        </form></tr>
    <?php
	
	if(isset($_POST['tj']))
	{
	
	$name=$_POST['yhm'];
	$password=$_POST['mm'];
	
	//1.连接数据库
	include("connections/myconn.php");//与右侧文件名一致
	//2.选择数据库
	mysql_select_db("login");
	//3.写SQL代码
	$sql="insert into user values('".$name."','".$password."')";
	//4.执行SQL代码
	$result=mysql_query($sql);
	//5.处理执行结果
	//$row=mysql_fetch_row($result);//只能读出数据库中的一行。
	echo "<script>alert('该用户已成功添加！');</script>";	
	}
	?>
    
</table>
</body>
</html>