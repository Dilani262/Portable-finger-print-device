<?php 
	include '../inc/connection.php';
	if(isset($_GET['STrn']))
	{
		$rn=$_GET['STrn'];
		$query="DELETE FROM `timetable` WHERE `timetable`.`sheetId` ='$rn'";
		$result=mysqli_query($con,$query);
		if($result)
		{
			echo "<script>";
				echo "alert('Data Deleted.....');";
				echo "window.location.href='addstu.php?opt=editT'";
			echo "</script>";
		}
		else
		{
			echo "<script>";
			echo "alert('Error.....');";
			echo "</script>";
		}
	}
 ?>