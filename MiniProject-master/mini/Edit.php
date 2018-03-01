<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#view">View </a></li>
        <li class="tab"><a href="#edit">Edit </a></li>
      </ul>
      
      <div class="tab-content">
        <div id="view">   
          <h1>Profile Details</h1>    
           			  
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") 
{

    $channel = $_GET["id"];
	$flag=0;
$link = mysqli_connect("localhost", "root", "", "miniproject");
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$data = "SELECT * FROM USER ";
if($result = mysqli_query($link, $data)){
    if(mysqli_num_rows($result) > 0){
		 while($row = mysqli_fetch_array($result))
		 {
           if($row['ChannelID']==$channel)
		   {    
		 $flag=1;
		 $field=$row['FieldID'];
		 ?>
		 <h3><?php echo "First Name : " . $row['FirstName'];?> </h3>
		 <h3><?php echo "Last Name : " . $row['LastName'];?></h3>
		 <h3><?php echo "Field ID : " . $row['FieldID'];?> </h3>
		 <h3><?php echo "Channel ID : " . $row['ChannelID'];?></h3>
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
{}
}
else{echo "INVALID";}
?>
			  
        </div>
        
        <div id="edit">   
          <h1>Enter Your Details</h1>
		  
          <form action="/" method="post">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off"/>
            </div>
          </div>
          <div class="field-wrap">
            <label>
              Channel Id<span class="req">*</span>
            </label>
            <input type="number"required autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            <label>
              Re-enter Channel Id<span class="req">*</span>
            </label>
            <input type="number"required autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            <label>
              Feild Number<span class="req">*</span>
            </label>
            <input type="number"required autocomplete="off"/>
          </div>
		  <div class="field-wrap">
            <label>
              Re-enter Feild Number<span class="req">*</span>
            </label>
            <input type="number"required autocomplete="off"/>
          </div>
          <div class="field-wrap" align="center">
          <button class="button button-block" align="center"/>Save</button>
		  </div>
		
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="js/index.js"></script>

</body>
</html>
