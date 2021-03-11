<?php 
	
	include 'inc/connection.php';
	session_start();
	$Now_Sub=(string)$_SESSION['Now_Sub'];
	$St_Time=(string)$_SESSION['St_Time'];
	$Ed_Time=(string)$_SESSION['Ed_Time'];

	date_default_timezone_set("Asia/Colombo");

	$now_H=(string)date("H");
	$now_I=(string)date("i");
	$dayt=(string)date("l");
	$cont=30;
	while($cont<60)
	{
		if($cont==$now_I)
		{
			$query="SELECT * FROM `timetable` WHERE `day`='$dayt' AND `startTime`='$now_H:30'";
			$result=mysqli_query($con,$query);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			echo $row['userName'];
			//echo $now_H.":".$cont."<br>";
			
		}
		$cont++;
		
	}
	$cont=0;
	while($cont<30)
	{
		if($cont==$now_I)
		{
			$query="SELECT * FROM `timetable` WHERE `day`='$dayt' AND `endTime`='$now_H:30'";
			$result=mysqli_query($con,$query);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			echo $row['userName'];
			//echo $now_H.":".$cont."<br>";
			
		}
		$cont++;
		
	}
	

 ?>