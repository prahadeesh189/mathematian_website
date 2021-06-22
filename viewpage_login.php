<!DOCTYPE html>
<html>

<head>
	<meta charset:'utf-8'>
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<title>praha's-project</title>
	<style>
	
	
	body{
		margin:0;
				
	}
	
	.container{
		width:20cm;
		min-height:13.5cm;
		padding: .3cm .3cm 1.5cm;
		background-color:#BFBFBF  ;
		margin: 3cm auto 0.5cm;
		border-radius:0.5cm;
		overflow:hidden;
		border-sizing:border-box ;
		border:none;
		
	}
	.container .container_img{
		width:99.8%;
		min-height:300px;
		background-color:white;
		padding:10px;
		overflow:hidden;
		border: none ;
		box-sizing:border-box;
		
	}
	.container .conrainer_topic{
		width:99.8%;
		height:50px;
		background-color:white;
		margin:0 ;
		border: none;
		font-size:0.9cm;
	}
	
	.container_img img{
		display:block;
		height:300px ;
		width:50%;
		margin:0 auto;
	}

	.container .container_dfn{
		width:97.4%;
		min-height:50px;
		background-color:white;
		margin:25px 0 ;
		overflow:auto;
		border: none;
		padding:10px;
		font-size:.5cm;
		
	}
	div.nav{
		background-color:black;
		height:1.5cm;
		overflow:hidden;
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

	
	</style>
	
	
	
</head>

<body >
	<div class='nav'>
		<div class = 'icon' >
			<p style='color:white;margin:0;' >mathemat!c-!on</p>
		</div>
	</div>



<?php 
	
	$curr_qID =  $_GET['current_qID'];
	
	
	$conn = mysqli_connect("localhost","root","","it-project");
	
	$q = "SELECT * FROM `question` WHERE qID = $curr_qID " ;

	$query = mysqli_query($conn,$q);

	$row = mysqli_fetch_assoc($query);
	
	$req_ans = "SELECT * FROM `answer` WHERE qID = $curr_qID " ;
	
	$req_ans_rlp =  mysqli_query($conn,$req_ans);
	
	

	
	
	

?>




<div class="container">
	<h1>Question :</h1>
	
	<?php
	echo '	<div class = "q">
		<div class = "conrainer_topic " ><p>Topic : '.$row['q_topic'].'</p></div>
		<div class="container_dfn"><p>'.$row['question_desc'].'</p></div>
		<div class="container_img"><img id="container_image" src="'.$row['question_IMG'].'" alt="img" /></div>
	</div>' ;
	?>
	
	<h1>Answer :</h1>
	<div class = 'answer'>
	
		<?php
		while ($answs =  mysqli_fetch_assoc($req_ans_rlp)){
			echo '
			<div class = "a">
				<div class="container_dfn"><p>'. $answs['answer_desc'].'</p></div>
				<div class="container_img"><img id="container_image" src="'. $answs['answer _IMG'] .'" alt="img" /></div>
			</div><br><hr><br> ';
		
		}
		 ?>
		
	</div>

</div>

</body>


</html>





















