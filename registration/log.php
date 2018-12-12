<?php 
  session_start(); 
  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
  transition: 0.3s;
  width: 30%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 10px;
}



</style>
</head>
<body>

<center>
<div>
<h1>LOGIN PAGE<h1>

</div>
<div class=" split card" align="left">

  <img src="images/admin.png" alt="Avatar"  style="width:20%">
  <div class="container">
    <h4><h1>ADMIN LOGIN<h1></h4> 
    <p>BMS college of Engineerng</p> 
	<p>Contact: 080-26756655</p> 
	<p><a href="/registration/login.php">Click here</a></p>
  </div>
  </form>
</div>
<br><br>
<div class=" card" align="left">
  <img src="images/fac.png" alt="Avatar"  style="width:20%">
  <div class="container">
    <h4><h1>FACULTY LOGIN<h1></h4> 
    <p>BMS college of Engineerng</p> 
	<p><a href="/registration/f_login.php">Click here</a></p>
  </div>
</div>

</center>


		
</body>
</html>