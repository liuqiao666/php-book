<?php
error_reporting(0);
include("messagetop.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜索页面</title>
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
	margin-left:40px;
}
tr{
	height: 10px;
}

p{margin:0}
#page{
    height:40px;
    margin-top: 20px;
    margin-left: 500px;
    width: 600px;
}
#page a{
    display:block;
    float:left;
    margin-right:10px;
    padding:2px 12px;
    height:24px;
    border:1px #cccccc solid;
    background:#fff;
    text-decoration:none;
    color:#808080;
    font-size:12px;
    line-height:24px;
}
#page a:hover{
    color:#077ee3;
    border:1px #077ee3 solid;
}
#page a.cur{
    border:none;
    background:#077ee3;
    color:#fff;
}
#page p{
    float:left;
    padding:2px 12px;
    font-size:12px;
    height:24px;
    line-height:24px;
    color:#bbb;
    border:1px #ccc solid;
    background:#fcfcfc;
    margin-right:8px;

}
#page p.pageRemark{
    border-style:none;
    background:none;
    margin-right:0px;
    padding:4px 0px;
    color:#666;
}
#page p.pageRemark b{
    color:red;
}
#page p.pageEllipsis{
    border-style:none;
    background:none;
    padding:4px 0px;
    color:#808080;
}
.dates li {font-size: 14px;margin:20px 0}
.dates li span{float:right}
</style>
</head>

<body>
   <table width="922px" style="margin-left:300px" border="1">
   <tr height="30px" bgcolor="#FFFFFF"><td>
   <form  id="form1" name="form1" method="post" action="" style="margin-left: 100px;"><br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;♥&nbsp;&nbsp;请输入读者编号：<input type="text" class="input" style="margin-left:16px; margin-top:10px" name="readernumber" /><br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;♥&nbsp;&nbsp;请输入图书编号：<input type="text" class="input" style="margin-left:16px; margin-top:10px" name="booknumber" /><br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;♥&nbsp;&nbsp;请输入借书日期：<input type="text" class="input" style="margin-left:16px; margin-top:10px" name="borrowday"/><br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;♥&nbsp;&nbsp;请输入还书日期：<input type="text" class="input" style="margin-left:16px; margin-top:10px" name="reaturnday" />
       <p>
         <label style="margin-left:90px">
           <input type="checkbox" name="checkbox" value="overdue" id="check1" />
           逾期
           </label>
         <label style="margin-left:25px">
           <input type="checkbox" name="checkbox" value="fine" id="check2" />
           有罚款
           </label>
         <br />
       </p>
       <br />
     <input type="submit" name="search" id="search" class="btn_grey" style="margin-left:650px" value="搜 索"/>
