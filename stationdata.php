<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT number  FROM train";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

   
    // output data of each row
    while($roww = $result->fetch_assoc()) {

            echo"<h3><b>Train  No :</b>". $roww["number"]."</h3>";
         
        
        $sqll = "SELECT  station_name, arrival_time , departure_time,	platform , user  FROM station where train_no =" .$roww["number"];
         $resultt = $conn->query($sqll);
        if ($resultt->num_rows > 0) {
                echo "<table><tr><th>Station Name</th><th>Arrival Time</th><th>Departure Time</th><th>Platform</th><th>Last modified user</th></tr>";
             while($row = $resultt->fetch_assoc()) {
                        echo "<tr><td>" . $row["station_name"]. "</td><td>" . $row["arrival_time"]. " </td><td>" . $row["departure_time"]. " </td><td>" . $row["platform"]. " </td><td>" . $row["user"]. " </td></tr>";
                 
             }
             echo "</table>";
        }
         else {
    echo "<h4>No Data entered</h4>";
}

 
   
   
}
}else {
    echo "0 results";
}

$conn->close();
        ?>