<?php 
	include '../inc/connection.php';
	if(isset($_GET['rn']))
	{
		$rn=$_GET['rn'];
		$query="DELETE FROM `student` WHERE `student`.`RN` = '$rn'";
		$result=mysqli_query($con,$query);
		if($result)
		{
			
			echo "<script>";
				echo "alert('Data Deleted.....');";
				echo "window.location.href='addstu.php?opt=editS'";
			echo "</script>";
		}
	}
 ?>