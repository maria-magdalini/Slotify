<?php 

function sanitizeFormPassword($inputText){

	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUsername($inputText){
	$inputText = strip_tags($inputText);
	$inputText  = str_replace(" ", "", $inputText);
	return $inputText;
}


function sanitizeFormString($inputText){
	$inputText = strip_tags($inputText);
	$inputText  = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}





if (isset($_POST['registerButton'])) {
	// echo "register Button Pressed\n";

	
	$username  = sanitizeFormUsername($_POST['username']);
	$firstName = sanitizeFormString($_POST['firstname']);
	$lastName = sanitizeFormString($_POST['lastname']);
	$email= sanitizeFormString($_POST['email']);
	$email2 = sanitizeFormString($_POST['email2']);
	$password= sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);

   $wasSucceful =  $account->register($username , $firstName, $lastName, $email, $email2, $password, $password2);
   
   if($wasSucceful == true) {
   	$_SESSION['userLogedIn'] = $username;
    header("Location: index.php");
    }


}

?>
