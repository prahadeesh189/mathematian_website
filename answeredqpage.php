<!DOCTYPE html>
<html>
<head>
	<meta charset:'utf-8'>
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<title>praha's-project</title>
	<link rel="stylesheet" type="text/css" href="webpage-outlook-css.css">


	
	<style>
	.container:hover{
		background-color:green;
	}
	.container:active{
		background-color:#02c916;
	}
	.container .container_dfn{
		padding:0 1.5px ;
		font-size : 0.5cm ;
	}
	body{
		 background-size: 100% 30cm ;
	}
	.container{
		border : 1.9px solid black ;
	}
	

	</style>
	
	
</head>

<body>


<?php 
	include('navbar.php');
?>



<?php
	
	
	$current_uID  = $_GET['current_uID'];
	echo "<p style = 'display:none' id='uID'>$current_uID</p>" ;
	
	$conn = mysqli_connect("localhost","root","","it-project");
	
	$q = "SELECT * FROM `question`WHERE ans_status = 1 " ;
	$query = mysqli_query($conn,$q);
	
	
	
	while($row = mysqli_fetch_assoc($query)){
		echo "
		<div class='container' id = ".$row['qID']."  onclick='goingtoview(this.id)'>
			<div class='container_img'><img id='container_image' src=".$row['question_IMG']." alt='.jpg'/></div>
			<div class='container_dfn'><p id='container_definition'>"."Topic : ". $row['q_topic']."<br><hr>".$row['question_desc']."</p></div>
		</div>" ;
	}

?>

<div id="all_cont"></div>

<script>

var current_qID ;

var current_uID = document.getElementById('uID').innerHTML ;

function goingtoview(click_id){

	var current_qID = parseInt(click_id) ;

	if (current_qID > 0 ) {
		window.location.href = "http://localhost/viewpage.php?current_qID=" + current_qID +"&current_uID="+ current_uID  ;
	} else 
		exit();
	
	

	

}



</script>

<script type="text/javascript">



</script>


</body>

</html>