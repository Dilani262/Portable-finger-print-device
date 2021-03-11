<?php 
	include 'inc/connection.php';
	session_start();
	include 'getFID.php';
		
	if(isset($_GET['FID'] ))
	{	
		$_SESSION['FID'] = (int)$_GET['FID'];
	}
	if(isset($_SESSION['FID']))
	{


		$FID=$_SESSION['FID'];
 		date_default_timezone_set("Asia/Colombo");
 		$Now_dt =date('Y-m-d');
 		$Now_tm =date('H:i:sa');

 		$queryGTRN="SELECT * FROM `student` WHERE `FID`='$FID' limit 1";
 		$resultGTRN = mysqli_query($con,$queryGTRN);
 		$rowGTRN=mysqli_fetch_array($resultGTRN,MYSQLI_ASSOC);
 		$FID_Reg_No=$rowGTRN['RN'];
 		
		
		//if(isset($_SESSION['Now_Sub']))
		//{
			//$queryIN="INSERT INTO `fingerid`(`Reg_No`, `Subject`, `Date`, `Now_Time`, `St_Time`, `Ed_Time`) VALUES ('$FID_Reg_No','$Now_Sub','$Now_dt','$Now_tm','$St_Time','$Ed_Time')";
			//$resultIN=mysqli_query($con,$queryIN);
		//}

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
				$row_count=mysqli_num_rows($result);

				if($row_count==1)
				{
					$Now_Sub=$row['subjectCode'];
					$St_Time=$row['startTime'];
					$Ed_Time=$row['endTime'];

					$queryIN="INSERT INTO `fingerid`(`Reg_No`, `Subject`, `Date`, `Now_Time`, `St_Time`, `Ed_Time`) VALUES ('$FID_Reg_No','$Now_Sub','$Now_dt','$Now_tm','$St_Time','$Ed_Time')";
					$resultIN=mysqli_query($con,$queryIN);
				}
				


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
				$row_count=mysqli_num_rows($result);
				
				if($row_count==1)
				{
					$Now_Sub=$row['subjectCode'];
					$St_Time=$row['startTime'];
					$Ed_Time=$row['endTime'];

					$queryIN="INSERT INTO `fingerid`(`Reg_No`, `Subject`, `Date`, `Now_Time`, `St_Time`, `Ed_Time`) VALUES ('$FID_Reg_No','$Now_Sub','$Now_dt','$Now_tm','$St_Time','$Ed_Time')";
					$resultIN=mysqli_query($con,$queryIN);
				}
				


			}
			$cont++;
		}
		

		
		

	}



 ?>

