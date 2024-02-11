
<?php
ob_start();
include("../assets/connection/connection.php");
session_start();
include("Header.php");

if(isset($_POST["btn_submit"]))
{
	$class=$_POST["txt_class"];
	$board=$_POST["sel_board"];
	$subject=$_POST["txt_subject"];
	$description=$_POST["txt_des"];
	$video=$_FILES['video']['name'];
	$path1=$_FILES['video']['tmp_name'];
	move_uploaded_file($path1,"../assets/files/tutor/".$video);
	
	
	 $ins="insert into tbl_uploadvideo(upload_video,upload_description,tutorsubject_id)values('$video','$description','".$_GET['sid']."')";
  //echo $ins;
   mysql_query($ins);
  
	
}



if($_GET["fid"])
{
$fid=$_GET["fid"];
$delQry="delete from tbl_uploadvideo where upload_id='$fid'";
mysql_query($delQry);
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" enctype="multipart/form-data">
<table  border="1" align="center" style="margin-top:150px;" cellpadding="10" style="border-collapse: collapse;">
  <tr>
    <th scope="row">board</th>
    <td>
      <label for="s"></label>
      
      <label for="s2"></label>
      <select name="sel_board" id="s2">
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
    <th scope="row">class</th>
    <td>
      <label for="txt_class"></label>
     
      <select name="txt_class" id="dd" onchange="getSubject(this.value,document.getElementById('s2').value)">
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

        </select>
      </select>
    </td>
  </tr>
  <tr>
    <th scope="row">subject</th>
    <td>
      <label for="txt_sub"></label>
      
       
        <select name="txt_subject" id="txt_subject">
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

        </select>
      </select>
    </td>
  </tr>
  <tr>
    <th scope="row">video</th>
    <td><label for="gh"></label>
      <input type="file" name="video" id="gh" />
      
    </td>
  </tr>
  <tr>
    <th scope="row">description</th>
    <td>
      <label for="j"></label>
      <textarea name="txt_des" id="j" cols="45" rows="5"></textarea>
    </td>
  </tr>


  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="s" value="Submit" />
      <input type="reset" name="c" id="c" value="cancel" />
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</form>
<table border="1" align="center"  cellpadding="10">


  <tr></tr>
  <tr></tr>
  <tr>
    <th>sl_no</th>
    <th>board</th>
    <th>class</th>
    <th>subject</th>
    <th>video</th>
    <th>description</th>
    <th>action</th>
  </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_uploadvideo up inner join tbl_tutorsubjects ts on ts.tutorsubject_id=up.tutorsubject_id inner join tbl_subject s on s.subject_id=ts.subject_id inner join tbl_class  cl on cl.class_id=s.class_id inner join tbl_board bd on bd.board_id=s.board_id where ts.tutor_id='".$_SESSION["tid"]."'";
	//echo $selQry;
  $data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
        <td><?php echo $row["board_name"]; ?></td>
         <td><?php echo $row["class_name"]; ?></td>
         <td><?php echo $row["subject_name"]; ?></td>
         <td><video  controls ><source src="../assets/files/tutor/<?php echo $row["upload_video"]; ?>"></video></td>
       <td><?php echo $row["upload_description"]; ?></td>
      
      <td><a href="upload_video.php?fid=<?php echo $row["upload_id"]?>">delete</a></td>
    </tr>
    <?php
	}
	?>
</table>
<p>&nbsp;</p>
</body>
<script src="../assets/JQ/jQuery.js"></script>
<script>
function getSubject(cid,bid)
{
	var bid=
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