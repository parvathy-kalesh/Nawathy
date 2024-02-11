<?php
ob_start();
include("../assets/connection/connection.php");
session_start();
include("Head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            
            <th>photo</th>
            
            
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_parent";
        $data = mysql_query($selQry);

        while ($row = mysql_fetch_array($data)) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["parent_name"]; ?></td>
                <td><?php echo $row["parent_contact"]; ?></td>
                <td><?php echo $row["parent_email"]; ?></td>
                <td><img src="../assets/files/students/<?php echo $row["student_photo"]; ?>" height='100' width='100'></td>
               
               
                
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