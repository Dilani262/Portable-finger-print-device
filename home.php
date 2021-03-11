<?php
include 'inc/functions.php';


session_start();
if((isset($_SESSION['user']))&&(!isset($_GET['logout']))){
	$user = $_SESSION['user'];
}
else{
	session_destroy();
	$_SESSION[]=array();
	header('Location:index.php');
}

 ?>

<html>
	<head>
	<title>Dispaly</title>
	</head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	

	<style type="text/css">

		.header
		{
			color:white;
			padding: 5px;
			font-size: 45px;
			height: 90px;
			background-color: #779;
		}
		.days ul{
			list-style-type: none;
			padding: 0px;
		}
		.days ul li .btn{
			height: 75px;
			width: 100%;
			padding: 10px;
			font-weight: bold;
			margin-top: 15px;
			font-family: cursive;
			font-size: 22px;
			transition-duration: 0.5s;
		}
		.results-div{
			background-color: #eee;
			min-height: 540px;
			overflow-y: scroll;
			padding-left: 180px;

		}
		.result{
			width: 170px;
			height: 170px;
			float: left;
			margin-left: 8%;
			padding:20px;
			margin-top: 100px;
		}
		.fa-file{
			font-size: 60px;
		}
		.results-div{
			margin-top: 15px;
		}
		.main-div{
			margin-top: 30px;
		}
		.footer 
		{
			position: fixed;
			color:white;
			padding: 0px;
			font-size: 20px;
			height: 60px;
			background-color: #779;
			bottom: 5;
			width: 100%;
		}
		.nav{
			float: right;
			margin-top: 25px;
		}
		.addSt
		{
			padding: 25px 20px 25px 20px;
			font-size: 20px;
			font-family: bookman old style;
		}
		.adj
		{
			margin-left: 10em;
			margin-top: 10em;
		}
    </style>
	
	<body>
		<?php 

			if($_SESSION['user']=="admin")
			{

				?>
					<div class="header">
			
				<h1 style="float: left;">Attendance Marker </h1> 
				<ul class="nav nav-pills">
		
					<li><h5><?php echo "Login as ".$_SESSION['user']; ?></h5></li>
					<li><a href="home.php?='true'" class="btn btn-warning">Home</a> </li>
					<li><a href="home.php?logout='true'" class="btn btn-warning">Logout</a> </li>

				</ul>
				
			

		</div>

		<div class="main-div">
			<div class="col-xs-2 days">
				<form action="home.php" method="POST">	
					<ul>
					<li><button type="submit" class="btn btn-info" name="stu">STUDENTS</button></li>
					<li><button type="submit" class="btn btn-info" name="time">LECTURE <br>SHEDULE</button></li>

				</ul>
				</form>
				
			</div>

			<div class="col-xs-10 results-div">
				<?php 
					if(isset($_POST['stu']))
					{
						?><div class="adj">
							<a href="admin/addstu.php?opt=addS">
								<div class='btn btn-success addSt' >
									ADD STUDENT<br>DETAILS
								</div>
							</a>

							<a href="admin/addstu.php?opt=editS">
								<div class='btn btn-success addSt' style="margin-left:3em;">
									EDIT STUDENT<br>DETAILS
								</div>
							</a>
						</div>


						<?php
					}
					if(isset($_POST['time']))
					{
						?><div class="adj">
							<a href="admin/addTimetable.php?opt=addT">
								<div class='btn btn-success addSt' >
									ADD SHEDULE 
								</div>
							</a>

							<a href="admin/addstu.php?opt=editT">
								<div class='btn btn-success addSt' style="margin-left:3em;">
									EDIT SHEDULE
								</div>
							</a>
						</div>


						<?php
					}
					
				 ?>

			</div>
		</div>
		<div class="footer">
			<center>
				<h4>Faculty of Applied Science</h4>
				<h5>Vavuniya Campus of University of Jaffna</h5>
			</center>

		</div>

				<?php
			}
			else
			{
				?>

				<div class="header">
			
				<h1 style="float: left;">Attendance Marker </h1> 
				<ul class="nav nav-pills">
		
					<li><h5><?php echo "Login as ".$_SESSION['user']; ?></h5></li>
					<li><a href="pendings.php" class="btn btn-warning">Lectures Schedule(<?php echo pendingCount(); ?>) </a> </li>
					<li><a href="home.php?logout='true'" class="btn btn-warning">Logout</a> </li>



				</ul>
				
			

		</div>

		<div class="main-div">
			<div class="col-xs-2 days">
				<ul>
					<li><button id="Monday" class=" day btn btn-info"> MONDAY</button></li>
					<li><button id="Tuesday" class=" day btn btn-info">TUESDAY</button></li>
					<li><button id="Wednesday" class=" day btn btn-info">WEDNESDAY</button></li>
					<li><button id="Thursday" class=" day btn btn-info">THURSDAY</button></li>
					<li><button id="Friday" class=" day btn btn-info">FRIDAY</button></li>

				</ul>
			</div>

			<div class="col-xs-10 results-div">
				<?php 
					
				 ?>

			</div>
		</div>
		<div class="footer">
			<center>
				<h4>Faculty of Applied Science</h4>
				<h5>Vavuniya Campus of University of Jaffna</h5>
			</center>

		</div>

				<?php
			}
		 ?>
		
	</body>
</html>

<script type="text/javascript">
		$('.result').hide();

		$('.day').click(function(){
			$('.day').css('margin-left','0px');
			$('.result').fadeOut(500);
			$('.result').fadeIn(500);
			$(this).css('margin-left','20px');

			var date =$(this).attr('id');
			$('.results-div').load('showSheets.php',{
				showSheets:'yes',
				date:date

			});

		});
</script>

