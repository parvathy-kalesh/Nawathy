<?php
ob_start();
include("../assets/connection/connection.php");
session_start();
include("Header.php");
$batch="";
if(isset($_POST["btn_submit"]))
{
	$batch=$_POST["txt_batch"];
    $ins="insert into tbl_batch(batch_time,batch_day,tutorsubject_id)values('$batch','".$_POST["txt_batchdate"]."','".$_GET["sid"]."')";
	mysql_query($ins);
             
			  
			   
}
if($_GET["bid"])
{
	$bid=$_GET["bid"];
$delQry="delete from tbl_batch where batch_id='$bid'";
mysql_query($delQry);
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="background-image: url('../assets/Template/Main/images/tmysubject.jpg'); background-size: cover; background-attachment: fixed;">>
<form id="form2" name="form2" method="post" action="">
<table  border="1" align="center" style="margin-top:150px;" cellpadding="10" style="border-collapse: collapse;">
<tr>
    <th scope="row">batch Day</th>
    <td>
      <label for="t"></label>
      <input type="text" name="txt_batchdate" id="t" required="" autocomplete="off" />
    </td>
  </tr>  
<tr>
    <th scope="row">batch time</th>
    <td>
      <label for="t"></label>
      <input type="text" name="txt_batch" id="t" required="" autocomplete="off" />
    </td>
  </tr>

  <tr>
    <td colspan="2">
      <input type="submit" name="btn_submit" id="s" value="Submit" />
      <input type="reset" name="d" id="d" value="cancel" />
   </td>
  </tr>
</table>
 </form>
<p>&nbsp;</p>
<table border="1"align="center"cellpadding="10">
  <tr>
    <th>sl no</th>
    <th>batch time</th>
    <th>action</th>
  </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_batch b inner join tbl_tutorsubjects ts on ts.tutorsubject_id=b.tutorsubject_id where ts.tutor_id=".$_SESSION['tid'];
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{$i++;
	?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo  $row['batch_time'];?></td>
    <td><a href="batch.php?bid=<?php echo $row['batch_id'];?>">delete</a></td>
  </tr>
  <?php
	}
	?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php 
include("Footer.php");
ob_flush();
?>