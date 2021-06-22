<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>



<?php


$uId =  $_GET['current_uID'];


$upswd =  $_GET['current_upasswrd'];


$conn = mysqli_connect("localhost","root","","it-project");
	
$q = " SELECT * FROM `user` WHERE username = '$uId' && password = '$upswd' " ;

$query = mysqli_query($conn,$q);

$row = mysqli_fetch_assoc($query);

if ($row != NUll){
	
	$uid = $row['userID'];
	print_r($uid);

	header("Location: http://localhost/homepage.php?current_uID= $uid &current_upasswrd= $upswd ");	
	
	exit;
		
}else{
	echo '<script>window.alert("You must create an account first!!!\r\nOR\r\nCheck your username and password");</script>';
	echo '<script>window.history.back()</script>' ;
    exit;
	}


?>












</body>
</html>