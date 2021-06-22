<?php

session_start();
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<title>praha's-project</title>

	<style>
	.container{
		width:20cm;
		min-height:13.5cm;
		padding: .3cm .3cm 1.5cm;
		background-color:#dedede ;
		margin: 0.5cm auto 0.5cm;
		border-radius:0.5cm;
		overflow:hidden;
		border-sizing:border-box ;
		border:none;
		
	}
	

	.uploaddesc{
		width:97.4%;
		min-height:50px;
		background-color:white;
		margin:10px 0 ;
		overflow:auto;
		border: none;
		padding:10px;
		font-size:.5cm;
	}

	#adddesc{
		width:80%;
		font-size:0.6cm ;
		padding:5px;
		color:white;
		background-color:green;
		margin: 0 auto 15px;
		border : none;
		display:block;
	}
	
	#upload{
		width:80%;
		font-size:0.8cm ;
		padding:5px;
		color:white;
		background-color:green;
		margin: 15px auto 15px;
		border : none;	
		display:block;
	}
	
	#askbtn{
		width:80%;
		font-size:0.8cm ;
		margin: 15px auto 15px;
		padding:5px;
		color:white;
		background-color:green;
		border : none;
		display:block;
	
	}
	
	#topic{
		width:99.5%;
		min-height:50px;
		background-color:white;
		margin:10px 0 ;
		overflow:auto;
		border: none;
		padding:2px;
		font-size:.6cm;
	}
	
	</style>


</head>

<body>
	<?php 
		include('navbar.php');
	?>
	
	

	<div class="container">
		
		<form method="post" enctype="multipart/form-data"  action="upld_q.php" >
			<br>
			<input id="adddesc" type="file" name="image" />
			<br>
			<input id = 'topic' type = 'text' name = 'topic' placeholder = 'Topic' />
			<textarea class="uploaddesc" rows = "10" cols = "60" name = "description" placeholder = 'Description' ></textarea>
			<br><br>
			<input id="upload"  type="submit"  name="submit" value="Upload" />
			<?php
				
				
				if ( isset($_GET) && sizeof($_GET) != 0 ){
					$_SESSION["currt_uID"] = $_GET['current_uID'] ;					
				}
			?>
		</form>
		
	<button id="askbtn" value="add" onclick="askbtn()" >&larr; Go Back To Home</button>

		
	</div>


	<?php
	

	$conn = mysqli_connect("localhost","root","","it-project");

	if(isset($_POST["submit"])){
		
		$img = $_FILES["image"]["name"];
		$desc = $_POST["description"];
		$curr_uID = $_SESSION["currt_uID"];
		$topic = $_POST['topic'];
		$imageFileType = strtolower(pathinfo($img,PATHINFO_EXTENSION));
		
		
		if ( ($imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'jpeg' )  ){
			
			$query = "INSERT INTO `question` (`qID`, `question_IMG`, `question_desc`, `questioned_by`, `ans_status`, `q_topic`) VALUES (NULL, '$img', '$desc', '$curr_uID', 0, '$topic')" ;
			
			if (mysqli_query($conn,$query)){}
			
		}else if ( $desc != '' && $topic != '' )  { 
			echo "<script>window.alert('Description or Topic is is mandatory')</script>";
		}
		else{
			echo "<script>window.alert('Only \'jpg\', \'png\' ,\'jpeg\' are allowed !!!  ')</script>";
		}

	}
	
	?>






<script>

	
function askbtn(){
	window.open('http://localhost/homepage.php?current_uID='+sessionStorage.getItem('current_uID'),'_self');
}





</script>


</body>



</html>
















