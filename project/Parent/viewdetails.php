<div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
        <script>




            function addCart(id)
            {
                $.ajax({
                    url: "../assets/ajaxpages/AjaxAddCart.php?id=" + id,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }


            
        </script>
<?php
ob_start();
include("../assets/connection/connection.php");
   
   session_start();
   
 include("Header.php");
   
   
if(isset($_GET["sid"]))
{
 $ins="insert into tbl_booking(booking_date,subject_id,parent_id)values(curdate(),'".$_GET['sid']."','".$_SESSION['pid']."')";
	if(mysql_query($ins)){
		
		header("location:Payment.php");
	} 
}
   
   
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
            .custom-alert-box{
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
				z-index:1;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }
        </style>

</head>

<body>
<table class="table table-bordered table-responsive" align="center" style="margin-top:150px;">
    <tr>
        <?php
        $n = 0;
        $selQry = "select * from tbl_tutorsubjects ts inner join tbl_subject s on ts.subject_id=s.subject_id inner join tbl_board b on s.board_id=b.board_id inner join tbl_class c on s.class_id=c.class_id  where ts.tutor_id=" . $_GET['tid'] . "";
        //echo $selQry;
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
            $n++;
        ?>
            <td class="text-center border" style="margin: 22px; padding: 10px;font-family:'Times New Roman', Times, serif;">
                <p>Board: <?php echo $row["board_name"]; ?></p>
                <p>Classes: <?php echo $row["class_name"]; ?></p>
                <p>Subject: <?php echo $row["subject_name"]; ?></p>
                
                <p><a href="viewbatchdetails.php?vid=<?php echo $row["tutorsubject_id"] ?>" class="btn btn-success">view batches</a></p>
                <p><a href="javascript:void(0)" onclick="addCart('<?php echo $row["tutorsubject_id"]; ?>')" class="btn btn-success btn-block">Add to Cart</a></p>

                <p><a href="viewtutorvideos.php?sub=<?php echo $row["subject_id"] ?>&tid=<?php echo $row["tutor_id"] ?>" class="btn btn-primary">View Tutorial Videos</a></p>
            </td>
        <?php
            if ($n == 6) {
                echo '</tr><tr>';
                $n = 0;
            }
        }
        ?>
    </tr>
</table>

    </form>
<p>&nbsp;</p>
</body>
</html>
<script src="../assets/JQ/jQuery.js"></script>
<?php
ob_flush();
include("Footer.php");
?>