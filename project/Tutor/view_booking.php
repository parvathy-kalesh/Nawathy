<?php
ob_start();
include("../assets/connection/connection.php");
session_start();
include("Header.php");
if(isset($_GET['did']))
{
	echo $upQry = "update tbl_booking set booking_status = 2 where booking_id = ".$_GET['did'];
	if(mysql_query($upQry))
	{
		header("location:view_booking.php");
	}
}
?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<body style="background-image: url('../assets/Template/Main/images/tviewbooking.jpg'); background-size: cover; background-attachment: fixed;">
<table border="1" align="center" style="margin-top:150px;" cellpadding="10">
  <tr>
    <th>sl no</th>
    <th>date</th>
    <th>parentname</th>
    <th>student_name</th>
    <th>board</th>
    <th>class</th>
    <th>subjects</th>
    <th >amount</th>
    <th >Status</th>
  </tr>
 <?php
  $i=0;

	 $selQry="select * from tbl_cart c inner join tbl_booking b on b.booking_id=c.booking_id inner join tbl_tutorsubjects ts on ts.tutorsubject_id=c.tutorsubject_id inner join tbl_subject s on s.subject_id=ts.subject_id inner join tbl_class cl on cl.class_id=s.class_id inner join tbl_board bo on bo.board_id=s.board_id inner join tbl_parent p on p.parent_id=b.parent_id where ts.tutor_id='".$_SESSION["tid"]."'";
		 $data=mysql_query($selQry);
        while($row=mysql_fetch_array($data))
        {
		$i++;
		?>
            

  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row["booking_date"];?></td>
    <td><?php echo $row["parent_name"]; ?></td>
    <td><?php echo $row["student_name"]; ?></td>
    <td><?php echo $row["board_name"]; ?></td>
    <td><?php echo $row["class_name"]; ?></td>
    <td><?php echo $row["subject_name"]; ?></td>
    <td><?php echo $row["subject_rate"]; ?></td>
   
  <td><?php 
                    if($row["booking_status"]==1 && $row["payment_status"]==1)
                    {
                        echo "Order Completed";?> 
                        <?php
                    }
                    else if($row["booking_status"]==1 && $row["payment_status"]==0)
                    {
                        echo "Booking Completed and Payment Not Completed";
                    } 
                    else
                    {
                        echo "Added To Cart";
                    }                  
                    ?></td>
  </tr>
   <?php
	}
	?>

</table>
</body>
</html>
<?php 
include("Footer.php");
ob_flush();
?>