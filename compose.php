<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>COMPOSE-<?php echo $_SESSION['usr'];?></title>
<?php
include("connet.php");
if($_SESSION['conf']==0)
	header("location:signin.php");
if(isset($_REQUEST['s1']))
{
$_SESSION['conf']=1;
$_SESSION['usr']='';
header("location:signin.php");
}
?>


</head>

<body>
<h1>COMPOSE</h1>
<table width="100%" border="0">
  <tr>
    <td width="10%">
	<a href="home.php">Home</a><br/><br/>
	<a href="compose.php">Compose</a><br/><br/>
	<a href="inbox.php">Inbox</a><br/><br/>
	<a href="sent.php">Sent</a><br/><br/>
	<a href="draft.php">Drafts</a><br/><br/>
	<a href="trash.php">Trash</a><br/><br/>
	<form id="form1" name="form2" method="post" action="">
	<input type="submit" name="s1" id="s1" value="Log Out" /></form>    </td>
    <td width="90%" align="left" valign="top">
	
	
	
	  <form id="form1" name="form1" method="post" action="">
	  <table width="100%" border="0">
      <tr>
        <td width="10%">From:</td>
        <td width="90%"><?php echo $_SESSION['usr']; ?></td>
      </tr>
      <tr>
        <td>To:</td>
        <td>
          <input name="t1" type="text" id="t1" />
        </td>
      </tr>
      <tr>
        <td>Subject:</td>
        <td>
          <input name="t2" type="text" id="t2" />
        </td>
      </tr>
      <tr>
        <td>Message</td>
        <td>
          <textarea name="t3" id="t3" ></textarea>
        </td>
      </tr>
    </table>
	
	  <input name="s2" type="submit" id="s2" value="Send" />
	  <input name="s3" type="submit" id="s3" value="Save" />
	  <?php
	  if(isset($_REQUEST['s2']))
	  	{
	  		$from=$_SESSION['usr'];
			$to=$_REQUEST['t1'];
			$sub=$_REQUEST['t2'];
			$date=date('M-j G:i:s');
			$msg=$_REQUEST['t3'];
	  		mysql_query("insert into tblmail2 values('$from','$to','$sub','$date','$msg',1,0,0,null)");
			if(mysql_affected_rows()>=1)
				echo "<br/>Successful!<br/>Message Sent";
			else
				echo "<br/>Failed<br/>Please try again";
		}
		else if(isset($_REQUEST['s3']))
	  	{
	  		$from=$_SESSION['usr'];
			$to=$_REQUEST['t1'];
			$sub=$_REQUEST['t2'];
			$date=date('M-j G:i:s');
			$msg=$_REQUEST['t3'];
	  		mysql_query("insert into tblmail2 values('$from','$to','$sub','$date','$msg',0,1,0,null)");
			if(mysql_affected_rows()>=1)
				echo "<br/>Successful!<br/>Message Saved";
			else
				echo "<br/>Failed<br/>Please try again";
		}
	  ?>
	  </form>
	
	
	
	</td>
  </tr>
</table>
</body>
</html>
