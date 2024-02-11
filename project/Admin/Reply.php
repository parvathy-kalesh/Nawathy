<?php
ob_start();
include("../assets/connection/connection.php");
include("Head.php");
if(isset($_POST["btn"]))
{
    $up="update tbl_complaint set complaint_reply='".$_POST["txta"]."',complaint_status=1 where complaint_id='".$_GET["cid"]."'";
    mysql_query($up);
    echo $up;
    header("location:ViewComplaint.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table border="1" align="center" cellpadding="10">
              <tr>
                <td>Reply</td>
                <td><textarea name="txta" id="" cols="30" rows="10" required="" autocomplete="off"></textarea></td>
              </tr>
              <tr>
                <td colspan="2"  align="center"><input type="submit" value="Send" name="btn"></td>
              </tr>  
        </table>
    </form>
</body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush(); 
?>