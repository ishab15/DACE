<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Details</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab "><a href="#Chart">Temperature Analysis</a></li>
		<li class="tab "><a href="#Motor">Motor Control</a></li>
      </ul>
      
      <div class="tab-content">
        
		
	<div id="Chart"  align="center">   
         <iframe width="450" height="250" style="border: 1px solid #cccccc;" src="<?php echo "http://thingspeak.com/channels/".$_GET['channelid']."/charts/".$_GET['fieldid']; ?>"></iframe>
    </div>
		
		<div id="Motor" >
		<div class="form">
		<h1>Motor Control</h1>
	       
		<div class="top-row">
			<button id="11" class="led" style="display: block;width: 100%; border: 0; outline: none; border-radius: 0; 
			padding: 15px 0; font-size: 1rem; font-weight: 600;
			text-transform: uppercase; letter-spacing: .1em; background: #1ab188; color: #ffffff; margin-right: 15px;
			-webkit-transition: all 0.5s ease; transition: all 0.5s ease; -webkit-appearance: none;">
			High Speed  </button> <!-- BUTTON FOR Pin 11 -->	
		</div>
		
		<div class="divider"></div>
		
		<div class="top-row">
			<button id="12" class="led" style="display: block;width: 100%; border: 0; outline: none; border-radius: 0; 
			padding: 15px 0; font-size: 1rem; font-weight: 600;
			text-transform: uppercase; letter-spacing: .1em; background: #1ab188; color: #ffffff; margin-right: 15px;
			-webkit-transition: all 0.5s ease; transition: all 0.5s ease; -webkit-appearance: none;">
			Low Speed   </button> <!-- BUTTON FOR Pin 11 -->	
		</div>
		
		<div class="divider"></div>
		
		<div class="top-row">
			<button id="13"  class="led"  style="display: block;width: 100%; border: 0; outline: none; border-radius: 0; 
			padding: 15px 0; font-size: 1rem; font-weight: 600;
			text-transform: uppercase; letter-spacing: .1em; background: #1ab188; color: #ffffff; margin-right: 15px;
			-webkit-transition: all 0.5s ease; transition: all 0.5s ease; -webkit-appearance: none;">
			STOP!!!	</button> <!-- BUTTON FOR Pin 11 -->
		</div>
		
		
	</div>
    </div>
	
		
</div><!-- tab-content -->
      
</div> <!-- /form -->
<!--in the <button> tags below the ID attribute in the value sent to the arduino -->
	<script src="jquery-1.10.2.min.js"></script>
	<script	type="text/javascript">
		$(document).ready(function() {
			//alert("Inside Ready...");
		});
		$(".led").click(function() {
			var p = $(this).attr('id'); //get id value (i.e. pin 13, pin 12, pin 11)
			alert(p);
			//send HTTP GET request to the IP Address with the parameter "pin" and the value "p", then execute the function
			 $.get("http://192.168.1.108:80/", {pin:p}); //execute get request 
		});
		</script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="js/index.js"></script>

</body>
</html>
