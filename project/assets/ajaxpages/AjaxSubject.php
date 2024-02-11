<option value="">---select---</option>
<?php include("../connection/connection.php");
$bid=$_GET["bid"];
$cid= $_GET['cid'];
echo $selQry="select * from tbl_subject where board_id='$bid' and class_id = '$cid'";
$data=mysql_query($selQry);
while($row=mysql_fetch_array($data))
{
	?>
    <option value="<?php echo $row['subject_id'] ?>">
    <?php echo $row['subject_name'] ?></option>
    <?php
}
?>
