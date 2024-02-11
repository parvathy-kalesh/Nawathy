<?php
ob_start();
include("../assets/connection/connection.php");
include("Head.php");
$district="";
if(isset($_POST["btn_submit"]))
{
	$district=$_POST["txt_name"];
    $selexist="select * from tbl_district where district_name='".$district."'";
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
	$ins="insert into tbl_district(district_name)values('$district')";
	mysql_query($ins);
    }
}
if($_GET["did"])
{
	$did=$_GET["did"];
$delQry="delete from tbl_district where district_id='$did'";
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
</td>
<div class="container">
    <form id="form1" name="form1" method="post" action="">
        <table class="table table-bordered table-striped" align="center" style="border-collapse: collapse;">
            <tr>
                <th>district</th>
                <td>
                    <input type="text" name="txt_name" id="textfield" class="form-control" required="" autocomplete="off">
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="submit" name="btn_submit" id="sss" value="save" class="btn btn-primary">
                    <input type="submit" name="f" id="f" value="cancel" class="btn btn-secondary">
                </th>
            </tr>
        </table>
    </form>

    <p>&nbsp;</p>

    <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
            <th>sl no.</th>
            <th>District</th>
            <th>action</th>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_district";
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><div align="center"><?php echo $row["district_name"]; ?></div></td>
                <td><a href="district.php?did=<?php echo $row["district_id"] ?>">delete</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <p></p>
</div>

</body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush(); 
?>


