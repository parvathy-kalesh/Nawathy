<?php
ob_start();
include("../assets/connection/connection.php");
include("Head.php");
$district="";
$place="";
if(isset($_POST["btn_submit"]))
{
	$district=$_POST["sel_district"];
	$place=$_POST["txt_name"];
    $selexist="select * from tbl_place where place_name='".$place."'";
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
	$ins="insert into tbl_place(district_id,place_name)values('$district','$place')";
	mysql_query($ins);
    }
}
if($_GET["pid"])
{
	$pid=$_GET["pid"];
	$delQry="delete from tbl_place where place_id='$pid'";
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
    <form id="form1" name="form1" method="post" action="">
        <table class="table table-bordered" align="center" cellpadding="10" style="border-collapse: collapse;">
            <tr>
                <th>District</th>
                <td>
                    <label for="sel_district"></label>
                    <select name="sel_district" id="sel_district" class="form-select" required="">
                        <option value="">---select---</option>
                        <?php
                        $selQry = "select * from tbl_district";
                        $data = mysql_query($selQry);
                        while ($row = mysql_fetch_array($data)) {
                            ?>
                            <option value="<?php echo $row["district_id"] ?>"><?php echo $row["district_name"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Place</th>
                <td>
                    <label for="ss"></label>
                    <input type="text" name="txt_name" id="ss" class="form-control" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btn_submit" id="1" value="save" class="btn btn-primary" />
                    <input type="submit" name="w" id="w" value="cancel" class="btn btn-secondary" />
                </td>
            </tr>
        </table>
    </form>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
            <th>sl no</th>
            <th>District</th>
            <th>Place</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["district_name"] ?></td>
                <td><?php echo $row["place_name"] ?></td>
                <td><a href="place.php?pid=<?php echo $row["place_id"] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
  <p></p>
<p>&nbsp;</p>
<p>&nbsp;</p> 
</body>
</html>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush(); 
?>
