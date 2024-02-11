<?php
ob_start();
include("../assets/connection/connection.php");
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
    <form action="" method="post">
        <table class="table table-bordered" align="center" cellpadding="10">
            <tr>
                <th>Sl.No</th>
                <th>Content</th>
                <th>Name of Parent</th>
            </tr>
            <?php
            $sel = "select * from tbl_feedback f inner join tbl_parent p on p.parent_id=f.parent_id";
            $data = mysql_query($sel);
            $i = 0;
            while ($row = mysql_fetch_array($data)) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row["feedback_content"] ?></td>
                    <td><?php echo $row["parent_name"] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </form>
</div>
</body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush(); 
?>