<?php include('service.php') ?>
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>



<!DOCTYPE html>
<html>
<head>


	<title>Home</title>
	<style>
	  
	table, th, td 
	{
    border: 1px solid black;
	}
	
	th, td
	{padding: 15px;}
	
	 body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 10%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #5F9EA0;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}


	</style>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	
	
    <!-- <link> doesn't need a closing tag -->
    <link href="CSS/Master.css" rel="stylesheet" type="text/css">
    <!-- include the jQuery UI style sheet -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- include jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- include jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  
  
</head>
<body>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="book.php">Book Hall</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>



<div class="header">
	<h2>DASH BOARD</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
	  
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="log.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
<br>
<div align="center">
<h4>ALL BOOKING DETAILS<h4>
</div>
<?php
// RETRIEVE DATA IN TABLE FORMAT
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

//$sql ="DELETE FROM slot WHERE dept ='MCA' ";
$sql ="DELETE FROM slot WHERE txtDate < CURDATE() ";
$result = $db->query($sql);

$sql= "SELECT slot_id, dept, fac, hall , txtDate, slot_event FROM slot ORDER BY txtDate DESC";
$result = $db->query($sql);






if ($result->num_rows > 0) {
    echo "<center><table><tr><th>BOOKED DATE</th><th>DEPARTMENT NAME</th><th>FACULTY NAME</th><th>HALL NAME</th><th>EVENT NAME</th></tr></center>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["txtDate"]. "</td><td>" . $row["dept"]. " </td><td>" . $row["fac"]. "</td><td>" . $row["hall"]. "</td><td>" . $row["slot_event"]. " </td></tr>";
    }
    echo "</table>";
} 

$db->close();
?>

</body>

