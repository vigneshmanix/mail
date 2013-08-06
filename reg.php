<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Register</title>
<?php

include("connet.php");

?>
</head>
<body marginwidth="40%" marginheight="100px">
<h1>Register</h1><br />
<form name="form1" method="post" action="">
<table width="20%" border="0">
  <tr>
    <th scope="row">Username:</th>
    <td><input name="t1" type="text" id="t1" />
    </td>
  </tr>
  <tr>
    <th scope="row">Password:</th>
    <td><input name="t2" type="password" id="t2" /></td>
  </tr>
  <tr>
    <th scope="row">Qualification:</th>
    <td>
      <input name="chk1" type="checkbox" id="chk1" value="10th PASS" >10th PASS</input><br />
	  <input name="chk2" type="checkbox" id="chk2" value="12th PASS" >12th PASS</input><br />
	  <input name="chk3" type="checkbox" id="chk3" value="UG" >UG</input><br />
	  <input name="chk4" type="checkbox" id="chk4" value="PG" >PG</input>
    </td>
  </tr>
  <tr>
    <th scope="row">Gender:</th>
    <td>
        <input name="rg1" type="radio" value="Male" checked="checked" />
        Male</label>
      <br />
      <label>
        <input type="radio" name="rg1" value="Female" />
        Female</label>
      <br />
    </td>
  </tr>
  <tr>
    <th colspan="2" scope="row">
      <input name="reg" type="submit" id="reg" value="Register" />
	  <?php
	  if(isset($_POST['reg']))
	  {
	  		if(isset($_POST['chk4']))
				$a=$_POST['chk4'];
			else if(isset($_POST['chk3']))
				$a=$_POST['chk3'];
			else if(isset($_POST['chk2']))
				$a=$_POST['chk2'];
			else if(isset($_POST['chk1']))
				$a=$_POST['chk1'];
			else
				$a="no qual";
			$b=convert_uuencode($_POST['t2']);
			$c=$_POST['t1'];
			$d=$_POST['rg1'];
			mysql_query("insert into tbllogin values('$c','$b','$a','$d',null)");
			if(mysql_affected_rows()>=1)
				echo "<br/>Successful!<br/><a href='signin.php'>Click here</a> to login";
			else
				echo "<br/>Failed<br/>Please try again";
		}
	  
	  
	  ?></th>
    </tr>
</table>
</form>
</body>
</html>