<?php

// initializing variables
$dept = "";
$fac    = "";
$hall    = "";
$txtDate    = "";
$slot_event    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['book_slot'])) {
  // receive all input values from the form
  $dept = mysqli_real_escape_string($db, $_POST['dept']);
  $fac = mysqli_real_escape_string($db, $_POST['fac']);
  $hall = mysqli_real_escape_string($db, $_POST['hall']);
  $txtDate = mysqli_real_escape_string($db, $_POST['txtDate']);
  $slot_event = mysqli_real_escape_string($db, $_POST['slot_event']);
  
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
  if (empty($dept)) { array_push($errors, "Department name is required"); }
  if (empty($fac)) { array_push($errors, "Faculty name is required"); }
  if (empty($hall)) { array_push($errors, "Hall name is required"); }
  if (empty($txtDate)) { array_push($errors, "DATE is required"); }
  if (empty($slot_event)) { array_push($errors, "Event name is required"); }
  
  
  
   // first check the database to make sure 
  // a slot does not already exist with the same date
  $user_check_query = "SELECT * FROM slot WHERE txtDate='$txtDate' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $slot = mysqli_fetch_assoc($result);
  
 
  
  if($slot >= 1) 
  {
	  
	  
	 
	echo "SLOT is already been booked, Please try with the other available dates!!";
	
	
} 
else {

 

  // Finally, slot gets booked if there are no errors in the form
 
  	$query = "INSERT INTO slot (dept, fac, hall, txtDate, slot_event) 
  			  VALUES('$dept', '$fac', '$hall', '$txtDate', '$slot_event')";
  	mysqli_query($db, $query);
  	$_SESSION['fac'] = $fac;
  	$_SESSION['success'] = "Your slot has been booked";
  	header('location: success.php');
  }
}

?>

