<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
ob_start();
include("../assets/connection/connection.php");
session_start();
include("Header.php");


if(isset($_POST["btn_submit"]))
{
	$update="update tbl_tutor set tutor_name='".$_POST["name"]."',tutor_contact='".$_POST["contact"]."' where tutor_id='".$_SESSION["tid"]."'";
	mysql_query($update);
	header("location:myProfile.php");
}

$sel="select * from tbl_tutor where tutor_id='".$_SESSION["tid"]."'";
$data=mysql_query($sel);
$row=mysql_fetch_array($data);
?>

<form id="form1" name="form1" method="post" action="">
  <table border="1"  align="center" style="margin-top:150px;" cellpadding="10" style="border-collapse: collapse;">
    <tr>
      <th>Name</th>
      <td><label for="d"></label>
        <input type="text" name="name" id="d"  value="<?php echo $row["tutor_name"]?>"/></td>
    </tr>
    <tr>
      <th scope="row">Contact</th>
      <td><label for="k"></label>
      <input type="text" name="contact" id="k" value="<?php echo $row["tutor_contact"]?>" /></td>
    </tr>
  
  
    <tr>
      <td colspan="2" align="center"> <input type="submit" name="btn_submit" id="sss" value="Submit" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
ob_flush();
include("Footer.php");
?>