

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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<table class="table table-bordered table-responsive" align="center" style="margin-top:150px;">
    <tr>
        <?php
        $n = 0;
        $selQry = "select * from tbl_batch where tutorsubject_id=" . $_GET['vid'] . "";
        //echo $selQry;
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
            $n++;
        ?>
            <td class="text-center border" style="margin: 22px; padding: 10px;font-family:'Times New Roman', Times, serif;">
                <p>batch day: <?php echo $row["batch_day"]; ?></p>
                <p>batch time: <?php echo $row["batch_time"]; ?></p>
               
                
            </td>
        <?php
            if ($n == 6) {
                echo '</tr><tr>';
                $n = 0;
            }
        }
        ?>
    </tr>
</table>

    </form>
<p>&nbsp;</p>
</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>