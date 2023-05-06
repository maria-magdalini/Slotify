<?php
include ('includes/classes/Account.php');

$account = new Account();


include ('includes/handlers/registerHandler.php');
include ('includes/handlers/loginHandler.php');
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

		<form id="regidterForm" action="register.php" method="POST">
			<h2>Create to your free account</h2>
			<p>
				<?php 
				
				echo $account->getError("Username must be between 5 and 25 characters");
				?>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="e.g. bartSimpson" required>
			</p>

			<p>
				<label for="firstname">Fisrtname</label>
				<input id="firstname" name="firstname" type="text" placeholder="e.g. bartSimpson" required>
			</p>

			<p>
				<label for="lastname">Lastname</label>
				<input id="lastname" name="lastname" type="text" placeholder="e.g. bartSimpson" required>
			</p>

			<p>
				<label for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="Your email" required>
			</p>

			<p>
				<label for="email2">Email Comnfirm</label>
				<input id="email2" name="email2" type="email" placeholder="Your email" required>
			</p>

			<p>
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