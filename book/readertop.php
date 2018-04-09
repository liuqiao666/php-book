<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>读者登陆的top</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="922" border="0" align="center">
  <tr>
    <td width="818" height="113" background="Images/banner.gif"><h3 style="margin-top:80px" align="right"><?php echo $_SESSION['yhm'];?>读者你好^-^ </h3>
    </td>
  </tr>
  <tr>
    <td height="10" background="Images/menu_line1.gif">&nbsp;&nbsp;
	<script type=text/javascript>
		document.write("<span id='labtime' width='120px' Font-Size='9pt'></span>")
		setInterval("labtime.innerText=new Date().toLocaleString()",1000)
		</script>
      <ul style="margin-left:404px" id="MenuBar1" class="MenuBarHorizontal">
        <li><a href="readerlook.php?a=修改密码">修改密码</a></li>
        <li><a href="readerssts.php">搜索图书</a></li>
        <li><a href="readercx.php">查询借阅记录</a></li>
        <li><a href="index.php" name="tc">退出</a></li>
    </ul>
    </td>
  </tr>
  </table>
</body>
</html>