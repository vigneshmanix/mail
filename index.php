<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>LOGIN</title>

    <?php
    session_start();
    include("connet.php");
    $_SESSION['conf']=0;

    ?>
  </head>
  <body marginwidth="40%" marginheight="100px" >
    <h1>Login</h1><br />
    <form name="form1" method="post" action="">
      <table width="200px" border="0">
	<tr>
	  <th scope="row">Username:</th>
	  <td>
            <input name="txtuser" type="text" id="txtuser">      </td>
	</tr>
	<tr>
	  <th scope="row">Password:</th>
	  <td>
            <input name="txtpass" type="password" id="txtpass">      </td>
	</tr>
	<tr>
	  <th colspan="2" scope="row"><input name="s1" type="submit" id="s1" value="Sign In"><input name="s2" type="submit" id="s2" value="Sign Up">      
	    
	    <?php
	    if(isset($_POST['s1']))
	    {
	      
	      
	      $user=$_POST['txtuser'];
	      $pass=convert_uuencode($_POST['txtpass']);
	      
	      
	      $qry="select id from tbllogin where username='$user' and password='$pass'";
	      $result=mysql_query($qry);
	      
	      if(mysql_num_rows($result)>0)
	      { 	$_SESSION['usr']=$user;
		$_SESSION['conf']=1;
		header("location:home.php");}
	      
	      else
		echo "<br/>Wrong Combo<br/>Try Again";
	      
	    }
	    else if(isset($_POST['s2']))
	    {
	      
	      header("location:reg.php");
	    }
	    
	    ?>
	    
	    
	    
	  </th>
	</tr>
      </table>
    </form>


  </body>
</html>
