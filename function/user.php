<?php 

function is_user_LoggedIn(){
	if ($_SESSION["LoggedIn"] && !empty($_SESSION['LoggedIn'])){
		return true;
	}

	return false;
}

function is_token_set(){
	if(isset($_GET['token']) && !empty($_SESSION["token"])){
		return true;
	}
	return false;
}

function find_user($email = ""){
	if(!$email){
		echo "<span style='color:red'> User Email is not set </span>";
		die;
	}
	$allUsers = scandir("db/users/");
	$countAllUsers = count($allUsers);

	for($counter = 0; $counter < $countAllUsers; $counter++) {

		$currentUser = $allUsers[$counter];

		if($currentUser == $email . ".json"){
			$userString = file_get_contents("db/users/".$currentUser);
			$userObject = json_decode($userString);
			
			return $userObject;
			
			}
					
			

			}
			return false;
}
function save_user($userObject){
	file_put_contents('db/users/'. $userObject['email'] . ".json",json_encode($userObject));
}