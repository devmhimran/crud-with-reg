<?php
  
  include 'db/db.php';
  include 'db/function.php';

  session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $_SESSION['name']; ?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/profile-style.css">

 
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>

<div class="card mx-auto">
    <div class="card-body">
    <div class="form-group">
            <div class="image mx-auto">
                <img class="avatar card-img-top mx-auto" src="photo/profile/<?php echo $_SESSION['photo1']; ?>"/>
            </div>
        </div>
        <div class="card-name">
            <h2><?php echo $_SESSION['name']; ?></h2>
        </div>
        <div class="card-phone">
            <h3 class="text-left">Phone</h3>
            <p><?php echo $_SESSION['phone']; ?></p>
        </div>
        <div class="card-Email">
            <h3 class="text-left">Email</h3>
            <p><?php echo $_SESSION['email']; ?></p>
        </div>
        <div class="card-name">
            <h3 class="text-left">User Name</h3>
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    </div>
    <div class="card-footer">
        <label id="forgotpwd" class="text-right float-right"><a href="index.php">Log Out</a></label>
    </div>
</div>




<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>