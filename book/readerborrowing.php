<?php
error_reporting(0);
$id=$_GET['id'];
include("readertop.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>读者借书</title>
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

 <table width="922" border="1" bordercolor="#000000" height="500" bgcolor="#ffffff" align="center" >
  <tr align="center"  height="5">
        <form id="form1" name="form1" method="post" action="">
      <td>
           <label>
             请输入你的ID号： <input type="text" class="input" name="readerid" id="eaderid"/><br /><br />
             
<font  face="黑体" size="+3">请核对你要借阅的图书的信息:</font><br /><br /><br />
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
    						   <p align="left" style="margin-left:350px">
    						   1.图书条形码：<?php echo $row['barcode']?><br />
     						   2.图书名字：<?php echo $row['bookname']?><br />
                               3.图书种类：<?php echo $row['typeid']?><br />
                               4.出版社：<?php echo $row['bookpress']?><br />
                               5.书架：<?php echo $row['bookcase']?><br /></p>                   
                               <input type="submit" name="qr" id="search" class="btn_grey" style="margin-left:330px; margin-top:60px" value="确 认"/>
          </label></td>
</form></tr></table>
 <?php include("footer.php");?>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
<?php
if(isset($_POST['qr']))
{

$readerid=$_POST['readerid'];


//3.写SQL代码
	$sql="select *from borrow where readerid = '$readerid' and pay = '否'";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		 echo "<script>alert('请于图书管理处缴清您的罚款，谢谢！');location.href='readercx.php'</script>;";
	}
	else
	{
		$sql="insert into borrow(barcode,bookname,typeid,bookpress,bookcase,readerid,borrowday) values('".$row['barcode']."','".$row['bookname']."','".$row['typeid']."','".$row['bookpress']."','".$row['bookcase']."','".$readerid."','".date("Y-m-d")."')";
		$result=mysql_query($sql);
		if($result)
		{
			$sql="update bookinfo set state='1' where barcode='".$id."'";
			$result1=mysql_query($sql);
			if($result1)
			{
				echo "<script>alert('借书成功，请在规定的时间内归还，谢谢！');location.href='readerlook.php';</script>";	
			}
			else
			{
				echo "<script>alert('借书失败，请与管理员联系！');location.href='readerlook.php';</script>";	
			}
		}
	}
}
?>