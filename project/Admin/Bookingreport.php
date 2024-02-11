<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
<canvas id="myChart" style="width:100%;max-width:6000px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_tutor where t_status=1";
  $row=mysql_query($sel);
  while($data=mysql_fetch_array($row))
  {
        echo "'".$data["tutor_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_tutor where t_status=1";
  $row=mysql_query($sel);
  while($data=mysql_fetch_array($row))
  {
	  
	 $sel1="select count(booking_id) as id from tbl_cart c  inner join tbl_tutorsubjects ts on ts.tutorsubject_id=c.tutorsubject_id where ts.tutor_id='".$data["tutor_id"]."'";
	  //echo $sel1;
	  $row1=mysql_query($sel1);
  while($data1=mysql_fetch_array($row1))
	  {
			echo $data1["id"].",";
	  }
  }

?>
];



var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "All Tutor Booking"
    }
  }
});
</script>
<?php
include("Foot.php");
ob_flush();
?>
</div>
</body>
</html>