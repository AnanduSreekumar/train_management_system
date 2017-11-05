 <?php
     session_start();
?>

<!--  Made for OSP Project, 2017-->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script>
     $(function () {
         
         console.log("start");

$('#formadd,#formaddstat,#formmodify,#formdelete,#deletestat,#formmodifystat').on("submit",function(event){
    console.log("entered");
   event.preventDefault();
   $form=$(this);

    $.ajax({
            type: 'post',
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function (response) {
              $( '#uploadtext1,#display_delete,#ne' ).html(response);
              $( '#uploadtext' ).html(response);
               $( '#modifytext' ).html(response);
            }
          });
    
});
       $( "#trainidstat" ).keyup(function(event){
    console.log("enteredstat");
   event.preventDefault();
   $form=$(this);

    $.ajax({
            type: 'post',
            url: 'loaddatastatadd.php',
            data: $form.serialize(),
            success: function (response) {
          
         $('#showform').html(response);
                
              
    } 
                           

            })
          });
    
         $( "#trainidstatmod" ).keyup(function(event){
    console.log("enteredstat");
   event.preventDefault();
   $form=$(this);

    $.ajax({
            type: 'post',
            url: 'loaddatastat.php',
            data: $form.serialize(),
            success: function (response) {
          
         $('#showformmod').html(response);
                
              
    } 
                           

            })
          });
$( "#traindataform" ).hover(function(event){
    console.log("enteredtraindata");
   event.preventDefault();
   $form=$(this);

    $.ajax({
            type: 'post',
            url: 'traindata.php',
            data: $form.serialize(),
            success: function (response) {
            
             
        $('#traindataform').html(response);
  
        
    }
                           

            });
          });
    
        
         
$( "#trainidmod" ).keyup(function(event){
    console.log("entered");
   event.preventDefault();
   $form=$(this);

    $.ajax({
            type: 'post',
            url: 'loaddata.php',
            data: $form.serialize(),
            success: function (response) {
            
                try {
         var a=JSON.parse(response);
              $("#namemod").val(a[0].name);console.log(a[0].name);
                     $("#srcmod").val(a[0].src_station);
                     $("#dstmod").val(a[0].dst_station);
                     $("#distancemod").val(a[0].distance);
                    $('#display_info').html('');
              //$('#typemod option[value="'+a[0].type+'"]').attr("selected", "selected");
                $('#traintypemod option[value="'+a[0].type+'"]').prop('selected', 'selected').change();
    } catch (e) {
        $('#display_info').html('<p>'+response+'</p>');
    }
                           

            }
          });
    
});         
});
         
 
 
      </script>

<meta name="viewport" content="width=device-width, initial-scale=1">
 

     <link rel="stylesheet" type="text/css" href="css/a.css"> 
   
  
	

	<link class="anz-circle" rel="icon" href="img/logo.png">

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">

	<link rel="stylesheet" type="text/css" href="CSS/font-awesome.min.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

<link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>

<title>Train Management System</title>

<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
 
</head>

<body class="" style="background-color:#80797b;">
<div class="anz-display-middle   anz-padding anz-white" id="splashscreen"
       style="   height:100%; width: 100%; background: #000;">
     
<video preload="preload" id="video" autoplay="autoplay"  muted src="others/train.mp4">


 </video>
  
<div class="anz-display-middle" style="width:39%">
     <div class="anz-animate-zoom">
         
        <img class="anz-image     anz-display-middle
                      " src="img/logo.png"  alt="Architecture" width="60%" height="60%">
  



          </div>
    
          </div>
 </div>  
<div class="anz-top  " style="background-color: " >
  <div class="anz-bar anz-black anz-wide " style="background-color: #90CAF9; width:100%;">
      <div href="#home" class="anz-animate-left anz-bar-item anz-wide" style="padding-left:20px; padding-top:0px; margin:0px; padding-bottom: 0px; "> <h3><b>Train Management System</b></h3> 
  </div>
      <div id="mar"  style="display:none;  padding:0px; margin:0px;">
         <marquee   class=' anz-opacity-min re ' onmouseover="this.stop();" onmouseout="this.start();"  behavior="scroll" direction="left" style="margin-top:12px; width:35%; height:2%; margin-bottom:0px;  text-align: center; padding:0px;"><i id="ne">Welcome <?php echo $_POST['user'];  ?></i></marquee>
      </div>

    <div class="anz-right  anz-hide-small" style="padding:0px; margin:0px;" >
         
   
        <a  id="login" onclick="document.getElementById('id02').style.display='block'" style="text-decoration:none;  " class="anz-animate-top anz-bar-item anz-large anz-button"><b>Login</b></a>
 <a  id="logout"  href="logout.php" style="text-decoration:none; display: none; " class="anz-animate-top anz-bar-item anz-large anz-button"><b> Logout</b></a>

         
 <div id="dl" class=" anz-dropdown-hover" style="display:none;">
             <a style="text-decoration:none;width:150px;  " class="anz-large anz-animate-top anz-button">Database</a>
 
  <div class="anz-dropdown-content  anz-black anz-bar-block anz-card-4" style="padding-right:8px;width:230px;">
     
        <a onclick="document.getElementById('traintable').style.display='block'" style="text-decoration:none;  "class="anz-bar-item anz-button">Train</a>
      
   
 <a id="sign-out" style="text-decoration:none;  "class="anz-bar-item anz-button">Station</a>
  </div>
