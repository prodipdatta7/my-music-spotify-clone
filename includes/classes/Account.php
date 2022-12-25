<?php 
	include "constants.php" ;
	class Account {
		private $errors;
		private $con;
		
		public function __construct($con) {
			$this -> errors = array();
			$this -> con = $con ;
			// echo "con :". $con;
			// echo "con :". $this -> con;
		}

		public function login($un, $pw){
			$pw = md5($pw);
			$query = mysqli_query($this -> con, "SELECT * FROM users WHERE username='$un' AND password='$pw'" );
			if(mysqli_num_rows($query) == 1) {
				return true;
			}
			else {
				array_push($this -> errors, Constants::$LoginFailedError);
				return false;
			}
		}

		public function register($un, $fn, $ln, $em, $cem, $pw, $cpw) {
			$this -> validateUsername($un) ;
			$this -> validateFirstname($fn) ;
			$this -> validateLastname($ln) ;
			$this -> validateEmail($em, $cem) ;
			$this -> validatePassword($pw, $cpw) ;
			if(empty($this -> errors)) {
				// insert into db;
				return $this -> insertUserDetails($un, $fn, $ln, $em, $pw);
			} 
			else {
				return false;
			}
		}

		public function getError($error) {
			if(!in_array($error, $this->errors)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>" ;
		}

		private function insertUserDetails($un, $fn, $ln, $em, $pw) {
			$encryptedPw = md5($pw); // encrypting the password;
			$profilePic = "assets/images/profile-pics/profile.jpg";
			$date = date("y-m-d");
			echo $un.' '.$fn.' '.$ln.' '.$em.' '.$pw.' '.$encryptedPw.' '.$date;
			$query = "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')";
			$result = mysqli_query($this -> con, $query);
			return $result;
		}

		private function validateUsername($un) {
			if (strlen($un) > 25 or strlen($un) < 5) {
				array_push($this -> errors, Constants::$UsernameLengthError);
				return;
			}

			$usernameQuery = mysqli_query($this -> con, "SELECT * FROM users WHERE username = '$un'");
			if(mysqli_num_rows($usernameQuery) != 0) {
				array_push($this -> errors, Constants::$UsernameExistsError);
				return;
			}
		}

		private function validateFirstname($fn) {
			if (strlen($fn) > 25 or strlen($fn) < 2) {
				array_push($this -> errors, Constants::$FirtNameLengthError);
				return;
			}
		}

		private function validateLastname($ln) {
			if (strlen($ln) > 25 or strlen($ln) < 2) {
				array_push($this -> errors, Constants::$LastNameLengthError);
				return;
			}
		}

		private function validateEmail($email, $email2) {
			if ($email != $email2) {
				array_push($this -> errors, Constants::$EmailDoesnotMatch);
				return;
			}

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				array_push($this -> errors, Constants::$EmailInvalidError);
				return ;
			}

			$emailQuery = mysqli_query($this -> con, "SELECT * FROM users WHERE email = '$email'");
			if(mysqli_num_rows($emailQuery) != 0) {
				array_push($this -> errors, Constants::$EmailExistsError);
				return;
			}
		}

		private function validatePassword($pass, $pass2) {
			if($pass != $pass2) {
				array_push($this -> errors, Constants::$PasswordDoesnotMatch) ;
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $pass)) {
				array_push($this -> errors, Constants::$PasswordNotAlphaNumericError) ;
				return;
			}
			if(strlen($pass) > 30 or strlen($pass) < 5) {
				array_push($this -> errors, Constants::$PasswordLengthError);
				return;
			}
		}
	}
 ?>