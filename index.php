<?php 
include("includes/config.php");
if(isset($_SESSION['userLogedIn'])){
	$userLogedIn = $_SESSION['userLogedIn'];

}
else{
	header("Location: register.php");
}
?>

<html>
<head>
	<title>Welcome to Slotify!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

</head>

<body>
	
<div id="nowPlayingBarContainer">
 <div id="nowPlayingBar">
	
	<div id="nowPlayingLeft"></div>
	<div id="nowPlayingCenter"></div>
	<div id="nowPlayingRight"></div>
 </div>
</div>
</body>

</html>