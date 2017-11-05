<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$idd  =$_POST["trainidmod"];

$usernam =$_SESSION['uid'];

if($_POST["namemod"]!="Loading.." ){
$sql = "UPDATE train set name='" . $_POST["namemod"] . "',src_station='" . $_POST["srcmod"] . "',dst_station='" . $_POST["dstmod"] . "', distance='" . $_POST["distancemod"] . "',type='" . $_POST["traintypemod"] . "', user='" .$usernam  ."' WHERE number='" . $idd . "'";
if ($conn->query($sql) === TRUE) {
   echo "<strong>Success: </strong>". $_POST["namemod"]." was updated successfully";
} 
    
    else {
       
    echo "<strong>Error: </strong>". $conn->error;
}
}
else
{echo "enter valid train id";}
$conn->close();



    


?>


