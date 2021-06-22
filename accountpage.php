<!DOCTYPE  html>
<html lang='en'>

<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<title>praha's-project</title>
	<style>

body{
	margin:0;
	background-color:#ececec;
	
	
}
.inpts{
	height:1.2cm;
	width:15cm;
	display:inline-block;
	margin: 2cm auto 0 ;
	font-size:23px ;
	border:1px solid inherit;
	border-radius: 0.3em ;
	border:1px solid black ;
	padding-left:10px;
}
table,tr,td{
	
	border:0;
	border-collapse:collapse;
	margin : 0 ;
	padding	: 0.1% 0 0 0;
}
#signupform{
	
	vertical-align:center;
	background-color:inherit;
	border-radius:0.5cm;
	min-width:15cm;
	margin:0 0 0 7cm  ;
	height:12cm;
	padding:0  ;
}

#subm{
	
	height:1cm;
	width:10cm;
	font-size:23px ;
	border-radius:0.3em ;
	display:block;
	margin:2.5cm auto 0;
	padding: 0 auto 0;
	background-color:green;
	border:0;
	
}

label{
	font-size:23px ;
	
}

#canc{
	
	height:1cm;
	width:10cm;
	font-size:23px ;
	border-radius:0.3em ;
	display:block;
	margin:1cm auto 0;
	padding: 0 auto 0;
	background-color:green;
	border:0;
}


</style>


</head>

<body>

	<?php
		include('navbar.php');
	
	?>
	<?php
	
	$conn = mysqli_connect("localhost","root","","it-project");
	
	if (isset($_REQUEST['submit'])){
		
		$username = $_REQUEST['username'] ; 
		$password = $_REQUEST['passwrd'] ; 
		$email = $_REQUEST['email'] ;	
		$curr_uID = $_REQUEST["c_uid"];

		$query = "UPDATE `user` SET `username` = '$username', `password` = '$password', `email` = '$email' WHERE `user`.`userID` = $curr_uID" ;
		if (mysqli_query($conn,$query)){}else{}
		
		echo "<script>window.open(' http://localhost/homepage.php?current_uID= $curr_uID &current_upasswrd= $password ','_self')</script>" ;
		
	}else{
			// error_reporting(E_ALL ^ E_NOTICE);
			
			$curr_uID =  $_REQUEST['current_uID'];
			$qry = "SELECT * FROM `user` WHERE userID = $curr_uID " ;
			$req  = mysqli_query($conn,$qry) ;
			$row_d = mysqli_fetch_assoc($req ) ;
			
	}
	?>
	
	
	



	<div id='signupform'>

		<form method='post' action='accountpage.php'  >
			<table>
				<tr>
					<td  ><label for="male">UserName  &nbsp;: </label><input  name = 'username'  class='inpts' type='text' value = '<?php if (isset($row_d)){echo $row_d['username'];}  ?>'  /></td>
				</tr>
				<tr>
					<td><label for="male">Email   &ensp;&ensp;&ensp;&nbsp;&nbsp;: </label><input name = 'email' class='inpts' type='text' value = '<?php if (isset($row_d)){echo $row_d['email'];}  ?>'  /></td>
				</tr>
				<tr>
					<td><label for="male">Password  &nbsp;&nbsp;: </label><input name = 'passwrd' class='inpts' type='text' value = '<?php if (isset($row_d)){echo $row_d['password'];}  ?>' /></td>
				</tr>																										
				<tr>
					<td ><input name = 'submit' style="color:white;"  id='subm' type='submit' value='Apply Changes' /></td>
				</tr>
				<tr>
					<td><input name = 'reset' style="color:white;" id='canc' type='reset' value='Cancel' /></td>
				</tr>
	
				
			</table>
			<?php echo "<input style='display:none' id='c_uid' type='text' name='c_uid' value='$curr_uID  ' />" ;  ?>
		
		</form>

	</div>




</body>

</html>


































