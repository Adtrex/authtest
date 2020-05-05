	
	<?php 	include_once("header.php");
	require_once('function/alert.php');

	if(!isset($_SESSION["LoggedIn"])){
		header("Location: login.php");
	}
 ?>




		<h3>Book Appointment</h3>
		<p><strong>Kindly fill the form to book your with the Medical Team</strong></p>
		<p>All Fields are required</p>


			<p>
				<?php message();	?>
			</p>

		<form method="POST" action="processbook.php">

			<p>
				<?php error();	?>
			</p>
			
			<p>
				<label>First Name</label><br />
				<input type="text" name="first_name"   />
			</p>

			<p>
				<label>Last Name  </label><br />
				<input type="text" name="last_name"   />
			</p>

			<p>
				<label>Email</label><br />
				<input type="text" name="email"   />
			</p>

			<p>
				<label>Date for appoinment</label><br />
				<input type="date" name="book_date"   />
			</p>
			<p>
				<label>Time for Appoinment</label><br />
				<input type="time" name="book_time" placeholder="Last Name"  />
			</p>

			<p>
				<label>Nature of Appointment</label><br />
				<select name="book_nature">
					<option value="">Select One</option>
					<option>CheckUp</option>
					<option>Treatment</option>
				</select>
			</p>
			<hr />




			<p>
				<label>Department for Appointment</label><br />
				<input name="book_department"></p>

			<p>

				<p>
				<label>Initial Complaint</label><br />
				<input name="book_complaint"></p>

			<p>
				<button type="submit" class="btn btn-default">Register</button>
			</p>
		</form>

	<?php include_once("footer.php"); ?>