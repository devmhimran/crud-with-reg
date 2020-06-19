<?php

	include 'db/db.php';
	include 'db/function.php';
	$valid[] ='';
	if(isset($_POST['submit'])){

	 $name      = $_POST['name'];
	 $phone      = $_POST['phone'];
	 $email     = $_POST['email'];
	 $username  = $_POST['username'];
	 $password  = $_POST['password'];
	 $c_password  = $_POST['c_password'];
	 $password_hash = password_hash($password, PASSWORD_DEFAULT);
 				
	 // username check
	// -------------------------------
	 $unique_username_check =  unique_check($conn,'username', 'users', $username);
	 // email check
	// -------------------------------
	  $unique_email_check =  unique_check($conn,'email', 'users', $email);

	 // Confirm Password
	// -------------------------------
	  if($password == $c_password){
	  	$password_check = true;
	  }else{
	  	$password_check =  false;
	  }

	  if ($unique_username_check == false ) {	
				$valid_username =  "<p>Username already exists</p>";
				
				
			}
			
			if( $unique_email_check == false){
				$valid_email =  "<p>Email already exists</p>";
			
			}
			if( $password_check == false){
				$valid_pass =  "<p>Password doesn't match</p>";
			}

	

	 // form-validation
	 // -------------------------------
	 if(empty($name )  || empty($phone) || empty($email) || empty($username) || empty($password_hash)){
		 $valid[] =  "<p class='alert alert-danger'>All fields are required<button class='close' data-dissmiss='alert'>&times;</button></p>";
		 }elseif ($unique_username_check == false) {
		 		$valid[] =  "<p class='alert alert-warning'>Couldn't Sign In !<button class='close' data-dissmiss='alert'>&times;</button></p>";
		 		$valid_username =  "<p>Username already exits</p>";
		 }elseif ($unique_email_check == false) {
		 	$valid[] =  "<p class='alert alert-warning'>Couldn't Sign In !<button class='close' data-dissmiss='alert'>&times;</button></p>";
		 	$valid_email =  "<p>Email already exits</p>";
		 }elseif ($password_check == false) {
		 	$valid[] =  "<p class='alert alert-warning'>Couldn't Sign In !<button class='close' data-dissmiss='alert'>&times;</button></p>";
		 	$valid_pass =  "<p>Password doesn't match</p>";
			}else{

	 	
			// Photo validation + Upload DataBase
		   // -----------------------------------
			$data = photo_upload($_FILES['photo1'],'photo/profile/');
			$photo_data= $data['file_name'];

			$data1 = photo_upload($_FILES['photo2'],'photo/cover/');
			$photo_data1= $data1['file_name'];
			if ( $data['status'] == 'yes' ) {

				 $sql = " INSERT INTO users (name,phone,email,username,password,photo1,photo2) values ('$name','$phone','$email','$username','$password_hash','$photo_data','$photo_data1')";
				 $conn -> query($sql);
				set_msg('Successfully Sign Up');


				header("location: reg-form.php");
			}
			else{
				$valid[] =  "<p class='alert alert-warning'>Invaild file format<button class='close' data-dissmiss='alert'>&times;</button></p>";
			}						
	 }

} 


?>


<!DOCTYPE html>
<html>
<head>
	<title>log Up</title>
	<link rel="stylesheet" type="text/css" href="c
	ss/bootstrap.min.
	css">
	<link rel="stylesheet" type="text/css" href="css/reg-style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&display=swap" rel="stylesheet">



</head>
<body>



	<div class="container">
		<div class="card w-50 mx-auto mt-5">
			<div class="card-header">
				<h3>Sign Up</h3>
			</div>
			<div class="card-body">
				<form action="<?php $_SERVER['PHP_SELF']?>" method = "POST" enctype='multipart/form-data'>
					<?php 

						if ( count($valid)>0) {
							foreach ($valid as $v) {
								echo $v;
							}
						}
					
						get_msg();
					?>
						<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" value="<?php old('name'); ?>">
					</div>	
					<div class="form-group">
						<label>Phone</label>
						<input class="form-control" type="text" name="phone" value="<?php old('phone'); ?>">
					</div>
						<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="email" name="email"value="<?php old('email'); ?>">
						<small class="text-danger"><?php if (isset($valid_email)) {
						echo $valid_email;
						} ?></small>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" type="text" name="username" value="<?php old('username'); ?>">
						<small class="text-danger"><?php if (isset($valid_username)) {
						echo $valid_username;
						} ?></small>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" type="password" name="password">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input class="form-control" type="password" name="c_password">
						<small class="text-danger"><?php if (isset($valid_pass)) {
						echo $valid_pass;
						} ?></small>
					</div>
					<div class="form-group">
						<label>Profile Photo</label>
						<input class="form-control" type="file" name="photo1" >
					</div>
					<div class="form-group">
						<label>Profile Photo 2</label>
						<input class="form-control" type="file" name="photo2" >
					</div>
					<div class="form-group">
						<input class="btn btn-outline-info" type="submit" name="submit"  value="Sign In">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-md-6"><a href="index.php">Log In</a></div>
				<div style="text-align: right; " class="col-md-6"></div>
				</div>
			</div>

		</div>
	</div>



<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	


</script>
</body>
</html>