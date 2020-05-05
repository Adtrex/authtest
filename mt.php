<?php 
include_once("header.php");
require_once('function/alert.php');
require_once('appointments.php');

if(!isset($_SESSION["LoggedIn"])){
		header("Location: login.php");
	}

?>

<p>
		<?php message(); ?>
	</p>


<h3>DASHBOARD</h3>
		LoggedIn User ID: <?php echo $_SESSION['LoggedIn'] ?>	
		Welcome, <?php echo $_SESSION["full_name"] ?>, You are logged in as (<?php echo $_SESSION["role"] ?>), and your ID is <?php echo $_SESSION["LoggedIn"] ?>;
		<a href="allbill.php">View all Payments</a>


	

<?php require_once("footer.php"); ?>