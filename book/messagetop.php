<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员top</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="922" border="0" align="center">
  <tr>
    <td width="818" height="113" background="Images/banner.gif"><h3 style="margin-top:80px" align="right">管理员<?php echo $_SESSION['yhm'];?>你好^-^ </h3>
    </td>
  </tr>
  <tr>
    <td  background="Images/menu_line1.gif">&nbsp;&nbsp;
	<script type=text/javascript>
		document.write("<span id='labtime' width='120px' Font-Size='9pt'></span>")
		setInterval("labtime.innerText=new Date().toLocaleString()",1000)
		</script>
      <ul style="margin-left:404px" id="MenuBar1" class="MenuBarHorizontal">
        <li><a class="MenuBarItemSubmenu" href="#">图书管理</a>
          <ul>
              <li><a class="MenuBarItemSubmenu" href="lookbook.php?a=浏览图书" name="ll">浏览图书</a></li>
              <li><a class="MenuBarItemSubmenu" href="lookbook.php?a=添加图书" name="tjts">添加图书</a></li>
          </ul>
        </li>
        <li><a href="#">读者管理</a>
           <ul>
              <li><a class="MenuBarItemSubmenu" href="ckdz.php" name="ckdz">查看读者</a></li>
              <li><a class="MenuBarItemSubmenu" href="lookbook.php?a=添加读者" name="tjdz">添加读者</a></li>
          </ul>
       </li>
        <li><a class="MenuBarItemSubmenu" href="#">借阅管理</a>
          <ul>
            <li><a class="MenuBarItemSubmenu" href="borrowbook.php">借书</a></li>
            <li><a class="MenuBarItemSubmenu" href="messagecx.php">还书</a></li>
            <li><a class="MenuBarItemSubmenu" href="Borrowingrefer.php">借阅查询</a>
        </li>
        </ul>
        <li><a href="messagelogin.php" name="tc">退出</a></li>
    </ul>
    </td>
  </tr>
  </table>
  <script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>