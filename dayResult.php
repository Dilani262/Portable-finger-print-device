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
			height: 90px;
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

    </style>
	
	<body>
		<div class="header">
			
				<h1 style="float: left;">Attendance Marker </h1> 
				<ul class="nav nav-pills">
		
					<li><h5><?php echo "Login as ".$_SESSION['user']; ?></h5></li>
					
					<li><a href="home.php" class="btn btn-warning">Home</a> </li>
					<li><a href="home.php?logout='true'" class="btn btn-warning">Logout</a> </li>

				</ul>
				
			

		</div>

		

			<div class="col-xs-12 results-div">

				<?php 
				include 'inc/connection.php';
					if(isset($_GET['id']))
					{
						$_SESSION['shtID']=$_GET['id'];
					}
					$shtID=$_SESSION['shtID'];					
					$dtt=date("Y-m-d");
					

					
					$queryDP="SELECT * FROM `timetable` WHERE `sheetId`='$shtID'";
					$resultDP=mysqli_query($con,$queryDP);
					$rowDP=mysqli_fetch_array($resultDP,MYSQLI_ASSOC);

					date_default_timezone_set("Asia/Colombo");
					$dtt=(string)date("Y-m-d");
					$now_sub=$rowDP['subjectCode'];
					$st_ti=$rowDP['startTime'];
					$ed_ti=$rowDP['endTime'];

					?>

						<form action="dayResult.php" method="POST">
							<table width="" >
							
 							<tr>
 								<td>
 									Date :
 								</td>
 								<td>
 									
 									<input class="form-control" type="text" name="sel_date" value="<?php echo date("Y-m-d "); ?>" required>
 									
 								</td>
 								<td>
 									<input type="submit" name="GetID" class="btn btn-primary" value="View">
 								</td>

 							</tr>
 							<tr>
 								
 				</table>
						</form>
						
					<?php 
						if(isset($_POST['GetID']))
						{		?>
									<center><b><font size="5"><?php echo $now_sub; ?></font></b></center>
							<?php
							 echo "Date :".$_POST['sel_date'];
							 echo "<div style='float: right;margin-top: -0.2%''>Time :".$rowDP['startTime']." To ".$rowDP['endTime']."</div>"?>
								<table class="table table-bordered">

							<tr>
								<th>No</th>
								<th>Reg No</th>
								<th>Name</th>
								<th>Present</th>
							</tr>

							<?php
							date_default_timezone_set("Asia/Colombo");
							$dtt=$_POST['sel_date'];
							$_SESSION['cu_dt']=$dtt;
					$querySS="SELECT * FROM `student`";
					$resultSS=mysqli_query($con,$querySS);
					while($rowSS=mysqli_fetch_array($resultSS,MYSQLI_ASSOC))
					{
						echo "<tr>";
						echo "<td>".$rowSS['FID']."</td>";
						echo "<td>".$rowSS['RN']."</td>";
						echo "<td>".$rowSS['NM']."</td>";
						$fid=$rowSS['FID'];
						$now_rn=$rowSS['RN'];

						$queryss="SELECT * FROM `fingerid` WHERE `Subject`='$now_sub' AND `Date`='$dtt' AND `St_Time`='$st_ti' AND `Ed_Time`='$ed_ti' AND `Reg_No`='$now_rn'";//Time shoud be in lec 
						$resultss=mysqli_query($con,$queryss);
						$cou=mysqli_num_rows($resultss);
						if($cou==1)
						{
							echo "<td>1</td>";
						}
						else
						{
							echo "<td>0</td>";
						}
						echo "</tr>";
					}
						}
					 ?>
				 	</table>

			</div>
		</div>
		<div class="footer">
			<center>
				<h4>Faculty of Technology</h4>
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
			$('.results-div').load('showSheets.php',{
				showSheets:'yes',
				date:date

			});

		});
</script>

