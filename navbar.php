<!DOCTYPE  html>
<html lang='en'>

<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>praha's-project</title>
	
	<style>
	
	body{
		margin:0;
		
	}

	@media all and (max-width:39.5cm){
		.headr{
			display:none;
		}
	}
	.headr{
		position:sticky;
		top:0;
		height:2cm;
		width:100%;
		z-index:15;
		box-sizing:border-box;
		border:none;		
	}
	div.nav{
		background-color:black;
		height:1.5cm;
		width:100%;
		font-size:0.8cm;
		position:absolute;
	}
	.pages a{
		float:right;
		text-decoration:none;
		padding:0.35em 3.65% 0.37em 3.7%  ;
		color:white;
		overflow:hidden;
	}
	#drpdwnbtn a{
		padding:0.35em 0.6em 0.29em 0.5em  ;
	}

	.pages a:hover{
		background-color:green;
	}

	div.pages{
		width:30.5%;
		background-color:inherit;
		margin: 0 0 0 70%;
	}

	div.search {
		width:42%;
		float:left;
		padding:0.21cm 0 0 11%;
		background-color:inherit;
		margin:0;
	}

	.searchinput{
		height:0.9cm;
		font-size:23px ;
		width:80%;
		border-radius: 10px 0 0 10px ;
		border:none;
	}

	.searchbutton {
		height:0.9cm;
		font-size:23px ;
		width:3cm;
		border-radius: 0 10px 10px 0 ;
		border:0 ;
		border-left:1px solid black ;
		background-color:white;
	}

	#drpdwn-content{
		float:right;
		display:none;
		font-size:0.8cm;
		background-color:black;
		box-sizing:border-box;
		width: 6.5cm;
		overflow:hidden;

	}
	#drpdwn-content a{
		color:white;
		text-decoration:none;
		float:right;

	}
	#drpdwnmen:hover  #drpdwnbtn a {
		background-color:green;
	}

	#drpdwn:hover #drpdwn-content {
		display:block;
	}


	#drpdwn{
		float:right;
		box-sizing:border-box;
		border:none;
		background-color:inherit;
		height:1.5cm;
		width:3cm;
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
<body>	
	

	<div class='headr'>
	
	
	
		<div class='nav'>
			<div class = 'icon' >
				<p style='color:white;margin:0;' >mathemat!c-!on</p>
			</div>
			<div class='search'>
			
				<table>
					<tr>
						<form method="post" action = 'homepage.php'  >
						<input class = 'searchinput' name='searchvalue' type='search' placeholder='	Search by topics...'/><input class = 'searchbutton ' type='submit' name='submit' value='Search'/>
						</form>
					</tr>
				</table>
			</div>
			
			<div class='pages'>
			
				<div id='drpdwnmen'>
				
					<div id='drpdwn'>
					
						<div id='drpdwnbtn'>
							<a id = 'more' href='#'>More&dharr;</a>
						</div>
						<div id='drpdwn-content'>
							<a href='#' id = 'answeredqpage' onclick = 'answeredqpage()' style='font-size:0.8cm ; padding: 8px  30px  8px  46.5px; ' >Answered Q's</a>
							<a href='#' id = 'unansweredqpage' onclick = 'unansweredqpage()' style='font-size:0.8cm ; padding: 8px  30px  8px  17.9px; ' >Unanswered Q's</a>
							<hr>
							<a href='#' id = 'account' onclick = 'account()' style='padding: 8px  1.5em  8px  100px;'>Account</a>
							<a href='#' id = 'logout' onclick = 'logout()' style='padding: 8px  1.5em  8px  98.5px;'>Log Out</a>
							
						</div>
						
					</div>
				</div>
                                                 
				<a href = '#' id = 'yourquestions' onclick = 'yourquestions()' >Your Questions</a>
				<a href = '#' id= 'home' onclick = 'home()' >Home</a>
		
			</div>
			
		</div>

	</div>
	
	<script>
	var currnt_qID  = sessionStorage.getItem('current_qID');
	
	function logout(){
		sessionStorage.clear();
		window.open(" http://localhost/loginpage.php?",'_self' );

	}
	
	function account(){
		window.open(" http://localhost/accountpage.php?current_qID="+currnt_qID +" &current_uID="+sessionStorage.getItem('current_uID'),'_self' );
		
	}
	function unansweredqpage(){
		window.open(" http://localhost/unansweredqpage.php?current_qID="+currnt_qID +" &current_uID="+sessionStorage.getItem('current_uID'),'_self' );
		
	}
	
	function answeredqpage(){
		window.open(" http://localhost/answeredqpage.php?current_qID="+currnt_qID +" &current_uID="+sessionStorage.getItem('current_uID'),'_self' );
		
	}
	
	
	
	function home(){		
		window.open(" http://localhost/homepage.php?current_qID="+currnt_qID +" &current_uID="+sessionStorage.getItem('current_uID'),'_self' );
		
	}
	
	function yourquestions(){
		window.open(" http://localhost/youranswers.php?current_qID="+currnt_qID +" &current_uID="+sessionStorage.getItem('current_uID'),'_self' );
	}
	
	

	</script>




</body>






</html>




































































