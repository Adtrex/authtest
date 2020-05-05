<?php

include_once("header.php");

if(!isset($_SESSION["LoggedIn"])){
		header("Location: login.php");
	}

?>

<?php 
$email = $_SESSION["email"]; 

$allbills = scandir("db/bill/");
	$countAllbills = count($allbills);
	

	for($counter = 0; $counter < $countAllbills; $counter++) {
		if($allbills[$counter] !=="." && $allbills[$counter] !==".."){

				$currentbill = $allbills[$counter];

			$bills = file("db/bill/".$email.".json");

//print_r($bills) ;

//echo $users;'

foreach ($bills as $bills_file => $bill) {


echo "<table>
<tr>
<th>TRANSACTION</th>
</tr>";


	echo '<tr>
	<td>'.$bill.'</td>

	</tr>';
	
}
echo "</table>";      

}
	



}
?>

<?php include_once("footer.php"); ?>