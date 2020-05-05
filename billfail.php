	<?php
	include_once("header.php");
	if(!isset($_SESSION["LoggedIn"])){
		header("Location: login.php");
	}

	
	?>
	<h1>Payment Failed</h1>
	<a href="bill.php">Kindly go back to bill page to restart payment process</a>


	<?php
	include_once("footer.php");
	?>