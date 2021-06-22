<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset:'utf-8'>
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<title>praha's-project</title>
	<link rel="stylesheet" type="text/css" href="webpage-outlook-css.css">


	
	<style>
	
	.container{
		border : 1.9px solid black ;
	}
	.container:hover{
		background-color:green;
	}
	.container:active{
		background-color:#02c916;
	}
	.container .container_dfn{
		padding:0 1.4px ;
		font-size : 0.5cm ;
	}
	
	body{
		 background-size: 100% 30cm ;
	}
	
	#askbtn{
		width:20cm;
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





<?php
	$conn = mysqli_connect("localhost","root","","it-project");

	if ( isset($_POST['submit']) ){
		
		$search_topic = $_POST['searchvalue'] ;
		
		$search_topic = strtolower($search_topic) ; 
		
		$search_q = "SELECT * FROM `question` WHERE q_topic = '$search_topic'" ;
		$search_query = mysqli_query($conn,$search_q);
		
		
		if (mysqli_num_rows($search_query)!=0){
			while($search_row = mysqli_fetch_assoc($search_query)){
				echo "
				<div class='container' id = ".$search_row['qID']."  onclick='goingtoview(this.id)'>
					<div class='container_img'><img id='container_image' src=".$search_row['question_IMG']." alt='.jpg'/></div>
					<div class='container_dfn'><p id='container_definition'>"."Topic :". $search_row['q_topic']."<br><hr>".$search_row['question_desc']."</p></div>
				</div>" ;
			}
		}else{
			echo '<script>window.alert("NO!!! results found");</script>';
			echo '<script>window.history.back()</script>' ;

		}	
			
		
	}else{
		
		echo ' <button id="askbtn" value="add" onclick="askbtn()" >Ask Question</button>' ;	
		
		if ( isset($_GET) && sizeof($_GET) != 0 ){
			$_SESSION["currt_uID"] = $_GET['current_uID'] ;					
		}
		
		$current_uID = $_SESSION["currt_uID"] ;
		
		echo "<script>var current_uID = $current_uID </script>" ;
		
		$q = "SELECT * FROM `question`" ;
		$query = mysqli_query($conn,$q);
		
		while($row = mysqli_fetch_assoc($query)){
			echo "
			<div class='container' id = ".$row['qID']."  onclick='goingtoview(this.id)'>
				<div class='container_img'><img id='container_image' src=".$row['question_IMG']." alt='.jpg'/></div>
				<div class='container_dfn'><p id='container_definition'>"."Topic : ". $row['q_topic']."<br><hr>".$row['question_desc']."</p></div>
			</div>" ;
		}
		
	}




?>

<div id="all_cont"></div>

<script>

var current_qID ;


function goingtoview(click_id){

	var current_qID = parseInt(click_id) ;

	if (current_qID > 0 ) {
		window.location.href = "http://localhost/viewpage.php?current_qID=" + current_qID +"&current_uID="+ current_uID  ;
	} else 
		exit();
	
	
	sessionStorage.setItem('current_qID',current_qID );
	

}

if (sessionStorage.getItem('current_uID')==null){
	sessionStorage.setItem('current_uID',current_uID );
}else{
	current_uID = sessionStorage.getItem('current_uID') ;
}

function askbtn(){
	window.open("http://localhost/upld_q.php?current_qID=" + current_qID +"&current_uID="+ current_uID,"_self");	
	
}

</script>

<script type="text/javascript">



</script>


</body>

</html>