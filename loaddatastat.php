

<?php

if( isset( $_POST['trainidstatmod'] ) )
{

$name =trim($_POST['trainidstatmod']," ") ;

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
      echo '<input type="text" name="numbermod" value="'.$name.'" style="display:none;visibility:hidden;"> 
                <input type="text" name="countmod" value="'.$row['stations'].'" style="display:none;visibility:hidden;"> ';
          for ($i = 0; $i < $row['stations']; $i++) {
             $selectdataa = "SELECT * FROM station WHERE id = '".$name.$alpha."';";
             $staa = $conn->query($selectdataa);
           
              while($sta = $staa->fetch_assoc()) {
              $c=$i+1;
                    echo '
                    <input type="text" name="idmod_'.$i.'" value="'.$name,$alpha.'" style="visibility:hidden;"> 
                    <h3>Station No.'.$c.'</h3>
                    <br >
                  <p class="option-titles">Station Name</p>
                        <input type="text" name="station_namemod_'.$i.'" value="'.$sta['station_name'].'">
                        <p class="option-titles">Arrival Time</p>
                        <input type="text" name="arrival_timemod_'.$i.'" value="'.$sta['arrival_time'].'">
                           <p class="option-titles">Departure Time</p>
                        <input type="text" name="departure_timemod_'.$i.'" value="'.$sta['departure_time'].'">
                         <p class="option-titles">Arriving Platform</p>
                        <input type="text" name="platformmod_'.$i.'" value="'.$sta['platform'].'">
                        <br >';
               $alpha++;
                }
          }
       } 
    //
} 
else {

    echo "Entered station deatails  not found in database";
	}

} 
?>