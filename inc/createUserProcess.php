<?php 


function createAccount(){

include 'inc/connection.php';
if(isset($_POST['Create'])){


	$name = $_POST['name'];
	$password2 = $_POST['password2'];
	$userName = $_POST['userName'];
	$password = $_POST['password'];


	if(($name!='')&&($password!='')&&($password!='')&&($userName!='')&&($password2==$password)){

		$password = sha1($password);


	$query = "INSERT INTO user (name, userName,password) VALUES ('$name', '$userName','$password')";
	$result = mysqli_query($con,$query);


	if($result){
		session_start();
		$_SESSION['user'] = $userName;


		?>

		<script type="text/javascript">
				alert("Account Created");
			
		</script>	
	<?php

		

	}
	else{
		

		?>

		<script type="text/javascript">
				alert("Account Not Created");
				
			
		</script>		
		<?php	

	}

	}

}



}

 ?>

