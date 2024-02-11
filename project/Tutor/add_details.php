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
<table width="371" border="1" align="center" style="margin-top:150px;" cellpadding="10">
  <tr>
    <th width="92" scope="row">board</th>
    <td width="263">
      <input type="checkbox" name="e" id="e" />
      <label for="e"></label>
    cbse
    <input type="checkbox" name="g" id="g" />
    <label for="g"></label>
    icse
    <input type="checkbox" name="state" id="state" />
    <label for="state">state</label>
    </td>
  </tr>
  <tr>
    <th scope="row">classes</th>
    <td>
      <label for="f"></label>
      <textarea name="f" id="f" cols="45" rows="5"></textarea>
    </td>
  </tr>
  <tr>
    <th scope="row">subjects</th>
    <td>      <label for="s"></label>
      <textarea name="s" id="s" cols="45" rows="5"></textarea>
    </td>
  </tr>

  <tr >
    <td colspan="2">
      <input type="submit" name="save" id="save" value="Save" />
      <input type="submit" name="re" id="re" value="cancel" />
    </td>
  </tr>
</table>
</body>
</html>
<?php 
include("Footer.php");
ob_flush();
?>