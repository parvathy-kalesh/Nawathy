
<?php
ob_start();
include("../assets/connection/connection.php");
include("Head.php");
$board="";
if(isset($_POST["btn_submit"]))
{
	$board=$_POST["txt_name"];
    $selexist="select * from tbl_board where board_name='".$board."'";
    $dataexist=mysql_query($selexist);
    if($rowexist=mysql_fetch_array($dataexist))
    {
        ?>
        <script>
            alert("Already Entered");
        </script>
        <?php
    }
    else{
	$ins="insert into tbl_board (board_name)values('$board')";
	mysql_query($ins);
             
    }	  
			   
}
 if($_GET["bid"])
 {
	 $bid=$_GET["bid"];
	 $delQry="delete from tbl_board where board_id='$bid'";
	 mysql_query($delQry);
	 
 }
 ?>
 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</head>

<body>
<div class="container">
    <form method="post">
        <table class="table table-bordered" align="center" cellpadding="10" style="border-collapse: collapse;">
            <tr>
                <th>board</th>
                <td>
                    <label for="h"></label>
                    <input type="text" name="txt_name" id="h" class="form-control" required autocomplete="off" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btn_submit" id="d" value="Submit" class="btn btn-primary" />
                    <input type="submit" name="c" id="c" value="Cancel" class="btn btn-secondary" />
                </td>
            </tr>
        </table>
    </form>

    <p>&nbsp;</p>
    <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
            <th>sl_no</th>
            <th>board</th>
            <th>action</th>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_board";
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["board_name"] ?></td>
                <td><a href="Board.php?bid=<?php echo $row["board_id"] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>


<p>&nbsp;</p>

</body>
</html>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush(); 
?>