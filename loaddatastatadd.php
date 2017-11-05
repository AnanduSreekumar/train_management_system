<?php

if( isset( $_POST['trainidstat'] ) )
{

$name =trim($_POST['trainidstat']," ") ;

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'tms';
$alpha='a';
//echo $name;
    
$conn = new mysqli($host, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    

$selectdata = "SELECT * FROM train WHERE number = '".$name."';";
    

$result = $conn->query($selectdata);
if ($result->num_rows > 0) {

    $rows = array();
   while($row = $result->fetch_assoc()) {
      echo '<input type="text" name="number" value="'.$name.'" style="display:none;visibility:hidden;"> 
                <input type="text" name="count" value="'.$row['stations'].'" style="display:none;visibility:hidden;"> ';
          for ($i = 0; $i < $row['stations']; $i++) {
             
              $c=$i+1;
                    echo '
                    <input type="text" name="id_'.$i.'" value="'.$name,$alpha.'" style="visibility:hidden;"> 
                    <h3>Station No.'.$c.'</h3>
                    <br >
                  <p class="option-titles">Station Name</p>
                        <input type="text" name="station_name_'.$i.'">
                        <p class="option-titles">Arrival Time</p>
                        <input type="text" name="arrival_time_'.$i.'">
                           <p class="option-titles">Departure Time</p>
                        <input type="text" name="departure_time_'.$i.'">
                         <p class="option-titles">Arriving Platform</p>
                        <input type="text" name="platform_'.$i.'">
                        <br >';
               $alpha++;
                }
       } 
    //
} 
else {

    echo "Entered train not found";
	}

} 
?>