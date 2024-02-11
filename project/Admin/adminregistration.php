<?php
ob_start();
include("../assets/connection/connection.php");
include("Head.php");
$name="";
$contact="";
$email="";
$password="";
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt1_name"];
	$contact=$_POST["txt2_name"];
	$email=$_POST["txt3_name"];
	$password=$_POST["txt4_name"];



	
	$ins="insert into tbl_admin(admin_name,admin_email,admin_contact,admin_password)values('$name','$email','$contact','$password')";
	mysql_query($ins);
}
if($_GET["aid"])
{
	$aid=$_GET["aid"];
$delQry="delete from tbl_admin where admin_id='$aid'";
mysql_query($delQry);
}
?>






<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">
<table border="1">
  <tr>
    <th>Name</th>
    <td><label for="name"></label>
      <input type="text" name="txt1_name" id="name" /></td>
  </tr>
  <tr>
    <th><p>Contact</p></th>
    <td><label for="cc"></label>
      <input type="text" name="txt2_name" id="cc" /></td>
  </tr>
  <tr>
    <th>email</th>
    <td><label for="ww"></label>
      <input type="text" name="txt3_name" id="ww" /></td>
  </tr>
  <tr>
    <th>password</th>
    <td><label for="wws"></label>
      <input type="text" name="txt4_name" id="wws" /></td>
  </tr>
  <tr>
    <th>
      <input type="reset" name="l" id="l" value="cancel" />
      <input type="submit" name="btn_submit" id="d" value="submit" />
   </th>
  </tr>
</table>

<p>&nbsp;</p>
<table border="1">
  <tr>
    <th>serial no</th>
    <th >Name</th>
    <th>Contact</th>
    <th>Email</th>
    <th>Password</th>
    <th>Action</th>
  </tr>
  <tr>  <?php
	$i=0;
	$selQry="select * from tbl_admin";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><div align="center"><?php echo $row["admin_name"]; ?></div></td>
      <td><?Php echo $row["admin_contact"]; ?></div></td>
      <td><?Php echo $row["admin_email"]; ?></div></td>
      <td><?Php echo $row["admin_password"]; ?></div></td>
      <td><a href="adminregistration.php?aid=<?php echo $row["admin_id"]?>">delete</a></td>
    </tr>
    <?php
	}
	?>
  
  </tr>
</table>
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