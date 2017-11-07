<?php

session_start();

/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id  =$_POST["stationid"];
$name= $_POST["stationname"];
$loc = !empty($_POST["stationloc"]) ? $_POST["stationloc"] : null;
$usernam =$_SESSION['uid'];

$sql = "INSERT INTO station ".
               " (id, name, loc, user)"."VALUES ".
               "('$id', '$name', '$loc','$usernam')";
if ($conn->query($sql) === TRUE) {
    
   // echo "successfull";
      
    echo "<strong>Success: </strong>". $name ." was added successfully";
} else {
       
    echo "<strong>Error: </strong>". $conn->error;
}

$conn->close();
*/
# constants
	$DATABASE = "tms"; 
	$TRAIN_TABLE = "train";
	$STATION_TABLE = "station";
	$SF_STOP_THRESHOLD = 5;	

	# inputs (train)
$train_no = $_POST['numbermod'];
$train_count = $_POST['countmod'];
	$usernam =$_SESSION['uid'];	

	# init table
	$con = @mysql_connect('localhost', 'root', "",$DATABASE) or die(mysql_error());
	mysql_select_db($DATABASE,$con) or die(mysql_error());



	for ($i = 0; $i < $train_count; $i++) {

		# inputs (station) (contd.)
        $station_id = $_POST["id_$i"];
		$station_name = $_POST["station_name_$i"];
		$arival_time = $_POST["arrival_time_$i"];
		$departure_time = $_POST["departure_time_$i"];
		$platform = $_POST["platform_$i"];

		# empty fields
		if ($station_name == ""
			|| $arival_time == ""
			|| $departure_time == ""
			|| $platform == "") {
		printerr("Empty fields!");
		# deletion of duplicate records (x2)
		/*$query = "delete from station where train_no = '$train_no'";
		mysql_query($query, $con) or die(mysql_error());
		$query = "delete from train where number = '$train_no'";
		mysql_query($query, $con) or die(mysql_error());*/
		return;
		}
		/*
		# duplicate curr entry	
		$query = "select * from $STATION_TABLE where train_no = $train_no and station_name = \"$station_name\"";
		$result = mysql_query($query, $con) or die(mysql_error());
		if (mysql_num_rows($result) == 1) {
			printerr("This station has already been added for this train!");
			# deletion of duplicate records (x2)
			$query = "delete from station where train_no = '$train_no'";
			mysql_query($query, $con) or die(mysql_error());
			$query = "delete from train where number = '$train_no'";
			mysql_query($query, $con) or die(mysql_error());
			return;
		}
*/
		# +/- 1H condition
		$src_sec = mysql_fetch_row(mysql_query("select time_to_sec(\"$arival_time\")", $con))[0];
		$query = "select train_no, time_to_sec(arrival_time) from $STATION_TABLE where station_name = \"$station_name\"";
		$result = mysql_query($query, $con) or die(mysql_error());
		if (mysql_num_rows($result) != 0)
			while (($r=mysql_fetch_row($result)) != NULL) {
				$diff = $src_sec - $r[1];
				if ($diff <= 3600 && $diff >= -3600) {
					printerr("Train $r[0] exists in a +/- 1H bracket! Kindly deploy the train at a later time.");
					# deletion of duplicate records (x2)
					/*$query = "delete from station where train_no = '$train_no'";
					mysql_query($query, $con) or die(mysql_error());
					$query = "delete from train where number = '$train_no'";
					mysql_query($query, $con) or die(mysql_error());*/
					return;
				}			
			}
		
		# insertion	(station)
		$query = "insert into station values(
        '$station_id',
			$train_no,
			'$station_name',
			'$arival_time',
			'$departure_time',
			$platform,
            '$usernam'
            )";
		mysql_query($query,$con) or die(mysql_error());	
	}	

	println("Station details updated in database.");

	// if (mysql_num_rows($result) != 0) {
	// 	while(($r=mysql_fetch_row($result)) != NULL) {
	// 		time
	// 	}
	// }
	

	// println("Insert successful");=

	# methods
	function println($message) {
		echo "<b>Success!</b>$message";
	}	
	function printerr($message) {
		echo "<b>Error!</b>$message";
	}

    


?>


