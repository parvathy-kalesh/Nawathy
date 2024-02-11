
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
	$sel="select * from tbl_parent where parent_id='".$_SESSION["pid"]."' ";
$data=mysql_query($sel);
$row=mysql_fetch_array($data);
$pass=$row['parent_pass'];
if($pass==$current)
{
	if($new==$re)
	{
		 $update="update tbl_parent set parent_pass='".$new ."' where parent_id ='".$_SESSION["pid"]."'";
		mysql_query($update);
		header("location:HomePage.php");
		
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
        <input type="password" name="txt_c" id="ggg"  required="" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row">new-Password</th>
      <td><label for="gg"></label>
        <input type="password" name="txt_new" id="gg"  required="" autocomplete="off"/></td>
    </tr>
    <tr>
      <th  scope="row">re Password</th>
      <td><label for="gg"></label>
        <input type="password" name="txt_re" id="gg"  required="" autocomplete="off"/></td>
    </tr>
  
    <tr>
      <td  scope="row" colspan="2" align="center"> <input type="submit" name="btn_submit" id="update" value="update" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Footer.php");
ob_flush();
?>