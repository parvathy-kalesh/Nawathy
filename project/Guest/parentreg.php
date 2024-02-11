<?php
ob_start();
include("../assets/connection/connection.php");
include("Head.php");
$district="";
$parent_name="";
$student_name="";
$contact="";
$email="";
$place="";
$password="";


if(isset($_POST["btn_submit"]))
{
    $parent_name=$_POST['txt1_name'];
	$email=$_POST['txt2_name'];
	$student_name=$_POST['txt3_name'];
	$contact=$_POST['txt4_name'];
	$place_name=$_POST['sel_place'];
	$password=$_POST['txt6_name'];
	$district=$_POST["sel_district"];
	$image=$_POST["file_image"];
	
	$image=$_FILES['file_image']['name'];
	$path=$_FILES['file_image']['tmp_name'];
	move_uploaded_file($path,"../assets/files/students/".$image);
	
	$ins="insert into tbl_parent(parent_name,student_name,parent_contact,parent_email,student_photo,parent_pass,place_id)values('$parent_name','$student_name','$contact','$email','$image','$password','$place_name')";
	if(mysql_query($ins))
	{
		?>
        <script>
        alert("Registered SucessFully...");
		window.location="Login.php";
        </script>
        <?php
	}
	else
	{
		?>
        <script>
        alert("Failed...");
		window.location="tutorreg.php";
        </script>
        <?php
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="background-image: url('../assets/Template/Main/images/homepage2.jpg'); background-size: cover; background-attachment: fixed;">
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <h4><center>PARENT REGISTRATION</center></h4>
  <form method="post" enctype="multipart/form-data">
    <table class="table table-bordered table-hover mx-auto" style="max-width: 600px;">
      <tr>
        <th>Parent Name</th>
        <td>
          <input type="text" class="form-control" name="txt1_name" id="par" required="" autocomplete="off" title="Name Allows Only Alphabets, Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" />
        </td>
      </tr>
      <tr>
        <th>Student Name</th>
        <td>
          <input type="text" class="form-control" name="txt3_name" id="stu" required="" autocomplete="off" title="Name Allows Only Alphabets, Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" />
        </td>
      </tr>
      <tr>
        <th>Contact</th>
        <td>
          <input type="text" class="form-control" name="txt4_name" id="con" required="" autocomplete="off" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaining 9 digits with 0-9" />
        </td>
      </tr>
      <tr>
        <th>Email</th>
        <td>
          <input type="email" class="form-control" name="txt2_name" id="ee" required="" autocomplete="off" />
        </td>
      </tr>
      <tr>
        <th>Student Photo</th>
        <td>
          <input type="file" class="form-control-file" name="file_image" id="browse" required="" />
        </td>
      </tr>
      <tr>
        <th>District</th>
        <td>
          <select name="sel_district" id="sel_district" class="form-control" onChange="getPlace(this.value)" required="">
            <option value="">---Select---</option>
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
          <select name="sel_place" id="sel_place" class="form-control" required="">
            <option value="">---Select---</option>
            <?php
            $selQry = "select * from tbl_place";
            $data = mysql_query($selQry);
            while ($row = mysql_fetch_array($data)) {
            ?>
              <option value="<?php echo $row["place_id"] ?>"><?php echo $row["place_name"] ?></option>
            <?php
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <th>Password</th>
        <td>
          <input type="password" class="form-control" name="txt6_name" id="pass" required="" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
        </td>
      </tr>
      <tr>
        <th colspan="2" class="text-center">
          <input type="submit" class="btn btn-primary" name="btn_submit" id="reg" value="Register" />
          <input type="reset" class="btn btn-secondary" name="can" id="can" value="Cancel" />
        </th>
      </tr>
    </table>
  </form>
<p>&nbsp;</p>
</body>
<script src="../assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../assets/ajaxpages/ajaxplace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
		}
	});
}
function chkpwd(txtrp, txtp)
{
	if((txtrp.value)!=(txtp.value))
	{
		document.getElementById("pass").innerHTML = "<span style='color: red;'>Passwords Mismatch</span>";
	}
}

function checknum(elem)
{
	var numericExpression = /^[0-9]{8,10}$/;
	if(elem.value.match(numericExpression))
	{
		document.getElementById("contact").innerHTML = "";
		return true;
	}
	else
	{
		document.getElementById("contact").innerHTML = "<span style='color: red;'>Numbers Only Allowed</span>";
		elem.focus();
		return false;
	}
}



function emailval(elem)
{
	var emailexp=/^([a-zA-Z0-9.\_\-])+\@([a-zA-Z0-9.\_\-])+\.([a-zA-Z]{2,4})$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("content").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("content").innerHTML ="<span style='color: red;'>Check Email Address Entered</span>";;
		elem.focus();
		return false;
	}
}
function nameval(elem)
{
	var emailexp=/^([A-Za-z ]*)$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("name").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("name").innerHTML = "<span style='color: red;'>Alphabets Are Allowed</span>";
		elem.focus();
		return false;
	}
}
</script>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php 
include("Foot.php");
ob_flush();
?>