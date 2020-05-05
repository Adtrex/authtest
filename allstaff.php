<?php



$allUsers = scandir("db/users/");
	$countAllUsers = count($allUsers);
	

	for($counter = 0; $counter < $countAllUsers; $counter++) {
		if($allUsers[$counter] !=="." && $allUsers[$counter] !==".."){

				$currentUser = $allUsers[$counter];

			$users = file("db/users/".$currentUser);

print_r($users) ;

//echo $users;'      '



foreach ($users as $users_file => $user) {


echo "<table>
<tr>
<th>FIRST NAME</th>
<th>LAST NAME</th>
</tr>";


	echo '<tr>
	<td>'.$user.'</td>

	</tr>';
	
}
echo "</table>";

}
	



}
?>