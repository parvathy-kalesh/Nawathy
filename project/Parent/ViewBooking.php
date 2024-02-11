<?php
ob_start();
include("../assets/connection/connection.php");
session_start();
include("Header.php");
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-image: url('../assets/Template/Main/images/homepage2.jpg'); background-size: cover; background-attachment: fixed;">

<div class="container">
    <table class="table table-bordered" align="left" style="margin-top: 150px;">
        <tr>
            <th>Sl.No</th>
            <th>Board</th>
            <th>Class</th>
            <th>Subject</th>
            
            <th>Tutor</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
        <?php
        $i = 0;

        $selQry = "select * from tbl_cart c inner join tbl_booking b on b.booking_id=c.booking_id inner join tbl_tutorsubjects ts on ts.tutorsubject_id=c.tutorsubject_id inner join tbl_subject s on s.subject_id=ts.subject_id inner join tbl_class cs on cs.class_id=s.class_id inner join tbl_board bo on bo.board_id=s.board_id  inner join tbl_tutor tr on tr.tutor_id=ts.tutor_id where b.parent_id='".$_SESSION["pid"]."'";
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["board_name"]; ?></td>
                <td><?php echo $row["class_name"]; ?></td>
                <td><?php echo $row["subject_name"]; ?></td>
                
                <td><?php echo $row["tutor_name"]; ?></td>
                <td><?php echo $row["subject_name"]; ?></td>
                <td>
                    <?php 
                    if($row["booking_status"]==1 && $row["payment_status"]==1)
                    {
                        echo "Order Completed";?> |<a href="viewtutorvideos.php?sub=<?php echo $row["subject_id"] ?>&tid=<?php echo $row["tutor_id"] ?>">View Tutor Videos</a> | <a href="Rating.php?tid=<?php echo $row["tutor_id"] ?>">Rating Now</a>
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
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>
<?php
include("Footer.php");
ob_flush();
?>