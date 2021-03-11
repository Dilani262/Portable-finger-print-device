<?php 
$con = mysqli_connect('localhost', 'root','','attendance_marker');


	date_default_timezone_set("Asia/Colombo");
	if(date("l")=="Sunday")
	{
		$query="UPDATE `timetable` SET `chck`='no'";
	$result = mysqli_query($con,$query);
	}
	
 ?>