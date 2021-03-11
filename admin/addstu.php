<?php 
	require_once '../inc/connection.php';


session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add Students</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
		<style type="text/css">

		.header
		{
			color:white;
			padding: 5px;
			font-size: 45px;
			height: 90px;
			background-color: #779;
		}
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
			margin-top: 10%;
		}

			#login-form
			{
				width: 40%;
				margin-left: 30%;
				margin-top: 5%;
			}
			.panel-heading{
				padding: 3px;
			}
			input, a{
				margin-top: 10px;

			}
			th{
				width: 20%;
				text-align: left;
			}
			.btn-clear{
				margin-left: 15px;
			}
			.form-control{
				width: 90%;
				float: right;
			}
			.btn{
				margin-left: 10%;
			}
			.panel-body{
				height: 260px;
			}

		</style>
	</head>
	<body>
		
		<div class="header">
			<center>
				<h1>Attendance Marker</h1>
			</center>
			<div style="float: right; margin-top: -4%;">
			<ul class="nav nav-pills">
		
					<li><h5><?php echo "Login as ".$_SESSION['user']; ?></h5></li>
					<li><a href="../home.php?='true'" class="btn btn-warning">Home</a> </li>
					<li><a href="../home.php?logout='true'" class="btn btn-warning">Logout</a> </li>

				</ul>
			</div>

		</div>

			<?php 	
				if($_GET['opt']=="addS")
				{
					?>
							<div id="login-form" class="panel panel-primary" align="center">
		<div class="panel-heading"> 
			<h3>Add Student</h3></div>
		<div class="panel-body">
			<form action="addstu.php" method="POST">
			<table>
				<tr>
				<th>Finger ID </th>
				<td><input class="form-control" type="text" name="fid" required></td>
			</tr>
			<tr>
				<th>Registration Number </th>
				<td><input class="form-control" type="text" name="reg" required></td>
			</tr>
			<tr>
				<th>Student Name </th>
				<td><input class="form-control" type="text" name="stname" required></td>
			</tr>
			<tr>
				
				<td></td>
				<td><br><button type="submit" class="btn btn-success" name="Create">Add Student</button></td>
			</tr>
		
		</table>
		</form>

		</div>
		
	</div>
					<?php
				}
				else if($_GET['opt']=="editS")
				{
					?>
					<div style="margin-left: 5%; margin-top: 2%; margin-right: 4%;">
						<table class="table table-striped">
							<tr>
								<th>Finger Id</th>
								<th>Registration NO</th>
								<th>Name</th>
								<th>Action</th>
							</tr>
							<?php 
								$queryEDSt="SELECT * FROM `student`";
								$resultEDSt=mysqli_query($con,$queryEDSt);
								while($row=mysqli_fetch_array($resultEDSt,MYSQLI_ASSOC))
								{
									echo "<tr>";
									echo "<td>".$row['FID']."</td>";
									echo "<td>".$row['RN']."</td>";
									echo "<td>".$row['NM']."</td>";
									echo "<td><a href='stedit.php?rn={$row['RN']}'>Edit </a> | <a href='stedl.php?rn={$row['RN']}'> Delete</a></td>";
									echo "</tr>";
								}
							 ?>
						</table>
					</div>
						
					<?php
				}

				else if($_GET['opt']=="editT")
				{
					?>
					<div style="width: 90%;margin-left: 5%;">
						<table class="table table-striped">
							<tr>
								<th>Sheet Id</th>
								<th>User Name</th>
								<th>Day</th>
								<th>Start Time</th>
								<th>End Time</th>
								<th>Subject Code</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							<?php 
								$queryEDSt="SELECT * FROM `timetable`";
								$resultEDSt=mysqli_query($con,$queryEDSt);
								while($row=mysqli_fetch_array($resultEDSt,MYSQLI_ASSOC))
								{
									echo "<tr>";
									echo "<td>".$row['sheetId']."</td>";
									echo "<td>".$row['userName']."</td>";
									echo "<td>".$row['day']."</td>";
									echo "<td>".$row['startTime']."</td>";
									echo "<td>".$row['endTime']."</td>";
									echo "<td>".$row['subjectCode']."</td>";
									echo "<td><a href='tmedl.php?rn={$row['sheetId']}'>Edit </a></td>";
									echo "<td><a href='tmedlt.php?STrn={$row['sheetId']}'> Delete</a></td>";
									echo "</tr>";
								}
							 ?>
						</table>
					</div>
						
					<?php
				}


			 ?>
	<br><br><br><br><br><br><br><br>
	<div class="footer">
			<center>
				<h4>Technology Stream</h4>
				<h5>Vavuniya Campus of University of Jaffna</h5>
			</center>

		</div>




		<?php 
			if(isset($_POST['Create']))
			{
					$fid=$_POST['fid'];
					$reg=$_POST['reg'];
					$stname=$_POST['stname'];

					$queryAddSt="INSERT INTO `student`(`FID`, `RN`, `NM`) VALUES ('$fid','$reg','$stname')";
					$resultAddSt=mysqli_query($con,$queryAddSt);
					if($resultAddSt)
					{
						echo "<script>";
						echo "alert('Student Added Successfully.....');";
						echo "window.location.href='addstu.php?opt=addS'";
						echo "</script>";
					}
					else
					{
						echo "<script>";
						echo "alert('Student Not Added....');";
						echo "</script>";
					}
			}

			if(isset($_GET['STrn']))
			{
		$rn=$_GET['rn'];
		$query="DELETE FROM `student` WHERE `student`.`RN` = '$rn'";
		$result=mysqli_query($con,$query);
		if($result)
		{
			
			echo "<script>";
				echo "alert('Student Removed');";
				echo "window.location.href='addstu.php?opt=editS'";
			echo "</script>";
			
		}
	}
		 ?>
	</body>
</html>
