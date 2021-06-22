<!DOCTYPE  html>
<html lang='en'>

<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	
	<title>praha's-project</title>
	<style>
	.container:hover{
		background-color:green;
	}
	.container:active{
		background-color:#02c916;
	}

	body{
		margin:0;
		
		
	}
	.inpts{
		height:1.2cm;
		width:10cm;
		margin: 0 ;
		font-size:23px ;
		border:0 ;
		
		
	}
	#loginform table,tr,td{
		border-bottom:1px solid #f2f2f2;
		border-collapse:collapse;
		margin :0 auto 0 ;
		padding	: 0;
	}
	#loginform{
		position:fixed;
		top:0;
		vertical-align:center;
		background-color:#dedede;
		box-sizing:border-box;
		border-radius:0.5cm;
		width:15cm;
		margin:5cm 7em 7em  ;
		height:12cm;
		padding:6em 0 0 0 ;
		z-index:2
		
	}

	#subm{
		height:1cm;
		width:10cm;
		font-size:23px ;
		border-radius:0.3em ;
		margin:1cm 0 0 0;
		padding: 0 auto ;
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
		margin :1cm 0 0 4.0cm ;
		text-decoration:none;
		

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

	.scrn_left{
		width:45%;
		background-color:inherit;
		float:left;
		
		padding: 3cm 1cm 2cm 1cm;

	}

	.scrn_right{
		width:50%;
		background-color:inherit;
		float:right;
		
		
	}
	
		
	.container{
		position : absolute ;
		width:inherit;
		height:15em;
		padding: .3cm .3cm .3cm;
		background-color:#BFBFBF  ;
		margin: 0.5cm auto 0;
		border-radius:0.5cm;
		overflow:hidden;
		border : 1.9px solid black ;
		
		
	}

	.container .container_img{
		position : relative ;
		width:30%;
		height:99%;
		background-color:white;
		float:left;
		border-radius:0.5cm 0 0 0.5cm;
		overflow:hidden;
		border: 2px solid black ;
	
	}

	.container .container_dfn{
		position : relative ;
		box-sizing:border-box ;
		width:69%;
		height:100.6%;
		background-color:white;
		float:right;
		border-radius:0 0.5cm 0.5cm 0;
		overflow:auto;
		padding:0 2px 0  ;
		font-size:0.5cm;
		border: 2px solid black ;
		
		
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
	#container_image{
	padding:0 auto 0;
}
	
	</style>

</head>

<body>
	
	<script>

		var current_qID ;

		function goingtoview(click_id){

			var current_qID = parseInt(click_id) ;
	
			window.open('http://localhost/viewpage_login.php?current_qID='+current_qID+' ','_self');
			
		}

	</script>
	
	<div class='nav'>
		<div class = 'icon' >
			<p style='color:white;margin:0;' >mathemat!c-!on</p>
		</div>
	</div>

	<div class="scrn_left">

		<?php
	
	
			$conn = mysqli_connect("localhost","root","","it-project");
			
			$q = "SELECT * FROM `question`WHERE ans_status = 1 " ;
			$query = mysqli_query($conn,$q);
			
			
			
			while($row = mysqli_fetch_assoc($query)){
				echo "<div class='container' id = ".$row['qID']."  onclick='goingtoview(this.id)'>
						<div class='container_img'><img id='container_image' src=".$row['question_IMG']." alt='.jpg'/></div>
						<div class='container_dfn'><p id='container_definition'>"."Topic : ". $row['q_topic']."<br><hr>".$row['question_desc']."</p></div>
					</div>" ;
			}

		?>
		
		
		
	<script>
		var current_uID ;

		function goingtohome(){
			
			current_uID = document.getElementById('username').value ;
			document.getElementById('username').value = '';
			
			current_upasswrd = document.getElementById('passwrd').value ;
			document.getElementById('passwrd').value = '' ;
		
			window.location.href = "http://localhost/loadingloginpage.php?current_uID=" + current_uID + "&current_upasswrd=" + current_upasswrd;
			
		}
</script>	

		

	</div>

	<div class="scrn_right">
		<p style='margin:3cm 4cm 0 ;float:right;font-size:23px;position : fixed;top:0; '   >***Sign up to Ask and Answer Questions  ***</p>
	
		<div id='loginform'>
			<form>
				<table>
					<tr>
						<td><input style='	border-radius: 0.5em 0.5em 0 0 ; border-bottom:1px solid grey;padding:5px ;' class='inpts'id = 'username' type='text' placeholder='   UserName' /></td>
					</tr>
					<tr>
						<td><input style='	border-radius: 0 0 0.5em 0.5em ;border-bottom:1px solid grey;padding:5px ;' class='inpts' id = 'passwrd' type='password' placeholder='   Password' /></td>
					</tr>
					<tr>
						<td ><input id='subm' type='button' style="color:white;" onclick = 'goingtohome()' value='Login' /></td>
					</tr>
				</table>
				
				<input id='canc' style="color:white;" type='reset' value='Cancel' />
				<a id='signupbtn' style="color:white;" href='signuppage.php'>Sign up</a>
			</form>
		</div>
	</div>

<p id = 'current_uID' ></p>




</body>

</html>
