<?php
error_reporting(0);
$id=$_GET['id'];
include("messagetop.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>修改图书信息</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
input {
	font-family: "宋体";
	font-size: 9pt;
	color: #333333;
	border: 1px solid #999999;
	width:60px;
	height:20px;
}
.input {
	font-family: "宋体";
	font-size: 9pt;
	color: #333333;
	border: 1px solid #999999;
	width:300px;
	height:20px;
}
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" /></head>
<body>

<form id="form1" name="form1" method="post" action="">
<?php
//1.连接数据库
include("Connections/myconn.php");
//2.选择数据库
mysql_select_db("login",$myconn);
//3.写sql
$sql="select * from bookinfo where barcode='".$id."'";
//4.执行sql
$result=mysql_query($sql);
//5.处理结果
$row=mysql_fetch_array($result);
?>
  <table width="922" border="1" bgcolor="#FFFFFF" bordercolor="#000000" height="500" align="center" >
  <tr align="center" height="5">
      <td >
          <label>
            图书条形码：
          </label>
 </td> 
      <td>
           <label>
           <input type="text" class="input" name="txm" id="txm" value="<?php echo $row['barcode'];?>" />
          </label></td></tr>
            <tr align="center"  height="5">
      <td>

          <label>
            图书名称：
          </label>
 </td>
      <td>
           <label>
           <input type="text" class="input" name="tsmc" id="tsmc" value="<?php echo $row['bookname'];?>" />
          </label></td></tr>
                      <tr align="center"  height="5">
      <td >

          <label>
            图书类型：
          </label>
 </td>
      <td>
       <label>
         <input type="radio" name="RadioGroup1" value="信息科学技术" id="RadioGroup1_0" 
		 <?php  
		 	if($row["typeid"]=="信息科学技术")
		 	{
				echo checked;
			}
				
			 ?> />
        信息科学技术</label>
       <label>
         <input type="radio" name="RadioGroup1" value="计算机程序设计" id="RadioGroup1_1"
         <?php  
		 	if($row["typeid"]=="计算机程序设计")
		 	{
				echo checked;
			}
				
			 ?> />
         计算机程序设计</label>
       <label>
         <input type="radio" name="RadioGroup1" value="数据库技术" id="RadioGroup1_2"
        <?php  
		 	if($row["typeid"]=="数据库技术")
		 	{				
				echo checked;
			}
				
			 ?> />
         数据库技术</label>
       <label>
         <input type="radio" name="RadioGroup1" value="宝典系列" id="RadioGroup1_3"
       <?php  
		 	if($row["typeid"]=="宝典系列")
		 	{
				echo checked;
			}
				
			 ?> />
         宝典系列</label></td></tr>
                                <tr align="center"  height="5">
      <td>

          <label>
            出版社：
          </label>
 </td>
      <td>
           <label>
           <input type="text" class="input" name="cbs" id="cbs" value="<?php echo $row['bookpress'];?>" />
          </label></td></tr>
             <tr align="center"  height="5">
      <td>

          <label>
            书架：
          </label>
 </td>
      <td>
       <label>
      
         <input type="radio" name="RadioGroup2" value="PHP书架" id="RadioGroup2_0"      
          <?php  
		 	if($row["bookcase"]=="PHP书架")
		 	{
				echo checked;
			}
				
			 ?> />
         PHP书架</label>
       <label>
         <input type="radio" name="RadioGroup2" value="VB书架" id="RadioGroup2_1"
          <?php  
		 	if($row["bookcase"]=="VB书架")
		 	{
				echo checked;
			}
				
			 ?> />
         VB书架</label></td></tr>
             <table><input type="submit" name="xg" id="search" class="btn_grey" style="margin-left:1100px" value="修 改"/></table>
        </form>
</table>
 <?php include("footer.php");?>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
<?php
if(isset($_POST['xg']))
{

$barcode=$_POST['txm'];
$bookname=$_POST['tsmc'];
$typeid=$_POST['RadioGroup1'];
$bookpress=$_POST['cbs'];
$bookcase=$_POST['RadioGroup2'];


//3.写SQL代码
	$sql="update bookinfo set barcode='".$barcode."',bookname='".$bookname."',typeid='".$typeid."',bookpress='".$bookpress."',bookcase='".$bookcase."' where barcode='".$id."'";
	$result=mysql_query($sql);
	if($result)
	{
		echo "<script>alert('图书信息已成功修改！');location.href='lookbook.php';</script>";	
	}
	else
	{
		echo "<script>alert('修改失败！');location.href='lookbook.php';</script>";	
	}
}
?>