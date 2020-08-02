<?php

	include 'db/db.php';
	include 'db/function.php';
	session_start();
	

	if(isset($_SESSION['id']) AND isset($_SESSION['name']) AND isset($_SESSION['username'])){
		header("location:profile.php");
	  }
	  if(isset($_COOKIE['user_re_log'])){
		$user_id = $_COOKIE['user_re_log'];
		$sql_username = "SELECT * FROM users WHERE id ='$user_id'";
		$data = $conn -> query($sql_username);
		$f_data = $data -> fetch_assoc();

		$_SESSION['id'] = $f_data['id'];
		$_SESSION['name'] = $f_data['name'];
		$_SESSION['phone'] = $f_data['phone'];
		$_SESSION['email'] = $f_data['email'];
		$_SESSION['username'] = $f_data['username'];
		$_SESSION['photo1'] = $f_data['photo1'];

		header("location:profile.php");

	  }
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
				
				if(password_verify($user_password, $f_data['password'] ) == false){

					
					$_SESSION['id'] = $f_data['id'];
					$_SESSION['name'] = $f_data['name'];
					$_SESSION['phone'] = $f_data['phone'];
					$_SESSION['email'] = $f_data['email'];
					$_SESSION['username'] = $f_data['username'];
					$_SESSION['photo1'] = $f_data['photo1'];
					setcookie('user_re_log',$f_data['id'],time()+(60*60*24*365));
					header("location:profile.php");
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
	<link rel="stylesheet" type="text/css" href="css/index-style.css">

 
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
	<br>
	<div class="container ">
		<div class="row">
			<div class="col-md-6">
				<div class="card shadow recent">
					<div class="card-body recent-body ">
						
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card shadow form form mx-auto mt-5">
					<div class="card-header">
						<h2>Log In</h2>
					</div>
			
					<div class="card-body">
				
					<form action="<?php $_SERVER['PHP_SELF']?>" method = "POST">
						<?php

							if (isset($valid)) {
								echo $valid;
							}

						?>
						<div class="form-group">
							<input  class="form-control" type="text" placeholder="Username/Email" name="username">
							<?php 

								if (isset($username_valid)) {
									echo $username_valid;
								}

							?>
						</div>
						<div class="form-group">
							<input  class="form-control" type="password"  placeholder="Password" name="user_password">
							<?php 

								if (isset($pass_valid)) {
									echo $pass_valid;
								}

							?>
						</div>
						<div class="form-group">
							<input class="btn btn-info" type="submit" value="Log In" name="log_in">
						</div>
							<label id="forgotpwd"><a href="#">Forgot Password?</a></label>
							<label id="forgotpwd" class="text-right float-right"><a href="reg-form.php">Registration</a></label>
					</form>
				</div>
			</div>

			</div>
		</div>
		</div>





<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>