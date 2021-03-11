<?php 
include 'inc/connection.php';
session_start();


if(isset($_GET['id']))
{
	$userName = $_GET['id']; 
	$query="UPDATE `timetable` SET `chck`='yes' WHERE `sheetId`='$userName'";
	$result = mysqli_query($con,$query);
	if($result)
	{
		header("location:pendings.php");
	}
}
 ?>
