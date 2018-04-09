<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登 录</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#3366FF">
<form action="" method="post">
<div  style="position:relative; background-color:#39F; margin-top:250px">
<div  style="position:relative; background-color:#39F; margin-top:250px; margin-left:460px">
<img src="Images/bg.gif"/> <a href="index.php">读者登陆</a>
  <div class="1" style="position:absolute; z-index:2; left:15px; top:1px; margin-left:90px; margin-top:100px;">
    <label>
       <span class="2">用户名：<input type="text" name="yhm" id="tableBorder"  class="3"/></span>
    </label>
    
    <label><br />
      <span class="2">密码：<input type="password" name="mm" id="tableBorder" class="4" style="margin-left:16px; margin-top: 6px;"/>            
      <br />
      <span class="2">验证码:<input  name="yzm" type="text" style="margin-left:12px" id="tableBorder" class="5" autocomplete="off"/>
                    &nbsp;&nbsp;&nbsp;<img src="yzmimage.php" name="imageField" id="imageField" align="absmiddive" style="cursor: pointer;" onClick="javascript:newgdcode(this,this.src);"/><a href="#" onClick="document.getElementById('imageField').src='yzmimage.php?'+Math.random()" style="font-size:15px">
                       看不清？换一张！</a></span></span>
    </label>
    
    <label>
      <p><input type="submit" name="dl" id="dl" value="登 录"  style="margin-left:170px"/>
      </p>
    </label>
    </div>
  </div>
</div>
<script language="javascript">
	var yzm = document.getElementById("yzm");
	function newgdcode(obj, url) {
		obj.src = url + '?yhmwtime=' + new Date().getTime();
		//后面传递一个随机参数，否则在IE7和火狐下，不刷新图片
		yzm.value = "";
	}
</script>
</form>
</body>
</html>
<?php
if(isset($_POST['dl']))
{
	
	$_SESSION['yhm']=$_POST['yhm'];
	$name=$_POST['yhm'];
	$password=$_POST['mm'];
	if($name!=""&&$password!="")
	{
		//1.建立数据库连接
		include "Connections/myconn.php";
		//2.选择数据库
		mysql_select_db("login",$myconn);
		//3.写sql语句
		$sql="select * from message where name='".$name."' and password='".$password."'";
		//4.执行sql
		$result=mysql_query($sql);
		//5.读出结果$result做相应的操作
		//通过获取$result的行数来判定用户名和密码是否正确
		$hang=mysql_num_rows($result);
		if($hang==0)
		  echo "<script>alert('用户名或密码错误');</script>";
		else
			{
				  echo "<script>alert('恭喜你，登录成功！');</script>";
				  echo "<script> location.href='lookbook.php';</script>"; 
			}
	}
	else
	{
		echo "<script>alert('用户名和密码不能为空！');</script>";
    }
}
?>