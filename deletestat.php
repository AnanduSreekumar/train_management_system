     <?php

session_start();

 $hostname='localhost';
	$user = 'root';
	$password = '';
@mysql_connect($hostname, $user,'');
	mysql_select_db("tms") ;


          if(isset($_POST['deletestat']) ){ 
               $iddel = $_POST['deletestat'];
             $check = mysql_query("SELECT * FROM station WHERE train_no='$iddel'") or die(mysql_error());
              $rr=mysql_fetch_array($check);
              if($rr['train_no']==$iddel){
              $result = mysql_query(" DELETE FROM station WHERE train_no='$iddel' ") or die(mysql_error());
    
     echo "Station details of Train $iddel deleted from database";
      
              }
      else{ 
      
          echo "Station details of Train $iddel does not exist in database";
      
    
      }
         
     }




    


?>

   