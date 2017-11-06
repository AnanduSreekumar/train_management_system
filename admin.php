    <?php
    $hostname='localhost';
	$user = 'root';
	$password = '';
	@mysql_connect($hostname, $user,"");
	mysql_select_db("tms") ;
   $username=$_POST['useradd'];
    $password=sha1($_POST['passadd']);
$query = "insert into user values(
		'$username',
		'$password')";
   
    
     if (mysql_query($query))
    { 
          
        echo "$username added into  database"; 
      }
      else
      {
    echo mysql_error(); 
    }
 
    ?>
