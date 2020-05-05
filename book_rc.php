<?php

include_once('header.php');
require_once('function/alert.php');

if(isset($_SESSION["LoggedIn"]) && !empty($_SESSION["LoggedIn"])){
		header("Location: patients.php");
	}
	// 
?>

<p>
		<?php message(); ?>
	</p>
