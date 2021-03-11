<?php 
	require_once '../inc/connection.php';


session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Students</title>
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
			if(isset($_GET['rn']))
			{
				$_SESSION['rnn']=$_GET['rn'];
			}
			$SEErn=$_SESSION['rnn'];
			$query="SELECT * FROM `student` WHERE `RN`='$SEErn' limit 1";
			$result=mysqli_query($con,$query);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

		 ?>
		<div id="login-form" class="panel panel-primary" align="center">
		<div class="panel-heading"> 
			<h3>Edit Student</h3></div>
		<div class="panel-body">
			<form action="stedit.php" method="POST">
			<table>
				<tr>
				<th>Finger ID </th>
				<td><input class="form-control" type="text" name="fid" value="<?php echo $row['FID'] ?>"></td>
			</tr>
			<tr>
				<th>Registration Number </th>
				<td><input class="form-control" type="text" name="reg" value="<?php echo $row['RN'] ?>"></td>
			</tr>
			<tr>
				<th>Student Name </th>
				<td><input class="form-control" type="text" name="stname" value="<?php echo $row['NM'] ?>"></td>
			</tr>
			<tr>
				
				<td></td>
				<td><br><button type="submit" class="btn btn-success" name="Create">Edit Student</button></td>
			</tr>
		
		</table>
		</form>

		</div>
		
	</div>
			<?php 
				if(isset($_POST['Create']))
				{
					$fid=$_POST['fid'];
					$rn=$_POST['reg'];
					$nm=$_POST['stname'];
					$oriRN=$_SESSION['rnn'];
					

					$query="UPDATE `student` SET `FID`='$fid',`RN`='$rn',`NM`='$nm' WHERE `RN`='$oriRN'";
					$result=mysqli_query($con,$query);
					if($result)
					{
						echo "<script>";
						echo "alert('Student Edit Successfully.....');";
						echo "window.location.href='addstu.php?opt=editS'";
						echo "</script>";
					}
					else
					{
						echo "<script>";
						echo "alert('Student Edit Faild....');";
						echo "</script>";
					}
				}

			 ?>
	</body>
</html>
