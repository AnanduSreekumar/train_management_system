     <?php

session_start();

 $hostname='localhost';
	$user = 'root';
	$password = '';
@mysql_connect($hostname, $user,'');
	mysql_select_db("tms") ;


          if(isset($_POST['delete']) ){ 
               $iddel = $_POST['delete'];
             $check = mysql_query("SELECT * FROM train WHERE number='$iddel' or name='$iddel'") or die(mysql_error());
              $rr=mysql_fetch_array($check);
              if($rr['number']==$iddel || $rr['name']==$iddel){
              $result = mysql_query(" DELETE FROM train WHERE number='$iddel' or name='$iddel'") or die(mysql_error());
    
     echo "Train  $iddel deleted from database";
      
              }
      else{ 
      
          echo "Train  $iddel does not exist in database";
      
    
      }
         
     }




    


?>

   