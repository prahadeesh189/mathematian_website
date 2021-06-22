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
		margin:25px 0 ;
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
		margin: 0 auto 15px;
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
	
	
	</style>


</head>

<body>
	<?php 
		include('navbar.php');
	?>


	<div class="container">
		
		<form method="post" enctype="multipart/form-data" action="uploadpage.php" >
			<br>
			<input id="adddesc" type="file" name="image" />
			<br>
			
			<textarea class="uploaddesc" rows = "10" cols = "60" name = "description" placeholder = 'Description'></textarea>
			<br><br>
			<input id="upload" type="submit" name="submit" value="Upload" />
			<?php
				if ( isset($_GET) && sizeof($_GET) != 0 ){
					$_SESSION["curr_uID"] = $_GET['currnt_uID_'] ;	
					$_SESSION["curr_qID"] = $_GET['currnt_qID_'] ;	
				}
			?>
			
		</form>
		<button id="askbtn" value="add" onclick="askbtn()" >&larr; Go Back To Question</button>
		
	</div>

	<?php



	$conn = mysqli_connect("localhost","root","","it-project");

	if(isset($_POST["submit"])){
		 
		$img = $_FILES["image"]["name"];
		$desc = $_POST["description"];
		$curr_qID = $_SESSION["curr_qID"];
		$curr_uID = $_SESSION["curr_uID"];
		$imageFileType = strtolower(pathinfo($img,PATHINFO_EXTENSION));

		if ( ($imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'jpeg' )  ){
			
			$query = "INSERT INTO `answer` (`qID`, `answer _IMG`, `answer_desc`, `answered_by`, `aID`) VALUES ('$curr_qID', '$img','$desc', '$curr_uID', NULL)" ;
		
			mysqli_query($conn,$query);
			
			$changing_as = "UPDATE `question` SET `ans_status` = '1' WHERE `question`.`qID` = $curr_qID" ;

			mysqli_query($conn,$changing_as );
						
		}else if ( $desc == '' )  { 
			echo "<script>window.alert('Description is is mandatory')</script>";
		}
		else{
			echo "<script>window.alert('Only \'jpg\', \'png\' ,\'jpeg\' are allowed !!!  ')</script>";
		}
		
	}

	echo "<script> var current_qID =  ".$_SESSION["curr_qID"]." </script>" ;

	?>





<script>

function askbtn(){
	 	
	window.open('http://localhost/viewpage.php?current_qID='+current_qID+'&current_uID='+sessionStorage.getItem('current_uID'),'_self');

}


</script>


</body>



</html>
















