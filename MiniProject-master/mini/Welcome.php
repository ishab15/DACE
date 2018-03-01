<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome!</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
	  <li class="tab active"><a href="#Welcome">Welcome</a></li>
	  <li class="tab "><a href="#Device">Device Information</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="Welcome">   
          <h1> Welcome  </h1>
	  
<?php
$channel=0;	
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $u_name = $_POST["user_name"]; 
    $u_lastname = $_POST["user_lastname"];
    $channel = $_POST["channel_id"];
	$flag=0;
$link = mysqli_connect("localhost", "root", "", "miniproject");
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$data = "SELECT * FROM USER";
if($result = mysqli_query($link, $data)){
    if(mysqli_num_rows($result) > 0){
		 while($row = mysqli_fetch_array($result))
		 {
           if($row['ChannelID']==$channel && $row['FirstName']==$u_name && $row['LastName']==$u_lastname)
		   {    
		 $flag=1;
		 $field=$row['FieldID'];
		 ?><h1> <?php echo $row['FirstName'] . " " . $row['LastName']; ?></h1>
		 <h3> <?php echo "Your Channel Id :  " . $row['ChannelID']; ?></h3>
		 <?php 
		 break;
		   }
           else{	
           $flag=0;		   
		   }
	}
}
}

if($flag==0)
{
print "Your Account does not exist.Plz chk your credentials...";
}
else
{
	
}
}
?>
		<form action="Details.php" method="GET">
		<input type="hidden" name="channelid" value="<?php echo $channel; ?>">
		<input type="hidden" name="fieldid" value="<?php echo $field; ?>"> 
		<button type="submit" class="button button-block"/>Click Here To Explore </button>
		</form>	
		  <div class="divider"></div>
		
		<div class="top-row">
		
			<p class="forgot" style="padding: 15px 0;"><a href="<?php echo "Edit.php?id=".$channel; ?>">  Profile Settings	</a></p>
		</div>
	   </div>
	   
	   <div id="Device">   
          <h1>Information</h1>
		  
	   </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="js/index.js"></script>

</body>
</html>