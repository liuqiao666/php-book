<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加图书</title>
<style type="text/css">
input {
	font-family: "宋体";
	font-size: 9pt;
	color: #333333;
	border: 1px solid #999999;
	width:60px;
	height:20px;
	margin-top: 20px;
}
#input {
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
  <table width="922" border="1" bgcolor="#FFFFFF" bordercolor="#000000" height="300" align="center" >
  <tr  height="5">
      <td>
        <form id="form1" name="form1" method="post" action="" style="margin-left: 100px; margin-bottom: 50px;">
           <label>
             图书条形码：<input type="text" id="input" name="txm" id="txm" /><br>
          </label>
           <label>
           图书名称：<input type="text" id="input" name="tsmc" id="tsmc" style="margin-left: 16px;" /><br>
          </label>
          <label>
         图书类型：<input type="radio" name="RadioGroup1" value="信息科学技术" id="RadioGroup1_0" style="margin-left: 50px;" />
        信息科学技术</label>
       <label>
         <input type="radio" name="RadioGroup1" value="计算机程序设计" id="RadioGroup1_1" />
         计算机程序设计</label>
       <label>
         <input type="radio" name="RadioGroup1" value=" 数据库技术" id="RadioGroup1_2" />
         数据库技术</label>
       <label>
         <br><input type="radio" name="RadioGroup1" value="宝典系列" id="RadioGroup1_3" style="margin-left: 130px;" />
              宝典系列</label>
       <label>
         <input type="radio" name="RadioGroup1" value="Vue" id="RadioGroup1_4" />
      	Vue</label>
      	<label>
         <input type="radio" name="RadioGroup1" value="心理" id="RadioGroup1_5" />
      	心理</label>
            
           <label>
          <br> 出版社：<input type="text" id="input" name="cbs" id="cbs" style="margin-left: 32px;" /><br>
          </label>    

       <label>
           书架：<input type="radio" name="RadioGroup2" value="PHP书架" id="RadioGroup2_0" />
         PHP书架</label>
       <label>
         <input type="radio" name="RadioGroup2" value="VB书架" id="RadioGroup2_1" />
         VB书架</label>
         <label>
         <input type="radio" name="RadioGroup2" value="文学书架" id="RadioGroup2_2" />
                 文学书架</label>
         <label>
         <input type="radio" name="RadioGroup2" value="政治书架" id="RadioGroup2_3" />
                 政治书架</label>
		<br><input type="submit" name="tj" id="search" class="btn_grey" value="添 加" style="margin-left: 500px; margin-top: 130px;"/>
        </form>
    <?php			
	if(isset($_POST['tj']))
	{
	
	$barcode=$_POST['txm'];
	$bookname=$_POST['tsmc'];
	$typeid=$_POST['RadioGroup1'];
	$bookpress=$_POST['cbs'];
	$bookcase=$_POST['RadioGroup2'];

	//1.连接数据库
	include("connections/myconn.php");//与右侧文件名一致
	//2.选择数据库
	mysql_select_db("login");
	//3.写SQL代码
	$sql="insert into bookinfo(barcode,bookname,typeid,bookpress,bookcase) 
	values('".$barcode."','".$bookname."','".$typeid."','".$bookpress."','".$bookcase."')";
	//4.执行SQL代码
	$result=mysql_query($sql);
	//5.处理执行结果
		if($result)
		{
				echo "<script>alert('图书信息已成功添加！');</script>";	
		}
		else
		{
				echo "<script>alert('图书信息添加失败！');</script>";	
				echo "$sql";
		}
	
	}
	?>    
</table>
</body>
</html>