</div>     
    </div>   
  
       
  </div>
</div>
    <div class="anz-container " id="logo" style="display: block;  width:60%;height: 60%;  ">
        <center>
            <img class="anz-display-middle" src="img/logo.png" alt="logo"  style=" width:400px; height:400px;"class="avatar"></center>
    </div>
    <div id="id02" class="modal">
  
  <form class="modal-content animate" action = "<?php $_PHP_SELF ?>" method="post"  >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo.png" alt="logo"   style="width:100px; height:100px; "class="avatar">
    </div>

    <div class="container">
      <label><b>Email</b></label>
      <input type="text" id="user"   name="user" required>

      <label><b>Password</b></label>
      <input type="password" id="pass"   name="pass" required>
        
      <input type="submit" id="submit" name="submit"  value="submit" style="
background-color: #424242;" >Login
      <input type="checkbox" checked="checked"> Remember me
    </div>

   
  </form>
</div>
 <div id="traintable" class="modal">
     <div class="modal-content animate" id="train">
      <div class="imgcontainer">
      <span onclick="document.getElementById('traintable').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo.png" alt="logo"   style="width:100px; height:100px; "class="avatar">
    </div> 
           <center><b><h2>Train Data</h2></b></center>
           <div id="traindataform" >
              
               <form class="modal-content animate" id="traindataform" action = "traindata.php"  method="post"  ><br/> <center><b>Loading....Please wait!!</b></center>
               <br/><br/></form>
                  </div>
         <br/>
         <br/>
         <br/>
     </div>
    </div>
    
      <?//modify train pop up modal form
?>
    <div id="modtrain" class="modal">
  
  <form class="modal-content animate" id="formmodify" action = "modify.php"  method="post"  >
    <div class="imgcontainer">
      <span onclick="document.getElementById('modtrain').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo.png" alt="logo"   style="width:100px; height:100px; "class="avatar">
    </div>
      <center><b><h2>MODIFY TRAIN DATA</h2></b></center>
    <div class="container">
      <label><b>Enter Train ID to  Modify</b></label>
      <input type="text" id="trainidmod"  placeholder="Enter Train ID here to  Modify"  name="trainidmod"    required>
     
   <div id="display_info" ></div>
 <input type="text" id="namemod"  value="Loading.." name="namemod"   >
   <div style="width:100%;">
          <input type="text" id="srcmod" placeholder="Source Station" style="width:39%;" name="srcmod"  required>
          <input type="text" id="dstmod" name="dstmod" placeholder="Destination  Station" style="width:39%;" required >
          <input type="text" name="distancemod" id="distancemod" placeholder="Distance" required style="width:20%;" required> 
</div>        
 <select id="traintypemod" name="traintypemod" style="width:100%; height:50px;" >
 <option value="Passenger">PASSENGER TRAIN</option>
  <option value="goods">GOODS TRAIN</option>
   <option value="speed">SPEED TRAIN</option>       
<option value="metro">METRO TRAIN</option>
    <option value="special">SPECIAL PASSENGER TRAIN</option>

</select>

      
    <div id="modifytext" ></div>
    <br/>
 
        
      <input type="submit" id="modtrain" name="modtrain"  value="MODIFY DATA" style="
background-color: #4b3a3a;" > 
    </div>

   
  </form>
</div>
        <?//modify station pop up modal form
?>
    <div id="modstation" class="modal" style="overflow: scroll;">
  
  <form class="modal-content animate" id="formmodifystat" action = "modifystat.php"  method="post"  >
    <div class="imgcontainer">
      <span onclick="document.getElementById('modstation').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo.png" alt="logo"   style="width:100px; height:100px; "class="avatar">
    </div>
      <center><b><h2>MODIFY STATION DATA</h2></b></center>
    <div class="container">
      <label><b>Enter Train ID to  Modify Station details</b></label>
 
  
      <input type="text" id="trainidstatmod"   name="trainidstatmod" required>
     <div id="showformmod"></div>
    <br/>
    <br/>
        

   
 
        
      <input type="submit" id="modtrain" name="modtrain"  value="MODIFY DATA" style="
background-color: #4b3a3a;" > 
    </div>

   
  </form>
