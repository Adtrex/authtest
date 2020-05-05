	
	<?php 	include_once("header.php");
	require_once('function/alert.php');
	if(!isset($_SESSION["LoggedIn"])){
		header("Location: login.php");
	}
 ?>


		<h3>Payment</h3>
		<p><strong>Welcome, Kindly Make your Payment</strong></p>
		<p>All Fields are required</p>

		<form method="POST" action="processbill.php">

			<p>
				<?php error();				?>
			</p>
			
			<p>
				<label>First Name</label><br />
				<input 
				<?php
				
				if(isset($_SESSION['first_name'])){
							echo "value=" . $_SESSION['first_name'];
				}

				?>


				type="text" name="first_name" placeholder="First Name"  />
			</p>
			<p>
				<label>Last Name</label><br />
				<input 

				<?php
				
				if(isset($_SESSION['last_name'])){
							echo "value=" . $_SESSION['last_name'];
				}

				?>

				type="text" name="last_name" placeholder="Last Name"  />
			</p>
			<p>
				<label>Email</label><br />
				<input 

				<?php
				
				if(isset($_SESSION['email'])){
							echo "value=" . $_SESSION['email'];
				}

				?>

				type="email" name="email" placeholder="Email"  />
			</p>
			<p>
				
			<p>
				<label>Pay Bill</label><br />
				<select name="bill"  />
					<option value="">Select One</option>
					<option
				<?php
				
					if(isset($_SESSION['bill']) && $_SESSION['bill'] == '2000'){
					echo "selected";
					}

				?>
					>2000</option>
					<option
				<?php
				
					if(isset($_SESSION['bill']) && $_SESSION['bill'] == '5000'){
					echo "selected";
					}

				?>
					>5000</option>
				</select>
			</p>


			<p>
				

			<p>
				<button type="submit" class="btn btn-default" name="paybill">Pay Bill</button>
			</p>
		</form>

	<?php include_once("footer.php"); ?>