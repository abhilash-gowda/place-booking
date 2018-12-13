<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: f_login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: f_login.php");
  }
  
?>





<!DOCTYPE html>
<html>
<head>


	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	
	
    <!-- <link> doesn't need a closing tag -->
    <link href="CSS/Master.css" rel="stylesheet" type="text/css">
    <!-- include the jQuery UI style sheet -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- include jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- include jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <style>
	 
	  
	  
	  
	table, th, td 
	{
    border: 1px solid black;
	}
	
	th, td
	{padding: 15px;}
</style>
  
</head>
<body>



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

	<br><br>
<?php
// RETRIEVE DATA IN TABLE FORMAT
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

//(From_date BETWEEN '2013-01-03'AND '2013-01-09'
//$sql = "SELECT slot_id, dept, fac, hall , txtDate, slot_event FROM slot ORDER BY txtDate DESC";
$sql = "SELECT slot_id, dept, fac, hall , txtDate, slot_event FROM slot ORDER BY txtDate DESC";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<center><table><tr><th>BOOKED DATE</th><th>DEPARTMENT NAME</th><th>FACULTY NAME</th><th>HALL NAME</th><th>EVENT NAME</th></tr></center>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["txtDate"]. "</td><td>" . $row["dept"]. " </td><td>" . $row["fac"]. "</td><td>" . $row["hall"]. "</td><td>" . $row["slot_event"]. " </td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$db->close();
?>
</body>
</html>



		

