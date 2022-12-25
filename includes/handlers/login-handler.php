<?php 
	if (isset($_POST['loginButton'])) {
		$username = $_POST['loginUsername'] ;
		$password = $_POST['loginUserPassword'] ;
		if($account -> login($username, $password)) {
			$_SESSION['userLoggedIn'] = $username;
			header("Location: index.php");
		}
	}
 ?>