</div>   

 <?//delete train pop up modal form
?>
      <div id="deltrain" class="modal">
  
  <form class="modal-content animate" id="formdelete" action = "delete.php"  method="post"  >
    <div class="imgcontainer">
      <span onclick="document.getElementById('deltrain').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo.png" alt="logo"  style="width:100px; height:100px; "class="avatar">
    </div>
      <center><b><h2>DELETE TRAIN</h2></b></center>
    <div class="container">
      <label><b>Search Train id/Name </b></label>
      <input type="text" id="delete" name="delete" placeholder="Enter train id | Name" name="trainid" required>
     <br/>
    <br/>
 <div id="display_delete" ></div>
        
      <input type="submit" id="modtrain" name="modtrain"  value="DELETE DATA" style="
background-color: #4b3a3a;" > 
    </div>

   
  </form>
</div>
 <?//delete station pop up modal form
?>
  
    
    <div id="delstation" class="modal">
  
  <form class="modal-content animate"  id="deletestat" action ="deletestat.php"  method="post"  >
    <div class="imgcontainer">
      <span onclick="document.getElementById('delstation').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo.png" alt="logo"  style="width:100px; height:100px; "class="avatar">
    </div>
     

      <center><b><h2>DELETE STATION</h2></b></center>
    <div class="container">
      <label><b>Search Station id/Name </b></label>
      <input type="text" id="deletestat" name="deletestat" placeholder="Enter Station id | Name"  required>
    <br/>
    <br/>
 
        
      <input type="submit" id="submit" name="submit"  value="DELETE STATION " style="
background-color: #4b3a3a;" > 
    </div>

   
  </form>
</div>
   
 
    
    <div class="anz-container" id="sh" style="display: none; height:100%; margin-right:3.5%; margin-left:3.5%; margin-top:40px;  margin-bottom:0px; padding-bottom:0px;  ">
    <center>
    <div class="anz-row " style=" width:100%;">
  <div class="anz-col s6 " style=" padding:70px; width: 30%" >
<div class="img__wrap" onclick="document.getElementById('addtrain').style.display='block'">
         <img class=" anz-white img__img " src="img/Add%20T.png" alt="logo"  style="width:400px;   height:300px;">
     
       <div class="img__description">
    <div class="text">ADD TRAIN</div>
  </div>
      </div >

     
  </div>
  <div class="anz-col s6" style=" padding:70px; width: 30%" onclick="document.getElementById('deltrain').style.display='block'">
      <div class="img__wrap" >
         <img class=" anz-white img__img " src="img/Del%20T.png" alt="logo"  style="width:400px;   height:300px;">
     
       <div class="img__description">
    <div class="text">DELETE TRAIN</div>
  </div>
      </div >
      
  </div>
  <div class="anz-col s6" style="  padding:70px; width: 30%"  onclick="document.getElementById('modtrain').style.display='block'">
       <div class="img__wrap">
         <img class=" anz-white img__img " src="img/Train%20Modify.png" alt="logo"  style="width:400px;   height:300px;">
     
       <div class="img__description">
    <div class="text">MODIFY TRAIN</div>
  </div>
      </div >
         
  </div>
</div>
    </center>
    <center>
 <div class="anz-row" style="margin-bottom:0px; padding-bottom:10px; width:100%;">
  <div class="anz-col s6" style="padding:70px; padding-top:0px;  width: 30%"  onclick="document.getElementById('addstation').style.display='block'" >
          <div class="img__wrap">
         <img class=" anz-white img__img " src="img/Add%20S.png" alt="logo"  style="width:400px;   height:300px;">
     
       <div class="img__description">
    <div class="text">ADD STATION</div>
  </div>
      </div >
         
  </div>
  <div class="anz-col s6" style="padding:70px; padding-top:0px; width: 30%" onclick="document.getElementById('delstation').style.display='block'">
       <div class="img__wrap">
         <img class=" anz-white img__img " src="img/Del%20S.png" alt="logo"  style="width:400px;   height:300px;">
     
       <div class="img__description">
    <div class="text">DELETE STATION</div>
  </div>
      </div >
         
  </div>
  <div class="anz-col s6" style="padding:70px; padding-top:0px;  width: 30%" onclick="document.getElementById('modstation').style.display='block'">
          <div class="img__wrap">
         <img class=" anz-white img__img " src="img/Modify%20S.png" alt="logo"  style="width:400px;   height:300px;">
     
       <div class="img__description">
    <div class="text">MODIFY STATION</div>
  </div>
      </div >
         
  </div>
</div>
    </center>
        
    </div>
      <?//add station pop up modal form
