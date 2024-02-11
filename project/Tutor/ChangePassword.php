<?php
ob_start();
include("../assets/connection/connection.php");
session_start();
include("Header.php");
$current="";
$new="";
$re="";
  
 if(isset($_POST["btn_submit"]))
{
    $current=$_POST['txt_c'];
	$new=$_POST['txt_new'];
	$re=$_POST['txt_re'];
	$sel="select * from tbl_tutor where tutor_id='".$_SESSION["tid"]."' ";
$data=mysql_query($sel);
$row=mysql_fetch_array($data);
$pass=$row['t_password'];
if($pass==$current)
{
	if($new==$re)
	{
		 $update="update tbl_tutor set t_password='".$new ."' where tutor_id ='".$_SESSION["tid"]."'";
		mysql_query($update);
		header("location:homepagetutor.php");
		
	} 
	else
	{
		echo"password missmatch";
  }
}
  
else
{
	echo "invalid password";
}
}
 
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" style="margin-top:150px;" cellpadding="10" style="border-collapse: collapse;">
    <tr>
      <th scope="row">Current Password</th>
      <td><label for="ggg"></label>
        <input type="text" name="txt_c" id="ggg" required="" autocomplete="off" /></td>
    </tr>
    <tr>
      <th>Re-Password</th>
      <td><label for="gg"></label>
        <input type="text" name="txt_re" id="gg" required="" autocomplete="off" /></td>
    </tr>
    <tr>
      <th>New Password</th>
      <td><label for="gg"></label>
        <input type="text" name="txt_new" id="gg" required="" autocomplete="off"/></td>
    </tr>
 
    <tr>
      <th  colspan="2"> <input type="submit" name="btn_submit" id="update" value="update" />
      </th>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
ob_flush();
include("Footer.php");
?>