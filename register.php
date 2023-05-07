<?php
include('includes/config.php');
include ('includes/classes/Account.php');
include ('includes/classes/Constants.php');

$account = new Account($con);


include ('includes/handlers/registerHandler.php');
include ('includes/handlers/loginHandler.php');


function getInputValue($name) {
	if(isset($_POST[$name])) {
		echo $_POST[$name];
	}
}

?>
<html>
<head>
	<title>Welcome to Slotify!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/register.js"></script>
<body>

<?php
 if(isset($_POST['registerButton'])){
 	echo '<script>
		
		$(document).ready(function(){

		$("#loginForm").hide();
		$("#registerForm").show();
		
	});
	</script>';
 }else {
 	echo '<script>
		
		$(document).ready(function(){

		$("#loginForm").show();
		$("#registerForm").hide();
		
	});
	</script>';
 }
?>
	

		<div id="background">
		  <div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p><?php 
						echo $account->getError(Constants::$loginFailed);
						?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" required>
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required>
					</p>

					<button type="submit" name="loginButton">LOG IN</button>
					<div class="hasAccountText"><span id="hideLogin">Don't have an account yet? Signup here.</span></div>
					
				</form>

				<form id="registerForm" action="register.php" method="POST">
					<h2>Create to your free account</h2>
					<p>
						<?php 
						echo $account->getError(Constants::$userNameCharacters);
						?>
						<?php 
						echo $account->getError(Constants::$usernameTaken);
						?>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php 
						echo $account->getError(Constants::$firstNameCharacters);
						?>
						<label for="firstname">Fisrtname</label>
						<input id="firstname" name="firstname" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('firstname') ?>" required>
					</p>

					<p>
						<?php 
						echo $account->getError(Constants::$lastnameCharacters);
						?>
						<label for="lastname">Lastname</label>
						<input id="lastname" name="lastname" type="text" placeholder="e.g. bartSimpson"  value="<?php getInputValue('lastname') ?>" required>
					</p>

					<p>
						<?php 
						echo $account->getError(Constants::$emailsDoNotMatch);
						?>
						<?php 
						echo $account->getError(Constants::$emailInvalid);
						?>
							<?php 
						echo $account->getError(Constants::$emailTaken);
						?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="Your email" value="<?php getInputValue('email') ?>" required>
					</p>

					<p>
						<label for="email2">Email Comnfirm</label>
						<input id="email2" name="email2" type="email" placeholder="Your email" value="<?php getInputValue('email2') ?>" required>
					</p>

					<p>
						<?php 
						echo $account->getError(Constants::$passwordsDoNotMatch);
						?>
						<?php 
						echo $account->getError(Constants::$passwordsNotAlphaNumeric);
						?>
						<?php 
						echo $account->getError(Constants::$passwordCharacters);
						?>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" placeholder="Your Password" required>
					</p>

					<p>
						<label for="password2">Password Confirm</label>
						<input id="password2" name="password2" type="password" placeholder="Your Password"  required>
					</p>

					<button type="submit" name="registerButton">Register</button>

					<div class="hasAccountText"><span id="hideRegister">Allready have an account yet? Login here.</span></div>
					
				</form>

			</div>

		  </div>

		</div>
</body>
</html>