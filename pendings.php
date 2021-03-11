<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">

	<title>Result</title>
	<style type="text/css">
		.footer 
		{
			position: fixed;
			color:white;
			padding: 0px;
			font-size: 20px;
			height: 60px;
			background-color: #779;
			bottom: 0;
			width: 100%;
		}
		.header
		{
			color:white;
			padding: 5px;
			font-size: 45px;
			height: 90px;
			background-color: #779;
		}
		.nav{
				float: right;
			margin-top: 25px;
		}	
	</style>
</head>
<body>
	<div class="header">
			<?php session_start() ?>
				<h1 style="float: left;">Attendance Marker </h1> 
				<ul class="nav nav-pills">
					<li><h5><?php echo "Login as".$_SESSION['user']; ?></h5></li>
					<li><a href="home.php" class="btn btn-warning">Home </a></li>


					<li><a href="home.php?logout='true'" class="btn btn-warning">Logout</a> </li>
				</ul>
		</div>
<div>
	<?php 
include 'inc/connection.php';

	$userName = $_SESSION['user']; 
	date_default_timezone_set("Asia/Colombo");
	$dayt=(string)date("l");
	$query = "SELECT * FROM timetable WHERE day = '$dayt' AND userName='$userName' AND chck='no'";
	$result = mysqli_query($con,$query);

	if(mysqli_num_rows($result)==0)
	{
		echo "<center><h1 style='margin-top:100px;'>No Pending Records</h1> <br> <a href='home.php'>Go to Home</a></center>";
	}
	else{
	
	echo "<center><h1 style='margin-top:100px;'>Today Lectures</h1></center>";

	}

 ?>

 <div class="contain col-xs-offset-2 col-xs-8">
 		
 		<?php
 		

 		 while($record = mysqli_fetch_assoc($result)){ ?>

 			
 				<table class="table table-bordered" width="" >
 					<tr>
 						<td><input class="form-control" type="text" name="subjectCode" value="<?php echo $record['subjectCode']; ?>" readonly required></td> 						
 						<td><input class="form-control" type="text" name="startTime" readonly value="<?php echo $record['startTime']; ?>" required></td>
 						<td><input class="form-control" type="text" name="endTime" readonly value="<?php echo $record['endTime']; ?>" required></td>
 						<td>
 							<?php 
 								echo "<a href='updatePendings.php?id={$record['sheetId']}' class='form-control'>End Lectures</a>";
 							 ?>
 						</td>
 						
 						


 					</tr>
 				</table>
 			
 			<?php
 			}


 			 ?>
 	
 </div>
</div>
 <div class="footer">
			<center>
				<h4>Technology Stream</h4>
				<h5>Vavuniya Campus of University of Jaffna</h5>
			</center>

		</div>

		

</body>
</html>