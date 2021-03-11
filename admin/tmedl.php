<?php 
	require_once '../inc/connection.php';


session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Timetable</title>
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
				height: 360px;
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
			if(isset($_GET['rn']))
			{
				$_SESSION['rnn']=$_GET['rn'];
			}
			$SEErn=$_SESSION['rnn'];
			$query="SELECT * FROM `timetable` WHERE `sheetId`='$SEErn' limit 1";
			$result=mysqli_query($con,$query);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			

		 ?>
		<div id="login-form" class="panel panel-primary" align="center">
		<div class="panel-heading"> 
			<h3>Edit Time Table</h3></div>
		<div class="panel-body">
			<form action="tmedl.php" method="POST">
			<table>
				<tr>
				<th>Sheet ID </th>
				<td>
					<input class="form-control" type="text" name="shtID" value="<?php echo $row['sheetId'] ?>" readonly>
				</td>
			</tr>
			<tr>
				<th>User Name </th>
				<td>
					<input class="form-control" type="text" name="uname" value="<?php echo $row['userName'] ?>" readonly>
				</td>
			</tr>
			<tr>
				<th>Day </th>
				<td><br>
					<?php 
						if($row['day']=="Monday")
						{
							?>
								<select class="form-control" name="date">
								<option selected>Monday</option>
								<option>Tuesday</option>
								<option>Wednesday</option>
								<option>Thursday</option>
								<option>Friday</option>
					</select>
							<?php
						}
						if($row['day']=="Tuesday")
						{
							?>
								<select class="form-control" name="date">
								<option >Monday</option>
								<option selected>Tuesday</option>
								<option>Wednesday</option>
								<option>Thursday</option>
								<option>Friday</option>
					</select>
							<?php
						}
						if($row['day']=="Wednesday")
						{
							?>
								<select class="form-control" name="date">
								<option >Monday</option>
								<option >Tuesday</option>
								<option selected>Wednesday</option>
								<option>Thursday</option>
								<option>Friday</option>
					</select>
							<?php
						}
						if($row['day']=="Thursday")
						{
							?>
								<select class="form-control" name="date">
								<option >Monday</option>
								<option>Tuesday</option>
								<option>Wednesday</option>
								<option selected>Thursday</option>
								<option>Friday</option>
					</select>
							<?php
						}
						if($row['day']=="Friday")
						{
							?>
								<select class="form-control" name="date">
								<option >Monday</option>
								<option>Tuesday</option>
								<option>Wednesday</option>
								<option>Thursday</option>
								<option selected>Friday</option>
					</select>
							<?php
						}
					 ?>
					
				</td>
			</tr>
			<tr>
				<th>Start Time </th>
				<td><input class="form-control" type="time" name="stime" value="<?php echo $row['startTime'] ?>"></td>
			</tr>
			<tr>
				<th>End Time </th>
				<td><input class="form-control" type="time" name="etime" value="<?php echo $row['endTime'] ?>"></td>
			</tr>
			<tr>
				<th>Subject Code </th>
				<td><br><select name="scode" class="form-control" value="<?php echo $row['subjectCode'] ?>">
					<option>TICT3213</option>
					<option>TICT3224</option>
					<option>TICT3232</option>
					<option>TICT3242</option>
					<option>TICT3253</option>
					<option>TICT3263</option>
					<option>TICT3272</option>
					<option>AUX3212</option>
				</select></td>
			</tr>

			<div id="b">
				<tr>
				
					<td></td>
					<td><br><button type="submit" class="btn btn-success" name="Create">Edit Timetable</button></td>
				</tr>
			</div>
		</table>
		</form>
		</form>

		</div>
		
	</div>
			<?php 
				if(isset($_POST['Create']))
				{
					$u_name=$_POST['uname'];
					$date=$_POST['date'];
					$st_time=$_POST['stime'];
					$ed_time=$_POST['etime'];
					$sb_code=$_POST['scode'];
					$SEErn=$_SESSION['rnn'];

					$query="UPDATE `timetable` SET `userName`='$u_name',`day`='$date',`startTime`='$st_time',`endTime`='$ed_time',`subjectCode`='$sb_code' WHERE `sheetId`='$SEErn'";
					$result=mysqli_query($con,$query);
					if($result)
					{
						echo "<script>";
						echo "alert('Timetable Edit Successfully...');";
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
	</body>
</html>
