<?php 
include_once('header.php');
require_once('function/alert.php');

if(isset($_SESSION["LoggedIn"]) && !empty($_SESSION["LoggedIn"])){
		header("Location: index.php");
	}

?>



	<p>
		<?php message(); ?>
	</p>

	<h3>Login</h3>

	<form method="POST" action="processlogin.php">

			<p>
				<?php error(); ?>
			</p>
			
			
				<label>Email</label><br />
				<input 

				<?php
				
				if(isset($_SESSION['email'])){
							echo "value=" . $_SESSION['email'];
				}

				?>

				type="text" name="email" placeholder="Email"  />
			</p>
			<p>
				<label>Password</label><br />
				<input 

				type="text" name="password" placeholder="Password"  />
			</p>

				<p>
				<button type="submit" class="btn btn-default">Login</button>
			</p>
		</form>


<?php include_once('footer.php'); ?>