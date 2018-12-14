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
	<style> body {
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
	<h2>BOOK HALL</h2>
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
	
    	<p>Hello <strong><?php echo $_SESSION['username']; ?>    </strong>&nbsp book your HALL!!</p>
    	<p> <a href="log.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

		<form method="post" action="index.php">
		<h3>SLOT BOOKING</h3>
		
		<br><br>
		<div class="input-group">
  		<label>DEPARTMENT NAME</label>
		<select size="1" name="dept" input type="dept" required>
		<option value="MCA">MCA</option>
		<option value="MBA">MBA</option>
		<option value="Mechanical">Mechanical</option>
		<option value="Electrical">Electrical</option>
		</select>
		</div>
		
		<div class="input-group" >
  		<label>FACULTY NAME</label>
  		<input type="fac" name="fac" required>
		</div>
		
		<div class="input-group">
  		<label>HALL REQUIRED</label>
		
	<select size="1" name="hall" input type="hall" required>
    <option value="FDC">FDC</option>
    <option value="BSN">BSN</option>
    <option value="MAIN LIBRARY">MAIN LIBRARY</option>
    <option value="NEW AUDI">NEW AUDI</option>
	</select>
		</div>

<div class="form-group">
  <label for="rank" class="cols-sm-2 control-label">Date</label>
   <div class="cols-sm-10">
    <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
     <input type="date"  id="txtDate" required="Required" class="form-control" name="txtDate" placeholder="Select suitable date" required />
    </div>
  </div>
</div>
	
	
	<div class="input-group">
  		<label>Event Name</label>
  		<input type="text" name="slot_event" required>
  	</div>
	
  	<div class="input-group">
  		<button type="submit" class="btn" name="book_slot" required >Submit</button>
  	</div>
	
	<div id="Datepicker1"></div>

<script>
var today = new Date().toISOString().split('T')[0];
var nextWeekDate = new Date(new Date().getTime() + 6 * 24 * 60 * 60 * 1000).toISOString().split('T')[0];
document.getElementsByName("txtDate")[0].setAttribute('min', today);
document.getElementsByName("txtDate")[0].setAttribute('max', nextWeekDate)

</script>

</form>

</body>

