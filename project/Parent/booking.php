<?php
ob_start();
include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" style="margin-top:150px;">
    <tr>
      <th >Board</th>
      <td><label for="r2"></label>
        <select name="r" id="r2">
        </select></td>
    </tr>
    <tr>
      <th >Class</th>
      <td><label for="rr"></label>
        <select name="rr" id="rr">
        </select></td>
    </tr>
    <tr>
      <th>Subject</th>
      <td><label for="q"></label>
        <input type="text" name="q" id="q" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"> <input type="submit" name="w" id="w" value="book now" />
        <input type="submit" name="ww" id="ww" value="cancel" />
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p></p>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
include("Footer.php");
ob_flush();
?>