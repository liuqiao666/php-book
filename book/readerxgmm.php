<?php
error_reporting(0);
session_start();
include("readertop.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>读者修改密码页面</title>
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
</head>

<body>
 <table width="922" border="1" bordercolor="#000000" height="500" bgcolor="#ffffff" align="center" >
  <tr align="center"  height="5">
        <form id="form1" name="form1" method="post" action="">
      <td>
           <label>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;密码： <input type="text" name="mm" id="mm"/><br />
       确认密码： <input type="text" name="qmm" id="qmm" style="margin-top:50px" /><br />
           <input type="submit" name="tj" id="search" class="btn_grey" style="margin-left:400px; margin-top:60px" value="修 改"/>
          </label></td>
        </form></tr>
    <?php
	
	if(isset($_POST['tj']))
	{
	
	$name=$_POST['yhm'];
	$password=$_POST['mm'];
	$qmm=$_POST['qmm'];
		if($password==$qmm)
		{
	
			//1.连接数据库
			include("connections/myconn.php");//与右侧文件名一致
			//2.选择数据库
			mysql_select_db("login");
			//3.写SQL代码
			$sql="update user set password='".$password."' where name= '".$_SESSION['yhm']."'";
			//4.执行SQL代码
			$result=mysql_query($sql);
			//5.处理执行结果
			//$row=mysql_fetch_row($result);//只能读出数据库中的一行。
			echo "<script>alert('该用户已成功修改！');</script>";	
		}
		else
		{
			echo "<script>alert('两次输入的密码不一致，请重新输入！');</script>";
		}
	}
			?>
  <?php include("footer.php");?>   
</table>
</body>
</html>