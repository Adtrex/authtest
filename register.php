	
	<?php 	include_once("header.php");
	require_once('function/alert.php');
	if(isset($_SESSION["LoggedIn"]) && !empty($_SESSION["LoggedIn"])){
		header("Location: dashboard.php");
	}
 ?>


		<h3>Register</h3>
		<p><strong>Welcome, please register</strong></p>
		<p>All Fields are required</p>

		<form method="POST" action="processregister.php">

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
				<label>Password</label><br />
				<input 

				type="password" name="password" placeholder="Password"  />
			</p>

			<p>
				<label>Gender</label><br />
				<select name="gender"  
				<?php
				
				if(isset($_SESSION['first_name'])){
							echo "value=" . $_SESSION['first_name'];
				}

				?>
				>
					<option value="">Select One</option>
					<option
				<?php
				
					if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
					echo "selected";
					}

				?>
					>Male</option>
					<option
				<?php
				
					if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
					echo "selected";
					}

				?>
					>Female</option>
				</select>
			</p>
			<hr />

			<p>
				<label>Designation</label><br />
				<select name="designation"  />
					<option value="">Select One</option>
					<option
				<?php
				
					if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
					echo "selected";
					}

				?>
					>Medical Team (MT)</option>
					<option
				<?php
				
					if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patients'){
					echo "selected";
					}

				?>
					>Patients</option>
				</select>
			</p>


			<p>
				<label>Department</label><br />
				<input 

				<?php
				
				if(isset($_SESSION['department'])){
							echo "value=" . $_SESSION['department'];
				}

				?>

				type="" name="department" placeholder="Department"  />
			</p>

			<p>
				<button type="submit" class="btn btn-default">Register</button>
			</p>
		</form>

	<?php include_once("footer.php"); ?>