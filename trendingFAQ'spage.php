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
		background-color:pink;
	}
	</style>

</head>

<body>

<?php 
	include('navbar.php');
?>

<script>

function goingtoview(){
	window.open("viewpage.php","_self");
}

</script>

<div class="container" onclick="goingtoview()">
	<div class="container_img"></div>
	<div class="container_dfn"></div>
</div>





</body>






</html>













