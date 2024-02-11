

<?php
ob_start();
include("../assets/connection/connection.php");
include("Head.php");
$board="";
$class="";
$subject="";
if(isset($_POST["btn_submit"]))
{
	$class=$_POST["txt_class"];
	$board=$_POST["sel_board"];
	$subject=$_POST["txt_subject"];
    $selexist="select * from tbl_subject where subject_name='".$subject."'";
    $dataexist=mysql_query($selexist);
    if($rowexist=mysql_fetch_array($dataexist))
    {
        ?>
        <script>
            alert("Already Entered");
        </script>
        <?php
    }
    else{
	$ins="insert into tbl_subject(subject_name,board_id,class_id)values('$subject','$board','$class')";
	mysql_query($ins);
    }       
			  
			   
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <form id="form1" name="form1" method="post" action="">
        <table class="table table-bordered" align="center" cellpadding="10" style="border-collapse: collapse;">
            <tr>
                <th>Board</th>
                <td>
                    <label for="ff2"></label>
                    <select name="sel_board" id="ff2" class="form-select" required="">
                        <option value="">--select--</option>
                        <?php
                        $selQry = "select * from tbl_board";
                        $data = mysql_query($selQry);
                        while ($row = mysql_fetch_array($data)) {
                            ?>
                            <option value="<?php echo $row["board_id"] ?>"><?php echo $row["board_name"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Class</th>
                <td>
                    <label for="dd"></label>
                    <select name="txt_class" id="dd" class="form-select" required="">
                        <option value="">--select--</option>
                        <?php
                        $selQry = "select * from tbl_class";
                        $data = mysql_query($selQry);
                        while ($row = mysql_fetch_array($data)) {
                            ?>
                            <option value="<?php echo $row["class_id"] ?>"><?php echo $row["class_name"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Subject</th>
                <td>
                    <label for="txt_subject"></label>
                    <input type="text" name="txt_subject" id="txt_subject" class="form-control" required autocomplete="off" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btn_submit" id="aa" value="Save" class="btn btn-primary" />
                    <input type="reset" name="ff2" id="ff2" value="Cancel" class="btn btn-secondary" />
                </td>
            </tr>
        </table>
    </form>

    <p>&nbsp;</p>
    <table class="table table-bordered" align="center" cellpadding="10">
        <tr>
            <th>sl.no</th>
            <th>Board</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_subject s inner join tbl_class p on s.class_id=p.class_id inner join tbl_board b on s.board_id=b.board_id";
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["board_name"] ?></td>
                <td><?php echo $row["class_name"] ?></td>
                <td><?php echo $row["subject_name"] ?></td>
                <td><a href="subject.php?bid=<?php echo $row["subject_id"] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

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
</script>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush(); 
?>