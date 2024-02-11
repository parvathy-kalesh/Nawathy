
<?php
ob_start();
include("../assets/connection/connection.php");
session_start();
include("Header.php");
$board="";
$class="";
$subject="";
if(isset($_POST["btn_submit"]))
{
	$subject=$_POST["txt_subject"];
	 $ins="insert into tbl_tutorsubjects(subject_id,tutor_id,subject_rate)values('$subject','".$_SESSION['tid']."','".$_POST["txtrate"]."')";
	mysql_query($ins);
             
			  
			   
}
if($_GET["sid"])
 {
	 $sid=$_GET["sid"];
	 $delQry="delete from tbl_subject where subject_id='$sid'";
	 mysql_query($delQry);
	 
 }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="background-image: url('../assets/Template/Main/images/tmysubject2.jpg'); background-size: cover; background-attachment: fixed;">>
<form id="form1" name="form1" method="post" action="">
  <table border="1"  align="center" style="margin-top:150px;" cellpadding="10" style="border-collapse: collapse;">
    <tr>
      <th>Board</th>
      <td><label for="ff2"></label>
        <select name="sel_board" id="sel_board" required="" >
        <option value="">--select--</option>
        <?php
		$selQry="select * from tbl_board";
		$data=mysql_query($selQry);
        while($row=mysql_fetch_array($data))
		
        {
			?>
        <option value="<?php echo  $row["board_id"]?>"><?php echo $row["board_name"]?></option>
		<?php
		}
		?>

        
        
        </select></td>
    </tr>
    <tr>
      <th>Class</th>
      <td><label for="dd"></label>
        <select name="txt_class" id="dd" onchange="getSubject(this.value,document.getElementById('sel_board').value)" required="">
        <option value="">---select--</option>
        <?php
		$selQry="select * from tbl_class";
		$data=mysql_query($selQry);
        while($row=mysql_fetch_array($data))
		
        {
			?>
        <option value="<?php echo  $row["class_id"]?>"><?php echo $row["class_name"]?></option>
		<?php
		}
		?>

        </select></td>
    </tr>
    <tr>
      <th >Subject</th>
      <td><label for="txt_subject"></label>
        <select name="txt_subject" id="txt_subject" required="">
        <option value="">---select--</option>
     <?php
		$selQry="select * from tbl_subject";
		$data=mysql_query($selQry);
        while($row=mysql_fetch_array($data))
		
        {
			?>
        <option value="<?php echo  $row["subject_id"]?>"><?php echo $row["subject_name"]?></option>
		<?php
		}
		?>   

        </select></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><input type="text" name="txtrate" id="" required=""></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="save" />
        <input type="reset" name="ff2" id="ff2" value="cancel" /></td>
    </tr>
  </table>
  </form>

  <p>&nbsp;</p>
  <table  border="1" align="center" cellpadding="10">
    <tr>
      <th>sl.no</th>
      <th>Board</th>
      <th>Class</th>
      <th>Subject</th>
      <th>Action</th>
    </tr>
     <?php
	$i=0;
	$selQry="select * from tbl_tutorsubjects s inner join tbl_subject sj on s.subject_id = sj.subject_id inner join tbl_board b on sj.board_id=b.board_id inner join  tbl_class c on  sj.class_id=c.class_id where s.tutor_id = ".$_SESSION['tid'];
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row["board_name"]; ?></td>
      <td><?php echo $row["class_name"];?></td>
      <td><?php echo $row ["subject_name"];?></td>
      <td><a href="MySubject.php?sid=<?php echo $row["subject_id"]?>">delete</a> | <a href="upload_video.php?sid=<?php echo $row["tutorsubject_id"]?>">Upload Materials</a>| <a href="batch.php?sid=<?php echo $row["tutorsubject_id"]?>">Add Batches</a></td>
    </tr>
      <?php
	}
	?>
  </table>
  <p></p>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
<p>&nbsp;</p>
</body>



<script src="../assets/JQ/jQuery.js"></script>
<script>
function getSubject(cid,bid)
{
	
	$.ajax({
		url:"../assets/ajaxpages/AjaxSubject.php?cid="+cid+"&bid="+bid,
		success: function(html){
			$("#txt_subject").html(html);
		}
	});
}

</script>
</html>
<?php 
include("Footer.php");
ob_flush();
?>