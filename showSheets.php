<?php 
session_start();
include 'inc/connection.php';

if(isset($_POST['showSheets'])){
	$day = $_POST['date'];
	$userName = $_SESSION['user'];

			// DATE = DATE FILTER
	$query =  "SELECT * FROM timetable WHERE userName = '$userName' AND day = '$day' ";
	$result = mysqli_query($con,$query);

	if(mysqli_num_rows($result)==0){
		?>

				<center style="margin-top: 150px;" ><h1 style="color: #aaa"><span style="font-size: 90px; " class="fa fa-file"></span><br><br>No Lectures...</h1></center>

		<?php
	}

	while($record = mysqli_fetch_assoc($result)){
		echo 
		"<a href='dayResult.php?id=".$record['sheetId']."' id = '".$record['sheetId']."' class='result  btn btn-success'>
				 	 <span class='fa fa-file'></span>
				 	 <h3>".$record['subjectCode']."</h3> 
				 	 <h4>".$record['startTime']."-".$record['endTime']."</h4>
				 </a>";
		
	}
		}
	



?>