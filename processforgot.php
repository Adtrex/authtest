<?php session_start();
require_once('function/alert.php');
 
//collecting Data

$errorCount = 0;

$email = $_POST["email"] != "" ? $_POST['email'] : $errorCount++;

$_SESSION["email"] = $email;

if ($errorCount > 0) {
	
	$session_error = "You have " . $errorCount . " error";

	if($errorCount > 1) {
	$session_error .= "s";
	}

	$session_error .= " in your form submission";
	set_alert('error', $session_error);
	 header("Location: forgot.php");
}

else{

	$allUsers = scandir("db/users/");
	$countAllUsers = count($allUsers);

	for($counter = 0; $counter < $countAllUsers; $counter++) {

		$currentUser = $allUsers[$counter];

		if($currentUser == $email . ".json"){
			
			$token = "";

			$alphabets = ['a','b','c','d','e','f','g','h','A','B','C','D','E','F','G','H'];

			for($i = 0 ; $i < 26 ; $i++){

			$index = mt_rand(0,count($alphabets)-1);	
			$token .= $alphabets[$index];

			}
			

			
			$subject = "Password Reset Link";
			$message = "A password reset has been initiated from your account, if you did not initiate this reset, please ignore this message, otherwise visit: localhost/asp/reset.php?token=".$token;
			$headers = "From: no-reply@snh.org" . "\r\n" . 
			"CC: tolu@snh.org";

			file_put_contents('db/tokens/'. $email . ".json",json_encode(['token'=>$token]));
	 

			$try = mail($email,$subject,$message,$headers);



			if($try){
				$_SESSION["message"] = "Password reset has been sent to your email " . $email;
	 header("Location: login.php");

			}else{
				$_SESSION["error"] = "Something went wrong we could not send the password reset " . $email;
	 header("Location: forgot.php");

			}

			die();

	 	}

	 	}

	 	$_SESSION["error"] = "Email not registered with us " . $email;
	 header("Location: forgot.php");



	}