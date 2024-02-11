<?php
ob_start();
include("../assets/connection/connection.php");
session_start();
include("Header.php");
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
    <table  align="center" style="margin-top:150px;" cellpadding="10">
        <tr>
        <?php
        $seldata="select * from tbl_tutorsubjects where tutor_id='".$_GET["tid"]."' and subject_id='".$_GET["sub"]."'";
		//echo $seldata;
        $sub=mysql_query($seldata);
        $dt=mysql_fetch_array($sub);
        $sel="select *  from tbl_uploadvideo where tutorsubject_id='".$dt["tutorsubject_id"]."'";
        $data=mysql_query($sel);
        $i=0;
        while($row=mysql_fetch_array($data))
        {
          ?>
          <td>
            <p><video width="150" height="150" controls><source src="../assets/files/tutor/<?php echo $row["upload_video"]?>"></video></p>
            <p><?php echo $row["upload_description"]?></p>            
          </td>
        
        <?php
        if($i%4==0)
        {
          echo "</tr><tr>";
        }
        }
        ?>
    </table>
  </form>
</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>