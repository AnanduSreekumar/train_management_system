 $fid = !empty($_POST["fid"]) ? $_POST["fid"] : null;
 -$defpassf = !empty($_POST["defpassf"]) ? $_POST["defpassf"] : null;
 +$dpassf = !empty($_POST["defpassf"]) ? $_POST["defpassf"] : null;
  $fname = !empty($_POST["fname"]) ? $_POST["fname"] : null;
  $fdob = !empty($_POST["fdob"]) ? date("Y-m-d", strtotime($_POST["fdob"])) : null;
  $faddress = !empty($_POST["faddress"]) ? $_POST["faddress"] : null;
 @@ -25,6 +25,8 @@
      die("Connection failed: " . $conn->connect_error);
  } 
  
 +$defpassf = hash('sha512', $dpassf);
 +
  // Check connection
  $sql = "INSERT INTO faculty values ('$fid','$defpassf','$defpassf','$fname', ". ($fdob==NULL ? "NULL" : "'$fdob'") .",'$faddress',$fphno,'$femail','$position');";
  if ($conn->query($sql) === TRUE) {