?>
    <div id="addstation" class="modal" style="overflow: scroll;">
  
  <form class="modal-content animate"   action="uploadstat.php" id="formaddstat" method="post"  >
    <div class="imgcontainer">
      <span onclick="document.getElementById('addstation').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo.png" alt="logo"  style="width:100px; height:100px; "class="avatar">
    </div>
      <center><b><h2>ADD STATION</h2></b></center>
    <div class="container">
      <label><b>Train ID</b></label>
      <input type="text" id="trainidstat"   name="trainidstat" required>
     <div id="showform"></div>
    <br/>
    <br/>
        
    <input type="submit"    id="save" value="Submit" style="background-color: #741515;" >
    </div>

   
  </form>
</div>  
 
    
    <?//add train pop up modal form
?>
    <div id="addtrain" class="modal"  style="overflow: scroll;">
  
  <form class="modal-content animate"   action="upload.php" id="formadd" method="post"  >
    <div class="imgcontainer">
      <span onclick="document.getElementById('addtrain').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo.png" alt="logo" id="addtrain" style="width:100px; height:100px; "class="avatar">
    </div>
      <center><b><h2>ADD TRAIN</h2></b></center>
    <div class="container">
      <label><b>Train ID</b></label>
      <input type="text" id="trainid"   name="trainid" required>
      <label><b>Train Name</b></label>
      <input type="text" id="trainname"   name="trainname" required>
         <label><b>Train Info.</b></label>
        <div style="width:100%;">
          <input type="text" id="src" placeholder="Source Station" style="width:30%;" name="src"  required>
          <input type="text" id="dst" name="dst" placeholder="Destination  Station" style="width:30%;" required >
             <input type="text" name="count" id="count" placeholder="Station Count" style="width:16%;" required>
             <input type="text" name="distance" id="distance" placeholder="Distance" required style="width:22%;" required> 
        </div>
        
      <label><b>Train Type</b></label>
<select id="traintype" name="traintype" style="width:100%; height:50px;">
  <option value="Passenger">PASSENGER TRAIN</option>
  <option value="goods">GOODS TRAIN</option>
   <option value="speed">SPEED TRAIN</option>       
<option value="metro">METRO TRAIN</option>
    <option value="special">SPECIAL PASSENGER TRAIN</option>
</select>
        
        

    <br/>
    <br/>
        <div id="uploadtext"></div>
    <input type="submit"    id="save" value="Submit" style="
                                                    background-color: #741515;" >
    </div>

   
  </form>
</div>  
    
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 

    
  



      <script >
            
             $("#splashscreen").delay( 2500).queue(function(next) {
   
  $(this).addClass("anz-opacity").delay(100).fadeOut( "slow")
             
  next();
});   
     $(".info-text").delay(2600).queue(function(next) {
  $(this).addClass("anz-animate-left").removeClass("anz-animate-zoom").removeClass("anz-display-middle").addClass("anz-display-topleft")
  next();
}); 
              $(".info-text").delay(400).queue(function(next) {
  $(this).removeClass("anz-display-topleft").addClass("anz-hide")
   $(".ie").removeClass("anz-hide").removeClass("anz-padding")                 
  next();
}); 

    </script>



<script>
   
       function run(){
            document.getElementById('id02').style.display='none';
     document.getElementById("logout").style.display = "block";
         document.getElementById("logo").style.display = "none";
      document.getElementById("login").style.display = "none";
        document.getElementById("sh").style.display = "block";
  document.getElementById("mar").style.display = "block";
        document.getElementById("dl").style.display = "block";
     
             }
    
       function out(){
            document.getElementById('id02').style.display='block';
        document.getElementById("mar").style.display = "none";
         document.getElementById("logo").style.display = "block";
      document.getElementById("login").style.display = "block";
        document.getElementById("sh").style.display = "none";
     
        document.getElementById("dl").style.display = "none";
       document.getElementById("logout").style.display = "none";
             }
  
    </script>
    <script>
 

      
        
    
    </script>
 
       <?php
     

    $hostname='localhost';
	$user = 'root';
	$password = '';
@mysql_connect($hostname, $user,'');
	mysql_select_db("tms") ;

    
 if(isset($_POST['user']) && isset($_POST['pass'])){ check();} 
   
    

    function check(){
   
    $username = $_POST['user'];
    $password = sha1($_POST['pass']);
        
  
    
    $result = mysql_query("SELECT * FROM user WHERE username='$username' and password='$password'") or die(mysql_error());
    $row=mysql_fetch_array($result);
     if ($row['username'] == $username && $row['password'] == $password)
    { 
         $_SESSION['uid'] = $_POST['user'];
         
		 
		
          
        echo '<script type="text/javascript">',
             'run();',
            
 
             '</script>' ; 
      }
      else
      {
     echo '<script>alert("Your Login Name or Password is invalid")</script>';
    }
    }
    
        

 
 
    
    ?>

   
    <script>

var modal = document.getElementById('id02');


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    

</body>
 
   
</html>