<?php 


$allappoinments = scandir("db/appointments/");
	$appointments = 0;

	for($counter = 0; $counter < count($allappoinments); $counter++) {
		if ($allappoinments[$counter] !=="." && $allappoinments[$counter] !=="..") {
			$appointments++;
		}
	}
if ($appointments > 0) {
	 $_SESSION["message"] = "You have " . $appointments . " pending appoinments";
}else{
	$_SESSION["message"] = "You have no pending appointments";

			}


		