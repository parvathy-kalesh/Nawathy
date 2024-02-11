
<?php
ob_start();
include("../assets/connection/connection.php");
include("Head.php");
if(isset($_GET['aid']))
{
	echo $upQry = "update tbl_tutor set t_status = 1 where tutor_id = ".$_GET['aid'];
	if(mysql_query($upQry))
	{
        $mailid=$_GET["email"];
$name="";

//$mailid="anu99918@gmail.com";
//$pass="aannuu";


/*$uname=$_REQUEST['name'];
$pass=$_REQUEST['passwd'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];

*/
  
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP(); // set mailer to use SMTP
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->Port = 587;
$mail->Username = 'educenter014@gmail.com';  // SMTP username
$mail->Password = 'jmsaxyunaongwwid'; // SMTP password

$mail->From = "educenter014@gmail.com";
$mail->FromName = "ADMIN";
$mail->AddAddress($mailid);


$mail->WordWrap = 50;// set word wrap to 50 characters
$mail->IsHTML(true);// set email format to HTML

$mail->Subject = "Account Verified";
$mail->Body    = "Your Account Verified SucessFully";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
//echo $mail;
//if(!$mail->Send())
//{
//   echo "Message could not be sent. <p>";
//   echo "Mailer Error: " . $mail->ErrorInfo;
//   exit;
//}
//else
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

		header("location:tutorverification.php");

	}
}




if(isset($_GET['rid']))
{   
	echo $upQry = "update tbl_tutor set t_status = 2 where tutor_id = ".$_GET['rid'];
	if(mysql_query($upQry))
	{
        $mailid=$_GET["email"];
$name="";

//$mailid="anu99918@gmail.com";
//$pass="aannuu";


/*$uname=$_REQUEST['name'];
$pass=$_REQUEST['passwd'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];

*/
  
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP(); // set mailer to use SMTP
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->Port = 587;
$mail->Username = 'educenter014@gmail.com';  // SMTP username
$mail->Password = 'jmsaxyunaongwwid'; // SMTP password

$mail->From = "educenter014@gmail.com";
$mail->FromName = "ADMIN";
$mail->AddAddress($mailid);


$mail->WordWrap = 50;// set word wrap to 50 characters
$mail->IsHTML(true);// set email format to HTML

$mail->Subject = "Application Status";
$mail->Body    = "Currently Your Account Not Verified You Can Refund Your Amount With in 5 Working Days";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
//echo $mail;
//if(!$mail->Send())
//{
//   echo "Message could not be sent. <p>";
//   echo "Mailer Error: " . $mail->ErrorInfo;
//   exit;
//}
//else
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

		header("location:tutorverification.php");
	}
}


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <!-- Table 1 -->
    <h4>List of tutors to be verifed</h4>
    <table class="table table-bordered" align="center" cellpadding="10" style="margin-top: 50px;">
        <tr>
            <th>sl_no</th>
            <th>tutor name</th>
            <th>contact</th>
            <th>email</th>
            <th>address</th>
            <th>photo</th>
            <th>proof</th>
            <th>qualification</th>
            <th>district</th>
            <th>place</th>
            <th>verify</th>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_tutor t inner join tbl_place p on t.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where t_status= 0";
        $data = mysql_query($selQry);

        while ($row = mysql_fetch_array($data)) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["tutor_name"]; ?></td>
                <td><?php echo $row["tutor_contact"]; ?></td>
                <td><?php echo $row["tutor_email"]; ?></td>
                <td><?php echo $row["tutor_address"]; ?></td>
                <td><img src="../assets/files/tutor/<?php echo $row["t_photo"]; ?>" height='100' width='100'></td>
                <td><img src="../assets/files/tutor/<?php echo $row["t_proof"]; ?>" height='100' width='100'></td>
                <td><?php echo $row["tutor_qualification"]; ?></td>
                <td><?php echo $row["district_name"]; ?></td>
                <td><?php echo $row["place_name"]; ?></td>
                <td>
                    <a href="tutorverification.php?aid=<?php echo $row["tutor_id"] ?>&email=<?php echo $row["tutor_email"] ?>" class="btn btn-success">Accept</a>
                    <a href="tutorverification.php?rid=<?php echo $row["tutor_id"] ?>&email=<?php echo $row["tutor_email"] ?>" class="btn btn-danger">Reject</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <!-- Table 2 -->
    <h4><u>Accepted Tutors</u></h4>
    <table class="table table-bordered" align="center" cellpadding="10" style="margin-top: 50px;">
        <tr>
            <th>sl_no</th>
            <th>tutor name</th>
            <th>contact</th>
            <th>email</th>
            <th>address</th>
            <th>photo</th>
            <th>proof</th>
            <th>qualification</th>
            <th>district</th>
            <th>place</th>
            <th>verify</th>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_tutor t inner join tbl_place p on t.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where t_status= 1";
        $data = mysql_query($selQry);

        while ($row = mysql_fetch_array($data)) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["tutor_name"]; ?></td>
                <td><?php echo $row["tutor_contact"]; ?></td>
                <td><?php echo $row["tutor_email"]; ?></td>
                <td><?php echo $row["tutor_address"]; ?></td>
                <td><img src="../assets/files/tutor/<?php echo $row["t_photo"]; ?>" height='100' width='100'></td>
                <td><img src="../assets/files/tutor/<?php echo $row["t_proof"]; ?>" height='100' width='100'></td>
                <td><?php echo $row["tutor_qualification"]; ?></td>
                <td><?php echo $row["district_name"]; ?></td>
                <td><?php echo $row["place_name"]; ?></td>
                <td>
                    <a href="tutorverification.php?rid=<?php echo $row["tutor_id"] ?>&email=<?php echo $row["tutor_email"] ?>" class="btn btn-danger">Reject</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <!-- Table 3 -->
    <h4>Rejected Tutors</h4>
    <table class="table table-bordered" align="center" cellpadding="10" style="margin-top: 50px;">
        <tr>
            <th>sl_no</th>
            <th>tutor name</th>
            <th>contact</th>
            <th>email</th>
            <th>address</th>
            <th>photo</th>
            <th>proof</th>
            <th>qualification</th>
            <th>district</th>
            <th>place</th>
            <th>verify</th>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_tutor t inner join tbl_place p on t.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where t_status= 2";
        $data = mysql_query($selQry);

        while ($row = mysql_fetch_array($data)) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["tutor_name"]; ?></td>
                <td><?php echo $row["tutor_contact"]; ?></td>
                <td><?php echo $row["tutor_email"]; ?></td>
                <td><?php echo $row["tutor_address"]; ?></td>
                <td><img src="../assets/files/tutor/<?php echo $row["t_photo"]; ?>" height='100' width='100'></td>
                <td><img src="../assets/files/tutor/<?php echo $row["t_proof"]; ?>" height='100' width='100'></td>
                <td><?php echo $row["tutor_qualification"]; ?></td>
                <td><?php echo $row["district_name"]; ?></td>
                <td><?php echo $row["place_name"]; ?></td>
                <td>
                    <a href="tutorverification.php?aid=<?php echo $row["tutor_id"] ?>&email=<?php echo $row["tutor_email"] ?>" class="btn btn-success">Accept</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

</body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>