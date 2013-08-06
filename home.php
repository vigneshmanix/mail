<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>HOME-<?php echo $_SESSION['usr'];?></title>
<?php

include("connet.php");
if($_SESSION['conf']==0)
	header("location:signin.php");
if(isset($_REQUEST['s1']))
{
$_SESSION['conf']=0;
$_SESSION['usr']='';
header("location:signin.php");
}
?>
<link href="mailstyle.css" type="text/css" rel="stylesheet" />

</head>

<body>
<h1>WELCOME</h1>


<div class="left">
	<a href="home.php">Home</a><br/><br/>
	<a href="compose.php">Compose</a><br/><br/>
	<a href="inbox.php">Inbox</a><br/><br/>
	<a href="sent.php">Sent</a><br/><br/>
	<a href="draft.php">Drafts</a><br/><br/>
	<a href="trash.php">Trash</a><br/><br/>
	<form id="form1" name="form2" method="post" action="">
	  <input type="submit" name="s1" id="s1" value="Log Out" />
        </form>	
</div>
<div class="other">
	<h2>Welcome <?php echo $_SESSION['usr'];?></h2>

</div>
</body>
</html>
