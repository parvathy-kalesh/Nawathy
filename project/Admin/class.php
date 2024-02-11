

<?php
ob_start();
include("../assets/connection/connection.php");
include("Head.php");
$board="";
$class="";
if(isset($_POST["btn_submit"]))
{
	$class=$_POST["txt_class"];
    $selexist="select * from tbl_class where class_name='".$class."'";
    $dataexist=mysql_query($selexist);
    if($rowexist=mysql_fetch_array($dataexist))
    {
        ?>
        <script>
            alert("Already Entered");
        </script>
        <?php
    }
    else
    {
	$ins="insert into tbl_class (class_name)values('$class')";
	mysql_query($ins);
    }
             
			  
			   
}
 if($_GET["cid"])
 {
	 $cid=$_GET["cid"];
	 $delQry="delete from tbl_class where class_id='$cid'";
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
    <form id="form1" name="form1" method="post" action="Class.php">
        <table class="table table-bordered" align="center" cellpadding="10" style="border-collapse: collapse;">
            <tr>
                <th>Class</th>
                <td>
                    <label for="s3"></label>
                    <input type="text" name="txt_class" id="s3" class="form-control" required autocomplete="off" />
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="submit" name="btn_submit" id="save" value="Save" class="btn btn-primary" />
                    <input type="reset" name="d" id="d" value="Cancel" class="btn btn-secondary" />
                </th>
            </tr>
        </table>
    </form>

    <p></p>
    <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
            <th>sl no</th>
            <th>Class</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_class ";
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["class_name"] ?></td>
                <td><a href="Class.php?cid=<?php echo $row["class_id"] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div></body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush(); 
?>