<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
  
</head>

<body>

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Enter Your Details!</h1>
<?php
  if (isset($_POST['start'])) {
	$u_name = $_POST["user_name"]; 
    $u_lastname = $_POST["user_lastname"];
    $field = $_POST["field_id"];
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
           if($row['ChannelID']==$channel)
		   {    
		 $flag=1;
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
$sql = "INSERT INTO USER VALUES ('$u_name', '$u_lastname', '$channel', '$field')";
if(mysqli_query($link, $sql))
{
	echo "<script type='text/javascript'>alert('Successsful!')</script>";
} 
else{
	echo "<script type='text/javascript'>alert('Failed!')</script>";
}
 mysqli_close($link);
 }
else
{
echo "<script type='text/javascript'>alert('Channel ID already Exist...!')</script>";
}
  }
?>
          <form action="" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="user_name" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="user_lastname" required autocomplete="off"/>
            </div>
          </div>
          
          <div class="field-wrap">
            <label>
              Channel Id<span class="req">*</span>
            </label>
            <input type="number" name="channel_id" required autocomplete="off"/>
          </div>
		  
		  <div class="field-wrap">
            <label>
              Field Number<span class="req">*</span>
            </label>
            <input type="number" name="field_id" required autocomplete="off"/>
          </div>  		  
          <button type="submit" name="start" class="button button-block"/>Get Started</button>
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form method="post" action="Welcome.php">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="user_name" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="user_lastname" required autocomplete="off"/>
            </div>
          </div>
          <div class="field-wrap">
            <label>
              Channel Id<span class="req">*</span>
            </label>
            <input type="number" name="channel_id" required autocomplete="off"/>
          </div>
          <div class="field-wrap" align="center">
          <button type="submit" class="button button-block" align="center"/>Log In</button>
		  </div>
		
			<p class="forgot" style="padding: 15px 0;"><a href="Help.html"> Need Help?	</a></p>
		
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="js/index.js"></script>

</body>
</html>
