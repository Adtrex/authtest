	<?php
	include_once("header.php");
	if(!isset($_SESSION["LoggedIn"])){
		header("Location: login.php");
	}
	?>
	<h1>You have successfully made your payment</h1>
	<a href="patients.php">Kindly go back to dashboard</a>


	<?php
			$email = $_SESSION["email"];

			$subject = "Bill payment Successful";
			$message = "You have successfully made your payment";
			$headers = "From: no-reply@snh.org" . "\r\n" . 
			"CC: tolu@snh.org";
			$try = mail($email,$subject,$message,$headers);

	include_once("footer.php");
	?>