<?php 

	ob_start();

	$timezone = date_default_timezone_set("Europe/Athens");

	$con = mysqli_connect("localhost", "root", "", "slotify");

	if(mysqli_connect_errno()){
		echo "failed to connect: " . mysqli_connect_errno();
	}
?>