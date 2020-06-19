<?php

	include 'db/db.php';
	include 'db/function.php';

// $valid[] ='';
	if (isset($_POST['log_in'])) {
	 	$username = $_POST['username'];
		$user_password = $_POST['user_password'];


	

		 if(empty($username)  && empty($user_password)){

		 	$valid =  "<p style ='color:#CC3C39;'>All fields are required<button style='color:red;' class='close' data-dissmiss='alert'>&times;</button></p>";
		 }else if (empty($username)) {

			$username_valid = "<p style ='color:#CC3C39;'>Username/Email Required</p>";
		}else if (empty($user_password)) {

			$pass_valid = "<p style ='color:#CC3C39;'>Password Required</p>";
		}else{

			$sql_username = "SELECT * FROM users WHERE username ='$username'|| email ='$username'";
			$data = $conn -> query($sql_username);
			$f_data = $data -> fetch_assoc();
			if( $data -> num_rows == 1) {
				
				if(password_verify($user_password, $f_data['password'] ) == true){

					// session_start();
					// $_SESSION['id'] = $f_data['id'];
					// $_SESSION['name'] = $f_data['name'];
					// $_SESSION['phone'] = $f_data['phone'];
					// $_SESSION['email'] = $f_data['email'];
					// $_SESSION['username'] = $f_data['username'];
					// $_SESSION['photo1'] = $f_data['photo1'];
					// $_SESSION['photo2'] = $f_data['photo2'];
					// header("location:profile.php");
				}else{
					$valid =  "<p style ='color:#CC3C39;'>Wrong Password<button style='color:red;' class='close' data-dissmiss='alert'>&times;</button></p>";
				}

			}else{
				$valid =  "<p style ='color:#CC3C39;'>wrong username<button style='color:red;' class='close' data-dissmiss='alert'>&times;</button></p>";
			}
		}

		 
		

	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>log Up</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
	<br>
	<div class="container">
		<div class="form">
			<form action="<?php $_SERVER['PHP_SELF']?>" method = "POST" >
				<h1>Login</h1>
				<?php

					if (isset($valid)) {
						echo $valid;
					}

				?>
				<label>Username/Email</label>
				<input type="text" name="username" placeholder="Username/Email" value="<?php old('username');?>">
				<?php 

					if (isset($username_valid)) {
						echo $username_valid;
					}

				?>
				<label>Password</label>
				<input type="password" name="user_password" placeholder="Password">
				
				<?php 

					if (isset($pass_valid)) {
						echo $pass_valid;
					}

				?>
				<input type="submit" name="log_in" value="Log In">
			 <label id="forgotpwd">Forgot Password?<a href="#"> Click Here</a></label>
			</form>
		</div>
	</div>
	<br>



<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>