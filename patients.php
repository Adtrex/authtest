<?php 
include_once("header.php");

if(!isset($_SESSION["LoggedIn"])){
		header("Location: login.php");
	}

?>





<h3>DASHBOARD</h3>


		LoggedIn User ID: <?php echo $_SESSION['LoggedIn'] ?>	
		Welcome, <?php echo $_SESSION["full_name"] ?>, You are logged in as (<?php echo $_SESSION["role"] ?>), and your ID is <?php echo $_SESSION["LoggedIn"] ?>;


			<a href="bill.php">Pay Bill,</a>
			<a href="book.php"> Book Appointment,</a>
			<a href="patientbill.php">View Transaction History</a>
		patients

<?php include_once("footer.php"); ?>