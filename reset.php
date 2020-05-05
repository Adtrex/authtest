<?php
	include_once("header.php");
	require_once('function/alert.php');
	require_once('function/user.php');

	

	if(!is_user_LoggedIn() && !is_token_set()){
		$_SESSION["message"] = "You are not authorised to view that page";
		header("Location: Login.php");
	}
	?>
	<h3>Reset Password</h3>
	<p>Reset Password associated with your account : [email]</p>


	<form action="processreset.php" method="POST">

		<p>
				<?php error();				?>
			</p>
		
		<p>
				<label>Email</label><br />
				<input 

				<?php
					if (isset($_SESSION['email'])) {
						echo "value=" . $_SESSION['email'];
					}
				?>

				type="text" name="email" placeholder="Email"  />
			</p>

			<?php if (!is_user_LoggedIn()) {?>
			

			<input 

			<?php
			if(isset($_SESSION['token'])){
				echo "value='" . $_SESSION['token'] . "'" ;
			}else{
				echo "value='" . $_GET['token'] . "'" ;
			}
			?>

			type="hidden" name="token"  />
			<?php } ?>


			<p>
				<label>Enter New Password</label><br />
				<input 

				type="text" name="password" placeholder="Password"  />
			</p>

						<p>
				<button type="submit" class="btn btn-default">Reset Password</button>
			</p>

	</form>

	<?php
	include_once("footer.php");
	?>
