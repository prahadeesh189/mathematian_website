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
		margin: 0.5cm auto 0.5cm;
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
		font-size:.6cm;
		
	}
	
	.container .conrainer_topic{
		width:99.8%;
		height:50px;
		background-color:white;
		margin:0 ;
		border: none;
		font-size:0.9cm;
	}
	
	#addbtn{
		width:80%;
		font-size:0.8cm ;
		padding:5px;
		color:white;
		background-color:green;
		margin: 1cm 0  0  1.9cm  ;
		border : none;
		
	}
	
	
	</style>
	
	
	
</head>

<body >
<?php 
	include('navbar.php');
	
	$curr_qID =  $_GET['current_qID'];
	$curr_uID = $_GET['current_uID'];
	
	echo "<script>var currnt_qID = ".$curr_qID." </script>";
	
?>



<script type="text/javascript" >
function reloading(){ 
	 window.location.reload();
}

var currnt_uID  = sessionStorage.getItem('current_uID');

function addbtn(){
	
	window.open( "http://localhost/uploadpage.php?currnt_qID =" + currnt_qID +"&currnt_uID ="+ currnt_uID,'_self')  ;

}
</script>




<?php 
	
	
	
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

	<button id="addbtn" value="add" onclick="addbtn()" >Add Answer</button>
	
</div>

</body>


</html>





















