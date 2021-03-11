<?php
//include '../inc/functions.php';


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
	<link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	

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
			min-height: 500px;
			overflow-y: scroll;
			padding-left: 170px;

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

    </style>
	
	<body>
		<div class="header">
			
				<h1 style="float: left;">Attendance Marker </h1> 
				<ul class="nav nav-pills">
		
					<li><h5><?php echo "Login as ".$_SESSION['user']; ?></h5></li>
					
					<li><a href="adhome.php?logout='true'" class="btn btn-warning">Logout</a> </li>



				</ul>
				
			

		</div>

		<div class="main-div">
			<div class="col-xs-2 days">
				<ul>
					<li><button id="stu" class=" day btn btn-info">STUDENTS</button></li>
					<li><button id="time" class=" day btn btn-info">TIMETABLES</button></li>
					

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
			$('.results-div').load('stedit.php',{
				showSheets:'yes',
				date:date

			});

		});
</script>

