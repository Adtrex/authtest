

<p>
		<a href="index.php">Home</a>
		<?php
		if(!isset($_SESSION["LoggedIn"]) ){
	?>

		<a href="login.php">Login</a>
		<a href="register.php">Register</a>
		<a href="forgot.php">Forgot Password</a>

		



			<?php 
		}else{
			?>


			<a href="logout.php">Logout</a>
			<a href="reset.php">Reset Password</a>

			<?php } ?>
		
		
	</p>
</center>
</body>
</html>