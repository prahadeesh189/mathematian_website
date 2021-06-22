<!DOCTYPE  html>
<html lang='en'>

<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<title>praha's-project</title>
	<style>
div.nav{
	background-color:black;
	height:1.5cm;
	width:100%;
	font-size:0.8cm;
	position:fixed;
	top: 0;
	z-index:2;
	
}
.icon{
	box-sizing:border-box;
	border : none ;
	float:left;
	background-color:green ;
	height:1.5cm;
	padding: 0 15px;
	font-size:1cm
	
}
body{
	margin:0;

}
.inpts{
	height:1.2cm;
	width:10cm;
	margin: 0.5cm 0 0 0 ;
	font-size:23px ;
	border:1px solid inherit;
	border-radius: 0.3em ;
	border:0;
	padding-left:10px;
}
table,tr,td{
	
	border:0;
	border-collapse:collapse;
	margin :0 auto 0 ;
	padding	: 0.1% 0 0 0;
}
#signupform{
	
	vertical-align:center;
	background-color:#dedede ;
	box-sizing:border-box;
	border-radius:0.5cm;
	width:15cm;
	margin:7em auto 0  ;
	height:12cm;
	padding:3em 0 0 0 ;
	
}

#subm{
	height:1cm;
	width:10cm;
	font-size:23px ;
	border-radius:0.3em ;
	margin:1cm 0 0 0;
	padding: 0 auto 0;
	background-color:#00c20a;
	border:0;
	
}

#canc{
	height:1cm;
	width:3cm;
	font-size:23px ;
	border-radius:0.3em ;
	padding: 0 auto 0;
	background-color:red;
	border:0;
	margin :1cm 0 0 2.5cm ;

}	
#signupbtn{
	
	padding:6px 0.5cm 6px 0.5cm;
	font-size:23px ;
	border-radius:0.3em ;
	border:0;
	background-color:#4d88ff;
	color:black;
	margin :1cm 0 0 .3cm ;
	text-decoration:none;
	

}




</style>


</head>

<body>


	<div class='nav'>
		<div class = 'icon' >
			<p style='color:white;margin:0;' >mathemat!c-!on</p>
		</div>
	</div>

	<div id='signupform'>

		<form method='post' action='signuppage.php'  >
			<table>
				<tr>
					<td><input name = 'username'  class='inpts' type='text' placeholder='   UserName' /></td>
				</tr>
				<tr>
					<td><input name = 'email' class='inpts' type='text' placeholder='   Email id' /></td>
				</tr>
				<tr>
					<td><input name = 'passwrd' class='inpts' type='password' placeholder='   Password' /></td>
				</tr>
				<tr>
					<td ><input name = 'submit' style='color:white;'  id='subm' type='submit' value='Sign up' /></td>
				</tr>
			</table>
			
			<input name = 'reset' style='color:white;' id='canc' type='reset' value='Cancel' />
			
			<a id='signupbtn' style='color:white;' href='loginpage.php'>Go Back to LoginPage  </a>

		</form>

	</div>

	<?php
	
	
	if (isset($_POST['submit'])){
			
		$username = $_POST['username'] ; 
		$password = $_POST['passwrd'] ; 
		$email = $_POST['email'] ;

			
		$conn = mysqli_connect("localhost","root","","it-project");

		if(isset($_POST["submit"])){
		
			$query = "INSERT INTO `user` (`username`, `password`, `userID`, `email`) VALUES ('$username', '$password', NULL, '$email')" ;
			
			if (mysqli_query($conn,$query)){}else{}
		
		}

	}

	?>



</body>

</html>


































