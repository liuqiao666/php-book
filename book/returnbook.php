<?php
error_reporting(0);
$id=$_GET['id'];
$my_arr=explode(".",$id);
//1.连接数据库
include("Connections/myconn.php");
//2.选择数据库
mysql_select_db("login",$myconn);
//3.写SQL代码
		
		$sql="update bookinfo set state='0' where  barcode='".$my_arr[1]."'";	
		mysql_query($sql);
		$sql="update borrow set state='1',returnday='".date("Y-m-d")."' where readerid='".$my_arr[0]."' and barcode='".$my_arr[1]."'";
		$result=mysql_query($sql);
		if($result)
		{
			$sql="select *from borrow where readerid='".$my_arr[0]."' and barcode='".$my_arr[1]."'";
			$result=mysql_query($sql);
			if($row=mysql_fetch_array($result))
			{
				$d=strtotime($row["returnday"])-strtotime($row["borrowday"]);
				$g=$d/(24*3600);
				if($g >30)
				{
					$f = $g * 0.5;		
					$sql="update borrow set overdue='1',fine='".$f."',pay='否' where readerid='".$my_arr[0]."' and barcode='".$my_arr[1]."'";
					$result=mysql_query($sql);
					if($result)
					{
						echo "<script>alert('还书成功，请通知读者缴清罚款，谢谢！');location.href='lookbook.php';</script>";
	
					}
					else
					{
						echo "<script>alert('还书失败，请与管理员联系！');location.href='lookbook.php';</script>";	
					}
				}
				else
				{
					echo "<script>alert('还书成功！');location.href='lookbook.php';</script>";
				}
			}
							
		}
		else
		{
			echo "<script>alert('还书失败，请与学生科联系！');location.href='lookbook.php';</script>";	
		}
?>