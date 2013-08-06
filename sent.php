<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SENT-<?php echo $_SESSION['usr'];?></title>
<?php
session_start();
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
<h1>SENT</h1>
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
    <td width="90%" valign="top">
	
	
	
	
	<table width="100%" border="0">
      <tr>
        <th width="14%" scope="col">To</th>
        <th width="23%" scope="col">Subject</th>
        <th width="19%" scope="col">Date</th>
        <th width="44%" scope="col">Message</th>
      </tr>
	  <?php
			$to=$_SESSION['usr'];
			$qry="select * from tblmail2 where ss=1 and from1='$to' ";
			$result=mysql_query($qry);
			while($row=mysql_fetch_array($result))
			{
		
		?>
      <tr>
        <td><?php echo $row['to1']; ?></td>
        <td><?php echo $row['sub']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['msg']; ?></td>
      </tr>
	  <?php
	  }
	  
	  ?>
    </table>
	
	
	
	
	
	</td>
  </tr>
</table>
</body>
</html>
