
	<?php
	include_once("header.php");

	if(!isset($_SESSION["LoggedIn"])){
		header("Location: login.php");
	}
	?>
	<h1>Welcome to Start.ng Hospital</h1>


	<?php
	include_once("footer.php");
	?>


	