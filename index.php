<?php 
include 'inc/loginProcess.php';
loginProcess();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Students</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
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
				margin-top: 10%;
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
				height: 180px;
			}

		</style>
	</head>
	<body>
		
		<div class="header">
			<center>
				<h1>Attendance Marker</h1>
			</center>

		</div>


	<div id="login-form" class="panel panel-primary" align="center">
		<div class="panel-heading"> 
			<h3>Login</h3></div>
		<div class="panel-body">
			<form action="index.php" method="post">
			<table>
			<tr>
				<th>User Name </th>
				<td><input class="form-control" type="text" name="userName" required></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input class="form-control" type="password" name="password" required></td>
			</tr>
			<div id="b">
				<tr>
				
					<td></td>
					<td><button type="submit" class="btn btn-success" name="Login"  >Login</button><a href="createAccount.php" class="btn btn-clear" >Create Account</a></td>
				</tr>
			</div>
		</table>
		</form>

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
