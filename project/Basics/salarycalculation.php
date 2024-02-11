<?php
$name="";
$gender="";
$martial="";
$department="";
$salary="";
$ta="";
$da="";
$hra="";
$lic="";
$pf="";
$net="";
$dd="";



if(isset($_POST["submit"]))
{
	
$First_name=$_POST["First_name"];
$Last_name=$_POST["Last_name"];
$gender=$_POST["gender"];
$martial=$_POST["martial"];
$department=$_POST["department"];
$salary=$_POST["salary"];
$name=$First_name." ".$Last_name;


if($salary>=10000)
{
	$ta=(40/100)*$salary;
	$da=(35/100)*$salary;
	$hra=(30/100)*$salary;
	$lic=(25/100)*$salary;
	$pf=(20/100)*$salary;
	$dd=$lic + $pf;
	$net=$salary + $ta + $ba + $hra - ($lic+$pf);
}
if($salary>=5000 && $salary<10000)
{
	$ta=(35/100)*$salary;
	$da=(30/100)*$salary;
	$hra=(25/100)*$salary;
	$lic=(20/100)*$salary;
	$pf=(15/100)*$salary;
	$dd=$lic + $pf;
	$net=$salary + $ta + $ba + $hra - ($lic+$pf);
}
if($salary<5000)
{
	$ta=(30/100)*$salary;
	$da=(25/100)*$salary;
	$hra=(20/100)*$salary;
	$lic=(15/100)*$salary;
	$pf=(10/100)*$salary;
	$dd=$lic + $pf;
	$net=$salary + $ta + $ba + $hra - ($lic+$pf);
}
if($gender=="male")
{
$name="Mr."." ".$name;
}
else if($gender=="female" && $martial== "married")
{
$name="mrs."." ".$name;
}
else
{
	$name="miss."." ".$name;
}
}
?>
<html>
<head>
<title>form</title>
</head>
<body>
<form method="post">
<table width height="210" border="8" bgcolor="pink">
<tr>
<th width="84">First name:</th>
<td width="160"><input type="text"name="First_name"></td>
</tr>
<tr>
	<th>Last name:</th>
	<td><input type="text"name="Last_name"></td>
</tr>
<tr>
	<th>Gender</th>
	<td><input type="radio"name="gender"value="male">male
	<input type="radio"name="gender"value="female">female
</td>
</tr>
<tr>
	<th>Martial</th>
	<td><input type="radio"name="martial"value="single">single
<input type="radio"name="martial"value="married">married</td>
<td width="8"></td>
</tr>
<tr>
<th>Department</th>
<td><select name="department">
<option>..select..</option>
<option>BCA</option>
<option>BCOM</option>
<option>BA</option>
</select>
</td>

<tr>
<th>Basic Salary</th>
<td><input type="text"name="salary"></td>
</tr>
<tr>
<th></th>
<td><input type="submit" name="submit" value="submit">
<input type="reset" name="cancel" value="cancel"></td>
</tr>
</table>
<input type="radio"name="gender">
<table align=center" bgcolor="pink" border="6" width="200">
  <tr>
<th>Name</th>
<td><?php echo $name ?></td>
</tr>
<tr>
<th>Gender</th>
<td><?php echo $gender ?></td>
</tr>
<tr>
<th>Martial</th>
<td><?php echo $martial ?></td>
</tr>
<tr>
<th>Department</th>
<td><?php echo $department ?></td>
</tr>
<tr>
<th>Basic Salary</th>
<td><?php echo $salary ?></td>
</tr>
<tr>
<th>TA</th>
<td><?php echo $ta ?></td>
</tr>
<tr>
<th>DA</th>
<td><?php echo $da ?></td>
</tr>
<tr>
<th>HRA</th>
<td><?php echo $hra ?></td>
</tr>
<tr>
<th>LIC</th>
<td><?php echo $lic ?></td>
</tr>
<tr>
<th>PF</th>
<td><?php echo $pf ?></td>
</tr>
<tr>
<th>Deduction</th>
<td><?php echo $dd ?></td>
</tr>
<tr>
<th>NET</th>
<td><?php echo $net ?></td>
</tr>
</table>
</form>
</body>
</html>
