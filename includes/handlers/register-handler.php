<?php
	$account = new Account($con) ;
	function sanitizeFormPassword($password) {
		return strip_tags($password) ;
	}

	function sanitizeFormUsername($inputText) {
		return str_replace(" ", "", strip_tags($inputText)) ;
	}

	function sanitizeFormEmail($email) {
		return sanitizeFormUsername($email) ;
	}

	function sanitizeFormString($inputText) {
		return ucfirst(str_replace(" ", "", strip_tags($inputText))) ;
	}

	if (isset($_POST['signupButton'])) {
		$username = sanitizeFormUsername($_POST['username']) ;

		$firstName = sanitizeFormString($_POST['firstname']) ;

		$lastname = sanitizeFormString($_POST['lastname']) ;

		$email = sanitizeFormEmail($_POST['email']);

		$confirm_email = sanitizeFormEmail($_POST['email-again']);

		$password = sanitizeFormPassword($_POST['password']) ;

		$confirm_password = sanitizeFormPassword($_POST['password-again']) ;
		
		global $account ;
		$isSuccessful = $account -> register($username, $firstName, $lastname, $email, $confirm_email, $password, $confirm_password);
		if ($isSuccessful == true) {
			$_SESSION['userLoggedIn'] = $username;
			header("Location: index.php");
		}
	}

?>