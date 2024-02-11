<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</head>
<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");


if(isset($_POST["btn_save"]))
{
	
	$rtitle=$_POST["txt_title"];
	$content=$_POST["txt_content"];
	
	  $insQry="insert into tbl_feedback(feedback_content,feedback_date,parent_id)values('".$title."''".$content."',curdate(),'".$_SESSION["pid"]."')";
	if(mysql_query($insQry))
	{
		?>
        <script>
		alert("Data Inserted");
		window.location="Feedback.php";
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("Failed");
		window.location="Feedback.php";
		</script>
        <?php
	}
	}

	?>


<body style="background-image: url('../assets/Template/Main/images/homepage2.jpg'); background-size: cover; background-attachment: fixed;">
<div class="container">
    <form id="form1" name="form1" method="post" action="">
        <table class="table table-bordered" align="center" style="margin-top: 150px;">
            <tr>
                <td>Content</td>
                <td><input type="text" name="txt_content" id="txt_content" class="form-control" required="" autocomplete="off" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btn_save" id="btn_save" value="Save" class="btn btn-primary" />
                    <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" class="btn btn-secondary" />
                </td>
            </tr>
        </table>
    </form>

    <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
            <td>Feedback</td>
            <td>Date</td>
        </tr>
        <?php
        $selqry = "select * from tbl_feedback where parent_id='" . $_SESSION["pid"] . "'";

        $row = mysql_query($selqry);

        while ($data = mysql_fetch_array($row)) {
            ?>
            <tr>
                <td><?php echo $data["feedback_content"] ?></td>
                <td><?php echo $data["feedback_date"] ?></td>
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