</form></td></tr>
  <table width="922" border="1" bordercolor="#000000" height="200" bgcolor="#ffffff" align="center" >
  <tr bgcolor="#00CCFF" align="center"  height="5">
      <td>读者编号</td>
      <td>图书编号</td>
      <td>借书日期</td>
      <td>还书日期</td>
      <td>状态</td>
      <td>逾期</td>
      <td>罚款</td>
      <td>是否缴清罚款</td>
  </tr>
    <?php  
	//1.连接数据库
	include("connections/myconn.php");//与右侧文件名一致
	//2.选择数据库
	mysql_select_db("login");
	//3.写SQL代码
	
	require_once('page.class.php'); //分页类
	$showrow = 4; //一页显示的行数
	$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
	$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
	
	$sql="select *from borrow";
	if($_SESSION['readernumber']!=""&&$_SESSION['booknumber']!="")
	{
		session_destroy();
	}
	if($_SESSION['readernumber']!=""&&$_SESSION['borrowday']!="")
	{
		session_destroy();
	}
	if($_SESSION['readernumber']!=""&&$_SESSION['reaturnday']!="")
	{
		session_destroy();
	}
	if($_SESSION['readernumber']!=""&&$_SESSION['checkbox']!="")
	{
		session_destroy();
	}
	if($_SESSION['booknumber']!=""&&$_SESSION['borrowday']!="")
	{
		session_destroy();
	}
	if($_SESSION['booknumber']!=""&&$_SESSION['reaturnday']!="")
	{
		session_destroy();
	}
	if($_SESSION['booknumber']!=""&&$_SESSION['checkbox']!="")
	{
		session_destroy();
	}
	if($_SESSION['borrowday']!=""&&$_SESSION['reaturnday']!="")
	{
		session_destroy();
	}
	if($_SESSION['reaturnday']!=""&&$_SESSION['checkbox']!="")
	{
		session_destroy();
	}
	if(isset($_POST['search']))
	{		
		switch(x)
		{
			case $_POST['readernumber']!="":$_SESSION['readernumber']=$_POST['readernumber'];
			$sql="select *from borrow where readerid = '".$_POST['readernumber']."' ";break;
			case $_POST['booknumber']!="":$_SESSION['booknumber']=$_POST['booknumber'];
			$sql="select *from borrow where booknumber = '".$_POST['booknumber']."' ";break;
			case $_POST['borrowday']!="":$_SESSION['borrowday']=$_POST['borrowday'];
			$sql="select *from borrow where borrowday = '".$_POST['borrowday']."' ";break;
			case $_POST['reaturnday']!="":$_SESSION['reaturnday']=$_POST['reaturnday'];
			$sql="select *from borrow where reaturnday = '".$_POST['reaturnday']."' ";break;
		}		
		switch($_POST['checkbox'])
		{
			case overdue:$_SESSION['checkbox']=$_POST['checkbox'];$sql="select *from borrow where overdue = '1' ";break;
			case fine:$_SESSION['checkbox']=$_POST['checkbox'];$sql="select *from borrow where fine != '0' ";break;
		}
	}
	else
	{
		$sql="select *from borrow";
		if($_SESSION['readernumber']!="")
		{
			$sql="select *from borrow where readerid = '".$_SESSION['readernumber']."' ";
		}
		if($_SESSION['booknumber']!="")
		{
			$sql="select *from borrow where booknumber = '".$_SESSION['booknumber']."' ";
		}
		if($_SESSION['borrowday']!="")
		{
			$sql="select *from borrow where borrowday = '".$_SESSION['borrowday']."' ";
		}
		if($_SESSION['reaturnday']!="")
		{
			$sql="select *from borrow where borrowday = '".$_SESSION['reaturnday']."' ";
		}
		if($_SESSION['checkbox']!="")
		{
			switch($_SESSION['checkbox'])
			{
				case overdue:$sql="select *from borrow where overdue = '1' ";break;
				case fine:$sql="select *from borrow where fine != '0' ";break;
			}
		}
	}
	
	$total = mysql_num_rows(mysql_query($sql)); //记录总条数
	if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
	    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
	//获取数据
	$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
	//4.执行SQL代码
	$result=mysql_query($sql);
	//5.处理执行结果
	//$row=mysql_fetch_row($result);//只能读出数据库中的一行。
	while($row=mysql_fetch_array($result))//添加while语句实现循环添加。
	{									   //row与array
	
	?>
    <tr align="center">
      <td><?php echo $row["readerid"];?></td>
      <td><?php echo $row["barcode"];?></td>
      <td><?php echo $row["borrowday"];?></td>
      <td><?php echo $row["returnday"];?></td>
      <td><?php echo $row["state"];?></td>
      <td><?php echo $row["overdue"];?></td>
      <td><?php echo $row["fine"];?></td>
      <td><?php    							
				if($row["fine"] != "0")
				{
					if($row["pay"] != "是")
					{
							$x = $row['readerid'];
							$y = $row['barcode'];
							echo "<a href='pay.php?id=$x.$y'>";
							echo "缴清罚款";
							echo "</a>";
					}
					else
					{
						echo  "已缴清";	
							
					}
				}
				else
				{
					echo  "未欠费";	
						
				}
		  ?></td>
    </tr>
    <?php 
	}
	?>
	<table>
	<?php
        if ($total > $showrow) {//总记录数大于每页显示数，显示分页
            $page = new page($total, $showrow, $curpage, $url, 2);
            echo $page->myde_write();
    }
    ?>
    </table>
   <?php include("footer.php");?>  
</table>
</table>
</body>
</html>