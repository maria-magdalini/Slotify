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
</head>
<body>

	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account</h2>
			<p>
				<label for="loginUsername">Username</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" required>
			</p>
			<p>
				<label for="loginPassword">Password</label>
				<input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required>
			</p>

			<button type="submit" name="loginButton">LOG IN</button>
			
		</form>

		<form id="registerForm" action="register.php" method="POST">
			<h2>Create to your free account</h2>
			<p>
				<?php 
				echo $account->getError(Constants::$userNameCharacters);
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
			
		</form>

	</div>

</body>
</html>