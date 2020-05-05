<?php session_start();
 
//collecting Data

$errorCount = 0;

if(!$_SESSION['LoggedIn']){
$token = $_POST["token"] != "" ? $_POST['token'] : $errorCount++;
	$_SESSION["token"] = $token;
}


$email = $_POST["email"] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST["password"] != "" ? $_POST['password'] : $errorCount++;


$_SESSION["email"] = $email;

if ($errorCount > 0) {
	//Display proper messages to the user
	//Give more accurate feedback to the user
	 $_SESSION["error"] = "You have " . $errorCount . " errors in your form submission";
	 header("Location: register.php");
}else{

	$allUsersTokens = scandir("db/tokens/");
	$countAllUsersTokens = count($allUsersTokens);

	for($counter = 0; $counter < $countAllUsersTokens; $counter++) {

		$currentTokenFile = $allUsersTokens[$counter];

		if($currentTokenFile == $email . ".json"){
			$tokenContent = file_get_contents("db/tokens/".$currentTokenFile);
			$tokenObject = json_decode($tokenContent);
			$tokenfromDB = $tokenObject->token;


			if($_SESSION['LoggedIn']){
				$checkToken = true;
				//echo "Got here position 1";
			}
			else{
				$checkToken = $tokenfromDB == $token;
				//echo "Got here position 2";
			}

			



			if ($checkToken) {
				echo "User can update password";


				$allUsers = scandir("db/users/");
	$countAllUsers = count($allUsers);

	for($counter = 0; $counter < $countAllUsers; $counter++) {

		$currentUser = $allUsers[$counter];

		if($currentUser == $email . ".json"){
			$userString = file_get_contents("db/users/".$currentUser);
			$userObject = json_decode($userString);
			$userObject->password = password_hash($password,PASSWORD_DEFAULT);

			unlink("db/users/".$currentUser);

			file_put_contents('db/users/'. $email . ".json",json_encode($userObject));

			$_SESSION["message"] = "Password reset successful, you can now login " . $first_name;

			$subject = "Password Reset Successful
			";
			$message = "Your account on snh has just being updated, your password has been changed. If you did not initiate a password change, please visit snh.org and reset your password immediately";
			$headers = "From: no-reply@snh.org" . "\r\n" . 
			"CC: tolu@snh.org";
			$try = mail($email,$subject,$message,$headers);


	 header("Location: login.php");
			die();	
			
			}
					
			

			}



			
			}

			
	 		
	 	}

	 	}

		$_SESSION["error"] = "Password Reset failed, token/email invalid or expired";
	 	header("Location: login.php");

	}