    <?php
    $hostname='localhost';
	$user = 'root';
	$password = '';
	@mysql_connect($hostname, $user,"");
	mysql_select_db("tms") ;
   $username=$_POST['username'];
    $password=$_POST['password'];
    $result = mysql_query("SELECT * FROM user WHERE username='$username' and password='$password'") or die(mysql_error());
    $row=mysql_fetch_array($result);
     if ($row['username']==$username && $row['password']==$password)
    { 
          
        echo '<script type="text/javascript">',
             'run();',
             '</script>' ; 
      }
      else
      {
    $error = "Your Login Name or Password is invalid";
    }
 
    ?>
