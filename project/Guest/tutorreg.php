+





<?php
ob_start();
include("../assets/connection/connection.php");
include("Head.php");
$district="";
$t_name="";
$proof="";
$contact="";
$address="";
$place="";
$password="";


if(isset($_POST["btn_submit"]))
{
    $tname=$_POST['txt1_name'];
	$email=$_POST['txt2_name'];
	$qualification=$_POST["txt3_name"];
	$gender=$_POST["radio"];

	$contact=$_POST['txt4_name'];
	$place_name=$_POST['sel_place'];
	$password=$_POST['txt_pass'];
	
	$image1=$_POST["file_image1"];
	$address=$_POST["hhh"];
	
	
	$image=$_FILES['file_image']['name'];
	$path=$_FILES['file_image']['tmp_name'];
	move_uploaded_file($path,"../assets/files/students/".$image);
	
	$image1=$_FILES['file_image1']['name'];
	$path1=$_FILES['file_image1']['tmp_name'];
	move_uploaded_file($path1,"../assets/files/tutor/".$image1);
	
	$ins="insert into tbl_tutor(tutor_name,tutor_gender,tutor_contact,tutor_email,tutor_address,tutor_qualification,t_photo,place_id,t_proof,t_password)values('$tname','$gender','$contact','$email','$address','$qualification','$image','$place_name','$image1','$password')";
	if(mysql_query($ins))
	{
		?>
        <script>
        alert("Registered SucessFully...");
		window.location="Payment.php";
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

<body  style="background-image: url('../assets/Template/Main/images/pcomplaints.jpg'); background-size: cover; background-attachment: fixed;">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<h4><center>TUTOR REGISTRATION</center></h4>

<form method="POST" enctype="multipart/form-data">
    <table class="table table-bordered table-hover mx-auto" style="max-width: 600px;">
      <tr>
        <th>Name</th>
        <td>
          <input type="text" class="form-control" name="txt1_name" id="kl" required="" autocomplete="off" title="Name Allows Only Alphabets, Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" onchange="nameval(this)" />
          <span id="name"></span>
        </td>
      </tr>
      <tr>
        <th>Contact</th>
        <td>
          <input type="text" class="form-control" name="txt4_name" id="txt4_name" required="" autocomplete="off" pattern="[0-9]{10}" title="Phone number with 7-9 and remaining 9 digits with 0-9" onchange="checknum(this)" />
          <span id="contact"></span>
        </td>
      </tr>
      <tr>
        <th>Email</th>
        <td>
          <input type="email" class="form-control" name="txt2_name" id="hh" required="" autocomplete="off" onchange="emailval(this)" />
          <span id="content"></span>
        </td>
      </tr>
      <tr>
        <th>Address</th>
        <td>
          <textarea name="hhh" id="hallo" class="form-control" cols="45" rows="5" required="" autocomplete="off"></textarea>
        </td>
      </tr>
      <tr>
        <th>Gender</th>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="radio" id="radio1" value="male" />
            <label class="form-check-label" for="radio1">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="radio" id="radio2" value="female" />
            <label class="form-check-label" for="radio2">Female</label>
          </div>
        </td>
      </tr>
      <tr>
        <th>Photo</th>
        <td>
          <input type="file" class="form-control-file" name="file_image" id="k" required="" />
        </td>
      </tr>
      <tr>
        <th>District</th>
        <td>
          <select name="sel_district" id="sel_district" class="form-control" onchange="getPlace(this.value)" required="">
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
        <th>Qualification</th>
        <td>
          <textarea name="txt3_name" id="txt3_name" class="form-control" cols="45" rows="5" required="" autocomplete="off"></textarea>
        </td>
      </tr>
      <tr>
        <th>Proof</th>
        <td>
          <input type="file" class="form-control-file" name="file_image1" id="k" required="" />
        </td>
      </tr>
      <tr>
        <th>Password</th>
        <td>
          <input type="password" class="form-control" name="txt_pass" id="l" required="" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
        </td>
      </tr>
      <tr>
        <th>Repassword</th>
        <td>
          <input type="password" class="form-control" name="txt_cpass" id="l" required="" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onchange="chkpwd(this, txt_pass)" />
          <span id="pass"></span>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" class="btn btn-primary" name="btn_submit" id="f" value="Submit" />
          <input type="reset" class="btn btn-secondary" name="h" id="h" value="Cancel" />
        </td>
      </tr>
    </table>
  </form>
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
