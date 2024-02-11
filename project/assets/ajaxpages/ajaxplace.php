<option value="">---select---</option>
<?php include("../connection/connection.php");
$district=$_GET["pid"];
$selQry="select * from tbl_place where district_id='$district'";
$data=mysql_query($selQry);
while($row=mysql_fetch_array($data))
{
	?>
    <option value="<?php echo $row['place_id'] ?>">
    <?php echo $row['place_name'] ?></option>
    <?php
}
?>
