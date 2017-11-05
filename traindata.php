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

$sql = "SELECT number, name, src_station ,	dst_station,stations, type , distance ,user FROM train";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Train ID</th><th>Name</th><th>Source</th><th>Destination</th><th>Type</th><th>Distance</th><th>Station</th><th>Last modified user</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["number"]. "</td><td>" . $row["name"]. " </td><td>" . $row["src_station"]. " </td><td>" . $row["dst_station"]. " </td><td>" . $row["type"]. " </td><td>" . $row["distance"]. " </td><td>" . $row["stations"]. " </td><td>" . $row["user"]. " </td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
        ?>