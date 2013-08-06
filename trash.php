<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TRASH-<?php echo $_SESSION['usr'];?></title>
<?php

include("connet.php");
if($_SESSION['conf']==0)
	header("location:signin.php");
function write($chkst)
{
if($chkst==1)
	echo" checked>";
else
	echo">";
}
if(isset($_REQUEST['s4']))
				$a=1;
else if(isset($_REQUEST['s5']))
				$a=0;
if(isset($_REQUEST['s1']))
{
$_SESSION['conf']=1;
$_SESSION['usr']='';
header("location:signin.php");
}
?>


</head>

<body>
<h1>TRASH</h1>
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
    <td width="90%" align="left" valign="top"><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0">
        <tr>
          <th width="5%" scope="col">&nbsp;</th>
          <th width="17%" scope="col">From</th>
          <th width="24%" scope="col">Subject</th>
          <th width="16%" scope="col">Date</th>
          <th width="38%" scope="col">Message</th>
        </tr>
		
		<?php
			$to1=$_SESSION['usr'];
			$qry="select * from tblmail2 where to1='$to1' and TS=1 ";
			$result=mysql_query($qry);
			while($row=mysql_fetch_array($result))
			{
		
		?>
		
        <tr>
          <td><input type="checkbox"  name="chk[]" value="<? php echo $row['id']; ?>" <?php write($a); ?></td>
          <td><?php echo $row['from1']; ?></td>
          <td><?php echo $row['sub']; ?></td>
          <td><?php echo $row['date']; ?></td>
          <td><?php echo $row['msg']; ?></td>
        </tr>
		<?php
		}
		if(isset($_REQUEST['s6']))
		{
		foreach($_REQUEST['chk'] as $ch)
		{$qry="delete from tblmail2 where id='$ch' ";
		mysql_query($qry);
		
		
		}
		$a=0;
		header("location:trash.php");
		}
		?>
      </table>
	  
        <label>
        <input name="s4" type="submit" id="s4" value="Select All" />
        </label>
        <label>
        <input name="s5" type="submit" id="s5" value="Unselect All" />
        </label>
        <label>
        <input type="submit" name="s6" id="s6" value="Delete Selected Forever" />
        </label>
    </form>
    </td>
  </tr>
</table>
</body>
</html>
