
<!DOCTYPE html>
<html>
<body>
<head>
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

<div id="Datepicker1"></div>

</body>
<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

$sql = "SELECT * FROM slot";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		echo "<table id='tableId' ><tr><th>DEPT</th><th>FAC</th><th>HALL</th><th>DATE</th><th>EVENT</th></tr>";
        echo "<tr><td>". $row["dept"]."</td><td><tr><td>". $row["fac"]."<tr><td>". $row["hall"]."</td><td><tr><td class ='da' id='row2'>". $row["txtDate"]."</td><td><tr><td>". $row["slot_event"]. "</td></tr>";
    }
} else {
    echo "0 results";
}

?>

</body>

<script type="text/javascript">
      /*$(function() {
        $("#Datepicker1").datepicker({
         numberOfMonths: 1
        }); 
      });*/
	  
	 
	  
		//var unavailableDates = ['19-12-2018'];
		
		   
		   var rowCount = $('#tableId tr').length;
		   
		   
		
		  $("tr.row2").each(function() {
        var quantity1 = $(this).find("tr.id").val();
            alert(quantity1);
            });
});
			// compare id to what you want
	
		   //alert(textOfTd)
		/*   $('#tableId td').each(function() {
			   
			   
				var cellText = $(this).html();    
				
				alert(cellText)
			});*/
		  
			//var unavailableDates = [r];
		 
		 
    function unavailable(date) {
		
      //  dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
		
		ymd = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate() ;
        if ($.inArray(ymd, unavailableDates) == -1) {
            return [true, ""];
        } else {
            return [false, "", "Unavailable"];
        }
    }

    $(function() {
        $("#Datepicker1").datepicker({
            dateFormat: 'yyyy MM dd',
            beforeShowDay: unavailable
        });

    });
    </script>
</html>
