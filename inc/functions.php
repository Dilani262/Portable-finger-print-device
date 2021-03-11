<?php 

function pendingCount(){
include 'inc/connection.php';
	
	$userName = $_SESSION['user'];
	date_default_timezone_set("Asia/Colombo");
	$dayt=(string)date("l");
	//$query= "SELECT sheetId FROM signSheet WHERE userName = '$userName' AND subjectCode = '' AND day = ''";
	$query= "SELECT sheetId FROM timetable WHERE userName = '$userName' AND day = '$dayt' AND `chck`='no'";
	$result = mysqli_query($con,$query);
	return mysqli_num_rows($result);
}


 ?>