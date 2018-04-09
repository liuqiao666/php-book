<?php
error_reporting(0);
if(isset($_GET['a']))
	$b=$_GET['a'];
else
	$b="";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员主页</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <?php include("messagetop.php");?>

<?php
    switch($b)
	{
		case "浏览图书":include("content.php");break;
		case "添加图书":include("tjts.php");break;
		case "查看读者":include("ckdz.php");break;
		case "添加读者":include("tjdz.php");break;
		case "借书":include("borrowbook.php");break;
		case "还书":include("messagecx.php");break;
		case "借阅查询":include("Borrowingrefer.php");break;
		default:include("content.php");break;
	}
	
	?>
 <?php include("footer.php");?>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>