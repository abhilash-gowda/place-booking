<?php include('f_server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="f_register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" required  value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" required value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_faculty">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="f_login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>