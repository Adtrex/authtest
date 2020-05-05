<?php session_start();

$errorCount = 0;

$email = $_POST["email"] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST["password"] != "" ? $_POST['password'] : $errorCount++;

if ($errorCount > 0) {
	
	$session_error = "You have " . $errorCount . " error";

	if($errorCount > 1) {
	$session_error .= "s";
	}

	$session_error .= " in your form submission";
	$_SESSION["error"] = $session_error ;


	header("Location: login.php");
}
else{ 
	$allUsers = scandir("db/users/");
	$countAllUsers = count($allUsers);

	for($counter = 0; $counter < $countAllUsers; $counter++) {

		$currentUser = $allUsers[$counter];

		if($currentUser == $email . ".json"){
			$userString = file_get_contents("db/users/".$currentUser);
			$userObject = json_decode($userString);
			$passwordfromDB = $userObject->password;

			$passwordfromUser = password_verify($password, $passwordfromDB);

			if($passwordfromDB == $passwordfromUser){

				$_SESSION["LoggedIn"] = $userObject->id;
				$_SESSION["email"] = $userObject->email;
				$_SESSION["full_name"] = $userObject->first_name . " " . $userObject->last_name;
				$_SESSION["role"] = $userObject ->designation;
				if($userObject->designation == 'Patients'){
				header("Location: patients.php");}
				else{
					header("Location: mt.php");
				}
				die();
			}
			}
					
			

			}

	 	$_SESSION["message"] = "Invalid Email or Password ";
	 header("Location: login.php");
	
}
