<?php
	include "includes/config.php";
	include("includes/classes/Account.php");
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome</title>
	<link rel="stylesheet" href="assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php 
		if (isset($_POST['registerButton'])) {
			echo '<script>
					$(document).ready(function() {
						$("#loginForm").hide() ;
						$("#registerForm").show() ;
					});
				</script>';
			}
		else {
			echo '<script>
					$(document).ready(function() {
						$("#loginForm").show() ;
						$("#registerForm").hide() ;
					});
				</script>';
			}
	?>
	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="post">
					<h2>Login to your account</h2>
					<p>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="Your name" required>
					</p>
					<p>
						<label for="loginUserPassword">Password</label>
						<input id="loginUserPassword" name="loginUserPassword" type="password" required>
					</p>
					<?php echo $account->getError(Constants::$LoginFailedError); ?>
					<button type="submit" name="loginButton">Log in</button>

					<div class="hasAccountText">
						<span id="hideLogin">
							Don't have an account yet? Signup here.
						</span>
					</div>
				</form>

				<form id="registerForm" action="register.php" method="post">
					<h2>Create your free account</h2>
					<p>
						<?php echo $account->getError(Constants::$UsernameLengthError); ?>
						<?php echo $account->getError(Constants::$UsernameExistsError); ?>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" placeholder="Your username" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$FirtNameLengthError); ?>
						<label for="firstname">First name</label>
						<input id="firstname" name="firstname" type="text" placeholder="Your first name" required>
					</p>

					<p>
						<?php echo $account -> getError(Constants::$LastNameLengthError); ?>
						<label for="lastname">Last name</label>
						<input id="lastname" name="lastname" type="text" placeholder="Your last name" required>
					</p>

					<p>
						<?php echo $account -> getError(Constants::$EmailInvalidError); ?>
						<?php echo $account -> getError(Constants::$EmailExistsError); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="Your email" required>
					</p>

					<p>
						<?php echo $account -> getError(Constants::$EmailInvalidError); ?>
						<?php echo $account -> getError(Constants::$EmailDoesnotMatch); ?>
						<label for="email-again">Confirm Email</label>
						<input id="email-again" name="email-again" type="email" placeholder="Your email again" required>
					</p>


					<p>
						<?php echo $account -> getError(Constants::$PasswordNotAlphaNumericError); ?>
						<?php echo $account -> getError(Constants::$PasswordLengthError); ?>
						<label for="registerPassword">Password</label>
						<input id="registerPassword" name="password" type="password" required>
					</p>

					<p>
						<?php echo $account -> getError(Constants::$PasswordNotAlphaNumericError); ?>
						<?php echo $account -> getError(Constants::$PasswordLengthError); ?>
						<?php echo $account -> getError(Constants::$PasswordDoesnotMatch); ?>
						<label for="registerPasswordAgain">Confirm Password</label>
						<input id="registerPasswordAgain" name="password-again" type="password" required>
					</p>
					<button type="submit" name="signupButton">Sign up</button>
					<div class="hasAccountText">
						<span id="hideRegister">
							Already have an account? Login here.
						</span>
					</div>
				</form>
			</div>
			<div id="loginText">
				<h1>Get great music, right now</h1>
				<h2>Listen to loads of songs for free</h2>
				<ul>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlist</li>
					<li>Follow artists to keep up to date</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>