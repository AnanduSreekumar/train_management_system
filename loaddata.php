<?php

if( isset( $_POST['trainidmod'] ) )
{

$name = $_POST['trainidmod'];

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'tms';

//echo $name;
    
$conn = new mysqli($host, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    

$selectdata = "SELECT * FROM train WHERE number = '".$name."';";
    

$result = $conn->query($selectdata);
if ($result->num_rows > 0) {

	
    // output data of each row
    $rows = array();
   while($row = $result->fetch_assoc()) {
       $rows[] = $row;
    } 
    //print_r($rows);

    echo json_encode($rows);

} else {

    echo "Entered train not found";
	}

} 
?>