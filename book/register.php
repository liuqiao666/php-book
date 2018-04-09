<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>读者注册</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#3366FF">
<form action="" method="post">
<div  style="position:relative; background-color:#39F; margin-top:300px">
<div  style="position:relative; background-color:#39F; margin-top:300px; margin-left:630px">
<img src="Images/bg.gif"/>
  <div class="1" style="position:absolute; z-index:2; left:15px; top:1px; margin-left:90px; margin-top:80px;">
    <label>
       <span class="2">用户名：<input type="text" name="yhm" id="tableBorder"  class="3"/></span>
    </label>
    
    <label><br />
      <span class="2">密码：<input type="password" name="mm" id="tableBorder"  style="margin-left:16px; margin-top: 5px;" class="4"/>            
      <br />
      <span class="2">编号：<input type="text" name="number" id="tableBorder"  style="margin-left:16px; margin-top: 5px;" class="4"/>            
       <br />
      <span class="2">验证码:<input  name="yzm" type="text"  id="tableBorder"  style="margin-left:8px; margin-top: 5px;" class="5" autocomplete="off" />
      &nbsp;&nbsp;<img src="yzmimage.php" name="imageField" id="imageField" align="absmiddive" style="cursor: pointer;" onClick="javascript:newgdcode(this,this.src);"/><a href="#" onClick="document.getElementById('imageField').src='yzmimage.php?'+Math.random()" style="font-size:15px">
      &nbsp;看不清？换一张！</a></span></span>
    </label>
    
    <label>
      <p><input type="submit" name="zc" id="zc" value="注 册"  style="margin-left:170px"/>
        <input type="submit" name="dl" id="dl" value="登 录" style="margin-left:45px" />
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
if (isset($_POST['zc']))
{
	if($_POST['yzm']!="")
	{
		if(strcasecmp($_POST['yzm'],$_SESSION['yzm'])!=0)
		{
			 echo "<script>alert('验证码不正确');</script>;";
		}
		else
		{
	
			$name=$_POST['yhm'];
			$password=$_POST['mm'];
			$id=$_POST['number'];
			
			//1.连接数据库
			include("Connections/myconn.php");
			//2.选择数据库
			mysql_select_db("login",$myconn);
			//3.操作数据库（写sql代码）
			$sql="select *from user where name='".$name."'";
			//4.执行sql代码
			$result=mysql_query($sql);
			//5.处理执行结果	
			if(mysql_num_rows($result)>0)
			{
				echo "<script>alert('账户名已存在,不能再注册！');</script>";
			}
			else
			{
				$sql="insert into user values('".$name."','".$password."','".$id."')";
				$result=mysql_query($sql);

				echo "<script>alert('该用户已成功注册！');</script>";
				echo "<script>location.href='index.php'</script>"; 
					
			}		
				
		}
	}
		
		else
		{
			echo "<script>alert('请您输入正确的验证码！');</script>";
		}
}
if(isset($_POST['dl']))
{
	echo "<script>location.href='index.php';</script>"; 
	
}
?>