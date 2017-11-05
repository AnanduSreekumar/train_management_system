<?php



session_start();
# constants
	$DATABASE = "tms"; 
	$TRAIN_TABLE = "train";
	$STATION_TABLE = "station";
	$SF_STOP_THRESHOLD = 5;

	# inputs

	$train_no = $_POST["trainid"];
	$train_name = $_POST["trainname"];
	$train_source = $_POST['src'];
	$train_dest = $_POST['dst'];
	$train_count = $_POST['count'];
	$train_type = !empty($_POST["traintype"]) ? $_POST["traintype"] : null;
	$train_distance = $_POST['distance'];	
$usernam = $_SESSION['uid'];
	# init table
	$con = @mysql_connect('localhost', 'root', "",$DATABASE) or die(mysql_error());
	mysql_select_db($DATABASE,$con) or die(mysql_error());

	/* validating form fields */

	# empty fields
	if ($train_no == ""
		|| $train_name == ""
		|| $train_source == ""
		|| $train_dest == ""
		|| $train_count == ""
		|| $train_type == ""
		|| $train_distance == "") {
		printerr("Empty fields!");
		return;
	}	

	# duplicate entry	
	$query = "select * from $TRAIN_TABLE where number = $train_no";
	$result = mysql_query($query, $con) or die(mysql_error());
	if (mysql_num_rows($result) == 1) {
		printerr("This train already exists!");
		return;
    }
    
    # stations < 2
    if ($train_count < 2) {
        printerr("No. of stations can't be less than 2!");
        return;
    }

	# type threshold
	if ($train_type == "speed")
		if ($train_count > $SF_STOP_THRESHOLD) {
			printerr("Superfast expresses can't have more than $SF_STOP_THRESHOLD stops!");
			return;
		}

    # methods
	function println($message) {
    	echo "<b>Success!$message";
	}	
    function printerr($message) {
        echo "<b>Error! $message";
    }
$query = "insert into train values(
		'$train_no',
		'$train_name',
		'$train_source',
		'$train_dest',
		$train_count,
		'$train_type',
		$train_distance,
		'$usernam')";
	if(mysql_query($query,$con))
    {echo "<strong>Success: </strong>". $train_name ." was added successfully"; 

}  
else {
       

    echo "<strong>Error: </strong>" . mysql_error($con) ;
}


mysql_close($con);


    


?>



