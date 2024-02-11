<?php
ob_start();
include("../assets/connection/connection.php");
session_start();
include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<br><br><br><br><br><br><br>
<body style="background-image: url('../assets/Template/Main/images/homepage2.jpg'); background-size: cover; background-attachment: fixed;">
<p><b><center>my profile</center></b></p>
<form method="post" align="center">
  <table border="1" align="center" cellpadding="10" style="margin-top:150px;margin-bottom:150px">
   
  <?php
 $sel="select * from tbl_tutor where tutor_id='".$_SESSION["tid"]."'";
$data=mysql_query($sel);
$row=mysql_fetch_array($data);
?>
    <tr>
      <th colspan="2"> 
        <img src="../assets/files/tutor/<?php echo $row["t_photo"];?>" width="150" height="150">
      </th>
    </tr>
  


  
    <tr>
      <th >Name</th>
      <td ><?php echo $row["tutor_name"]?></td>
    </tr>
    <tr>
      <th><div align="center">Contact</div></th>
      <td><?php echo $row["tutor_contact"]?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?php echo $row["tutor_email"]?></td>
    </tr>
   <tr>
    <td colspan="2" align="center"><a href="Editprofile.php">Edit Profile</a>&nbsp;&nbsp;&nbsp;<a href="ChangePassword.php">Change Password</a></td>
   </tr>
  </table>
  </form>
</body>
</html>
<?php 
ob_flush();
include("Footer.php");
?>