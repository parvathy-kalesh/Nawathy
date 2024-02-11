<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-image: url('../assets/Template/Main/images/homepage2.jpg'); background-size: cover; background-attachment: fixed;">
<style>
        .custom-form {
            border: 4px solid #000080; /* Adjust the border color and width */
            border-radius: 1px; /* Adjust the border radius for rounded corners */
            padding: 0px; /* Adjust the padding for spacing inside the form */
            padding-bottom: 0px;
            margin-top: 170px;
        }
        .btn-edit-profile {
    color: #FF4500;
}
    </style>

 
<div class="container">
<form method="post" class="custom-form">
            <table class="table table-bordered" align="center" cellpadding="10">
                <?php
                ob_start();
                include("../assets/connection/connection.php");
                session_start();
                include("Header.php");
                $sel = "select * from tbl_parent where parent_id='" . $_SESSION["pid"] . "'";
                $data = mysql_query($sel);
                $row = mysql_fetch_array($data);
                ?>
                <tr>
                    <th colspan="2">
                        <img src="../assets/files/students/<?php echo $row["student_photo"]; ?>" width="150" height="150">
                    </th>
                </tr>
                <tr>
                <th style="color: #000080;">Name</th>
                    <td><?php echo $row["parent_name"] ?></td>
                </tr>
                <tr>
                <th style="color: #000080;">Contact</th>

                    <td><?php echo $row["parent_contact"] ?></td>
                </tr>
                <tr>
                <th style="color: #000080;">Email</th>
                    <td><?php echo $row["parent_email"] ?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <a href="EditProfile.php" class="btn btn-primary">Edit Profile</a>
                        <a href="ChangePassword.php" class="btn btn-primary">Change Password</a>
                    </td>
                </tr>
            </table>
        </form>
</div>

</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>