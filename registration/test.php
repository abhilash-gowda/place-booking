<script type="text/javascript">
      /*$(function() {
        $("#Datepicker1").datepicker({
         numberOfMonths: 1
        }); 
      });*/
	  
	  var unavailableDates = ['txtDate'];

    function unavailable(date) {
        dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
        if ($.inArray(dmy, unavailableDates) == -1) {
            return [true, ""];
        } else {
            return [false, "", "Unavailable"];
        }
    }

    $(function() {
        $("#Datepicker1").datepicker({
            dateFormat: 'dd MM yy',
            beforeShowDay: unavailable
        });

    });
    </script>
//

ORDER BY txtDate DESC";