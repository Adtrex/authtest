<?php session_start();
require_once('function/user.php');
 
//collecting Data

$errorCount = 0;
$first_name = $_POST["first_name"] != "" ? $_POST['first_name'] : $errorCount++;
$last_name = $_POST["last_name"] != "" ? $_POST['last_name'] : $errorCount++;
$email = $_POST["email"] != "" ? $_POST['email'] : $errorCount++;
$book_date = $_POST["book_date"] != "" ? $_POST['book_date'] : $errorCount++;
$book_time = $_POST["book_time"] != "" ? $_POST['book_time'] : $errorCount++;
$book_nature = $_POST["book_nature"] != "" ? $_POST['book_nature'] : $errorCount++;
$book_department = $_POST["book_department"] != "" ? $_POST['book_department'] : $errorCount++;
$book_complaint = $_POST["book_complaint"] != "" ? $_POST['book_complaint'] : $errorCount++;

$_SESSION["first_name"] = $first_name;
$_SESSION["last_name"] = $last_name;
$_SESSION["email"] = $email;
$_SESSION["book_date"] = $first_name;
$_SESSION["book_time"] = $last_name;
$_SESSION["book_nature"] = $email;
$_SESSION["book_department"] = $password;
$_SESSION["book_complaint"] = $gender;

 

if ($errorCount > 0) {
	//Display proper messages to the user
	//Give more accurate feedback to the user
	 $_SESSION["error"] = "You have " . $errorCount . " errors in your form submission";
	 header("Location: book.php");
}else{

	




	$userObject =[
		'first_name'=>$first_name,
		'last_name'=>$last_name,
		'email'=>$email,
		'book_date'=>$book_date,
		'book_time'=>$book_time,
		'book_nature'=>$book_nature,
		'book_department'=>$book_department,
		'book_complaint'=>$book_complaint,

	];

	file_put_contents("db/appointments/".$first_name . $last_name . ".json", json_encode($userObject));
	 $_SESSION["message"] = "Your booking has been received" . $first_name;
	 header("Location: book.php");
}






//saving Data

//

