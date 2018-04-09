<?php
error_reporting(0);
session_start();
include("readertop.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>读者搜索图书页面</title>
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
    margin-left: 550px;
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
   <tr height="50px" bgcolor="#FFFFFF"><td>
   <form  id="form1" name="form1" method="post" action=""><br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;♥&nbsp;&nbsp;请选择查询依据：
     <label>
       <select name="select" id="select">
       <option value=""></option>
         <option value="txm">按条形码精确搜索</option>
         <option value="tsm">按图书名模糊搜索</option>
         <option value="cbs">按出版社模糊搜索</option>
       </select>&nbsp;&nbsp;<input name="text" class="input" />
       <br />
     </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;♥&nbsp;&nbsp;图书类型：
       <label>
         <input type="radio" name="RadioGroup1" value="xx" id="RadioGroup1_0" />
     信息科学技术</label>
       <label>
         <input type="radio" name="RadioGroup1" value="jsj" id="RadioGroup1_1" />
         计算机程序设计</label>
       <label>
         <input type="radio" name="RadioGroup1" value="sjk" id="RadioGroup1_2" />
         数据库技术</label>
       <label>
         <input type="radio" name="RadioGroup1" value="zz" id="RadioGroup1_3" />
         政治</label>
       <br><label>
         <input type="radio" name="RadioGroup1" value="vue" id="RadioGroup1_4" style="margin-left: 130px;" />
    Vue</label>
       <label>
         <input type="radio" name="RadioGroup1" value="xl" id="RadioGroup1_5" />
        心理</label>
       <label>
         <input type="radio" name="RadioGroup1" value="bd" id="RadioGroup1_6" />
        宝典系列</label><br />
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;♥&nbsp;&nbsp;书架：
       <label>
         <input type="radio" name="RadioGroup2" value="php" id="RadioGroup2_0" />
         PHP书架</label>
       <label>
         <input type="radio" name="RadioGroup2" value="vb" id="RadioGroup2_1" />
         VB书架</label>
       <br />
     <input type="submit" name="search" id="search" class="btn_grey" style="margin-left:800px" value="搜 索"/>
</form></td></tr>
  <table width="922" border="1" bordercolor="#000000" height="250" bgcolor="#ffffff" align="center" >
  <tr bgcolor="#00CCFF" align="center"  height="5">
      <td>图书条形码</td>
      <td>图书名称</td>
      <td>图书类型</td>
      <td>出版社</td>
      <td>书架</td>
      <td>借书</td>
  </tr>
    <?php  
	//1.连接数据库
	include("connections/myconn.php");//与右侧文件名一致
	//2.选择数据库
	mysql_select_db("login");
	//3.写SQL代码
	
	require_once('page.class.php'); //分页类
	$showrow = 2; //一页显示的行数
	$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
	$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
	
	$sql="select *from bookinfo";
		if($_SESSION['text']!=""&&$_SESSION['RadioGroup1']!="")
	{
		session_destroy();
	}
	if($_SESSION['text']!=""&&$_SESSION['RadioGroup2']!="")
	{
		session_destroy();
	}
	if($_SESSION['RadioGroup1']!=""&&$_SESSION['RadioGroup2']!="")
	{
		session_destroy();
	}
	if(isset($_POST['search']))
	{
		switch($_POST['select'])
		{
			case txm:$_SESSION['select']=$_POST['select'];$_SESSION['text']=$_POST['text'];$sql="select *from bookinfo where state = 0 and  barcode =".$_POST['text']."";break;
			case tsm:$_SESSION['select']=$_POST['select'];$_SESSION['text']=$_POST['text'];$sql="select *from bookinfo where state = 0 and  bookname like'".$_POST['text']."%'";break;
			case cbs:$_SESSION['select']=$_POST['select'];$_SESSION['text']=$_POST['text'];$sql="select *from bookinfo where state = 0 and  bookpress like'".$_POST['text']."%'";break;
		}

		switch($_POST['RadioGroup1'])
		{
			case xx:$_SESSION['RadioGroup1']=$_POST['RadioGroup1'];$sql="select *from  bookinfo where state = 0 and  typeid ="."'信息科学技术'"."";break;
			case jsj:$_SESSION['RadioGroup1']=$_POST['RadioGroup1'];$sql="select *from bookinfo where state = 0 and  typeid ="."'计算机程序设计'"."";break;
			case sjk:$_SESSION['RadioGroup1']=$_POST['RadioGroup1'];$sql="select *from bookinfo where state = 0 and  typeid ="."'数据库技术'"."";break;
			case bd:$_SESSION['RadioGroup1']=$_POST['RadioGroup1'];$sql="select *from bookinfo where state = 0 and  typeid ="."'宝典系列'"."";break;
			case zz:$_SESSION['RadioGroup1']=$_POST['RadioGroup1'];$sql="select *from bookinfo where state = 0 and  typeid ="."'政治'"."";break;
			case vue:$_SESSION['RadioGroup1']=$_POST['RadioGroup1'];$sql="select *from bookinfo where state = 0 and  typeid ="."'Vue'"."";break;
			case xl:$_SESSION['RadioGroup1']=$_POST['RadioGroup1'];$sql="select *from bookinfo where state = 0 and  typeid ="."'心理'"."";break;
		}

		switch($_POST['RadioGroup2'])
		{
			case php:$_SESSION['RadioGroup2']=$_POST['RadioGroup2'];$sql="select *from bookinfo where state = 0 and  bookcase ="."'PHP书架'"."";break;
			case vb:$_SESSION['RadioGroup2']=$_POST['RadioGroup2'];$sql="select *from bookinfo where state = 0 and  bookcase ="."'VB书架'"."";break;
		}
	}
	else
	{
		$sql="select *from bookinfo";
		if($_SESSION['text']!="")
		{
			switch($_SESSION['select'])
			{
				case txm:$sql="select *from bookinfo where state = 0 and barcode =".$_SESSION['text']."";break;
				case tsm:$sql="select *from bookinfo where state = 0 and bookname like'".$_SESSION['text']."%'";break;
				case cbs:$sql="select *from bookinfo where state = 0 and bookpress like'".$_SESSION['text']."%'";break;
			}
		}
		if($_SESSION['RadioGroup1']!="")
		{
			switch($_SESSION['RadioGroup1'])
			{
				case xx:$sql="select *from bookinfo where state = 0 and typeid ="."'信息科学技术'"."";break;
				case jsj:$sql="select *from bookinfo where state = 0 and typeid ="."'计算机程序设计'"."";break;
				case sjk:$sql="select *from bookinfo where state = 0 and typeid ="."'数据库技术'"."";break;
				case bd:$sql="select *from bookinfo where state = 0 and typeid ="."'宝典系列'"."";break;
				case zz:$sql="select *from bookinfo where state = 0 and typeid ="."'政治'"."";break;
				case vue:$sql="select *from bookinfo where state = 0 and typeid ="."'Vue'"."";break;
				case xl:$sql="select *from bookinfo where state = 0 and  typeid ="."'心理'"."";break;
			}
		}
		if($_SESSION['RadioGroup2']!="")
		{
			switch($_SESSION['RadioGroup2'])
			{
				case php:$sql="select *from bookinfo where state = 0 and bookcase ="."'PHP书架'"."";break;
				case vb:$sql="select *from bookinfo where state = 0 and bookcase ="."'VB书架'"."";break;
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
    <tr align="center"  height="5">
      <td><?php echo $row["barcode"];?></td>
      <td><?php echo $row["bookname"];?></td>
      <td><?php echo $row["typeid"];?></td>
      <td><?php echo $row["bookpress"];?></td>
      <td><?php echo $row["bookcase"];?></td>
      <td><a href="readerborrowing.php?id=<?php echo $row["barcode"];?>">借书</a></td>
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

</table>
</table>
<?php include("footer.php");?>
</body>
</html>