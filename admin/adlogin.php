<?php 

function loginProcess(){
include '../inc/connection.php';
if(isset($_POST['Login'])){

	$userName = $_POST['userName'];
	$pass = sha1($_POST['password']);
		

	$query = "SELECT userName FROM user WHERE userName = '$userName' AND password = '$pass'";
	$result = mysqli_query($con,$query);

	if(mysqli_num_rows($result)){
		session_start();
		$_SESSION['user'] = $userName;
	
		header('Location:home.php');
		

	}
	else{
		

		?>

		<script type="text/javascript">
				alert('User name or password Wrong!');
			
		</script>		
		<?php

		

	}

}
}


 ?>