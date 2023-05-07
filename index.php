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
</head>

<body>
	Hello!
</body>

</html>